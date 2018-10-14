<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_productos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getProductByCategory( $id ){
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('orden','desc')
                ->where('p.estado !=',_ELIMINADO)
                ->where('g.estado',_ACTIVO)
                ->where('p.categoria_id', $id )
                ->group_by('p.id' )
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getProductById( $id ){
        $query = $this->db
                ->select('*')
                ->from('productos')
                ->where('estado !=', _ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getImpresiones( ){
        $query = $this->db
                ->select('*')
                ->from('tipos_impresiones')
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getProveedores( ){
        $query = $this->db
                ->select('*')
                ->from('proveedores')
                ->where('estado !=', _ELIMINADO)
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getProveedorProducto( $producto_id ){
        $query = $this->db
                ->select('*')
                ->from('proveedor_producto')
                ->where('producto_id', $producto_id )
                ->get()
                ->result_array();
        $array = array();
        foreach ($query as $key => $value) {
            $array[$value['proveedor_id']] = $value;
        }
            return ( ! empty($array) && is_array($array) ? $array : []);
    }
    public function getImpresionProducto( $producto_id ){
        $query = $this->db
                ->select('*')
                ->from('impresion_producto')
                ->where('producto_id', $producto_id )
                ->get()
                ->result_array();
        $array = array();
        foreach ($query as $key => $value) {
            $array[$value['impresion_id']] = $value;
        }
        return ( ! empty($array) && is_array($array) ? $array : []);
    }
    public function getIntervalosById( $producto_id ){
        $query = $this->db
                ->select('*')
                ->from('producto_intervalos')
                ->where('producto_id', $producto_id )
                ->get()
                ->row_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    #--------
    # UPDATE
    #--------
    public function updateProduct( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('productos', $data);
        return $query;
    }

    public function updateImagenProduct( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_productos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveProduct( $data ){
        $this->db->insert('productos', $data);
            return $this->db->insert_id();
    }
    public function saveImagenProduct( $data ){
        
        $this->db->insert_batch('galeria_productos', $data);
        return true;
    }
    #--------
    # DELETE
    #--------
    public function deleteProduct( $id ){
        $query = $this->db
                ->where('id', $id)
                ->update('productos', array('estado'=>_ELIMINADO));
        return $query;
    }

    public function deleteImageProduct( $producto_id ){
        $query = $this->db
                ->where('producto_id', $producto_id)
                ->update('galeria_productos', array('estado'=>_ELIMINADO));
        return $query;
    }
    #--------
    # COMPROBATION
    #--------
    public function existProduct( $id ){
        $query = $this->db
                ->select('*')
                ->from('productos')
                ->where('id',$id)
                ->get();

            return $query->num_rows();
    }

    //SOLICITUD INFORMACION
    // consulta productos
    public function getConsultaProductos(){

        $query = $this->db
                ->select('*')
                ->from('solicitud_productos')
                ->order_by('creado','desc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getSolicitudById( $id ){
        $query = $this->db
                ->select('*')
                    ->from('solicitud_productos')
                    ->order_by('creado','desc')
                    ->where('estado!=',_ELIMINADO)
                    ->where('id',$id)
                    ->get()
                    ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function updateSolicitud( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('solicitud_productos', $data);
            return $query;
    }
    public function updateIntervalos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('producto_intervalos', $data);
            return $query;
    }

    public function saveIntervalos($data){
        #grabacion de stock multiples de los productos
        $this->db->insert('producto_intervalos', $data);
        return $this->db->insert_id();
    }
    public function saveMultipleProveedor($data){
        #grabacion de stock multiples de los productos
        if( empty($data) ){ return FALSE; }
        $query = $this->db->insert_batch('proveedor_producto', $data);
        return $query;
    }
    
    public function deleteProveedorProd($id){
        #eliminamos para volver agregar nuevos atributos
        $this->db->where('producto_id', $id);
        return $this->db->delete('proveedor_producto');
    }
    public function saveMultipleImpresion($data){
        #grabacion de stock multiples de los productos
        if( empty($data) ){ return FALSE; }
        $query = $this->db->insert_batch('impresion_producto', $data);
        return $query;
    }
    public function deleteImpresionProd($id){
        #eliminamos para volver agregar nuevos atributos
        $this->db->where('producto_id', $id);
        return $this->db->delete('impresion_producto');
    }
}