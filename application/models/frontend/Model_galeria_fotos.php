<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_fotos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

    //////////////////////////////////////////////////////////////
    //GALERIA FOTOS

    public function getGaleriaFotosPaginacion($id,$limit,$offset){
        $query = $this->db
                ->select('f.id,f.nombre,f.imagen,f.imagen_title,f.estado,f.orden,f.destacado')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado',_ACTIVO)
                ->where('a.id',$id)
                ->limit($limit, $offset)
                ->get()
                ->result_array();
            // var_dump('<pre>',$query);exit();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaFotosById( $id ){

        $query = $this->db
                ->select('f.*')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado',_ACTIVO)
                ->where('f.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateGaleriaFotos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('fotos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveFotos( $data ){
        $this->db->insert('fotos', $data);
            return $this->db->insert_id();
    }
  
    #--------
    # DELETE
    #--------
    // public function deleteFotos( $id ){
    //      $array = array('estado'=>0);
    //     $this->db->where('id', $id);
    //     return $this->db->update('fotos',$array);
    // }

    public function getCboAlbumesFotos(){
        $query = $this->db
                ->select('a.id as id,
                    a.nombre as nombre,
                    f.id as tipo_id,
                    f.nombre as tipo_nombre')
                ->from('albumes_fotos a')
                ->join('fotos f', 'f.album_id = a.id','left')
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

///////////////////////////////////////////////////////////////////////
//GALERIA ALBUMES DE FOTOS

    //  public function getGaleriaAlbumesFotos(){
    //     $query = $this->db
    //             ->select('*')
    //             ->from('albumes_fotos a')
    //             ->order_by('orden','asc')
    //             ->where('a.estado!=',_ELIMINADO)
    //             ->get()
    //             ->result_array();

    //         return ( ! empty($query) && is_array($query) ? $query : []);
    // }

     public function getGaleriaAlbumesFotos($limit,$offset){
         // var_dump($limit);exit();
        $query = $this->db
                ->select('*,CONCAT_WS(\'-\',url,id) as url_id')
                ->from('albumes_fotos')
                ->order_by('orden','asc')
                ->where('estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    public function UpdateGaleriaAlbumesFotos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('albumes_fotos', $data);
            return $query;
    }

    public function saveAlbumesFotos( $data ){
        $this->db->insert('albumes_fotos', $data);
            return $this->db->insert_id();
    }

    //  public function deleteGaleriaAlbumesFotos( $id ){
    //     $array = array('estado'=>0);
    //     $this->db->where('id', $id);
    //     return $this->db->update('albumes_fotos',$array);
    // }

    public function getAlbumFotosTreeForParentId($id) {
        $albumes = array();
        $this->db->from('albumes_fotos');
        $this->db->where('estado', $id);
        $result = $this->db->get()->result();
        foreach ($result as $mainAlbum) {
            $album = array();
            $album['id'] = $mainAlbum->id;
            $album['nombre'] = $mainAlbum->nombre;
            $album['imagen'] = $mainAlbum->imagen;
            $album['imagen_title'] = $mainAlbum->imagen_title;

            $albumes[$mainAlbum->id] = $album;
        }
        return $albumes;
    }

    public function numAlbumes() {
        $query = $this->db
                ->select('id')
                ->from('albumes_fotos')
                ->where('estado',_ACTIVO)
                ->get();

            return $query->num_rows();
    }

    public function numFotos($id) {
        
        $query = $this->db
                ->select('id')
                ->from('fotos')
                ->where('estado',_ACTIVO)
                ->where('album_id',$id)
                ->get();

            return $query->num_rows();
    }

}
