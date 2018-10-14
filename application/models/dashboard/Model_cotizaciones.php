<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cotizaciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getCotizacion($id) {
        $this->db->where('id', $id);
        $this->db->where('estado !=', _ELIMINADO);
        $query =  $this->db->get('cotizaciones');
        return $query->row_array();
    }

    public function getListaCotizacion() {
        $this->db->order_by('fecha','desc');
        $this->db->where('estado !=', _ELIMINADO);
        $query =  $this->db->get('cotizaciones');
        return $query->result_array();
    } 
    public function getCliente($id_cliente) {
        $this->db->where('id', $id_cliente);
        $query =  $this->db->get('clientes');
        return $query->row_array();
    }

    public function getDetallesCotizacion($carrito_id) {
        $this->db->where('cotizacion_id',$carrito_id);            
        $query =  $this->db->get('detalle_cotizacion');
        return $query->result_array();
    }

    public function getReporteCotizacion($fecha_ini, $fecha_fin, $estado) {
        $sql = "SELECT * ";
        $sql .= " FROM cotizaciones ";
        $sql .= " WHERE estado!='"._ELIMINADO."' AND estado2 = '".$estado."' AND fecha BETWEEN '".$fecha_ini." 00:00:00' AND '".$fecha_fin." 23:59:59'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    #--------
    # UPDATE
    #--------
    public function updatePreciosCotizacion($id_registro,$data) {
        $this->db->where('id', $id_registro);
        $this->db->update('detalle_cotizacion', $data);
    }

    public function updateTotalPrecio($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('cotizaciones', $data);
    }

    public function updateCotizacion($id,$data) {
        $query = $this->db
                ->where('id', $id)
                ->update('cotizaciones', $data);
        return $query;
    }
    #--------
    # INSERT
    #--------

    #--------
    # DELETE
    #--------
    public function borrar($id){
        $this->db->where('id', $id);
        $this->db->delete('cotizaciones');
    }
    
    public function listaProductosReserva($id) {
        $this->db->where('cotizacion_id', $id);
        $query =  $this->db->get('detalle_cotizacion');
        return $query->result();
    }
   
}
?>