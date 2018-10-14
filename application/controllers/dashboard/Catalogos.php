<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {
	
	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 138,
				            'medium_x'      => 250,
				            'medium_y'      => 344,
				            'principal_x'   => 400,
				            'principal_y'   => 550
				    ];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

	public $names_foto = array('titulo','imagen');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_catalogos', 'Catalogo');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {

		$datapanel['body'] 		= 'catalogos/lista';
		$datapanel['dataset'] 	= $this->Catalogo->getCatalogos();
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
					$uploaded = uploadImg( $file , 'catalogos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){
					   	$data['imagen'] = $uploaded['principal'];

					   	$msg = '';
						$classMsg = 'alert alert-success';
						/**SUBIDA DE ARCHIVOS PDF DOCX**/
						$err_msg = array(
							UPLOAD_ERR_OK => 'Archivo subido correctamente.',
							UPLOAD_ERR_INI_SIZE => 'El tamaño del archivo ha excedido el tamaño indicado en php.ini .',
							UPLOAD_ERR_FORM_SIZE => 'El tamaño del archivo ha excedido el tamaño máximo para este formulario.',
							UPLOAD_ERR_PARTIAL => 'El archivo ha sido subido parcialmente.',
							UPLOAD_ERR_NO_FILE => 'El archivo no existe.',
							UPLOAD_ERR_NO_TMP_DIR => 'El directorio temporal no existe.',
							UPLOAD_ERR_CANT_WRITE => 'No se puede escribir en el disco.',
							UPLOAD_ERR_EXTENSION => 'Error de extensión PHP.'
						);
						$tipos_permitidos = array('docx','pdf');
						if( ! empty($_FILES["archivo"]['name'])){
							$nombre_temp = $_FILES["archivo"]["tmp_name"];
							$nombre_archivo = $_FILES["archivo"]["name"];
							$mime = explode(".", $nombre_archivo);
							$count = count($mime);
							$count--;
							$nuevo_nombre = date("YmdHis").'.'.$mime[$count];
							$destino = "./files/catalogos/". basename($nuevo_nombre);
							$a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
							if (!$a) {
								$classMsg = 'alert alert-warning';
								$msg = 'Tipo de archivo no permitido';
							}else{
								if (!file_exists("./files/catalogos/")) {
									mkdir("./files/catalogos/");
								}
								if (move_uploaded_file($nombre_temp, $destino)) {
									$classMsg = 'alert alert-success';
									$msg = "";
									$data['archivo'] = $nuevo_nombre;  
								} else {
									$classMsg = 'alert alert-warning';
									$msg = $err_msg[$_FILES['archivo']['error']];
								}
							}
						}
						/**END SUBIDA DE ARCHIVOS PDF DOCX**/
						unset($data['MAX_FILE_SIZE']);


					   	$saved = $this->Catalogo->saveCatalogo($data);
					   	if($saved){
					   		$this->session->set_flashdata('message', '<div class="'.$classMsg.'"><strong>RESULTADO:</strong>Los datos se actualizaron correctamente.<br>'.$msg.' </div>');
							/*$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');*/
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
		$datapanel['body'] 		= 'catalogos/nuevo';

		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function editar() {
		
		$id_catalogo = (int) $this->uri->segment(4,0);
		if(! $id_catalogo){ echo "no existe, ver lista"; exit();};
		if(!empty($_POST)){
			if (validacionForm($this->names_foto, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				$msg = '';
				$classMsg = 'alert alert-success';
				/**SUBIDA DE ARCHIVOS PDF DOCX**/
				$err_msg = array(
					UPLOAD_ERR_OK => 'Archivo subido correctamente.',
					UPLOAD_ERR_INI_SIZE => 'El tamaño del archivo ha excedido el tamaño indicado en php.ini .',
					UPLOAD_ERR_FORM_SIZE => 'El tamaño del archivo ha excedido el tamaño máximo para este formulario.',
					UPLOAD_ERR_PARTIAL => 'El archivo ha sido subido parcialmente.',
					UPLOAD_ERR_NO_FILE => 'El archivo no existe.',
					UPLOAD_ERR_NO_TMP_DIR => 'El directorio temporal no existe.',
					UPLOAD_ERR_CANT_WRITE => 'No se puede escribir en el disco.',
					UPLOAD_ERR_EXTENSION => 'Error de extensión PHP.'
				);
				$tipos_permitidos = array('docx','pdf');
				if( ! empty($_FILES["archivo"]['name'])){
					$nombre_temp = $_FILES["archivo"]["tmp_name"];
					$nombre_archivo = $_FILES["archivo"]["name"];
					$mime = explode(".", $nombre_archivo);
					$count = count($mime);
					$count--;
					$nuevo_nombre = date("YmdHis").'.'.$mime[$count];
					$destino = "./files/catalogos/". basename($nuevo_nombre);
					$a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
					if (!$a) {
						$classMsg = 'alert alert-warning';
						$msg = 'Tipo de archivo no permitido';
					}else{
						if (!file_exists("./files/catalogos/")) {
							mkdir("./files/catalogos/");
						}
						if (move_uploaded_file($nombre_temp, $destino)) {
							$classMsg = 'alert alert-success';
							$msg = "";
							$data['archivo'] = $nuevo_nombre;  
						} else {
							$classMsg = 'alert alert-warning';
							$msg = $err_msg[$_FILES['archivo']['error']];
						}
					}
				}
				/**END SUBIDA DE ARCHIVOS PDF DOCX**/
				unset($data['MAX_FILE_SIZE']);
				$antpdf = $data['antpdf'];
				unset($data['antpdf']);

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{	
					$file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'catalogos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){	
						$data['imagen'] = $uploaded['principal'];
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}
				$updated = $this->Catalogo->UpdateCatalogo($id_catalogo, $data);
				
				if($updated){
					unlink("./files/catalogos/".$antpdf);
					$this->session->set_flashdata('message', '<div class="'.$classMsg.'"><strong>RESULTADO:</strong>Los datos se actualizaron correctamente.<br>'.$msg.' </div>');
					/*$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');*/
					header('Location: '.'lista/'.$id_catalogo, TRUE);

				}else{ echo "Se guardo los datos de la galeria pero no la foto";};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizarón correctamente.</div>');			
				# Fin Subida				
				header('Location: '.'../editar/'.$id_catalogo);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'catalogos/editar';
		#data
		$datapanel['dataset'] 	= $this->Catalogo->getCatalogoById($id_catalogo);	
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {
			$id_catalogo = $_POST['param_id'];

			$id = $this->Catalogo->getCatalogoById( $id_catalogo );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Catalogo->UpdateCatalogo($id_catalogo,array('estado'=>_ELIMINADO));
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
	
			$resultado = $this->Catalogo->UpdateCatalogo($id, $data);
	
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