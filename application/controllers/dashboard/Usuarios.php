<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public $names = array('usuario|alpha_numeric','password');

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_usuarios', 'Usuario');
		$this->load->helper('captcha');
		SessionUsuario(array('login','logout'));
	}
	
	public function inicio()
	{
		$datapanel['body'] 		= 'usuarios/inicio';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function login() {
		
		if (! empty($_POST)) {
			if (validacionForm($this->names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$username = $_POST['usuario'];
				$password = $_POST['password'];
				$recaptcha = $this->input->post('g-recaptcha-response');
				$response = $this->recaptcha->verifyResponse($recaptcha);

				if($response['success']){
					if ($this->Usuario->usuarioLogin($username, $password)) {
						$user = $this->Usuario->getUsuarioByName($username);
						$this->session->set_userdata('User',$user);
						// user login ok
						redirect(base_url().'dashboard');
					}else{
						$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-danger">Nombre de usuario o contraseña incorrecto.</div></div>');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-warning">Re-captcha incorrecto.</div></div>');
					header('Location: '.'../');
				}
			}
		}

		if ($this->session->userdata('User')) {
			redirect(base_url().'dashboard/');
		}
			#captcha
			$datapanel['recaptcha'] = $this->recaptcha->render();
			#validaciones
			$datapanel['required'] 	= validacionForm($this->names,'view');
			#data
			$this->load->view("dashboard/sections/usuarios/login", $datapanel);
	}

	public function logout() {
		$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-info">Sesión finalizada.</div></div>');
		$this->session->unset_userdata('User');
		header('Location: '.BASE_URL.'admin');exit();
	}
	
	public function datos() {

		$datapanel['body'] 		= 'usuarios/datos';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
		if (! empty($_POST)) {
			$names = array('usuario|is_unique[usuarios.usuario]','password');
			if (validacionForm($names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error" style="color:#FF0000;">', '</label>');
			}else{
				$datos = $_POST;
				//echo '<pre>';print_r($datos);echo '</pre>';die;
				$datos['password'] = $this->Usuario->hashPassword($datos['password']);
				unset($datos['cfmPassword']);
				if ($this->Usuario->saveUsuario($datos)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success">Los datos se actualizarón correctamente.</div>');
					redirect(base_url().'dashboard/usuarios/lista');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al actualizar los datos.</div>');
				}
			}
		}

		$datapanel['body'] 		= 'usuarios/nuevo';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function cambiar_clave() {

		if ( ! empty($_POST) )
		{
			$usuario = getDataSession('usuario');
			$id = getDataSession('id');
			$password = $_POST['password'];
			$nuevoPassword = $_POST['nuevaClave'];
			#Grabacion de Datos
			if ($this->Usuario->usuarioLogin($usuario , $password)) {
				if($this->Usuario->updateClave($id , $nuevoPassword)){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> La clave se actualizo correctamente.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo actualizar los datos, vuelva a intentarlo.</div>');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> Clave incorrecta.</div>');
			}
			redirect(base_url().'dashboard/usuarios/cambiar_clave');	
		}
		#body
		$datapanel['body'] 		= 'usuarios/cambiar-clave';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function lista() {
		$datapanel['body'] 		= 'usuarios/lista';
		$datapanel['dataset'] 	= $this->Usuario->getUsuarios(3);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$id_usuario = (int) $this->uri->segment(4,0);
		if(! $id_usuario){ echo "no existe, ver lista"; exit();};

		if (! empty($_POST)) {
			$datos = $_POST;
			$usuario_new =  $datos['usuario'];
			$usuario = $this->Usuario->getUsuarioByUser($id_usuario , $datos['usuario']);
			if (!empty($usuario)) {
				$this->session->set_flashdata('message', '<div class="alert alert-info">El usuario se encuentra registrado.</div>');
			}else{
				if (!empty($datos['clave'])) {
					$datos['password'] = $this->Usuario->hashPassword($datos['clave']);
				}
				unset($datos['correo']);
				unset($datos['clave']);
				if ($this->Usuario->updateUsuario($id_usuario,$datos)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success">Los datos se actualizarón correctamente.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al actualizar los datos.</div>');
				}
			}
		}

		$datapanel['body'] 		= 'usuarios/editar';
		$datapanel['dataset'] 	= $this->Usuario->getUsuarioByID($id_usuario);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$id_usuario = $this->Usuario->getUsuarioById( $id );
			if(empty($id_usuario)){ 
				echo "no existe, ver lista"; exit();
			};

			$data=array('estado'=>_ELIMINADO);
	        $resultado = $this->Usuario->updateUsuario($id,$data);

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

	public function ajaxEstado()
	{
		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Usuario->updateUsuario($id, $data);

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