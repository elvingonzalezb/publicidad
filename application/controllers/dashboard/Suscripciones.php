<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Suscripciones extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_suscripciones', 'Suscripcion');
		SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'suscripciones/lista';
		$datapanel['dataset'] 	= $this->Suscripcion->getSucripciones();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
			
		if ( ! empty($_POST) ){

			$data = $_POST; 
			#Grabacion de Datos
			$saved = $this->Suscripcion->saveSucripcion($data);
			if($saved){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');
				header('Location: '.'lista');exit();
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
			}
		}

		#body
		$datapanel['body'] 		= 'suscripciones/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	/*public function editar() {

		$id_rubro = (int) $this->uri->segment(4,0);

		if(! $id_rubro){ 
			echo "no existe, ver lista"; exit();
		};

		if ( ! empty($_POST) )
		{
			$data = $_POST;

			#Grabacion de Datos
			$updated = $this->Suscripcion->UpdateSucripcion($id_rubro, $data);

			if($updated){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
			}
			header('Location: '.'../editar/'.$id_rubro);
		}
		
		#body
		$datapanel['body'] 		= 'suscripciones/editar';
		#data
		$datapanel['dataset'] 	= $this->Suscripcion->getSucripcionById( $id_rubro );
		// var_dump('<pre>',$datapanel['dataset']);exit();
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}*/

	public function delete(){

		if ($_POST) {
			$id = $_POST['param_id'];
			$id_rubro = $this->Suscripcion->getSucripcionById( $id );
			if(empty($id_rubro)){ 
				echo "no existe, ver lista"; exit();
			};

	        $resultado = $this->Suscripcion->deleteSucripcion($id);

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

	#Ajax para el estado del Banner
	public function ajaxEstado(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Suscripcion->UpdateSucripcion($id, $data);

			if($updated){
				$result['estado'] =  ($estado == _ACTIVO)? _ACTIVO : _INACTIVO;
				$result['msj'] = 'El estado se ha actualizado';
			}else{
				$result['estado'] = ($estado == _ACTIVO)? _INACTIVO : _ACTIVO;
				$result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
			}
			echo json_encode($result);
		} 
	}

}