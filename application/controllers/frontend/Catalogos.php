<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/model_catalogos','Catalogo');
		$this->load->model('frontend/model_productos','Producto');
	}

	public function index()
	{
		#HEADER - SEO ----------
		$seccion = 'catalogos';
		$datos = getSeccion($seccion);
		$data['seo'] = $datos;

		#------------------------
		# Paginacion
		#------

		$config['base_url'] = base_url().'catalogos/';
		$config['total_rows'] = $this->Catalogo->numCatalogos();
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

		$this->pagination->initialize($config);
		$data['paginacion'] = $this->pagination->create_links();
		$offset = $this->uri->segment( 2, 0);
		
		#------
		# Paginacion
		#------------
		$catalogos = $this->Catalogo->getCatalogos($config['per_page'],$offset);
		
		/*foreach ($catalogos as $key => $value) {
			$catalogos[$key]['slugurl'] = slugUrlFront($value['titulo']);
		}*/
		//$ttxt = slugUrlFront('habia una véz');
		//echo '<pre>';print_r($ttxt);echo '</pre>';die;

		/*if( count($catalogos) > 1){ 
			$this->load->view("frontend/includes/template", ['body'=>'error_404']);
		}*/

		#categorias
		$data['body'] 		=	$seccion;
		$data['menu']		=	$this->Producto->getCategoriaPorTipo(1);
		$data['catalogos']	=	$catalogos;
		$data['banner']		=	$datos;

		$this->parser->parse( "frontend/includes/template", $data );

	}

}