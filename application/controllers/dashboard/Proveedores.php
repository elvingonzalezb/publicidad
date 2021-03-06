<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

 	public $names = array('nombre','abreviatura');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_proveedores', 'Proveedor');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'proveedores/lista';
		$datapanel['dataset'] 	= $this->Proveedor->getProveedores();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
			
		if ( ! empty($_POST) ){

			if (validacionForm($this->names, 'controller') == FALSE){
					
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST; 
				$data['creado']=date('Y-m-j H:i:s');

				#Grabacion de Datos
				$saved = $this->Proveedor->saveProveedor($data);

				if($saved){
				   	$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'lista');exit();
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
				}

			}
			// header('Location: '.'nuevo');	
		}

		#validaciones
		$datapanel['required'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'proveedores/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_proveedor = (int) $this->uri->segment(4,0);

		if(! $id_proveedor){ 
			echo "no existe, ver lista"; exit();
		};

		if ( ! empty($_POST) )
		{
			$data = $_POST;

			if (validacionForm($this->names, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				#Grabacion de Datos
				$updated = $this->Proveedor->UpdateProveedor($id_proveedor, $data);
				if($updated){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
				}
			}
			header('Location: '.'../editar/'.$id_proveedor);
		}
		
		#validaciones
		$datapanel['required'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'proveedores/editar';
		#data
		$datapanel['dataset'] 	= $this->Proveedor->getProveedorById( $id_proveedor );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$id_proveedor = $this->Proveedor->getProveedorById( $id );
			if(empty($id_proveedor)){ 
				echo "no existe, ver lista"; exit();
			};

			$data=array('estado'=>_ELIMINADO);
	        $resultado = $this->Proveedor->updateProveedor($id,$data);

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
			$updated = $this->Proveedor->updateProveedor($id, $data);

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