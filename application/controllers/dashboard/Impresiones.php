<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Impresiones extends CI_Controller {

	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 83,
				            'medium_x'      => 350,
				            'medium_y'      => 292,
				            'principal_x'   => 600,
				            'principal_y'   => 500
				        ];
				        
	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_impresiones', 'Impresion');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'impresiones/lista';
		$datapanel['dataset'] 	= $this->Impresion->getImpresiones();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
			
		if ( ! empty($_POST) ){

			$data = $_POST; 
			if( ! empty($_FILES["imagen"]['name']) ){
				$file = $_FILES["imagen"];
				$uploaded = uploadImg( $file , 'impresiones', $this->sizes );
				# Fin Subida
					
				if( $uploaded['status'] == 200 ){

					$data['imagen'] = $uploaded['principal'];
					$data['creado']=date('Y-m-j H:i:s');

					#Grabacion de Datos
					$saved = $this->Impresion->saveImpresion($data);
					if($saved){
						$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');
						header('Location: '.'lista');exit();
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
					}
				}else{ 
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
				}
				
			}
		}

		#body
		$datapanel['body'] 		= 'impresiones/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_impresion = (int) $this->uri->segment(4,0);

		if(! $id_impresion){ 
			echo "no existe, ver lista"; exit();
		};

		if ( ! empty($_POST) )
		{
			$data = $_POST;
			$imgant = $data['imgant'];
			unset($data['imgant']);

			if( ! empty($_FILES["imagen"]['name']) ){
				$file = $_FILES["imagen"];
				#-------------------				
				# Subida de Imagenes
				#-------------------	
				$uploaded = uploadImg( $file , 'impresiones', $this->sizes );
				# Fin Subida
				if( $uploaded['status'] == 200 ){
					$data['imagen'] = $uploaded['principal'];
					unlink("./files/impresiones/".$imgant);
				}else{ 
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
				}
			}

			#Grabacion de Datos
			$updated = $this->Impresion->UpdateImpresion($id_impresion, $data);

			if($updated){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
			}
			header('Location: '.'../editar/'.$id_impresion);
		}
		
		#body
		$datapanel['body'] 		= 'impresiones/editar';
		#data
		$datapanel['dataset'] 	= $this->Impresion->getImpresionById( $id_impresion );
		// var_dump('<pre>',$datapanel['dataset']);exit();
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$id_banner = $this->Impresion->getImpresionById( $id );
			if(empty($id_banner)){ 
				echo "no existe, ver lista"; exit();
			};

	        $resultado = $this->Impresion->deleteImpresion($id);

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

}