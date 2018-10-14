<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {
	public $sizes = [
						'thumbs_x'      => 150,
						'thumbs_y'      => 30,
						'medium_x'      => 600,
						'medium_y'      => 120,
						'principal_x'   => 1000,
						'principal_y'   => 200
					];

	public $names = array('titulo','descripcion','NOTorden','NOTimagen','seo_title','seo_description','seo_keywords');

	public $b_name = array('titulo');


	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_secciones', 'Seccion');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        $this->load->helper(array('form'));
        SessionUsuario();
    }

	public function index()
	{
	}

	public function lista() {

		//body
		$datapanel['body'] 		= 'secciones/lista';

		//data
		$datapanel['dataset'] 	= $this->Seccion->getSections();
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	public function nuevo() {

		#body
		$datapanel['body'] 		= 'secciones/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$data = array();
		$id_sections = (int) $this->uri->segment(4,0);
		if(! $id_sections){ echo "no existe, ver lista2"; exit();};

			if (!empty($_POST)) {

				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				if ( validacionForm($this->names, 'controller') === FALSE){
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
				}else{

						if( ! empty($_FILES["imagen"]['name'])){
							$file = $_FILES['imagen'];
							#-------------------				
							# Subida de Imagenes
							#-------------------	
							$uploaded = uploadImg( $file , 'secciones', $this->sizes );
							# Fin Subida
						    if( $uploaded['status'] == 200 ){
								$data['imagen_title'] = $uploaded['titulo'];
						    	$data['imagen'] = $uploaded['principal'];
							}
						}

						$updated = $this->Seccion->UpdateSections($id_sections, $data);
						if($updated){
							$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
						}
						//redirect('dashboards/sections/edit/'.$id_sections);
						header('Location: '.'../editar/'.$id_sections);
					}
			}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');

		#body
		$datapanel['body'] 		= 'secciones/editar';
		#data
		$datapanel['dataset'] 	= $this->Seccion->getSectionsById( $id_sections );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}

		$this->load->view("dashboard/includes/template", $datapanel);
	}


	public function save() {
		$data = $_POST;
		#--------------------
		# Subida de Imagenes
		#
		if ( ! empty($_FILES["image"]['name']))
		{
		    $file = $_FILES["image"];
		    $nombre = $file["name"];
		    $tipo = $file["type"];
		    $ruta_provisional = $file["tmp_name"];
		    $size = $file["size"];
		    $dimensiones = getimagesize($ruta_provisional);
		    $width = $dimensiones[0];
		    $height = $dimensiones[1];
		    $carpeta = "files/secciones/";
		    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
			    {
			      echo "Error, el archivo no es una imagen"; 
			    }else{
			    	$src = $carpeta.$nombre;
		    		$uploaded = move_uploaded_file($ruta_provisional, $src);
			    }
			    if($uploaded){
			    	$data['imagen'] = $nombre;
			    	
			    }else{ echo "No se pudo subir archivo";}
		}
		# Fin Subida
		#--------------------
	    $saved = $this->Seccion->saveSections($data);
	    if($saved){
			$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
		}
		header('Location: '.'lista');
		//redirect('dashboards/secciones/edit/'.$id_sections);

	}

	public function delete(){
		$id_sections = $this->uri->segment(4,0);
		if(! $id_sections){ echo "no existe, ver lista"; exit();};

        $sections = $this->Seccion->getSectionsById($id_sections);
        $imagen= $sections['imagen'];
        @unlink('files/secciones/'.$imagen);
        $resultado = $this->Seccion->deleteSections($id_sections);
        if($resultado) {
            $this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Se elimino correctamente.');
        }
        else {
            $this->session->set_flashdata('error', 'Se ha producido un error al intentar eliminar.');
        }
        //redirect('mainpanel/secciones/listado');
        header('Location: '.'../lista');

	}



	public function stock() {
		$data = array();
		$id_sections = 1;
		if(! $id_sections){ echo "no existe"; exit();};

			if (!empty($_POST)) {

				$data = $_POST;

				if ( validacionForm($this->b_name, 'controller') === FALSE){
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
				}else{
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
					$tipos_permitidos = array('docx','pdf','xls','xlsx');
					if( ! empty($_FILES["documento"]['name'])){
						$nombre_temp = $_FILES["documento"]["tmp_name"];
						$nombre_documento = $_FILES["documento"]["name"];
						$mime = explode(".", $nombre_documento);
						$count = count($mime);
						$count--;
						$nuevo_nombre = date("YmdHis").'.'.$mime[$count];
						$destino = "./files/archivos/". basename($nuevo_nombre);
						$a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
						if (!$a) {
							$classMsg = 'alert alert-warning';
							$msg = 'Tipo de archivo no permitido';
						}else{
							if (!file_exists("./files/archivos/")) {
								mkdir("./files/archivos/");
							}
							if (move_uploaded_file($nombre_temp, $destino)) {
								$classMsg = 'alert alert-success';
								$msg = "";
								$data['documento'] = $nuevo_nombre;  
							} else {
								$classMsg = 'alert alert-warning';
								$msg = $err_msg[$_FILES['documento']['error']];
							}
						}
						
					}
					/**END SUBIDA DE ARCHIVOS PDF DOCX**/

					unset($data['MAX_FILE_SIZE']);
					$updated = $this->Seccion->UpdateStock($id_sections, $data);
					if($updated){
						$this->session->set_flashdata('message', '<div class="'.$classMsg.'"><strong>RESULTADO:</strong>Los datos se actualizaron correctamente.<br>'.$msg.' </div>');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>RESULTADO:</strong>Ocurrió un problema, Intente nuevamente.</div>');
					}
					//redirect('dashboards/sections/edit/'.$id_sections);
					header('Location: '.'../stock');
				}
			}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->b_name,'view');

		#body
		$datapanel['body'] 		= 'secciones/stock';
		#data
		$datapanel['dataset'] 	= $this->Seccion->getStockById( $id_sections );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}

		$this->load->view("dashboard/includes/template", $datapanel);
	}

}