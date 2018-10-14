<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Catalogos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getCatalogos( ){
		$query = $this->db
					->select('*')
					->from('catalogos')
					->order_by('creado','asc')
					->where('estado!=',_ELIMINADO)
					->get()
					->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getCatalogoById( $id ){
		$query = $this->db
					->select('*')
					->from('catalogos')
					->order_by('creado','asc')
					->where('id', $id)
					->where('estado!=',_ELIMINADO)
					->get()
					->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#--------
	# UPDATE
	#--------

	public function UpdateCatalogo( $id , $data ){
		$query = $this->db
					->where('id', $id)
					->update('catalogos', $data);
		return $query;
	}

	#--------
	# INSERT
	#--------

	public function saveCatalogo( $data ){
		$this->db->insert('catalogos', $data);
		return $this->db->insert_id();
	}

}