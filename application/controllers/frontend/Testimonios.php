<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonios extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/model_testimonios','Testimonio');
		$this->load->library('My_PHPMailer');
		$this->load->helper('captcha');
	}

	public function index(){
		///$this->load->view('welcome_message');
	}
	
	public function lista() {	

		#HEADER - SEO ----------
		$testimonios = getSecciones(8);
		$datapanel['seo'] = $testimonios;

		#------------------------
		# Paginacion
		#------
		$config['base_url'] = base_url().'testimonios/';
		$config['total_rows'] = $this->Testimonio->num();
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
		$offset = $this->uri->segment(2,0);
		$datapanel['dataset'] = $this->Testimonio->getTestimonios($config['per_page'],$offset);
		$datapanel['banner'] = $testimonios;
  		if( empty($datapanel['dataset'])){ 
			$this->load->view("frontend/includes/template", ['body'=>'error_404']);
		}

		$datapanel['body']    = 'testimonios';
		
		$this->parser->parse("frontend/includes/template", $datapanel); 
		
	}

}