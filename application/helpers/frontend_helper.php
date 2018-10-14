<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getBanners'))
{
    function getBanners() {
        $ci =& get_instance();
        $sql = "select * from banners where tipo_banner_id = 1 and estado='"._ACTIVO."' order by orden";
        $query = $ci->db->query($sql);
        $resultado = $query->result();
        $banners = array();
        foreach ($resultado as $value) {
            $temp = array();
            $temp['BANNER_ID'] = $value->id;
            $temp['BANNER_TITULO'] = $value->titulo;
            $temp['BANNER_SUMILLA'] = $value->subtitulo;
            $temp['BANNER_TEXTO'] = $value->resumen;
            $temp['BTN_TITULO'] = $value->btn_titulo;
            /*if(trim($value->boton) == ''){
                $temp['BANNER_HIDDEN'] = 'hidden';
            }else{
                $temp['BANNER_HIDDEN'] = '';
            }*/
            $temp['BANNER_ENLACE'] = $value->link;
            $temp['BANNER_IMAGEN'] = $value->imagen;
            $temp['BANNER_ORDEN'] = $value->orden;
            $temp['BANNER_ESTADO'] = $value->estado;

            $banners[] = $temp;
        }
        return $banners;
    }
}

if ( ! function_exists('dateFormatMA'))
{
    /**
     * Muestra los servicios del footer
     */
    function dateFormatMA($fecha){
        $dia = date('d', strtotime($fecha));
        $mes = date('n', strtotime($fecha));
        //$numeroDia = date('d', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        //$tiempo = date('H:i:s', strtotime($fecha));
        $meses = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Novi','Dic');
        //$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        //return $dias[$dia-1]." ".$numeroDia." de ".$meses[$mes-1]." del ".$anio." - ".$tiempo;
        //return $meses[$mes-1].' '.$dia.', '.$anio; #
        return $dia.' '.$meses[$mes-1].' '.$anio;
    }
}

if ( ! function_exists('getFrontBreadProd'))
{
    /**
     * Crea en breadcrumb de categorias y productos detalles
     *
     */
    function getFrontBreadProd($params = array()){
        $CI =& get_instance();
        $url_category = $CI->uri->segment(2,0);
        $id = substr(strrchr($url_category,'-'),1);
        $url_prod = $CI->uri->segment(3,0);
        $html = '';
        if ($id == '') {
            $html .= '<li class="active"><a> Categorias</a></li>';
        }else{
            $html .= '<li><a href="productos"> Categorias</a></li>';
            $categorias = ($url_prod === 'detalle') ? getFrontCatProduct($params[1]) : getFrontCatProduct($id) ;
            $count = count($categorias);
            for ($i=0; $i < $count; $i++) { 
                if ($i+1 == $count) {
                    $html .=  ($url_prod === 'detalle') ? '<li><a href="productos/'.$categorias[$i]['url'].'-'.$categorias[$i]['id'].'"> '.$categorias[$i]['nombre'].'</a></li><li class="active"><a> '.$params[0].'</a></li>' : '<li class="active"><a> '.$categorias[$i]['nombre'].'</a></li>';
                } else {
                    $html .= '<li><a href="productos/'.$categorias[$i]['url'].'-'.$categorias[$i]['id'].'"> '.$categorias[$i]['nombre'].'</a></li>';
                }
            }
        }
        return $html;
    }
}
if ( ! function_exists('getFrontCatProduct'))
{
    function getFrontCatProduct($id){
        $CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre','padre_id','url'])
                ->from('categorias')
                ->where('estado', _ACTIVO)
                ->where('id',$id)
                ->get()
                ->row_array();

        if ($query['padre_id'] != _PARENT_ID) {
            $path[] = $query;
            $path = array_merge(getFrontCatProduct($query['padre_id']), $path);
        }else{
            $path[] = $query;
        }
        return $path;
    }
}

if ( ! function_exists('getFrontCatFooter'))
{
    function getFrontCatFooter(){
        $CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre','padre_id','url'])
                ->from('categorias')
                ->where('estado', _ACTIVO)
                ->where('tipo_categoria_id', 1)
                ->where('padre_id',_PARENT_ID)
                ->get()
                ->result_array();
        return $query;
    }
}

if ( ! function_exists('getServicios'))
{
    function getServicios(){
        $CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre','url'])
                ->from('servicios')
                ->where('estado', _ACTIVO)
                ->get()
                ->result_array();
        return $query;
    }
}

if ( ! function_exists('getCountCarrito')) {
    function getCountCarrito(){
        $data = array();
        $CI =& get_instance();
        $items = $CI->session->userdata('carrito_items');
        return count($items);
        //$html = '';
        /*if ($items) {
            //echo '<pre>';print_r($items);echo 'aaa';echo '</pre>';
            $html .= '<ul>';
            $total = 0 ;
            foreach ($items as $key => $item) {
                $html .=    '<li>';
                $html .=        '<div class="prod-img"><img alt="'.$item['item_nombre'].'" src="'.base_url('files/productos/thumbs/').$item['item_imagen'].'"></div>';
                $html .=        '<div class="prod-info">';
                $html .=            '<h4><a href="#">'.$item['item_nombre'].'(x'.$item['item_cantidad'].')</a></h4><span>'.dataConfig('moneda').number_format($item['item_subtotal'],2).'</span>';
                $html .=        '</div><span class="remove-item" onclick="javascript:deleteItem('.$item['item_carroID'].')"><i aria-hidden="true" class="fa fa-times"></i></span>';
                $html .=    '</li>';
                $total = $total + $item['item_subtotal']; 
            }
            $html .= '</ul>';
            $html .= '<p class="total_pr"><strong>Total: '.dataConfig('moneda').' '.number_format($total,2).'</strong></p><a class="tm-btn btn-app btn-blue pull-left" href="pedido"><span class="icon-cart"></span> ver carrito</a>';
            return $html;
        }else{
            $html .= '<center><p style="color:#000;">0 items</p></center>';
            return $html;
        }*/
    }
}

if ( ! function_exists('getItemsCarrito'))
{
    function getItemsCarrito(){
        $data = array();
        $CI =& get_instance();
        $items = $CI->session->userdata('carrito_items');
        $itemsCar = getCountCarrito();
        //return count($items);
        $html = '';
        $html .= '<ul class="scrollbar" id="scroll-custom">';
            $html .= '<li><div class="backgroung-color-shopping">
                        <a href="cotizacion" class="" data-toggle="">
                            <div class="total-price-basket">
                                <div class="info-icons col-xs-4">
                                    <i class="fa fa-shopping-bag fa-3" aria-hidden="true"></i>
                                    <span class="count icono-carrito">'.$itemsCar.'</span>
                                </div>
                                <div class="col-xs-8">
                                    <span class="lbl item-color-shopping">Mi Pedido</span><br>
                                    <span>'.$itemsCar.' item(s)</span>
                                </div>
                            </div>
                        </a>
                    </div><div class="clearfix"></div></li>';
        if ($items) {
            $total = 0 ;
            foreach ($items as $key => $item) {
                $html .=    '<li>';
                $html .=    '<span class="item">';
                $html .=        '<span class="item-left">';
                $html .=            '<img alt="'.$item['item_nombre'].'" src="'.base_url('files/productos/thumbs/').$item['item_imagen'].'" class="img-responsive" width="50"/>';
                
                $html .=        '</span>';
                $html .=        '<span class="item-right">';
                $html .=            '<span class="item-info">';
                $html .=                '<span>'.ucwords(strtolower($item['item_nombre'])).'</span>';
                $html .=                '<span></span>';
                $html .=            '</span>';
                $html .=            '<a class="btn-carrito" onclick="javascript:deleteItem(\''.$item['item_carroID'].'\')">Eliminar</a>';
                $html .=        '</span>';
                $html .=    '</span>';
                $html .=    '</li>';
            }
            $html .= '<li class="divider"></li><li><a class="text-center" href="cotizacion">Ver Carrito</a></li>';
            $html .= '</ul>';
        }
        $html .= '</ul>';
        return $html;
    }
}

if ( ! function_exists('slugUrlFront'))
{
    function slugUrlFront($str, $delimiter = '-')
    {
         $unwanted_array = ['ś'=>'s', 'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ź' => 'z', 'ż' => 'z',
            'Ś'=>'s', 'Ą' => 'a', 'Ć' => 'c', 'Ę' => 'e', 'Ł' => 'l', 'Ń' => 'n', 'Ó' => 'o', 'Ź' => 'z', 'Ż' => 'z']; // Polish letters for example
        $str = strtr( $str, $unwanted_array );

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}

if ( ! function_exists('getColorCotizacion'))
{
    function getColorCotizacion($id_producto,$atributo,$idCarro){
        $data = array();
        $CI =& get_instance();
        $CI->load->model('frontend/model_productos','Producto');
        $items = $CI->Producto->getAtributos($id_producto);
        $html = '';
        $required = 'required';
        $i = 0;
        if ($items) {
            $html .= '<div class="row">';
            $html .=    '<label for="group_1" class="col-sm-4 attribute_label attribute-key">Color</label>';
            $html .=    '<div class="col-sm-8 attribute_list">';
            foreach ($items[1]['atributos'] as $key => $item) {
                $active = ($item['id'] == $atributo)? 'btnColorActive': '';
                $checked = ($item['id'] == $atributo)? 'checked': '';
                //$html .=    '<input type="radio" value="'.$item['id'].'" id="rd'.$item['id'].'" name="atributos['.$idCarro.']" class="inputColor" '.$checked.' '.$required.'/>';
                $html .=    '<label for="rd'.$item['id'].'">';
                $html .=        '<span class="colores list-colores color'.$idCarro.' '.$active.'" id="rdb'.$item['id'].'" title="'.$item['atributos_nombres'].'" style="background: '.$item['atributos_valor'].'"></span>';
                $html .=    '</label>';
                $i++;
                $required = '';
            }
            $html .=    '</div>';
            $html .= '</div>';
            $html .= '';
            return $html;
        }else{
            $html .= '';
            return $html;
        }
    }
}
if ( ! function_exists('getImpresionesCoti'))
{
    function getImpresionesCoti($id_producto,$atributo,$idCarro,$nroColor){
        $data = array();
        $CI =& get_instance();
        $CI->load->model('frontend/model_productos','Producto');
        $items = $CI->Producto->getTipoImpresion($id_producto);
        $html = '';
        if ($items) {
            $html .= '<div class="row">';
            $html .=    '<label for="group_1" class="col-sm-4 attribute_label attribute-key">Tipos de Impresión</label>';
            $html .=    '<div class="col-sm-8 attribute_list">';
            $html .=        '<select class="form-control attribute_select no-print" onchange="impresionChange(\''.$idCarro.'\')" id="tipoImpresion'.$idCarro.'" name="tipo_impresion" required>';
            $html .=            '<option value="" disabled selected>Seleccione</option>';
            foreach ($items as $key => $item) {
                $active = ($item['id'] == $atributo)? 'selected': '';
                $html .=    '<option value="'.$item['id'].'" '.$active.'>'.$item['tipo_impresion'].'</option>';
            }
            $html .=        '</select>';
            $html .=    '</div>';
            $html .= '</div>';

            $html .= '<div class="row">';
            $html .=    '<label for="group_1" class="col-sm-4 attribute_label attribute-key">Nro Colores</label>';
            $html .=    '<div class="col-sm-8 attribute_list">';
            $html .=        '<select class="form-control attribute_select no-print" onchange="nroColores(\''.$idCarro.'\')" id="nroColor'.$idCarro.'" name="nroColor'.$idCarro.'" required>';
            for ($j=0; $j < 7; $j++) { 
                $select = ($j == $nroColor)? 'selected': '';
                //$color = (($j !== '')&&($j == 2))? ' color':'colores';
                $html .= '<option value="';
                if ($j == '') {
                    $html .= '" '.$select.' disabled>Seleccione';
                }else{
                    if ($j<2) {
                        $html .=  $j.'" '.$select.'>'.$j.' color';
                    }else{
                        $html .=  $j.'" '.$select.'>'.$j.' colores';
                    }
                }
                $html .= '</option>';
                //$html .='<option value="'.(($j == '')? '" '.$select.' disabled>Seleccione' : $j.'" '.$select.'>'.$j).'</option>';
            }
            $html .=        '</select>';
            $html .=    '</div>';

            $html .= '</div>';
            $html .= '';
            return $html;
        }else{
            $html .= '';
            return $html;
        }
    }
}


#CALCULOS COTIZACION
if ( ! function_exists('calculoCotizacion')){
    function calculoCotizacion($id_producto, $cant_color, $id_impresion, $cantidad){

        $porcCostoAdmin = dataConfig('porc_costo_admin');
        //$porcGanancia = dataConfig('porc_ganancia');
        $porcGanancia = porcGanancia($id_producto, $cantidad);
        $porcRecargoAdelanto = dataConfig('porc_recargo_adelanto');
        $producto = proveedorProducto($id_producto, $cantidad);
        $pub = $producto['precio'];
        #nota: cambiar c_demasia a entero(cantidad demasia)
        $costoDemasia = $producto['c_demasia']*$cant_color*$pub;
        $costoMovilidad = $producto['c_movilidad'];
        $costoEmbalaje = $producto['c_unit_embalaje']*$cantidad;
        $costoRegalo = $producto['c_regalo'];
        //$costoRegaloTotal = $producto['c_regalo']*$cantidad;
        $costoImpresion = CostoImpresion($id_producto, $cantidad, $id_impresion);

        $costoTotal = ($pub*$cantidad)+$costoDemasia+$costoMovilidad+$costoEmbalaje+$costoRegalo+($costoImpresion*$cantidad*$cant_color);
        $costoTotalAdmin = $costoTotal*(100+$porcCostoAdmin)/100;
        $costoUnitAdmin = $costoTotalAdmin/$cantidad;

        $precioUnitContado = $costoUnitAdmin*(100+$porcGanancia)/100;

        #PRECIO UNITARIO AL CONTADO * (100 + porcentaje de recargo por adelanto ) / 100
        $precioUnit5050 = $precioUnitContado*(100+$porcRecargoAdelanto)/100;

        $datos = array(
        			'porcCostoAdmin' => $porcCostoAdmin,
        			'porcGanancia' => $porcGanancia,
        			'porcRecargoAdelanto' => $porcRecargoAdelanto,
        			//'producto' => $producto,
        			'tiempoproduccion' => $producto['tiempo_produccion'],
        			'pub' => round($pub,2),
        			'costoDemasia' => round($costoDemasia,2),
        			'costoMovilidad' => round($costoMovilidad,2),
        			'costoEmbalaje' => round($costoEmbalaje,2),
        			'costoRegalo' => round($costoRegalo,2),
        			'costoImpresion' => round($costoImpresion,2),
        			'costoTotal' => round($costoTotal,2),
        			'costoTotalAdmin' => round($costoTotalAdmin,2),
        			'costoUnitAdmin' => round($costoUnitAdmin,2),
        			'precioUnitContado' => round($precioUnitContado,2),
        			'precioUnit5050' => round($precioUnit5050,2)
				);
        return $datos;
    }
}

if ( ! function_exists('proveedorProducto')){
    function proveedorProducto($id_producto,$cantidad){
        if($cantidad<50) {
            $column = 'c.cant1';
        } else if($cantidad<500) {
            $column = 'c.cant2';
        }else if($cantidad<1000) {
            $column = 'c.cant3';
        }else if($cantidad<5000) {
            $column = 'c.cant4';
        }else {
            $column = 'c.cant5';
        }

        $CI =& get_instance();
        $query = $CI->db
                ->select('p.id AS producto_id,p.nombre,c.proveedor_id,'.$column.' AS precio, tiempo_produccion,c_movilidad, c_demasia,c_unit_embalaje,c_regalo')
                ->from('proveedor_producto c')
                ->join('productos p','p.id=c.producto_id','inner')
                ->where('c.producto_id', $id_producto)
                ->order_by($column,'desc')
                ->limit('1')
                ->get()
                ->row_array();
        return $query;
        
    }
}

if ( ! function_exists('CostoImpresion')){
    function CostoImpresion($id_producto,$cantidad,$id_impresion){
        if($cantidad<51) {
            $column = 'cant1';
        } else if($cantidad<100) {
            $column = 'cant2';
        }else if($cantidad<301) {
            $column = 'cant3';
        }else if($cantidad<501) {
            $column = 'cant4';
        }else if($cantidad<1001) {
            $column = 'cant5';
        }else if($cantidad<3001) {
            $column = 'cant6';
        }else {
            $column = 'cant7';
        }

        $CI =& get_instance();
        $query = $CI->db
                ->select('id,'.$column.' as precio')
                ->from('impresion_producto')
                ->where('producto_id', $id_producto)
                ->where('impresion_id', $id_impresion)
                ->get()
                ->row_array();
        return $query['precio'];
    }
}

if ( ! function_exists('porcGanancia')){
    function porcGanancia($id_producto,$cantidad){
        if($cantidad<50) {
            $column = 'int1';
        } else if($cantidad<101) {
            $column = 'int2';
        }else if($cantidad<301) {
            $column = 'int3';
        }else if($cantidad<501) {
            $column = 'int4';
        }else if($cantidad<801) {
            $column = 'int5';
        }else if($cantidad<1001) {
            $column = 'int6';
        }else if($cantidad<2501) {
            $column = 'int7';
        }else if($cantidad<4001) {
            $column = 'int8';
        }else if($cantidad<6001) {
            $column = 'int9';
        }else if($cantidad<10001) {
            $column = 'int10';
        }else if($cantidad<30001) {
            $column = 'int11';
        }else {
            $column = 'int12';
        }

        $CI =& get_instance();
        $query = $CI->db
                ->select('producto_id,'.$column.' AS intervalo')
                ->from('producto_intervalos')
                ->where('producto_id', $id_producto)
                ->get()
                ->row_array();
        return ( ! empty($query) && is_array($query) ? $query['intervalo'] : []);
    }
}
if ( ! function_exists('mesFechaCompleta'))
{
    function mesFechaCompleta($fecha){
        $dia = date('d', strtotime($fecha));
        $mes = date('n', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
        return 'Lima, '.$dia.' de '.$meses[$mes-1].' de '.$anio;
    }
}
?>