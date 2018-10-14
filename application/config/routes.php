<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

#-------------
# 	FRONTEND
#-------------
$route['inicio'] = 'frontend/inicio';
$route['descargar-stock'] = 'frontend/inicio/stocks';
$route['empresa'] = 'frontend/nosotros/lista';
$route['terminos-y-condiciones'] = 'frontend/nosotros/terminos';
$route['servicio-de-impresion'] = 'frontend/inicio/servicio_impresion';
$route['por-que-compramos'] = 'frontend/inicio/porque_compramos';
$route['mapa-de-sitio'] = 'frontend/inicio/mapa_sitio';
$route['boletin'] = 'frontend/inicio/boletin';
$route['pedidos-por-web'] = 'frontend/inicio/pedidos_web';

$route['promociones'] = 'frontend/paquetes/index';
$route['promociones/([0-9]+)'] = "frontend/paquetes/index";

$route['catalogos'] = 'frontend/catalogos/index';
$route['catalogos/([0-9]+)'] = "frontend/catalogos/index";

$route['articulos'] = 'frontend/articulos/lista';
$route['articulos/([0-9]+)'] = "frontend/articulos/lista";
$route['articulos/(.*)-([0-9]+)'] = "frontend/articulos/listaDetalle";

$route['testimonios'] = "frontend/testimonios/lista";
$route['testimonios/([0-9]+)'] = "frontend/testimonios/lista";

$route['servicios'] = 'frontend/servicios/lista';
$route['servicios/([0-9]+)'] = "frontend/servicios/lista";
$route['servicios/(.*)-([0-9]+)'] = "frontend/servicios/listaDetalle";

/*$route['solo_servicios'] = 'frontend/solo_servicios/lista';
$route['solo_servicios/([0-9]+)'] = "frontend/solo_servicios/lista";
$route['solo_servicios/(.*)-([0-9]+)'] = "frontend/solo_servicios/listaDetalle";*/

#productos
$route['productos'] = "frontend/productos/lista";
$route['productos/resultado'] = "frontend/productos/lista";
$route['productos/([0-9]+)'] = "frontend/productos/lista";

$route['productos/(.*)-([0-9]+)'] = "frontend/productos/lista";
$route['productos/(.*)-([0-9]+)/([0-9]+)'] = "frontend/productos/lista";
$route['productos/(.*)-([0-9]+)/(detalle)'] = "frontend/productos/detalle";

$route['productos/tipoImpresion'] = "frontend/productos/tipoImpresion";
$route['productos/tipoImpresion/([0-9]+)'] = "frontend/productos/tipoImpresion";

$route['productos/ajax_cotizacion/([0-9]+)'] = "frontend/productos/ajaxCotizar";

/*$route['promociones'] = 'frontend/galeria_fotos/listaAlbumes';
$route['promociones/([0-9]+)'] = "frontend/galeria_fotos/listaAlbumes";*/

$route['ofertas'] = "frontend/productos/ofertas";
$route['ofertas/([0-9]+)'] = "frontend/productos/ofertas";
/*$route['pedido'] = "frontend/pedido";
$route['pedido/continuar'] = "frontend/pedido/continuar";
$route['pedido/enviar'] = "frontend/pedido/enviar";
$route['pedido/error'] = "frontend/pedido/error";
$route['pedido/enviado'] = "frontend/pedido/enviado";*/

$route['cotizacion'] = "frontend/cotizaciones";
$route['cotizacion/continuar'] = "frontend/cotizaciones/continuar";
$route['cotizacion/enviar'] = "frontend/cotizaciones/enviar";
$route['cotizacion/error'] = "frontend/cotizaciones/error";
$route['cotizacion/enviado'] = "frontend/cotizaciones/enviado";


$route['preguntas-frecuentes'] = 'frontend/prg_frecuentes/lista';

$route['contactenos'] = 'frontend/contactenos/lista';

/*$route['galeria_albumes_fotos'] = 'frontend/galeria_fotos/listaAlbumes';
$route['galeria_albumes_fotos/([0-9]+)'] = "frontend/galeria_fotos/listaAlbumes";*/

// $route['galeria_fotos/([0-9]+)'] = "frontend/galeria_fotos/listaFotos";
/*$route['galeria_fotos/(.*)-([0-9]+)'] = "frontend/galeria_fotos/listaFotos";
$route['galeria_fotos/(.*)-([0-9]+)/([0-9]+)'] = "frontend/galeria_fotos/listaFotos";*/


/*$route['galeria-albumes-videos'] = 'frontend/galeria_videos/listaAlbumes';
$route['galeria-albumes-videos/([0-9]+)'] = "frontend/galeria_videos/listaAlbumes";
$route['galeria-videos/(.*)-([0-9]+)'] = "frontend/galeria_videos/listavideos";
$route['galeria-videos/(.*)-([0-9]+)/([0-9]+)'] = "frontend/galeria_videos/listavideos";*/
/*$route['galeria-videos'] = "frontend/galeria_videos/listavideos";
$route['galeria-videos/([0-9]+)'] = "frontend/galeria_videos/listavideos";*/


/*$route['proyectos']="frontend/proyectos/listaProyectos";
$route['proyectos/([0-9]+)']="frontend/proyectos/listaProyectos";

$route['galerias_proyecto/(.*)-([0-9]+)']="frontend/proyectos/listaTrabajos";
$route['galerias_proyecto/(.*)-([0-9]+)/([0-9]+)']="frontend/proyectos/listaTrabajos";

$route['fotos_proyecto/(.*)-([0-9]+)']="frontend/proyectos/listaFotos";
$route['fotos_proyecto/(.*)-([0-9]+)/([0-9]+)']="frontend/proyectos/listaFotos";*/

$route['default_controller'] = 'Inicio';
// $route['404_override'] = 'my404';
// $route['dashboard'] = 'dashboard/banners/lista';
$route['dashboard'] = 'dashboard/usuarios/inicio';
// $route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$routes['contactenos/enviar'] = 'frontend/contactenos/enviarMensaje';

$route['admin'] = 'dashboard/usuarios/login';

$route['clientes/login'] = 'frontend/clientes/login';
$route['clientes/logout'] = 'frontend/clientes/logout';
$route['clientes/reenviar-activacion'] = 'frontend/clientes/reenviar';
$route['clientes/registrate'] = 'frontend/clientes/nuevo';
$route['clientes/mi-cuenta'] = 'frontend/clientes/miCuenta';
$route['clientes/update'] = 'frontend/clientes/update';
$route['clientes/password'] = 'frontend/clientes/nuevaClave';
$route['clientes/login/([a-zA-Z0-9 -]+)'] = 'frontend/clientes/login';
$route['clientes/olvido'] = 'frontend/clientes/olvido';
$route['clientes/restablecer'] = 'frontend/clientes/restablecer';
/*$route['clientes/mis-pedidos'] = 'frontend/clientes/misPedidos';
$route['clientes/pedido-detalle/([0-9]+)'] = 'frontend/clientes/pedidoDetalle';
$route['clientes/mis-pedidos/([0-9]+)'] = 'frontend/clientes/misPedidos';*/

// $route['override_404'] = 'aa'