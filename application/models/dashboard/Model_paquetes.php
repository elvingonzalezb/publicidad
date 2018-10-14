<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Paquetes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getPaquetes( ){
		$query = $this->db
					->select('*')
					->from('paquetes')
					->order_by('orden','asc')
					->where('estado!=',_ELIMINADO)
					->get()
					->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getPaqueteById( $id ){
		$query = $this->db
					->select('*')
					->from('paquetes')
					->order_by('orden','asc')
					->where('id', $id)
					->where('estado!=',_ELIMINADO)
					->get()
					->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#--------
	# UPDATE
	#--------

	public function UpdatePaquete( $id , $data ){
		$query = $this->db
					->where('id', $id)
					->update('paquetes', $data);
		return $query;
	}

	#--------
	# INSERT
	#--------

	public function savePaquete( $data ){
		$this->db->insert('paquetes', $data);
		return $this->db->insert_id();
	}

}