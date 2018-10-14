<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/model_productos','Producto');
		$this->load->library('My_PHPMailer');
		$this->load->helper('captcha');
	}

	public function index() {

		///$this->load->view('welcome_message');

	}



	public function lista() { 

		

    	$url_category = $this->uri->segment(2,1);

		// condicion para separar url_category y asignar valor si viene junto url con id



		if($url_category>0){

			$id_category=1;  //se iguala a 1 para indicar que aun hay categorias

		}else{

			// si viene url e id lo separamos

			$id_prod_category = substr(strrchr($url_category,'-'),1);

			$id_category='';

		}



		#HEADER - SEO ----------

			$seccion = 'productos';

			$seo = getSecciones(5);

			$datapanel['seccion'] = $seo;

			$datapanel['seo'] = $seo;



		if( $id_category == 1 ){

			//Ingresa cuando escogemos la paginacion de categorias

			

      		#------------------------

	      	# Paginacion

	      	#------

	      	$config['base_url'] = base_url().'productos/';

      		$config['total_rows'] = $this->Producto->getNumCategory( $id_category );

      		$config['per_page'] = 12;

      		$config['first_tag_open'] = '<li>';

	      	$config['first_tag_close'] = '</li>';

	      	$config['prev_tag_open'] = '<li class="prev">';

	      	$config['prev_link'] = '<i class="fa fa-angle-left"></i>';

	      	$config['next_link'] = '<i class="fa fa-angle-right"></i>';

	      	$config['prev_tag_close'] = '</li>';

	      	$config['next_tag_open'] = '<li class="next">';

	      	$config['next_tag_close'] = '</li>';

	      	$config['last_tag_open'] = '<li>';

	      	$config['last_tag_close'] = '</li>';

	      	$config['cur_tag_open'] = '<li class="active"><a>';

	      	$config['cur_tag_close'] = '</a></li>';

	      	$config['num_tag_open'] = '<li>';

	      	$config['num_tag_close'] = '</li>';

			 #------

			 # Paginacion

			 #------------



			$this->pagination->initialize($config);

	    	$datapanel['paginacion'] = $this->pagination->create_links();

	    	$offset = $this->uri->segment(2,0);

	    	$categorias = $this->Producto->getCategoryByParent($config['per_page'],$offset,$id_category);

	    	$seccion = 'categorias';

			foreach ($categorias as $cat => $cat_pro) {

				$categorias[$cat]['ruta'] = 'files/categorias/medianas/'.$cat_pro['imagen'];

				$categorias[$cat]['colores'] = array();

				$categorias[$cat]['codigo'] = '';

			}

			$datapanel['categorias'] = $categorias;

		}else{

			//Ingresa por click en categorias ya sea a sub categoria o a productos

			// id_prod_category es el id que esta presente en sub categoria o productos

			$num_categorias = $this->Producto->getNumCategory($id_prod_category );

			$id = $this->uri->segment(2,0);

			if( $num_categorias > 0 ){

			#------------------------

	      	# Paginacion

	      	#------

	      	$config['base_url'] = base_url().'productos/'.$id;

      		$config['total_rows'] = $this->Producto->getNumCategory( $id_category );

      		$config['per_page'] = 12;

      		$config['first_tag_open'] = '<li>';

	      	$config['first_tag_close'] = '</li>';

	      	$config['prev_tag_open'] = '<li class="prev">';

	      	$config['prev_link'] = '<i class="fa fa-angle-left"></i>';

	      	$config['next_link'] = '<i class="fa fa-angle-right"></i>';

	      	$config['prev_tag_close'] = '</li>';

	      	$config['next_tag_open'] = '<li class="next">';

	      	$config['next_tag_close'] = '</li>';

	      	$config['last_tag_open'] = '<li>';

	      	$config['last_tag_close'] = '</li>';

	      	$config['cur_tag_open'] = '<li class="active"><a>';

	      	$config['cur_tag_close'] = '</a></li>';

	      	$config['num_tag_open'] = '<li>';

	      	$config['num_tag_close'] = '</li>';

			#------

			# Paginacion

			#------------



			$this->pagination->initialize($config);

	    	$datapanel['paginacion'] = $this->pagination->create_links();

	    	$offset = $this->uri->segment(2,0);

				//Entra si hay subcategorias

				$categorias = $this->Producto->getVariosCategory($config['per_page'],$offset,$id_prod_category);

				foreach ($categorias as $cat => $cat_pro) {

					$categorias[$cat]['ruta'] = 'files/categorias/medianas/'.$cat_pro['imagen'];

					$categorias[$cat]['colores'] = array();

					$categorias[$cat]['codigo'] = '';

				}

				$datapanel['categorias'] = $categorias;

				#HEADER - SEO ----------

				$categoriaSeo = $this->Producto->getCategoriaById($id_prod_category);

				 $seccion = 'productos';

				 $categorias['titulo'] = $categoriaSeo['nombre'];

				 $datapanel['seccion'] = $categoriaSeo;

				 $datapanel['seo'] = $categoriaSeo;

			}else{

				// Entra a productos

				$id = $this->uri->segment(2,0);



				#------------------------

			   	# Paginacion

			   	#------

			   	$config['base_url'] = base_url().'productos/'.$id;

	      		$config['total_rows'] = $this->Producto->numProductos($id_prod_category);

	      		$config['per_page'] = 12;

	      		$config['first_tag_open'] = '<li>';

			   	$config['first_tag_close'] = '</li>';

			   	$config['prev_tag_open'] = '<li class="prev">';

			   	$config['prev_link'] = '<i class="fa fa-angle-left"></i>';

			   	$config['next_link'] = '<i class="fa fa-angle-right"></i>';

			   	$config['prev_tag_close'] = '</li>';

			   	$config['next_tag_open'] = '<li class="next">';

			   	$config['next_tag_close'] = '</li>';

			   	$config['last_tag_open'] = '<li>';

			   	$config['last_tag_close'] = '</li>';

			   	$config['cur_tag_open'] = '<li class="active"><a>';

			   	$config['cur_tag_close'] = '</a></li>';

			   	$config['num_tag_open'] = '<li>';

			   	$config['num_tag_close'] = '</li>';

			   	$config['first_link'] = '<<';

			   	$config['last_link'] = '>>';

				 #------

				 # Paginacion

				 #------------



				 $this->pagination->initialize($config);

			 	$datapanel['paginacion'] = $this->pagination->create_links();

			 	$offset = $this->uri->segment(3,0);

				$productos = $this->Producto->getProductosByCategory($config['per_page'],$offset,$id_prod_category );

				foreach ($productos as $cat => $pro) {

					$productos[$cat]['ruta']='files/productos/medianas/'.$pro['imagen'];

					$productos[$cat]['colores']= $this->Producto->getColorByProducto($pro['id']);

					$productos[$cat]['codigo']= (!empty($pro['codigo']))? '<span style="font-family: FjallaOneRegular;font-weight:500;">Codigo: </span>'.$pro['codigo'].'<br>' : '' ;

				}

				//echo '<pre>';print_r($productos);echo '</pre>';

				$datapanel['categorias']=$productos;



				$seccion = 'productos';

				$categorias = $this->Producto->getCategoriaById($id_prod_category);

				$categorias['titulo'] = $categorias['nombre'];

				$datapanel['seccion'] = $categorias;

				$datapanel['seo'] = $categorias;



			}

			

      	}

      	$datapanel['scriptFancy'] = '1';

		//$datapanel['scriptlightslider'] = '1';

      	$datapanel['menu'] = $this->Producto->getCategoriaPorTipo(1);

	   	$datapanel['seccion']['imagen'] = $seo['imagen'];

		$datapanel['body'] 		= $seccion;

		$datapanel['banner'] = getSecciones(5);

		$this->parser->parse("frontend/includes/template", $datapanel);

		

	}



	public function detalle() {



		$url = $this->uri->segment(2, FALSE);  if( ! $url ){ die('cargar vista 404 no existe url');}

		$id_producto = substr(strrchr($url,'-'),1);



		$datapanel['body']    = 'producto_detalle';

		$datapanel['url_post'] = (dataConfig('tipo_tienda') == '1')? 'frontend/pedido/agregar' :'frontend/cotizaciones/agregar';

		$datapanel['categorias'] = $this->Producto->getCategoriaPorTipo(1);

		$producto = $this->Producto->getProductById($id_producto);



		//$datapanel['promociones'] = $this->Producto->getBannerPromociones();



		$datapanel['aleatorios'] = $this->Producto->getProductosRelacionados($producto['id'],$producto['categoria_id']);

		$datapanel['producto'] = $producto;

		

		#HEADER - SEO ----------

	    $datapanel['seo'] = $producto;

	    $datapanel['seo_fb'] = $producto;

	    $datapanel['seo_fb']['imagen'] = base_url().'files/productos/'.$producto['imagen'];

	    $datapanel['seo_fb']['type'] = 'Producto';



		$datapanel['producto']['url_share'] = base_url().'productos/'.$producto['url'].'-'.$producto['id'].'/detalle';

		$datapanel['atributos'] = $this->Producto->getAtributos($id_producto);

		$datapanel['tipos'] = $this->Producto->getTipoImpresion($id_producto);



		//echo '<pre>';print_r($datapanel['producto']);print_r($datapanel['atributos']);echo '</pre>';die;



		$datapanel['scriptFancy'] = '1';

		$datapanel['scriptlightslider'] = '1';

		$datapanel['banner'] = getSecciones(5);

		#captcha

    	$datapanel['recaptcha'] = $this->recaptcha->render();



		$this->parser->parse("frontend/includes/template", $datapanel);

	}



	public function enviarInformacion() {

						

		$datos=array();

		if(!empty($_POST)){

			$data = $_POST;

			$recaptcha = $this->input->post('recaptcha');

			$response = $this->recaptcha->verifyResponse($recaptcha);

			if($response['success']){



				unset($data['recaptcha']);



				$data['creado'] = date('Y-m-j H:i:s');

				$id_comentario = $this->Producto->saveSolicitudProductos($data);



				if( $id_comentario ) {

					$correo_notificaciones = explode("," , dataConfig('correo_notificaciones') );

					// ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER

					$mail = new PHPMailer();

					// luego descomentarlo para probar en servidor



					//$mail->From = dataConfig('correo_from'); // direccion de quien envia

               		$mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia



					/****PROTOCOLO SMTP PRUEBA *****/

					//indico a la clase que use SMTP

					$mail->IsSMTP();

					//permite modo debug para ver comentarios de las cosas que van ocurriendo

					$mail->SMTPDebug = 0;

					$mail->CharSet = 'UTF-8';

					//Debo de hacer autenticación SMTP

					$mail->SMTPAuth = true;

					$mail->SMTPSecure = "ssl";

					//indico el servidor de Gmail para SMTP

					$mail->Host = "smtp.gmail.com";

					//indico el puerto que usa Gmail

					$mail->Port = 465;

					//indico un usuario / clave de un usuario de gmail

					$mail->Username = "soluciones.ajax2017@gmail.com";

					$mail->Password = "solajax123";

					/****PROTOCOLO SMTP PRUEBA *****/



					for($i=0; $i<count($correo_notificaciones); $i++) {

						$currentEmail = trim($correo_notificaciones[$i]);

						$mail->AddAddress($currentEmail);

					}



					$mail->Subject = "Formulario de producto";



					$id_producto=$data['producto_id'];

					$producto = $this->Producto->getProductById($id_producto);

					$datos['producto']=$producto;

					$datos['data']=$data; 

					$datos['body']='solicitud_producto';

					$msg = $this->load->view('frontend/mailing/includes/template', $datos, true);

					$mail->Body = $msg;

					$mail->IsHTML(true);

					@$mail->Send();

					$json['status'] ='1';

					$json['msj'] = '<div class="alert alert-success"> Su mensaje ha sido enviado satisfactoriamente.</div>';

				}else {

					$json['status'] ='2';

					$json['msj'] = '<div class="alert alert-danger"> Ha ocurrido un error. Inténtelo nuevamente.</div>';

				}

			} else {

				$json['status'] ='2';

				$json['msj'] = '<div class="alert alert-warning"> Se requiere marcar el captcha.</div>';

			}

			echo json_encode($json);

		}

	}



	public function verificarStock()

	{

		if (!empty($_POST)) {

			$datos = $_POST;

			if (!empty($datos['atributo_id'])) {

				$stock = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);

			}else{

				$stock = $this->Producto->getProductById($datos['producto_id']);

			}

			

			if ($stock['cantidad'] < 1) {

				$json['mensaje'] = 'No contamos con stock disponible.';

				$json['estado'] = 2;

			}else if ($stock['cantidad'] < $datos['stock']) {

				$json['mensaje'] = 'No contamos con la cantidad solicitada.';

				$json['estado'] = 2;

			}else{

				$json['mensaje'] = '';

				$json['estado'] = 1;

			}

			echo json_encode($json);

		}

	}



	public function getDatoAtributo(){

		if ($_POST) {

			$datos = $_POST;

			$oferta = $this->Producto->getSoloProducto($datos['producto_id']);

			$atributo = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);

			//echo '<pre>';print_r($atributo);echo '</pre>';die;

			if ($atributo) {

				if ($oferta == _ACTIVO) {

					$atributo['d_precio'] = dataConfig('moneda').' '.$atributo['precio'];

					$atributo['d_precio_oferta'] = dataConfig('moneda').' '.$atributo['precio_oferta'];

				} else {

					$atributo['d_precio'] = dataConfig('moneda').' '.$atributo['precio'];

					$atributo['d_precio_oferta'] = '';

				}

				$atributo['estado']= 1;

			}else{

				$atributo['estado']= 2;

			}

			echo json_encode($atributo);

		}

	}



	public function resultado()

	{

		$busqueda = $this->input->get('search');

		$busqueda = preg_replace('([^A-Za-z0-9[:space:]])', '', $busqueda);

		/*if ($busqueda<>''){ 

			//CUENTA EL NUMERO DE PALABRAS 

			$trozos=explode(" ",$busqueda); 

			$numero=count($trozos); 

			if ($numero==1) { */

				//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 

				$cadbusca = $this->Producto->buscarPorTexto($busqueda);

			/*} elseif ($numero>1) { 

				//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 

				//busqueda de frases con mas de una palabra y un algoritmo especializado 

				$cadbusca = $this->Producto->buscarVariasPalabras($busqueda);

			} 

		}*/

		//echo $this->db->last_query();

		$seo = getSeccion('productos');

		

		$datapanel['seo']['titulo'] = 'Resultados de Búsqueda';

		$datapanel['seccion'] = $seo;

		$datapanel['categorias'] = $this->Producto->getCategoriaPorTipo(1);

		$datapanel['productos'] = $cadbusca;

		$datapanel['body']    = 'resultados';

		$this->parser->parse("frontend/includes/template", $datapanel);

	}



	/*public function tipoImpresion()

	{

		$id = $this->uri->segment(3, FALSE);

		$datapanel['tipos'] = $this->Producto->getTipoImpresion($id);

		$this->parser->parse("frontend/tipo_impresion", $datapanel);

	}*/



	#AJAX

	public function ajaxCotizar()

	{

		$id_producto = $this->uri->segment(3, FALSE);  if( ! $id_producto ){ die('cargar vista 404 no existe url');}



		$datapanel['producto'] = $this->Producto->getProductById($id_producto);

		$datapanel['atributos'] = $this->Producto->getAtributos($id_producto);



		$items = $this->session->userdata('carrito_items');

        $datapanel['items'] = count($items);

		$this->parser->parse("frontend/includes/ajax_cotizar", $datapanel);

	}



	public function ofertas()

	{

		$seo = getSecciones(16);

		$datapanel['seccion'] = $seo;

		$datapanel['seo'] = $seo;

		

		#------------------------

		# Paginacion

		#------

		$config['base_url'] = base_url().'ofertas';

		$config['total_rows'] = $this->Producto->numOfertas();

		$config['per_page'] = 12;

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li class="prev">';

		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';

		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li class="next">';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a>';

		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['first_link'] = '<<';

		$config['last_link'] = '>>';

		 #------

		 # Paginacion

		 #------------



		$this->pagination->initialize($config);

		$datapanel['paginacion'] = $this->pagination->create_links();

		$offset = $this->uri->segment(3,0);

		$productos = $this->Producto->getOfertas($config['per_page'],$offset );

		foreach ($productos as $cat => $pro) {

			$productos[$cat]['ruta']='files/productos/medianas/'.$pro['imagen'];

			$productos[$cat]['colores']= $this->Producto->getColorByProducto($pro['id']);

			$productos[$cat]['codigo']= (!empty($pro['codigo']))? '<span style="font-family: FjallaOneRegular;font-weight:500;">Codigo: </span>'.$pro['codigo'].'<br>' : '' ;

		}

		$datapanel['productos']=$productos;



		$seccion = 'productos';

		/*$categorias['titulo'] = $categorias['nombre'];

		$datapanel['seccion'] = $categorias;

		$datapanel['seo'] = $categorias;*/



		$datapanel['scriptFancy'] = '1';

		$datapanel['body']    = 'ofertas';

		$this->parser->parse("frontend/includes/template", $datapanel);

	}

}