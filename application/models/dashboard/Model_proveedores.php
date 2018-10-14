<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_proveedores extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getProveedores( ){
        $query = $this->db
                ->select('*')
                ->from('proveedores')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getProveedorById( $id ){
        $query = $this->db
                ->select('*')
                ->from('proveedores')
                ->where('id', $id)
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------

    public function UpdateProveedor( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('proveedores', $data);
            return $query;
    }

    #--------
    # INSERT
    #--------

    public function saveProveedor( $data ){
        $this->db->insert('proveedores', $data);
            return $this->db->insert_id();
    }

}
