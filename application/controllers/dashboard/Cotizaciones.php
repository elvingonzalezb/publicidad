<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_cotizaciones', 'Cotizacion');
		$this->load->helper(array('form'));
		$this->load->library('My_PHPMailer');
        SessionUsuario();
	}

	public function index()
	{
		///$this->load->view('welcome_message');
	}

	public function lista() { 
		
		$aux = $this->Cotizacion->getListaCotizacion();
		$ordenes = array();
		foreach($aux as $dato_orden){
			$aux2 = array();
			$aux2['id'] = $dato_orden['id'];
			$auxiliar = $dato_orden['id'];
			$aux2['codigo_orden'] = $dato_orden['codigo'];
			$aux2['id_cliente'] = $dato_orden['cliente_id'];
			if($dato_orden['cliente_id'] ===0)
			{
				$nombre='No se tiene asignado un cliente';
			}else{
				$ax = $this->Cotizacion->getCliente($dato_orden['cliente_id']);
				
				$num_ax=count($ax);
				if($num_ax>0){
                    $razonsocial = $ax['razon_social'];
					$nombre = $ax['nombres'];
					$apellidos = $ax['apellidos']; 
				}else{
                    $razonsocial = '-';
					$nombre='El cliente no existe en la Base de Datos';
				}
			}

			$aux2['nombre_cliente'] = $nombre." ".$apellidos;
			$aux2['fecha_venta'] = formatoFechaHora($dato_orden['fecha']);
			$aux2['estado2'] = $dato_orden['estado2'];
            $aux2['razon_social'] = $razonsocial;
			$aux2['codigos_productos'] = codigosProductosReserva($dato_orden['id']); 
			$ordenes[] = $aux2;
		}
		$resultado = $this->uri->segment(5);
		$datapanel["resultado"] = $resultado;

		//body
		$datapanel['body'] 		= 'cotizaciones/lista';
		//data
		$datapanel['ordenes'] = $ordenes;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function cotizar() {
        // DATOS PEDIDO
        $id_carro = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $orden= $this->Cotizacion->getCotizacion($id_carro);
        $cliente = $this->Cotizacion->getCliente($orden['cliente_id']);
        //echo '<pre>';print_r($orden);echo '</pre>';die;
        $datapanel['cliente'] = $cliente;
        $datapanel['orden'] = $orden;
        $datapanel["resultado"] = $resultado;
        $detalles = $this->Cotizacion->getDetallesCotizacion($id_carro);
        foreach ($detalles as $key => $value) {
            if (!empty($value['atributos'])) {
                $detalles[$key]['atributos'] = unserialize($value['atributos']);
            } else {
                $detalles[$key]['atributos'] = array();
            }
            if (!empty($value['dato_impresion'])) {
                $detalles[$key]['dato_impresion'] = unserialize($value['dato_impresion']);
            } else {
                $detalles[$key]['dato_impresion'] = array();
            }  
        }
        $datapanel['detalles'] = $detalles;

        //body
		$datapanel['body'] 		= 'cotizaciones/cotizar';
		$this->load->view("dashboard/includes/template", $datapanel);      
    }

    public function detalle() {
        // DETALLE DE ORDEN
        $id_carro = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $orden= $this->Cotizacion->getCotizacion($id_carro);
        $cliente = $this->Cotizacion->getCliente($orden['cliente_id']);     
        $datapanel['cliente'] = $cliente;

        $datapanel['orden'] = $orden;
        $datapanel["resultado"] = $resultado;
        $datapanel['carro'] = $orden;
        $detalles = $this->Cotizacion->getDetallesCotizacion($id_carro);
        foreach ($detalles as $key => $value) {
            if (!empty($value['atributos'])) {
                $detalles[$key]['atributos'] = unserialize($value['atributos']);
            } else {
                $detalles[$key]['atributos'] = array();
            }
            if (!empty($value['dato_impresion'])) {
                $detalles[$key]['dato_impresion'] = unserialize($value['dato_impresion']);
            } else {
                $detalles[$key]['dato_impresion'] = array();
            }  
        }
        $datapanel['detalles'] = $detalles;
        $datapanel['body'] 		= 'cotizaciones/detalle';
        $this->load->view("dashboard/includes/template", $datapanel);
    }

    public function enviar() {
        $id_carro = $this->input->post('id');
        $rec_adelanto = $this->input->post('rec_adelanto'); 
        
        $num_items = $this->input->post('num_items');
        $id_cliente = $this->input->post('id_cliente');
        $subtotal = $this->input->post('subtotal');
        $subtotal2 = $this->input->post('subtotal5050');
        $igv = $this->input->post('igv');
        $igv2 = $this->input->post('igv5050');
        $total = $this->input->post('total');
        $total2 = $this->input->post('total5050');
        $recargoAdelanto = dataConfig('porc_recargo_adelanto');
        for($i=0; $i<$num_items; $i++)
        {
            $id_detalle = $this->input->post('id_detalle_'.$i);
            $precio = $this->input->post('precio_'.$i);
            $precio2 = $precio*(100+$recargoAdelanto)/100;
            $cantidad = $this->input->post('cantidad_'.$i);
            $subtotal = $precio * $cantidad;
            $subtotal2 = $precio2 * $cantidad;

            $data = array("precio"=>$precio,"subtotal"=>$subtotal,"precio5050"=>$precio2,"subtotal5050"=>$subtotal2);
            $this->Cotizacion->updatePreciosCotizacion($id_detalle, $data);
        }

        $d = array('subtotal'=>$subtotal,'igv'=>$igv,'total'=>$total,'subtotal5050'=>$subtotal2,'igv5050'=>$igv2,'total5050'=>$total2);
        $this->Cotizacion->updateTotalPrecio($id_carro, $d);

        // ****** CAMBIAMOS EL ESTADO A BORRADA **********
        $ahora = time();
        $fecha_cotizacion = date('Y-m-d H:i:s', $ahora);

        $dataup = array(
            "estado2"    => _C_ACEPTADO,
            "fecha" => $fecha_cotizacion
        );
        $this->Cotizacion->updateCotizacion($id_carro, $dataup);
       
        $orden = $this->Cotizacion->getCotizacion($id_carro);

        $vectorFecha = explode(" ", $fecha_cotizacion);
        $fechaCotizacion = Ymd_2_dmY($vectorFecha[0]);
        $horaCotizacion = $vectorFecha[1];
        $fechaHoraCotizacion = $fechaCotizacion.' '.$horaCotizacion;


        /******** ENVIAMOS NOTIFICACION DE LA ANULACION A CLIENTE Y A CKI **********/
        $datosCliente = $this->Cotizacion->getCliente($orden['cliente_id']); 
        //****************  FIN DE CREACION DE CARRITO *******************

        $correo_notificaciones = explode(",", dataConfig("correo_notificaciones"));

        //********** INFORMACION PARA CKI *************/
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->From     = dataConfig("correo_from");  //direccion de quien envia el correo   
        $mail->FromName = dataConfig('nombre_comercial');

        for($i=0; $i<count($correo_notificaciones); $i++)
        {
            $currentMail = trim($correo_notificaciones[$i]);
            $mail->AddBCC($currentMail);
        }
        $mail->AddAddress($datosCliente['correo']);
        $mail->Subject =  "Solicitud de cotización atendida";

        $datos['cliente'] = $datosCliente;
        $datos['fecha'] = $fechaHoraCotizacion;
        $datos['pedidos'] = $orden;
        $datos['total'] = $total; 
        $datos['carrito'] = $this->Cotizacion->getDetallesCotizacion($id_carro);

        foreach ($datos['carrito'] as $key => $value) {
            if (!empty($value['atributos'])) {
                $datos['carrito'][$key]['atributos'] = unserialize($value['atributos']);
            } else {
                $datos['carrito'][$key]['atributos'] = array();
            }
            if (!empty($value['dato_impresion'])) {
                $datos['carrito'][$key]['dato_impresion'] = unserialize($value['dato_impresion']);
            } else {
                $datos['carrito'][$key]['dato_impresion'] = array();
            }  
        }
       
        $msg = $this->load->view('dashboard/mailing/solicitud_cotizacion', $datos, true);

        $mail->Body = $msg;
        $mail->IsHTML(true); 
        @$mail->Send(); 
        redirect(base_url().'dashboard/cotizaciones/detalle/'.$id_carro.'/success');
    }

    public function enviarCotiDolar() {
        if ($_POST) {
            $id_carro = $_POST['cotizacion_id'];
            $ahora = time();
            $fecha_cotizacion = date('Y-m-d H:i:s', $ahora);
           
            $orden = $this->Cotizacion->getCotizacion($id_carro);

            $vectorFecha = explode(" ", $fecha_cotizacion);
            $fechaCotizacion = Ymd_2_dmY($vectorFecha[0]);
            $horaCotizacion = $vectorFecha[1];
            $fechaHoraCotizacion = $fechaCotizacion.' '.$horaCotizacion;


            /******** ENVIAMOS NOTIFICACION DE LA ANULACION A CLIENTE Y A CKI **********/
            $datosCliente = $this->Cotizacion->getCliente($orden['cliente_id']); 
            //****************  FIN DE CREACION DE CARRITO *******************

            $correo_notificaciones = explode(",", dataConfig("correo_notificaciones"));

            //********** INFORMACION PARA CKI *************/
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->From     = dataConfig("correo_from");  //direccion de quien envia el correo   
            $mail->FromName = dataConfig('nombre_comercial');

            for($i=0; $i<count($correo_notificaciones); $i++)
            {
                $currentMail = trim($correo_notificaciones[$i]);
                $mail->AddBCC($currentMail);
            }
            $mail->AddAddress($datosCliente['correo']);
            $mail->Subject =  "Solicitud de cotización (USD)";

            $datos['cliente'] = $datosCliente;
            $datos['fecha'] = $fechaHoraCotizacion;
            $datos['pedidos'] = $orden;
            //$datos['total'] = $total; 
            $datos['carrito'] = $this->Cotizacion->getDetallesCotizacion($id_carro);

            foreach ($datos['carrito'] as $key => $value) {
                if (!empty($value['atributos'])) {
                    $datos['carrito'][$key]['atributos'] = unserialize($value['atributos']);
                } else {
                    $datos['carrito'][$key]['atributos'] = array();
                }
                if (!empty($value['dato_impresion'])) {
                    $datos['carrito'][$key]['dato_impresion'] = unserialize($value['dato_impresion']);
                } else {
                    $datos['carrito'][$key]['dato_impresion'] = array();
                }  
            }
            $msg = $this->load->view('dashboard/mailing/solicitud_cotizacion_dolar', $datos, true);
            $mail->Body = $msg;
            $mail->IsHTML(true); 
            if (@$mail->Send()) {
                $result['titulo'] =  '¡Hecho!';
                $result['estado'] =  'success';
                $result['msj'] = 'Se envió correctamente.';
            }else{
                $result['titulo'] =  '¡Error!';
                $result['estado'] = 'error';
                $result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
            }
        }else{
            $result['titulo'] =  '¡Error!';
            $result['estado'] = 'error';
            $result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
        }
        
        echo json_encode($result);
    }

    #Ajax para el estado del cotizacion
    public function ajaxEstado(){

        if ($_POST) {

            $id = $_POST['param_id'];
            $updated = $this->Cotizacion->updateCotizacion($id, array('estado2'=>_C_ACEPTADO));

            if($updated){
                $result['estado'] =  _C_ACEPTADO;
                $result['msj'] = 'El estado se ha actualizado';
            }else{
                $result['estado'] = '0';
                $result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
            }
            echo json_encode($result);
        } 
    }

    public function delete(){
        if ($_POST) {
            $id = $_POST['param_id'];
            $id_cotizacion = $this->Cotizacion->getCotizacion( $id );
            if(empty($id_cotizacion)){ 
                echo "no existe, ver lista"; exit();
            };
            $data=array('estado'=>_ELIMINADO);
            $resultado = $this->Cotizacion->updateCotizacion($id,$data);

            if($resultado) {
                $result['titulo'] =  '¡Hecho!';
                $result['estado'] =  'success';
                $result['msj'] = 'Se elimino correctamente.';
            } else {
                $result['titulo'] =  '¡Error!';
                $result['estado'] = 'error';
                $result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
            }
            echo json_encode($result);

        }
    }

    public function reporte() {
        $datapanel['cotizaciones'] = array();
        if ($_POST) {
            $datos = $_POST;
            $fecha_ini = $_POST['fecha_inicio']; 
            $fecha_fin = $_POST['fecha_fin'];
            $fecha1 = date("Y-m-d", strtotime($fecha_ini));
            $fecha2 = date("Y-m-d", strtotime($fecha_fin));
            $estado = $_POST['estado2'];
            $cotizaciones = $this->Cotizacion->getReporteCotizacion($fecha1, $fecha2, $estado);
            $num = count($cotizaciones);
            $datapanel['cotizaciones'] = $cotizaciones;
            $msg = ($num>1)? 'cotizaciones':'cotización';
            $this->session->set_flashdata('message', '<div class="alert alert-success">Se encontró '.$num.' '.$msg.' del '.$fecha_ini.' al '.$fecha_fin.'.</div>');
        }
        $datapanel['body'] = 'cotizaciones/reporte';
        $this->load->view("dashboard/includes/template", $datapanel);
    }
}
?>