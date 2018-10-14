<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_testimonios extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
  
    public function getTestimonios($limit,$offset){
       
        $query = $this->db
                ->select('*')
                ->from('testimonios')
                ->order_by('modificado','asc')
                ->where('estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }   

    public function num() {
        $query = $this->db
                ->select('id')
                ->from('testimonios')
                ->where('estado',_ACTIVO)
                ->get();

            return $query->num_rows();
    }

}