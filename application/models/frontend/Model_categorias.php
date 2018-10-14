<?php
class Model_categorias extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

    public function getCategorias($parent_id = _PARENT_ID) {
        $categories = array();
        $this->db->from('categorias');
        $this->db->where('padre_id', $parent_id);
        $this->db->where('estado', _ACTIVO);
        $this->db->where('tipo_categoria_id',_CAT_PRODUCTO);
        $result = $this->db->get()->result_array();
        for ($i=0; $i < count($result); $i++) { 
            $category = array();
            $category = $result[$i];
            $category['padre'] = (count($this->getCategorias($result[$i]['id']))>0)? '1':'0';
            $category['sub_categorias'] = $this->getCategorias($result[$i]['id']);
            $categories[$result[$i]['id']] = $category;

        }
        return $categories;
    }

    public function getCategoria($url) {

        $url_absoluta = explode('/', $url);
        array_shift($url_absoluta);
        $url_categoria = implode('/', $url_absoluta);

        $this->db->where('estado', 'A');
        $this->db->where('url', $url_categoria);
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('categorias');
        $value = $query->row();
        $categoria = array();
        $categoria['CATEGORIA_ID'] = $value->id_categoria;
        $categoria['CATEGORIA_PADRE'] = $value->id_padre;
        $categoria['CATEGORIA_NOMBRE'] = $value->nombre_categoria;
        $categoria['CATEGORIA_IMAGEN'] = $value->imagen;
        $categoria['CATEGORIA_BANNER'] = $value->banner;
        $categoria['CATEGORIA_URL'] = $value->url;
        $categoria['CATEGORIA_ORDEN'] = $value->orden;
        $categoria['CATEGORIA_ESTADO'] = $value->estado;
        $categoria['CATEGORIA_TITLE'] = $value->title;
        $categoria['CATEGORIA_DESCRIPTION'] = $value->description;
        $categoria['CATEGORIA_KEYWORDS'] = $value->keywords;
        return $categoria;
    }

    public function numProductos() {
        $query = $this->db->get("productos");
        return $query->num_rows();
    }

    public function getProductsOfert() {
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','left')
                ->order_by('p.creado','desc')
                ->where('p.oferta', _ACTIVO)
                ->where('p.estado', _ACTIVO)
                ->group_by('p.id')
                ->get()
                ->result_array();
        for ($i=0; $i < count($query); $i++) { 
            $query[$i]['colores'] = $this->getColorByProducto($query[$i]['id']);
        }
        
        return $query;
    }

    public function getProductosNuevos($limit) {
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','left')
                ->order_by('p.creado','desc')
                ->where('p.estado', _ACTIVO)
                ->group_by('p.id')
                ->limit($limit)
                ->get()
                ->result_array();
        return $query;
    }

    public function getProductosDestacados(){
        $limit = dataConfig('productosdestacados');

        $query =  $this->db
                ->select(['p.id','p.nombre','p.url','p.creado','g.imagen'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->where('p.estado', _ACTIVO)
                ->where('g.estado', _ACTIVO)
                ->where('p.destacado', _ACTIVO)
                ->order_by('RAND()')
                ->limit($limit)
                ->get()
                ->result_array();
        for ($i=0; $i < count($query); $i++) { 
            $query[$i]['colores'] = $this->getColorByProducto($query[$i]['id']);
        }
        return $query;
    }


    public function getResult($search) {
        $productos = array();
        $this->db->where('estado', 'A');
        $this->db->like('nombre', $search);
        $this->db->group_by('id_categoria, nombre, codigo, url, imagen');
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('productos');
        $resultado = $query->result();
        foreach ($resultado as $v) {
            $temp = array();
            $temp['PRODUCTO_ID'] = $v->id_producto;
            $temp['PRODUCTO_NOMBRE'] = $v->nombre;
            $temp['PRODUCTO_CODIGO'] = $v->codigo;
            $temp['PRODUCTO_URL'] = $v->url;
            $temp['PRODUCTO_IMAGEN'] = $v->imagen;
            $productos[] = $temp;
        }
        return $productos;
    }
    
    public function sendSolicitud($datos){
        $resultado = $this->db->insert('solicitud_informacion', $datos);
        return $resultado;
    }

    /**atributo color para el listado**/
    public function getColorByProducto($producto_id) {
        $query =  $this->db
                ->select('id,atributos_nombres,cantidad,atributo_id')
                ->from('stock_atributos_multiples')
                ->where('producto_id', $producto_id)
                ->where('atributo_id', 1)
                ->get()
                ->result_array();
        return $query;
    }

}
?>