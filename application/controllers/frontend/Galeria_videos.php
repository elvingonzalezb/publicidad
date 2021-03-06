<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_videos extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_galeria_videos', 'Galeria_videos');

    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function listaAlbumes() {

    		#HEADER - SEO ----------
        $seccion = 'galeria_albumes_videos';	
        $seo = getSeccion($seccion);
        $datapanel['seo'] = $seo;

        #------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galeria_albumes_videos/';
      	$config['total_rows'] = $this->Galeria_videos->numAlbumes();
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

  		  $datapanel['dataset'] 	= $this->Galeria_videos->getGaleriaAlbumesVideos($config['per_page'],$offset);
		
    		if( empty($datapanel['dataset'])){ 
              $this->load->view("frontend/includes/template", ['body'=>'error_404']);
        }
          	
    		$datapanel['body'] 		= $seccion;
        $datapanel['banner'] = getSecciones(12);
    		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function listaVideos() {	
    
    		//$id = $this->uri->segment(2,0);
        $id_galeria_album = '1';

    		#------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galeria_videos/';
      	$config['total_rows'] = $this->Galeria_videos->numVideos($id_galeria_album);
      	$config['per_page'] = 9;
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
  	    $offset = $this->uri->segment(3,0);	 

  	    $datapanel['dataset'] = $this->Galeria_videos->getGaleriaVideosPaginacion($id_galeria_album,$config['per_page'],$offset);

    		$datapanel['seo'] = $this->Galeria_videos->getGaleriaAlbumById($id_galeria_album);
        #HEADER - SEO ----------
        $seo = getSecciones(12);
        $datapanel['banner'] = $seo;
        $datapanel['seo'] = $datapanel['seo'];

    	    if( empty($datapanel['dataset'])){ 
    	          $this->load->view("frontend/includes/template", ['body'=>'error_404']);
    	    }
        $datapanel['scriptFancy'] = true;
    	  $datapanel['body']    = 'galeria_videos_detalle';
    		$this->parser->parse("frontend/includes/template", $datapanel);
		
	}

}

