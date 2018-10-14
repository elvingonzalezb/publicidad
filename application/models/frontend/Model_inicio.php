<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_inicio extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getCategorias($parent_id = _PARENT_ID) {
        $query = $this->db
                ->select('id,nombre,imagen,url,creado')
                ->from('categorias')
                ->where('padre_id', $parent_id)
                ->where('estado', _ACTIVO)
                ->where('tipo_categoria_id',_CAT_PRODUCTO)
                ->order_by('creado','desc')
                ->get()
                ->result_array();
        return $query;
    }
    public function getBannerPromociones(){
        $query = $this->db
                ->select('*')
                ->from('banners')
                ->where('tipo_banner_id', 2)
                ->where('estado', _ACTIVO)
                ->order_by('creado','desc')
                ->limit(2)
                ->get()
                ->result_array();
        return $query;
    }
    public function getTestimonios(){
       
        $query = $this->db
                ->select('*')
                ->from('testimonios')
                ->order_by('modificado','asc')
                ->where('estado',_ACTIVO)
                ->limit(6)
                ->get()
                ->result_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    } 

    public function getArchivoStock($id){
        $query = $this->db->select('documento')->where('id',$id)->get('stocks',1)->row();
        return $query->documento;
    }
    #--------
    # INSERT
    #--------
    public function addSuscripcion( $data ){
        $this->db->insert('suscriptores', $data);
        return $this->db->insert_id();
    }

    #--------
    # UPDATE
    #-------- 

    #--------
    # DELETE
    #-------- 

}
