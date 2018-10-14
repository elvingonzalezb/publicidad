<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_catalogos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function numCatalogos(){
		$query = $this->db
					->select('id')
					->from('catalogos')
					->where('estado',_ACTIVO)
					->get();
		return $query->num_rows();
	}

	public function getCatalogos( $limit, $offset ){
		$query = $this->db
					->select('*')
					->from('catalogos')
					->where('estado',_ACTIVO)
					->limit($limit, $offset)
					->get()
					->result_array();
		return $query;
	}

}