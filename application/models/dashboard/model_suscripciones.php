<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_suscripciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function getSucripciones( ){
		$query = $this->db
				->select('*')
				->from('suscriptores')
				->get()
				->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getSucripcionById( $id ){
		$query = $this->db
				->select('*')
				->from('suscriptores')
				->where('id', $id)
				->get()
				->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#--------
	# UPDATE
	#--------

	public function UpdateSucripcion( $id , $data ){
		$query = $this->db
				->where('id', $id)
				->update('suscriptores', $data);
		return $query;
	}

	#--------
	# INSERT
	#--------

	public function saveSucripcion( $data ){
		$this->db->insert('suscriptores', $data);
		return $this->db->insert_id();
	}

	public function deleteSucripcion($id)
	{
		$query = $this->db
				->where('id', $id)
				->delete('suscriptores');
		return $query;
	}
	
}