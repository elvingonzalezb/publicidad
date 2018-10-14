<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_paquetes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function getPaquetes($limit,$offset){

		$query = $this->db
					->select('*')
					->from('paquetes')
					->order_by('orden','asc')
					->where('estado',_ACTIVO)
					->limit($limit, $offset)
					->get()
					->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function numPaquetes() {

		$query = $this->db
					->select('id')
					->from('paquetes')
					->where('estado',_ACTIVO)
					->get();

		return $query->num_rows();
	}

}