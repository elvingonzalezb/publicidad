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
    /*public function index()
	{
		header('Location: inicio');
		
	}*/
	public function index()
	{	
		#HEADER - SEO ----------
		$seccion = 'inicio';
		$seo = getSeccion($seccion);
		$datapanel['seo'] = $seo;

		//body
		$datapanel['body'] 	= $seccion;
		$data['banners'] = getBanners();
		$data['promos'] = $this->Inicio->getBannerPromociones();
		$datapanel['banners'] = $this->parser->parse('frontend/includes/banner',$data, true);
		
		//CATEGORIAS
		$datapanel['productosDestacados'] = $this->Categoria->getProductosDestacados(6);
		$datapanel['categoriasDestacadas'] = $this->Inicio->getCategorias();

		$articulos = $this->Articulo->getArticulosLimite(5);
		for ($j=0; $j < count($articulos) ; $j++) { 
			$articulos[$j]['creado'] = dateFormatMA($articulos[$j]['creado']);
		}
		$datapanel['articulos'] = $articulos;
		$this->parser->parse("frontend/includes/template", $datapanel);
	}

}