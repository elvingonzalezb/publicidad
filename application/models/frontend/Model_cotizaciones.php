<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cotizaciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function grabarCotizacion($data)	{
		$resultado = $this->db->insert('cotizaciones', $data);
		return $this->db->insert_id();
	}
	public function grabarDetalleCotizacion($data) {
		$resultado = $this->db->insert('detalle_cotizacion', $data);
		return $this->db->insert_id();
	}
	
	public function getCodigoCotizacion(){
		$sql = "SELECT LPAD(MAX(codigo)+1, 9, 0) AS codigo FROM cotizaciones ORDER BY codigo DESC ";
		$query = $this->db->query($sql);

		return $query->row_array();
	}
}