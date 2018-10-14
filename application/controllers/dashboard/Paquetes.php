<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquetes extends CI_Controller {
	
	public $sizes = [
				            'thumbs_x'      => 150,
				            'thumbs_y'      => 76,
				            'medium_x'      => 300,
				            'medium_y'      => 152,
				            'principal_x'   => 770,
				            'principal_y'   => 390
				    ];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

	public $names_foto = array('nombre','imagen');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_paquetes', 'Paquete');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {

		$datapanel['body'] 		= 'paquetes/lista';
		$datapanel['dataset'] 	= $this->Paquete->getPaquetes();
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function nuevo() {	

		if(!empty($_POST)){
			if (validacionForm($this->names_foto, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{
				
				$data = $_POST;
				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{
					$file = $_FILES["imagen"];
					    
					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'paquetes', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){
							
						
					   	$data['imagen'] = $uploaded['principal'];
					   	$saved = $this->Paquete->savePaquete($data);

					   	if($saved){
							
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'lista', TRUE);
						}else{ 

						    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
						 };


					}else{ 
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
						  
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
				}

			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'paquetes/nuevo';

		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function editar() {
		
		$id_paquete = (int) $this->uri->segment(4,0);
		if(! $id_paquete){ echo "no existe, ver lista"; exit();};
		if(!empty($_POST)){
			if (validacionForm($this->names_foto, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{	
					$file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'paquetes', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){	

						$data['imagen'] = $uploaded['principal'];

					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}
				$updated = $this->Paquete->UpdatePaquete($id_paquete, $data);
				
				if($updated){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'lista/'.$id_paquete, TRUE);

				}else{ echo "Se guardo los datos de la galeria pero no la foto";};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');			
				# Fin Subida				
				header('Location: '.'../editar/'.$id_paquete);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'paquetes/editar';
		#data
		$datapanel['dataset'] 	= $this->Paquete->getPaqueteById($id_paquete);	
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {
			$id_paquete = $_POST['param_id'];

			$id = $this->Paquete->getPaqueteById( $id_paquete );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Paquete->UpdatePaquete($id_paquete,array('estado'=>_ELIMINADO));
	        if($resultado) {
	            $result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
	        }
	        else {

	        	$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
	        }
	        echo json_encode($result);
		}
	}

	public function ajaxEstado(){

		$cat = (int) $this->uri->segment(4,0);
		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
	
			$resultado = $this->Paquete->UpdatePaquete($id, $data);
	
			if($resultado){
				$result['estado'] =  ($estado == _ACTIVO)? _ACTIVO : _INACTIVO;
				$result['msj'] = 'El estado se ha actualizado';
			} else {
				$result['estado'] = ($estado == _ACTIVO)? _INACTIVO : _ACTIVO;
				$result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
			}
			
			echo json_encode($result);
		} 
		
	}

}