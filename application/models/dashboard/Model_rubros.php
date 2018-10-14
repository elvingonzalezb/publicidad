<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rubros extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function getRubros( ){
		$query = $this->db
				->select('*')
				->from('rubros')
				->get()
				->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getRubroById( $id ){
		$query = $this->db
				->select('*')
				->from('rubros')
				->where('id', $id)
				->get()
				->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#--------
	# UPDATE
	#--------

	public function UpdateRubro( $id , $data ){
		$query = $this->db
				->where('id', $id)
				->update('rubros', $data);
		return $query;
	}

	#--------
	# INSERT
	#--------

	public function saveRubro( $data ){
		$this->db->insert('rubros', $data);
		return $this->db->insert_id();
	}

	public function deleteRubro($id)
	{
		$query = $this->db
				->where('id', $id)
				->delete('rubros');
		return $query;
	}
	
}