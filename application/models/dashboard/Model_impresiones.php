<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_impresiones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getImpresiones( ){
        $query = $this->db
                ->select('*')
                ->from('tipos_impresiones')
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getImpresionById( $id ){
        $query = $this->db
                ->select('*')
                ->from('tipos_impresiones')
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------

    public function UpdateImpresion( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('tipos_impresiones', $data);
            return $query;
    }

    #--------
    # INSERT
    #--------

    public function saveImpresion( $data ){
        $this->db->insert('tipos_impresiones', $data);
            return $this->db->insert_id();
    }

    public function deleteImpresion($id)
    {
        $query = $this->db
                ->where('id', $id)
                ->delete('tipos_impresiones');
        return $query;
    }
     

}
