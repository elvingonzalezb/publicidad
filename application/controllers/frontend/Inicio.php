<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/Model_inicio','Inicio');
		$this->load->model('frontend/Model_categorias','Categoria');
		$this->load->model('frontend/Model_articulos', 'Articulo');
		SessionCliente(array('*'));
    }

	public function index()
	{	
		#HEADER - SEO ----------
		$seccion = 'inicio';
		$seo = getSeccion($seccion);
		$data['seo'] = $seo;

		//body
		$datapanel['body'] 	= $seccion;
		$data['banners'] = getBanners();
		$datapanel['banners'] = $this->parser->parse('frontend/includes/banner',$data, true);
		
		//CATEGORIAS
		//$datapanel['promociones'] = $this->Inicio->getBannerPromociones();
		//$datapanel['productosOfertas'] = $this->Categoria->getProductsOfert();
	   	$datapanel['productosDestacados'] = $this->Categoria->getProductosDestacados(6);
	   	$datapanel['categoriasDestacadas'] = $this->Inicio->getCategorias();

		$articulos = $this->Articulo->getArticulosLimite(5);
	    for ($j=0; $j < count($articulos) ; $j++) { 
			$articulos[$j]['creado'] = dateFormatMA($articulos[$j]['creado']);
		}
	    $datapanel['articulos'] = $articulos;
		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function stocks()
	{
		$cliente = $this->session->userdata('Cliente');
        if( ! $cliente ) {    
            redirect(base_url().'clientes/login');
        }else{
        	$filename = $this->Inicio->getArchivoStock(1);
        	$file = 'files/archivos/'.$filename;
			if (is_file($file)) {
				/*header("Content-Type: application/octet-stream");*/
				header("Content-Type: application/force-download");
				header("Content-Disposition: attachment; filename=\"$filename\"");
				readfile($file);
			} else {
				die("Error: no se encontró el archivo '$file'");
			}
        }
	}

	public function addSuscripcion()
	{
		if ($_POST) {
			$names = array('correo|valid_email|is_unique[suscriptores.correo]');
			$data = $_POST;
			if (validacionForm($names, 'controller') == FALSE){
				$json['titulo'] = 'Error';
				$json['msj'] = 'Este correo se encuentra suscrito.';
				$json['estado'] = 'error';
			}else{
				if ($this->Inicio->addSuscripcion($data)) {
					$json['titulo'] = 'SUSCRITO';
					$json['msj'] = 'Se ha suscrito correctamente';
					$json['estado'] = 'success';
				}else{
					$json['titulo'] = 'Error';
					$json['msj'] = 'Ocurrió un Error';
					$json['estado'] = 'error';
				}
			}
			echo  json_encode($json);
		}
	}

	public function servicio_impresion()
	{
		$seccion = 'servicio_impresion';
		$datos = getSeccion($seccion);
		$datapanel['seo'] = $datos;
		$datapanel['dataset'] = $datos;
		$datapanel['body'] 	= 'secciones';

		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function porque_compramos()
	{
		$seccion = 'porque_compramos';
		$datos = getSeccion($seccion);
		$datapanel['seo'] = $datos;
		$datapanel['dataset'] = $datos;
		$datapanel['body'] 	= 'secciones';

		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function mapa_sitio()
	{
		$seccion = 'Mapa de Sitio :: AllPublicidad';
		//$datos = getSeccion($seccion);
		$datapanel['seo']['seto_title'] = $seccion;
		$datapanel['seo']['seto_description'] = $seccion;
		$datapanel['seo']['seto_keywords'] = $seccion;
		$this->load->model('frontend/Model_categorias','Categoria');

		//$datapanel['dataset'] = $datos;
		$datapanel['body'] 	= 'mapa_sitio';

		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function pedidos_web()
	{
		$seccion = 'pedidos_web';
		$datos = getSeccion($seccion);
		$datapanel['seo'] = $datos;
		$datapanel['dataset'] = $datos;
		$datapanel['body'] 	= 'secciones';

		$this->parser->parse("frontend/includes/template", $datapanel);
	}
}