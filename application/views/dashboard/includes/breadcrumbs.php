<?php 
	$class = $this->router->class;
	$method = $this->router->method;
	if(isset($titulo) && !empty($titulo)){
		$titulo=$titulo;
	}else{
		$titulo='';
	} 
	if(isset($id_trabajo) && !empty($id_trabajo)){
		$id_trabajo=$id_trabajo;
	}else{
		$id_trabajo='';
	} 
	if(isset($id_proyecto) && !empty($id_proyecto)){
		$id_proyecto=$id_proyecto;
	}else{
		$id_proyecto='';
	} 
?>

<div class="page-heading">
	<h1>
	<?php 
	if($class == 'banners'){
		echo 'BANNERS';
	
	}else if($class == 'servicios' && ($method=='listaCategoria' || $method=='nuevaCategoria' || $method=='editarCategoria')){ 
		echo 'CATEGORÍAS SERVICIO';
	}else if(($class == 'servicios' || $class=='solo_servicios') && ($method=='listaServicio' || $method=='nuevoServicio' || $method=='editarServicio')){ 
		echo 'SERVICIOS';
	}else if(($class == 'servicios' || $class=='solo_servicios') && ($method=='consultaServicio' || $method=='detalleSolicitud')){ 
		echo 'CONSULTA SERVICIOS';

	}else if($class == 'articulos' && ($method == 'lista' || $method == 'editar' || $method == 'nuevo')){ 
		echo 'ARTÍCULOS';
	}else if($class == 'articulos' && ($method == 'lista_comentarios' || $method == 'editar_comentarios')){ 
		echo 'COMENTARIOS';

	}else if($class == 'categorias' && ($method == 'lista' || $method == 'editar' || $method == 'nuevo')){ 
		echo 'CATEGORÍAS';
	}else if($class == 'productos' && ($method == 'lista' || $method == 'editar' || $method == 'nuevo')){ 
		echo 'PRODUCTOS';
	}else if($class == 'atributos' && ($method == 'lista' || $method == 'editar' || $method == 'nuevo')){ 
		echo 'ATRIBUTOS';
	}else if($class == 'productos' && ($method == 'consulta_producto' || $method == 'detalleSolicitud')){ 
		echo 'CONSULTA PRODUCTOS';

	}else if($class == 'prg_frecuentes'){
		echo 'PREGUNTAS FRECUENTES';
	}else if($class == 'testimonios'){
		echo 'TESTIMONIOS';
	}else if($class == 'mensajes'){
		echo 'CONTÁCTENOS';

	}else if($class == 'galeria_fotos' && ($method=='lista_album' || $method=='nuevo_album' || $method=='editar_album')){ 
		echo 'ÁLBUM DE FOTOS';
	}else if(($class == 'galeria_fotos') && ($method=='lista_foto' || $method=='nueva_foto' || $method=='editar_foto')){ 
		echo 'FOTOS';

	}else if($class == 'galeria_videos' && ($method=='lista_album' || $method=='nuevo_album' || $method=='editar_album')){ 
		echo 'ÁLBUM DE VIDEOS';
	}else if(($class == 'galeria_videos') && ($method=='lista_video' || $method=='nuevo_video' || $method=='editar_video')){ 
		echo 'VIDEOS';


	}else if($class == 'mapa'){
		echo 'MAPA';
	}else if($class == 'clientes'){
		echo 'CLIENTES';
	}else if($class == 'clientes_web'){
		echo 'CLIENTES WEB';
	}else if($class == 'configuraciones'){
		echo 'PARÁMETROS DE CONFIGURACIÓN';
	}else if($class == 'cotizaciones'){
		echo 'COTIZACIONES';
	}else if($class == 'pedidos'){
		echo 'PEDIDOS';
	}else if($class == 'secciones'){
		echo strtoupper(mostrarTitulo($this->uri->segments[4]));
	} ?>
	</h1>

	<ol class="breadcrumb">
		<li><a href="dashboard/">Inicio</a></li>
		<?php 
		if($class == 'banners' && $method=='lista'){
			echo '<li class="active"><a>Banners</a></li>';
		}else if($class == 'banners' && ($method=='editar' || $method=='nuevo')){
			echo '<li class="active"><a href="dashboard/banners/lista">Banners</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if(($class == 'servicios' && $method=='listaCategoria') || ($class == 'servicios' && ($method=='listaServicio' || $method=='editarServicio'))){
			echo getBreadcrumbsServicios($titulo);
		}else if($class == 'servicios' && ($method=='nuevoServicio' || $method=='nuevaCategoria' || $method=='editarCategoria')){
			echo '<li><a href="dashboard/servicios/listaCategoria">Categorias</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if($class == 'solo_servicios' && $method=='listaServicio'){
			echo '<li class="active"><a>Servicios</a></li>';
		}else if($class == 'solo_servicios' && ($method=='editarServicio' || $method=='nuevoServicio')){
			echo '<li><a href="dashboard/solo_servicios/listaServicio">Servicios</a></li><li class="active"><a>'.$titulo.'</a></li>';		

		}else if(($class == 'servicios' || $class == 'solo_servicios') && $method=='consultaServicio'){
			echo '<li class="active"><a>Consultas Servicio</a></li>';
		}else if($class == 'servicios' && $method=='detalleSolicitud'){
			echo '<li><a href="dashboard/servicios/consultaServicio">Consultas Servicio</a></li><li class="active"><a>'.$titulo.'</a></li>';
		}else if($class == 'solo_servicios' && $method=='detalleSolicitud'){
			echo '<li><a href="dashboard/solo_servicios/consultaServicio">Consultas Servicio</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if(($class == 'articulos' && $method=='lista') || ($class == 'articulos' && ($method=='lista_comentarios' || $method=='editar_comentarios'))){
				echo getBreadcrumbsArticulos($titulo);
		}else if($class == 'articulos' && ($method=='editar' || $method=='nuevo')){
			echo '<li><a href="dashboard/articulos/lista"> Articulos </a></li><li class="active"><a> '.$titulo.' </a></li>';

		}else if (($class == 'categorias' && ($method=='lista' || $method=='editar')) || ($class == 'productos' && ($method=='lista' || $method=='editar' ))){
			echo getBreadcrumbsProductos($titulo);
		}else if(($class == 'categorias' && ($method == 'nuevo' )) || ($class == 'productos' && ($method == 'nuevo' ))){
			echo '<li><a href="dashboard/categorias/lista">Categorias Producto</a></li><li class="active"><a>'.$titulo.'</a></li>';
		// }else if($class == 'productos' && ($method == 'consulta_producto' || $method == 'detalleSolicitud')){
		// 	echo '<li class="active"><a href="dashboard/productos/consulta_producto">Consulta productos</a></li>';

		// }else if($class == 'productos' && $method == 'editar'){
		// 	echo '<li class="active"><a href="dashboard/productos/lista/'.$id_categoria.'">Productos</a></li>';
		}else if($class == 'atributos' && $method == 'lista'){
			echo '<li class="active"><a>Atributos</a></li>';
		}else if($class == 'atributos' && ($method == 'editar' || $method == 'nuevo')){
			echo '<li><a href="dashboard/atributos/lista">Atributos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		}else if($class == 'productos' && $method == 'consulta_producto'){
			echo '<li class="active"><a>Consulta productos</a></li>';
		}else if($class == 'productos' && $method == 'detalleSolicitud'){
			echo '<li><a href="dashboard/productos/consulta_producto">Consulta productos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		
		}else if($class == 'prg_frecuentes' && $method=='lista'){
			echo '<li class="active"><a> Preg. frecuentes</a></li>';
		}else if($class == 'prg_frecuentes' && ($method=='editar' || $method=='nuevo')){
			echo '<li><a href="dashboard/prg_frecuentes/lista">Preg. frecuentes</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if(($class == 'proyectos' && $method=='lista_proyecto') || ($class == 'proyectos' && ($method=='lista_trabajo' || $method=='editar_trabajo')) || ($class == 'proyectos' && ($method=='lista_foto' || $method=='editar_foto'))){
			echo getBreadcrumbsProyectos($titulo,$id_trabajo,$id_proyecto);
		}else if($class == 'proyectos' && ($method=='nuevo_proyecto' || $method=='nuevo_trabajo' || $method=='nueva_foto' || $method=='editar_proyecto')){
			echo '<li><a href="dashboard/proyectos/lista_proyecto">Proyectos</a></li><li class="active"><a>'.$titulo.'</a></li>';

				
		}else if($class == 'testimonios' && $method=='lista'){
			echo '<li class="active"><a>Testimonios</a></li>';
		}else if($class == 'testimonios' && ($method=='editar' || $method=='nuevo')){
			echo '<li><a href="dashboard/testimonios/lista">Testimonios</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if($class == 'mensajes' && $method=='lista'){
			echo '<li class="active"><a>Contáctenos</a></li>';
		}else if($class == 'mensajes' && $method=='lista_detalle'){
			echo '<li><a href="dashboard/mensajes/lista">Contáctenos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		}else if($class == 'mapa' && $method=='editar'){
			echo '<li><a href="dashboard/mensajes/lista">Contáctenos</a></li><li class="active"><a>Mapa</a></li>';

		}else if(($class == 'galeria_fotos' && $method=='lista_album') || ($class == 'galeria_fotos' && ($method=='lista_foto' || $method=='editar_foto'))){
			echo getBreadcrumbsFotos($titulo);
		}else if($class == 'galeria_fotos' && ($method=='nuevo_album' || $method=='nueva_foto' || $method=='editar_album')){
			echo '<li><a href="dashboard/galeria_fotos/lista_album">Álbumes de Fotos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		
		}else if(($class == 'galeria_videos' && $method=='lista_album') || ($class == 'galeria_videos' && ($method=='lista_video' || $method=='editar_video'))){
			echo getBreadcrumbsVideos($titulo);
		}else if($class == 'galeria_videos' && ($method=='nuevo_album' || $method=='nuevo_video' || $method=='editar_album')){
			echo '<li><a href="dashboard/galeria_videos/lista_video/1">Álbumes de Videos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		
		}else if($class == 'clientes' && $method=='lista'){
			echo '<li class="active"><a>Clientes</a></li>';
		}else if($class == 'clientes' && $method=='editar'){
			echo '<li><a href="dashboard/clientes/lista">Clientes</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if($class == 'clientes_web' && $method=='lista'){
			echo '<li class="active"><a>Clientes Web</a></li>';
		}else if($class == 'clientes_web' && ($method=='editar' || $method=='nuevo')){
			echo '<li><a href="dashboard/clientes_web/lista">Clientes Web</a></li><li class="active"><a>'.$titulo.'</li>';

		}else if($class == 'configuraciones' && $method=='lista'){
			echo '<li class="active"><a> Configuraciones </a></li>';
		}else if($class == 'configuraciones' && $method=='editar'){
			echo '<li><a href="dashboard/configuraciones/lista">Configuraciones</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if($class == 'cotizaciones' && $method=='lista'){
			echo '<li class="active"><a>Cotizaciones</a></li>';
		}else if($class == 'cotizaciones' && ($method=='cotizar' || $method='detalle')){
			echo '<li class="active"><a href="dashboard/cotizaciones/lista">Cotizaciones</a></li><li class="active"><a>'.$titulo.'</a></li>';

		}else if($class == 'pedidos' && $method=='lista'){
			echo '<li class="active"><a>Pedidos</a></li>';
		}else if($class == 'pedidos' && $method=='detalle'){
			echo '<li class="active"><a href="dashboard/pedidos/lista">Pedidos</a></li><li class="active"><a>'.$titulo.'</a></li>';
		}else if($class == 'secciones'){
			echo '<li class="active">'.mostrarTitulo($this->uri->segments[4]).'</li>';
			//echo '<li>Secciones</li>';
		} ?>
		<!--<li><a href="javascript:void(0);">Forms</a></li>
		<li class="active">Form Examples</li>-->
	</ol>
</div>