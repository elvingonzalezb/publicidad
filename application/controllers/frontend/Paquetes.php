<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquetes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/Model_paquetes','Paquete');
    }

	public function index()
	{	
		#HEADER - SEO ----------	
        $datos = getSecciones(19);
        $datapanel['seo'] = $datos;

        #------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'promociones/';
      	$config['total_rows'] = $this->Paquete->numPaquetes();
      	$config['per_page'] = 3;
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
  		$datapanel['dataset'] 	= $this->Paquete->getPaquetes($config['per_page'],$offset);
  		$datapanel['body'] 		= 'promociones';
        $datapanel['banner'] = $datos;
  		  $this->parser->parse("frontend/includes/template", $datapanel);
	}
}