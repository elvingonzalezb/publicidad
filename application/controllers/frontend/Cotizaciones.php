<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_productos','Producto');
        $this->load->model('frontend/Model_cotizaciones','Cotizacion');
        $this->load->library('My_PHPMailer');
    }

	public function index()
    {
        $data['carrito'] = $this->session->userdata('carrito_items');
        $data['body'] = 'cotizacion';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function continuar(){
        if (!$this->session->userdata('Cliente')) {
            $this->session->set_userdata('pedido_login',array('carrito'=>true));
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Para continuar, ingresa a tu cuenta.</div>');
            redirect(base_url().'clientes/login#redirectLogin');
        }

        $carrito = ( ! empty($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : []);
        $data['numpedido'] = time().'MF';
        $data['pedido'] = $carrito;
        $data['body'] = 'cotizacion_continuar';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function enviar() {
        $cliente = $this->session->userdata('Cliente');
        if( ! $this->session->userdata('carrito_items') ) {
            redirect(base_url());
        }else{

            // ACOPIAMOS LOS DATOS DE LA RESERVA
            $data = array();
            $data['cliente_id'] = $cliente['id'];
            $codigoCoti = $this->Cotizacion->getCodigoCotizacion();
            $data['codigo'] = $codigoCoti['codigo'];
            $data['estado'] = _C_PENDIENTE;
            $data['fecha'] = date("Y-m-d H:i:s");
            $correo = $cliente['correo'];
            $igv = dataConfig('igv');
            $subtotal = 0;
            $subtotal2 = 0;
            // Vencimiento
            $ahora = time();
            //$data['monto_descuento'] = $sum_descuento;
            $fecha_venta = date('d-m-Y H:i:s', $ahora);
                # GUARDAMOS EL DETALLE DE LA COTIZACION
                $carrito = $this->session->userdata('carrito_items');
                //$llave = '';
                foreach ($carrito as $ckey => $cvalue) {

                    $items[$ckey] = $cvalue;
                    $calculo = calculoCotizacion($cvalue['item_id'], $cvalue['item_impresion']['nro_color'], $cvalue['item_impresion']['id'], $cvalue['item_cantidad']);
                    $items[$ckey]['calculo'] = $calculo;
                    if(is_array($calculo) && count($calculo)>0){
                    	//$items[$ckey]['costos'] = serialize($calculo);
                    	$items[$ckey]['subtotal'] = $calculo['precioUnitContado']*$cvalue['item_cantidad'];
                    	$items[$ckey]['precio'] = $calculo['precioUnitContado'];
                        $items[$ckey]['tiempoproduccion'] = $calculo['tiempoproduccion'];
                        $items[$ckey]['precio5050'] = $calculo['precioUnit5050'];
                        $items[$ckey]['subtotal5050'] = $calculo['precioUnit5050']*$cvalue['item_cantidad'];
                        #calculos
                        $subtotal = $subtotal + $items[$ckey]['subtotal'];
                        $subtotal2 = $subtotal2 + $items[$ckey]['subtotal5050'];
                    }else{
                    	$items[$ckey]['precio'] = 0;
                    	$items[$ckey]['subtotal'] = 0;
                        $items[$ckey]['tiempoproduccion'] = 0;
                    	//$items[$ckey]['costos'] = '';
                        $items[$ckey]['precio5050'] = 0;
                        $items[$ckey]['subtotal5050'] = 0;
                        #calculos
                        $subtotal= $subtotal + $items[$ckey]['subtotal'];
                        $subtotal2 = $subtotal2 + $items[$ckey]['subtotal5050'];
                    }
                    if (is_array($cvalue['item_atributos']) && count($cvalue['item_atributos'])>0) {

                        $items[$ckey]['atributos'] = serialize($cvalue['item_atributos']);
                    }else{
                        $items[$ckey]['atributos'] = '';
                    }
                    if (isset($items[$ckey]['item_impresion']) && count($cvalue['item_impresion'])>0) {
                    	$items[$ckey]['tipo_impresion'] = $cvalue['item_impresion']['tipo_impresion'];
                        $items[$ckey]['item_impresion'] = serialize($cvalue['item_impresion']);
                    }else{
                        $items[$ckey]['item_impresion'] = '';
                    }
                }
                $data['subtotal'] = $subtotal;
                $data['subtotal5050'] = $subtotal2;
                $data['igv'] = ($subtotal*$igv)/100;
                $data['igv5050'] = ($subtotal2*$igv)/100;
                $data['total'] = $subtotal+$data['igv'];
                $data['total5050'] = $subtotal+$data['igv'];
                # GUARDAMOS COTIZACION
                $id_carro = $this->Cotizacion->grabarCotizacion($data);

                $aux = array();
                $cont = 0;
                foreach ($items as $value) {
                    $datos = array();
                    $datos['cotizacion_id'] = $id_carro;
                    $datos['producto_id'] = $value['item_id'];
                    $datos['imagen'] = $value['item_imagen'];
                    //$datos['costos'] = $value['costos'];
                    //$datos['link_producto'] = $value['url'];
                    $datos['nombre'] = $value['item_nombre'];
                    $datos['atributos'] = $value['atributos'];
                    $datos['tiempoproduccion'] = $value['tiempoproduccion'];
                    //$datos['impresion'] = $value['item_estado'];
                    $datos['dato_impresion'] = $value['item_impresion'];
                    $datos['cantidad'] = $value['item_cantidad'];
                    $datos['comentario'] = (isset($value['item_comentario'])? $value['item_comentario']:'');
                    $datos['precio'] = $value['precio'];
                    $datos['subtotal'] = $value['subtotal'];
                    $datos['precio5050'] = $value['precio5050'];
                    $datos['subtotal5050'] = $value['subtotal5050'];
                    $id_detalle = $this->Cotizacion->grabarDetalleCotizacion($datos);
                    $cont += 1;
                }
                $dataMail['carrito'] = $items;
                $dataMail['cliente'] = $cliente;
                $dataMail['pedido'] = $data;
                if ($id_carro>0) {
                    $correo_notificaciones = explode("," , $correo);
                    // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
                    $mail = new PHPMailer();
                    $mail->CharSet = 'UTF-8';
                    // luego descomentarlo para probar en servidor
                    $mail->From = dataConfig('correo_from'); // direccion de quien envia
                    $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
                    $mail ->AddAddress($cliente['correo']);

                    $mail->Subject = "Cotización realizada :: ".dataConfig('nombre_comercial');
                    $msg = $this->load->view('frontend/mailing/cotizacion_carrito_cliente', $dataMail, true);
                    $mail->Body = $msg;
                    $mail->IsHTML(true);
                    if ($mail->Send()) {
                        //$this->session->unset_userdata('carrito_items');
                       // $this->session->set_flashdata('message', '<div class="alert alert-success">Su solicitud de cotización se ha realizado con éxito.</div>');
                       // redirect(base_url().'cotizacion/enviado');
                    }else{
                        echo 'Mailer Error: ' . $mail->ErrorInfo.'<br>';
                        exit;
                    }
                    #######################################
                    # CORREO PARA LA ADMINISTRACION 
                    $mail2 = new PHPMailer();
                    $mail2->CharSet = 'UTF-8';
                    $mail2->From = dataConfig('correo_from');
                    $mail2->FromName = $cliente['nombres'];


                    for($i=0; $i<count($correo_notificaciones); $i++) {
                        $currentMail = trim($correo_notificaciones[$i]);
                        $mail2->AddAddress($currentMail);
                    }
                    $mail2->Subject =  "Se ha realizado una cotización.";
                    $msg2 = $this->load->view('frontend/mailing/cotizacion_carrito_admin', $dataMail, true);
                    $mail2->Body = $msg2;
                    $mail2->IsHTML(true);
                    if ($mail2->Send()) {
                        $this->session->unset_userdata('carrito_items');
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Su solicitud de cotización se ha realizado con éxito y se envió a su correo: '.$cliente['correo'].'</div>');
                        redirect(base_url().'cotizacion/enviado');
                    }else{
                        echo 'Mailer Error: ' . $mail2->ErrorInfo;exit;
                    }
                }
                
        }
       
    }

    /*public function agregar() {
        if (!empty($_POST)) {
            $id = $this->input->post('id');
            $cantidad = $this->input->post('cantidad');
            $color = $this->input->post('color');
            $impresion = $this->input->post('impresion');
            $atributos = array($color,$impresion); 
            if( $id != null){ //viene un ID para agregar
                
                $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();
                if (count($carritoItems)>0){ //ya existe algo en el carrito
                     
                    $flag = false;
                    for($i=0; $i<count($carritoItems); $i++){
                        if( $carritoItems[$i]['item_id'] == $id && $carritoItems[$i]['item_atributos_id'] == $color){
                            $flag = true;
                            break;
                        }
                    }
                     
                    if($flag){
                        $carritoItems[$i]['item_cantidad'] = $cantidad;
                        //$carritoItems[$i]['item_cantidad']    += $cantidad;
                    }else{
                        #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                        $itemread = $this->Producto->getProductById($id);
                        $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);
                        if ($itemAtributos) {
                            $itemread['atributos'] = $itemAtributos;
                        }else{
                            $itemread['atributos'] = '';
                        }
                        if(count($itemread)>0){
                                $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributos_id' => $color,
                                    'item_atributos' => $itemread['atributos'],
                                    'item_cantidad' => $cantidad
                                );
                                $carritoItems[] = $item;
                        }else{
                            redirect(base_url().'cotizacion');
                        }
                    }
                }else{ #no hay ningun producto en la cesta, leer la info del producto y agregar a la sesion
                    #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                    $itemread = $this->Producto->getProductById($id);
                    $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);
                    if ($itemAtributos) {
                        //$itemread['precio'] = (!empty($itemAtributos['precio']))? $itemAtributos['precio'] : $itemAtributos['precio_oferta'];
                        $itemread['atributos'] = $itemAtributos;
                    }else{
                        $itemread['atributos'] = '';
                    }
                    if(count($itemread)>0){
                            $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributos_id' => $color,
                                    'item_atributos' => $itemread['atributos'],
                                    'item_cantidad' => $cantidad
                                );
                                //$carritoItems[$item['item_id']] = $item;
                                $carritoItems[] = $item;
                    }else{
                        redirect(base_url().'cotizacion');
                    }
                }
                $this->session->set_userdata('carrito_items',$carritoItems);
                redirect(base_url().'cotizacion');
            }
        }else{
            redirect(base_url().'cotizacion');
        }
    }*/
    public function agregar() {
        if (!empty($_POST)) {
            //echo '<pre>';print_r($_POST);echo '</pre>';die;
            $id = $this->input->post('id');
            $cantidad = $this->input->post('cantidad');
            $atributos = $this->input->post('atributos');
            $tipo_impresion = $this->input->post('tipo_impresion');
            $nro_color = $this->input->post('nro_color');
            $dtImpresion = $this->Producto->getTipoImpresionById($tipo_impresion);
            $dtImpresion['nro_color']=$nro_color;
            //array_push($dtImpresion, array('nro_color'=>));
            /*$cn_atributos = 'si';
            if ($cn_atributos == 'si') {
                $nro_color = $this->input->post('nro_color');
                $tipo_impresion = $this->input->post('tipo_impresion');
                $dtImpresion = $this->Producto->getTipoImpresionById($tipo_impresion);

                $data_cn_at = array('impresion'=>$dtImpresion,'nro_color'=>'');
            }else{
                $data_cn_at = '';
            }*/

            if (!empty($atributos) && is_array($atributos)) {
                $llave = implode('',$atributos);
            }else{
                $llave = '000';
            }
            if( $id != null){ //viene un ID para agregar
                
                $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();
                if (count($carritoItems)>0){ //ya existe algo en el carrito
                     
                    $flag = false;
                    for($i=0; $i<count($carritoItems); $i++){
                        if($carritoItems[$i]['item_carroID'] == $id.'-'.$llave){
                            $flag = true;
                            break;
                        }
                    }
                     
                    if($flag){
                        $carritoItems[$i]['item_cantidad'] = $cantidad;
                    }else{
                        #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                        $itemread = $this->Producto->getProductById($id);
                        $categoria = $this->Producto->getCategoriaById($itemread['categoria_id']);
                        
                        $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);
                        if(count($itemread)>0){
                                $item = array(
                                    'item_carroID' => $itemread['id'].'-'.$llave,
                                    'item_id' => $itemread['id'],
                                    'item_nombre' => $itemread['nombre'],
                                    'item_codigo' => $itemread['codigo'],
                                    'item_nom_cat' => $categoria['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributos' => $itemAtributos,
                                    'item_cantidad' => $cantidad,
                                    //'item_estado'=>$cn_atributos,
                                    'item_impresion' =>$dtImpresion
                                );
                                $carritoItems[] = $item;
                        }else{
                            redirect(base_url().'cotizacion');
                        }
                    }
                }else{ #no hay ningun producto en la cesta, leer la info del producto y agregar a la sesion
                    #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                    $itemread = $this->Producto->getProductById($id);
                    $categoria = $this->Producto->getCategoriaById($itemread['categoria_id']);
                    $itemAtributos = $this->Producto->getStockAtributos($atributos,$id);
                    if(count($itemread)>0){
                            $item = array(
                                    'item_carroID' => $itemread['id'].'-'.$llave,
                                    'item_id' => $itemread['id'],
                                    'item_nombre' => $itemread['nombre'],
                                    'item_codigo' => $itemread['codigo'],
                                    'item_nom_cat' => $categoria['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributos' => $itemAtributos,
                                    'item_cantidad' => $cantidad,
                                    //'item_estado'=>$cn_atributos,
                                    'item_impresion' =>$dtImpresion
                                );
                                //$carritoItems[$item['item_id']] = $item;
                                $carritoItems[] = $item;
                    }else{
                        redirect(base_url().'cotizacion');
                    }
                }
                $this->session->set_userdata('carrito_items',$carritoItems);
                redirect(base_url().'cotizacion');
            }
        }else{
            redirect(base_url().'cotizacion');
        }
    }
    public function error() {
        $data['body'] = 'error';
        $this->load->view("frontend/includes/template", $data);
    }
    public function enviado() {
        $data['body'] = 'enviado';
        $this->load->view("frontend/includes/template", $data);
    }
}
