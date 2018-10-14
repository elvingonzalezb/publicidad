<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_productos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getCategoriaById($id){
		$query =  $this->db
				->select('*')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where('id',$id)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->get()
				->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
	#TRAE lAS  CATEGORIAS  POR EL ID DE SU PADRE CON LA URL CONCATENADA A SU ID
	public function getVariosCategory($limit,$offset,$id){
		$query = $this->db
			->select('*,imagen,imagen_title, CONCAT_WS(\'-\',url,id) as url')
			->from('categorias')
			->order_by('orden','asc')
			->where('estado',_ACTIVO)
			->where('tipo_categoria_id',_CAT_PRODUCTO)
			->where('padre_id',$id)
			->limit($limit, $offset)
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#TRAE lAS  CATEGORIAS  POR EL ID DE SU PADRE CON LA URL CONCATENADA A SU ID
	public function getCategoryByParent($limit,$offset,$id){
		$query = $this->db
			->select('*,imagen,imagen_title, CONCAT_WS(\'-\',url,id) as url')
			->from('categorias')
			->order_by('orden','asc')
			->where('estado',_ACTIVO)
			->where('tipo_categoria_id',_CAT_PRODUCTO)
			->where('padre_id',$id)
			->limit($limit, $offset)
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}



	#TRAE EL EL PRODUCTO POR SU ID CON TODAS SUS IMAGENES
	public function getProductById($id){
		$query =  $this->db
				->select([ 'p.*', 'g.imagen', 'g.imagen_title', "CONCAT('[',GROUP_CONCAT(CONCAT('{\"imagen\":\"', imagen,'\",','\"imagen_title\":\"', imagen_title,'\"', '}')),']') as imagenes" ])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.id', $id )
				->get()
				->row_array();
		if( ! empty($query) ){  $query['imagenes'] = json_decode($query['imagenes'], TRUE); }
		return ( ! empty($query) && is_array($query) ? $query : []);
    }

	 //revisar
    public function getProductosByCategory( $limit,$offset,$id ){
        $query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.categoria_id ', $id )
				->group_by('p.id')
				->order_by('orden','asc')
				->limit($limit, $offset)
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#old
	public function getCategoriaPorTipo($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->order_by('orden','asc')
				->where('estado',_ACTIVO)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->where('padre_id',$id)
				->get()
				->result_array();
		for ($i=0; $i < count($query); $i++) { 
			$query[$i]['numero_categorias'] = $this->getNumCategory($query[$i]['id']);
			$query[$i]['sub_categoria'] = $this->getCategoryTreeForParentId($query[$i]['id']);
		}

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getNumCategory($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where('padre_id',$id)
				->where('tipo_categoria_id', _CAT_PRODUCTO)
				->get();
		return $query->num_rows();
	}

	public function getCategoryTreeForParentId($parent_id = 1) {
		$categories = array();
		$this->db->from('categorias');
		$this->db->where('padre_id', $parent_id);
		$this->db->where('estado', _ACTIVO);
		$this->db->where('tipo_categoria_id',_CAT_PRODUCTO);
		$result = $this->db->get()->result();
		foreach ($result as $mainCategory) {
			$category = array();
			$category['id'] = $mainCategory->id;
			$category['url'] = $mainCategory->url;
			$category['nombre'] = $mainCategory->nombre;
			$category['padre_id'] = $mainCategory->padre_id;
			$category['padre'] = (count($this->getCategoryTreeForParentId($category['id']))>0)? '1':'0';
			$category['sub_categorias'] = $this->getCategoryTreeForParentId($category['id']);
			$categories[$mainCategory->id] = $category;
		}
		return $categories;
	}

	public function getProductos(){
		$query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->group_by('p.id' )
				->get()
				->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getProductByCategory($limit,$offset,$id){

		$query =  $this->db
				->select(['p.*','c.categoria_id','g.imagen','g.imagen_title'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->where('p.categoria_id', $id )
				->limit($limit, $offset)
				->group_by('p.id' )
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function numProductos($id){
		$query = $this->db
				->select('id')
				->from('productos')
				->where('estado',_ACTIVO)
				->where('categoria_id', $id )
				->get();
		return $query->num_rows();
	}

	public function getProductosPorCategoria($id){
		$query =  $this->db
			->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title'])
			->from('productos p')
			->join('galeria_productos g', 'g.producto_id = p.id','inner')
			->order_by('orden','desc')
			->where('p.estado',_ACTIVO)
			->where('p.categoria_id', $id )
			->group_by('p.id' )
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}


	public function getProductoPorCategoria($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->order_by('orden','asc')
				->where('estado',_ACTIVO)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->where('padre_id',$id)
				->get()
				->result_array();
		for ($i=0; $i < count($query); $i++) { 
			$query[$i]['sub_categoria'] = $this->getCategoryTreeForParentId($query[$i]['id']);
		}
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getStockAtributo($atributo_id, $producto_id) {
		$query = $this->db
				->select('id,precio,precio_oferta,cantidad,atributos_nombres,atributos_valor')
				->from('stock_atributos_multiples')
				->where('estado', _ACTIVO)
				->where('id',$atributo_id)
				->where('producto_id',$producto_id)
				->get()
				->row_array();
		return $query;
	}
	public function getStockAtributos($atributos_id, $producto_id) {
		$query = $this->db
				->select('id,atributos_nombres,atributo_id,atributos,atributos_valor')
				->from('stock_atributos_multiples')
				->where('estado', _ACTIVO)
				->where_in('id', $atributos_id)
				->where('producto_id',$producto_id)
				->get()
				->result_array();
		return $query;
	}

	public function saveSolicitudProductos( $data ){

		$this->db->insert('solicitud_productos', $data);
		return $this->db->insert_id();
	}

	public function buscarPorTexto($busqueda)
	{
		$query =  $this->db

				->select(['p.id','p.nombre','p.resumen','g.imagen','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('categorias c', 'c.id = p.categoria_id','left')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->where('p.estado', _ACTIVO)
				->where('c.estado', _ACTIVO)
				->where('g.estado', _ACTIVO)
				->where("(p.nombre LIKE '%".$busqueda."%' OR p.resumen LIKE '%".$busqueda."%')")
				->group_by('p.id' )
				->limit(50)
				->get()
				->result_array();
		return $query;
	}

	public function buscarVariasPalabras($busqueda)
	{
		$query =  $this->db
				->select("p.id,p.nombre,p.resumen,g.imagen,CONCAT(CONCAT_WS('-',p.url,p.id),'/detalle') as url,MATCH ( p.nombre, p.resumen ) AGAINST ( '%".$busqueda."%' ) AS Score")
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->where("MATCH ( p.nombre, p.resumen ) AGAINST ( '%".$busqueda."% IN BOOLEAN MODE' )")
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->order_by('Score','DESC')
				->limit(50)
				->group_by('p.id' )
				->get()
				->result_array();
		return $query;

	}

	public function getSoloProducto($id){
		$query =  $this->db
				->select('id,nombre,oferta')
				->from('productos')
				->where('estado',_ACTIVO)
				->where('id',$id)
				->get()
				->row_array();
		return $query;
	}

	public function getProductosRelacionados($id_producto, $id_categoria)
	{
		$query =  $this->db
				->select(['p.id','p.nombre','p.url','g.imagen','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->where('p.estado',_ACTIVO)
				->where('p.categoria_id',$id_categoria)
				->where('p.id !=',$id_producto)
				->order_by('RAND()')
				->limit(3)
				->get()
				->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}
	public function getAtributos($id) {
		$query = $this->db
				->select('a.nombre as AT_NOMBRE,s.id,s.atributos_nombres,s.atributos_valor,s.atributo_id,s.atributos')
				->from('stock_atributos_multiples s')
				->join('atributos a', 's.atributo_id = a.id','inner')
				->where('s.estado',_ACTIVO)
				->where('s.producto_id',$id)
				->group_by('s.atributos_valor')
				->get()
				->result_array();
		$datos = array();
		for ($i=0; $i < count($query); $i++) {
			$datos[$query[$i]['atributo_id']]['nombre'] = $query[$i]['AT_NOMBRE'];
			$datos[$query[$i]['atributo_id']]['atributos'][$i] = $query[$i];
		}
		return $datos;
	}

	public function getColorById($id) {
        $query =  $this->db
                ->select('id,atributos_nombres,atributo_id,atributos,atributos_valor')
                ->from('stock_atributos_multiples')
                ->where('id', $id)
                ->get()
                ->row_array();
        return $query;
    }

	/**atributo color para el listado**/
    public function getColorByProducto($producto_id) {
        $query =  $this->db
                ->select('id,atributos_nombres, atributos_valor, cantidad,atributo_id')
                ->from('stock_atributos_multiples')
                ->where('producto_id', $producto_id)
                ->where('atributo_id', 1)
                ->group_by('atributos_valor')
                ->get()
                ->result_array();
        return $query;
    }

	public function getBannerPromociones(){
		$query = $this->db
				->select('*')
				->from('banners')
				->where('tipo_banner_id', 2)
				->where('estado', _ACTIVO)
				->order_by('creado','desc')
				->limit(1)
				->get()
				->result_array();
		return $query;
	}

	public function getTipoImpresion($id_producto)
	{
		$query = $this->db
				->select('t.*')
				->from('impresion_producto p')
				->join('tipos_impresiones t','t.id = p.impresion_id','left')
				->where('p.producto_id',$id_producto)
				->get()
				->result_array();
		return $query;
	}

	public function getTipoImpresionById($id)
	{
		$query = $this->db
				->select('*')
				->from('tipos_impresiones')
				->where('id',$id)
				->get()
				->row_array();
		return $query;
	}

	#ofertas
	public function getOfertas( $limit,$offset ){
		$query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.oferta ',_ACTIVO)
				->order_by('p.orden','asc')
				->limit($limit, $offset)
				->group_by('p.id' )
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function numOfertas(){
		$query = $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.oferta ',_ACTIVO)
				->get();
		return $query->num_rows();
	}
}