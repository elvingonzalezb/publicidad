-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2018 a las 15:18:37
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misticad_allpublicidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes_fotos`
--

CREATE TABLE `albumes_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albumes_fotos`
--

INSERT INTO `albumes_fotos` (`id`, `nombre`, `url`, `imagen`, `imagen_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `seo_description`, `seo_title`, `seo_keywords`, `idioma_id`) VALUES
(1, 'album_foto01', 'album_foto01', 'album_foto01.jpg', 'album_foto01', 'descripcion album fotos1', 1, 0, 1, NULL, 'descripcion seo1', 'titulo seo1', 'keywords seo1', 1),
(2, 'album_foto02', 'album_foto02', 'album_foto02.jpg', 'album_foto02', 'descripcion album fotos2', 2, 0, 1, NULL, 'descripcion seo2', 'titulo seo2', 'keywords seo2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes_videos`
--

CREATE TABLE `albumes_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `video` varchar(128) DEFAULT NULL,
  `video_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albumes_videos`
--

INSERT INTO `albumes_videos` (`id`, `nombre`, `url`, `video`, `video_title`, `descripcion`, `orden`, `destacado`, `estado`, `ruta_amazon`, `seo_description`, `seo_title`, `seo_keywords`, `idioma_id`) VALUES
(1, 'album_video01', 'album_video01', 'album_video01.jpg', 'album_video01', 'descripcion album videos1', 1, 0, 1, NULL, 'descripcion seo1', 'titulo seo1', 'keywords seo1', 1),
(2, 'album_video02', 'album_video02', 'album_video02.jpg', 'album_video02', 'descripcion album videos2', 2, 0, 1, NULL, 'descripcion seo2', 'titulo seo2', 'titulo seo2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `resumen` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `autor` varchar(64) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `resumen`, `descripcion`, `orden`, `destacado`, `autor`, `url`, `seo_title`, `seo_description`, `seo_keywords`, `estado`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'articulo 01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 1, 1, 'ADMIN', 'articulo01', 'titulo seo', 'descripcion seo', 'keywords seo', 0, 1, '2017-01-01 10:50:20', '2018-02-12 22:39:21'),
(2, 'articulo 02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 2, 1, 'ADMIN', 'articulo02', 'titulo seo', 'descripcion seo', 'keywords seo', 0, 1, '2017-01-05 10:50:20', '2018-02-12 22:39:24'),
(3, 'La Importancia del Merchandising Ecológico', 'Por qué es importante para nosotros usar materiales reciclados y ecológicos en nuestros trabajos, y todo lo que puede decir esto de tu empresa.', '<p>La concienciaci&oacute;n con el entorno es un aspecto que se est&aacute; expandiendo en la sociedad, un hito muy positivo para nuestro entorno y la preservaci&oacute;n del mismo.&nbsp;En&nbsp;<a href=\"http://www.top3ibiza.com/inicio-merchandising-ibiza/\" target=\"_blank\"><strong>Top 3 Ibiza Publicidad</strong></a>&nbsp;somos expertos en llevar a cabo un merchandising friendly con el medio ambiente.</p>\r\n\r\n<p>&iquest;C&oacute;mo lo hacemos? Por ejemplo, elegimos proveedores responsables con el medio ambiente para nuestros sobres de papel. Nuestra compa&ntilde;&iacute;a respeta los procesos de la cadena de valor para<strong>&nbsp;minimizar los impactos en nuestro planeta</strong>.</p>\r\n\r\n<blockquote>\r\n<p><strong>En nuestra empresa de merchandising en Ibiza contamos con empresas con certificaci&oacute;n medioambiental en sus productos</strong></p>\r\n</blockquote>\r\n\r\n<p>Adem&aacute;s,&nbsp; nuestros trabajos de impresi&oacute;n lo hacemos en nuestro laboratorio propio para acortar los plazos de producci&oacute;n, en el que realizamos tambi&eacute;n fotolitos y pantallas. En este taller ejecutamos nuestros trabajamos con&nbsp;<strong>tintas al agua</strong>, ecol&oacute;gicas para cuidar de nuestro entorno. Imprimimos en&nbsp;<strong>serigraf&iacute;a, tampograf&iacute;a y termoimpresi&oacute;n</strong>.</p>\r\n\r\n<p>Todos los art&iacute;culos que imprimimos son de empresas l&iacute;deres en el sector del reclamo publicitario y tienen&nbsp;<strong>certificaci&oacute;n medioambiental de sus productos</strong>.</p>\r\n\r\n<p><strong>Razones por las que usar merchandising ecol&oacute;gico</strong></p>\r\n\r\n<p>El uso del<strong>&nbsp;merchandising</strong>&nbsp;por parte de las empresas ya hemos mencionado que es un valor a&ntilde;adido muy importante para la difusi&oacute;n de la marca. En esta ocasi&oacute;n, nos referimos a la importancia de elegir soportes que, adem&aacute;s de llevar la imagen de marca, tambi&eacute;n&nbsp;<strong>transmitan un mensaje positivo</strong>&nbsp;sobre la empresa.</p>\r\n\r\n<p>Usar materiales reciclados y ecol&oacute;gicos es una forma de hacerlo, puesto que no s&oacute;lo est&aacute; promocionando una&nbsp;<strong>imagen de marca</strong>&nbsp;sino que, adem&aacute;s, transmite una filosof&iacute;a de marca que se centra en la preocupaci&oacute;n del medio ambiente.</p>\r\n\r\n<blockquote>\r\n<p><strong>La conciencia por el entorno est&aacute; muy extendida en la sociedad y las empresas debemos unirnos en la lucha por el cambio clim&aacute;tico</strong></p>\r\n</blockquote>\r\n\r\n<p>El uso de este tipo de objetos y materiales emite un mensaje positivo para la imagen de marca, los usuarios valoran estas decisiones puesto que ven en esto una forma de identificarse con la empresa. La<strong>&nbsp;concienciaci&oacute;n con el entorno</strong>&nbsp;est&aacute; cada vez m&aacute;s extendido, y cada granito de arena que se pueda aportar es importante, es por ello que desde nuestra compa&ntilde;&iacute;a colaboramos en que sea posible un mundo mejor.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3, 1, 'ADMIN', 'la-importancia-del-merchandising-ecologico', 'La Importancia del Merchandising Ecológico', 'La Importancia del Merchandising Ecológico', 'La Importancia del Merchandising Ecológico', 1, 1, '2017-02-01 10:50:20', '2018-02-12 23:02:49'),
(4, 'El Merchandising en tu Empresa', 'Dentro del Marketing encontramos una técnica vital en el proceso de compra, el Merchandising. En una empresa te permitirá llamar la atención, dirigir al cliente hacia el producto y facilitar la acción de compra.', '<p>Hoy queremos hablaros de&nbsp;<strong>el Merchandising en Sequio</strong>. Esta t&eacute;cnica del Marketing se dedica a estudiar la manera de incrementar la rentabilidad en los puntos de venta.&nbsp;<strong>Son actividades que estimulan la compra por parte de los clientes</strong>&nbsp;en determinadas zonas de un local comercial. Se realiza mediante estudios e implementaci&oacute;n de t&eacute;cnicas comerciales que permiten presentar al producto o servicio de la mejor manera a los clientes.</p>\r\n\r\n<p>Para su puesta en marcha se recurre a distintas t&eacute;cnicas que har&aacute;n que el producto o servicio resulte m&aacute;s atractivo para los consumidores potenciales.&nbsp;<strong>El Merchandising engloba todas las actividades desarrolladas en el punto de venta</strong>&nbsp;para modificar la conducta de compra de los consumidores. Entre sus principales objetivos est&aacute; &nbsp;<strong>llamar la atenci&oacute;n de los consumidores para incentivar la compra</strong>&nbsp;de los productos m&aacute;s rentables para la empresa.</p>\r\n\r\n<h3>&iquest; Cu&aacute;ndo surge el Merchandising ?</h3>\r\n\r\n<p>Las primeras actividades de Merchandising surgen cuando el comercio internacional pasa a ser libre. Cuando aparecen los grandes almacenes se produce un importante cambio en la manera de vender, a trav&eacute;s de la introducci&oacute;n de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Merchandising\">t&eacute;cnicas de marketing orientadas a la venta masiva.</a></p>\r\n\r\n<p>Comienzan a eliminarse los mostradores para que el producto pase a estar al alcance del consumidor y se cree un v&iacute;nculo mayor, foment&aacute;ndose as&iacute; la compra. El vendedor pasa a ser un consultor para el cliente y as&iacute; surgen las grandes superficies, ideadas para llevar a cabo ventas en un sistema comercial m&aacute;s libre.</p>\r\n\r\n<p>En 1934 nacen en Francia unos almacenes que vend&iacute;an sus productos colocados en estanter&iacute;as al alcance del cliente. Contaban con una menor variedad en la oferta pero a precios m&aacute;s bajos. Como el cliente deb&iacute;a escoger su compra desde la estanter&iacute;a, las empresas se vieron obligadas a mejorar su atractivo visual y estructural. Esta din&aacute;mica provoc&oacute; el nacimiento del primer supermercado, en 1958.</p>\r\n\r\n<p>Algunos autores indican que los elementos visuales y estructurales de un local comercial son capaces de influir en el 78% de los productos que se compran. &nbsp;Esto es as&iacute; porque m&aacute;s de la mitad de productos que se compran en los supermercados y un tercio de las que se realizan en otras tiendas son compras por impulso.</p>\r\n\r\n<p>Generalmente se suele asociar el merchandising con el producto, aunque tambi&eacute;n es importante tener en cuenta el merchandising en el punto de venta. Por esto en Sequio vamos a explicarte c&oacute;mo puede influir el Merchandising en tu Empresa.</p>\r\n\r\n<h3>&iquest; Qu&eacute; tipos de Merchandising existen ?</h3>\r\n\r\n<ul>\r\n	<li><strong>Merchandising de presentaci&oacute;n.</strong></li>\r\n</ul>\r\n\r\n<p>Pretende conducir la atracci&oacute;n del cliente sobre los productos m&aacute;s rentables para tu empresa. Alude a los sentidos utilizando medios como la carteler&iacute;a y la ubicaci&oacute;n de los productos.</p>\r\n\r\n<p>Tambi&eacute;n, se intenta determinar la disposici&oacute;n interna de la tienda (Layout) para optimizar la circulaci&oacute;n de la clientela</p>\r\n\r\n<ul>\r\n	<li><strong>Merchandising de seducci&oacute;n.</strong></li>\r\n</ul>\r\n\r\n<p>Este tipo de merchandising se enfoca en la creaci&oacute;n de un mobiliario espec&iacute;fico para una campa&ntilde;a de promoci&oacute;n concreta, as&iacute; como en la animaci&oacute;n del punto de venta. Busca promover la imagen del propio distribuidor, mediante un buen servicio y atenci&oacute;n al cliente, cuida del aspecto del establecimiento e intenta lograr el mejor ambiente para influir en el &aacute;nimo de compra del consumidor.</p>\r\n\r\n<ul>\r\n	<li><strong>Merchandising de gesti&oacute;n o estrat&eacute;gico.</strong></li>\r\n</ul>\r\n\r\n<p>Precisa del an&aacute;lisis de la oferta y la demanda seg&uacute;n la rotaci&oacute;n de los productos. Se utilizan instrumentos como Estudios de Mercado, Coeficiente de Ocupaci&oacute;n del Suelo (COS), Gesti&oacute;n de Categor&iacute;as, Gesti&oacute;n de Surtido, Pol&iacute;ticas de Precio, Posicionamiento y ubicaci&oacute;n de los productos en las estanter&iacute;as.</p>\r\n', 4, 0, 'ADMIN', 'el-merchandising-en-tu-empresa', 'El Merchandising en tu Empresa', 'El Merchandising en tu Empresa', 'El Merchandising en tu Empresa', 1, 1, '2017-03-01 10:50:20', '2018-02-12 23:07:42'),
(5, 'La importancia del logotipo para promocionar tu marca', '¿Estás pensando en emprender? En este artículo te hablo de lo importante que es el logo que escojas para tu proyecto si quieres distinguirte y destacar sobre tu competencia.', '<p>&iquest;Conoces la importancia del logotipo a la hora de promocionar tu marca? Muchas personas se lanzan a la aventura de emprender sin pararse a pensar en lo importante que es el branding&nbsp;a la hora de promocionar cualquier proyecto dentro y fuera de Internet. &iquest;Est&aacute;s pensando en emprender? En este art&iacute;culo te hablo de lo importante que es el logo que escojas para tu proyecto si quieres distinguirte y destacar sobre tu competencia.</p>\r\n\r\n<h2>&iquest;Qu&eacute; es un logotipo?</h2>\r\n\r\n<p>En mi trabajo diario con mis client@s, me he dado cuenta de que a veces no est&aacute; muy claro lo que es un logotipo, as&iacute; que vamos a empezar por definirlo:</p>\r\n\r\n<p>Un logotipo es una representaci&oacute;n gr&aacute;fica de la identidad de una marca. Esta representaci&oacute;n o s&iacute;mbolo puede estar compuesta por texto, por una combinaci&oacute;n de texto y elementos gr&aacute;ficos o s&oacute;lo por alg&uacute;n elemento gr&aacute;fico. Normalmente una marca tiene m&aacute;s de una versi&oacute;n de su logotipo (s&oacute;lo texto, s&oacute;lo s&iacute;mbolo o ambos combinados). El logotipo de una marca sirve para que podamos identificarla r&aacute;pidamente, diferenciarla y captar su esencia en un s&oacute;lo vistazo.</p>\r\n\r\n<h2>&iquest;Por qu&eacute; es tan importante el logotipo de una marca?</h2>\r\n\r\n<p>El logotipo es la representaci&oacute;n gr&aacute;fica m&aacute;s importante y de una marca. Es la cara visible de tu proyecto y representa su identidad y sus valores, proporcionando informaci&oacute;n esencial a tus client@s potenciales. Nuestro logotipo es lo que consigue que alguien identifique nuestra marca en cualquier material publicitario, desde una simple factura que mandamos a un@ client@, hasta una valla publicitaria.</p>\r\n\r\n<p><strong>Un logotipo bien dise&ntilde;ado y atractivo:</strong></p>\r\n\r\n<ul>\r\n	<li>Ayuda a construir la identidad de la marca</li>\r\n	<li>Construye una imagen de marca que transmite confianza</li>\r\n	<li>Nos ayuda a distinguirnos de la competencia</li>\r\n	<li>Nos hace f&aacute;cilmente identificables</li>\r\n	<li>Conecta con nuestro p&uacute;blico objetivo</li>\r\n</ul>\r\n\r\n<h2>Caracter&iacute;sticas de un logotipo de &eacute;xito</h2>\r\n\r\n<ul>\r\n	<li><strong>Un buen logotipo es sencillo y no abusa de elementos decorativos innecesarios.&nbsp;</strong>En dise&ntilde;o siempre &ldquo;menos es m&aacute;s&rdquo; y en un logotipo doblemente. Piensa que se trata de un s&iacute;mbolo que se va a ver a un tama&ntilde;o bastante reducido la mayor parte de las veces, con lo cual los detalles no se ver&aacute;n. Adem&aacute;s el exceso de elementos no facilita ver la esencia y hace que el mensaje que se transmite sea m&aacute;s confuso y menos potente.</li>\r\n	<li><strong>Es &uacute;nico y original:&nbsp;</strong>Copiar el logotipo de otra marca es una idea mal&iacute;sima. Si lo que quieres es que tu marca se diferencie y destaque, que es lo que busca cualquier buena campa&ntilde;a de marketing, tu logotipo debe de hacer lo mismo. No caigas en clich&eacute;s ni intentes asimilarte a los logotipos que son caracter&iacute;sticos de tu sector. Imitar a otros no te va a ayudar a mostrar que eres mejor que ellos.</li>\r\n	<li><strong>Es f&aacute;cil de recordar y de identificar.</strong></li>\r\n	<li><strong>Capta la esencia de la marca y transmite sus valores m&aacute;s importantes:&nbsp;</strong>Puede parecer complicado, pero un logotipo debe de poder transmitir la personalidad de una marca.</li>\r\n	<li><strong>Es atractivo para tu p&uacute;blico objetivo:&nbsp;</strong>Al dise&ntilde;ar tu logotipo debes de tener en cuenta los gustos y preferencias de tu p&uacute;blico objetivo, que no necesariamente coincidir&aacute;n con tus gustos personales.</li>\r\n	<li><strong>Se puede reproducir a cualquier tama&ntilde;o:&nbsp;</strong>Un logotipo debe de estar vectorizado, eso significa que est&aacute; dise&ntilde;ado en un programa profesional de dise&ntilde;o y en un formato que lo hace escalable a cualquier tama&ntilde;o, desde una tarjeta de visita hasta el lateral de un enorme avi&oacute;n.</li>\r\n	<li><strong>Se adapta bien a diferentes formatos:</strong>&nbsp;No es lo mismo ver tu logotipo en un ordenador que en una pantalla de m&oacute;vil, verlo como marca de agua que sin fondo&hellip;en color o en blanco y negro, etc. Piensa que tu logotipo tiene que estar preparado para adaptarse a cualquier formato, porque nunca sabes para qu&eacute; lo vas a necesitar. Puede que ma&ntilde;ana colabores como patrocinador en un evento y tu logotipo tenga que verse sobre un fondo rosa chicle y ofrecer un buen contraste.</li>\r\n	<li><strong>Est&aacute; presente en todos los elementos de la empresa:</strong>&nbsp;Tu logo debe de aparecer en todas partes para que tus client@s reconozcan cualquier cosa que haga tu marca como tuya. Esto incluye el letrero del local donde tienes tu sede, el membrete de las facturas que mandas a tus client@s, la firma con la que finalizas tus e-mails&hellip; Incluirlo en todas partes favorecer&aacute; su identificaci&oacute;n y que tu p&uacute;blico tenga presente tu marca.</li>\r\n	<li><strong>Es atemporal:</strong>&nbsp;Lo ideal es tener un logotipo que sea atemporal y sobreviva al paso del tiempo, pero, siendo realistas, con el tiempo es probable que necesite peque&ntilde;os retoques y modernizaciones si quieres mantenerte al d&iacute;a y proyectar una imagen de empresa din&aacute;mica.</li>\r\n</ul>\r\n\r\n<h2>&iquest;Es bueno cambiar o redise&ntilde;ar tu logotipo si se ha quedado desfasado?</h2>\r\n\r\n<p>Hay varias razones por las cuales puedes plantearte cambiar o redise&ntilde;ar tu logotipo:</p>\r\n\r\n<ul>\r\n	<li><strong>Lo dise&ntilde;aste t&uacute; mism@ o un@ amig@ usando un programa de edici&oacute;n de textos como word, power point o paper y no tiene la calidad necesaria.</strong>&nbsp;Cuando tu empresa crezca, tu logotipo tiene que poder acompa&ntilde;ar ese crecimiento y si fue dise&ntilde;ado de forma poco profesional o con los programas no indicados, te puedes encontrar con importantes problemas. Imag&iacute;nate que quieres hacer una valla publicitaria y llevas a la imprenta tu logotipo dise&ntilde;ado con word&hellip;&iexcl;Se tirar&aacute;n de los pelos!</li>\r\n	<li><strong>Usaste una fotograf&iacute;a o un dibujo que no est&aacute; vectorizado y ahora tienes problemas para poder usarlo en diferentes formatos y tama&ntilde;os.</strong></li>\r\n	<li><strong>El logotipo se ha quedado desfasado, parece anticuado o ya no refleja bien los valores de la marca</strong>&nbsp;porque tu empresa ha evolucionado con los a&ntilde;os. Marcas como Cocacola o Apple, han redise&ntilde;ado sus logotipos para adaptarse al cambio de los tiempos y modernizarse.</li>\r\n	<li><strong>No te sientes c&oacute;mod@ con tu imagen de marca.</strong>&nbsp;A veces cuando emprendemos por primera vez &nbsp;la falta de experiencia puede hacer que tomemos decisiones precipitadas o no muy acertadas. Con el tiempo puedes darte cuenta de que el logotipo que elegiste realmente no te representa. Tal vez intentaste parecerte demasiado a la competencia y ahora te has dado cuenta de que en realidad lo que te conven&iacute;a era diferenciarte lo m&aacute;s posible. El caso es que ahora sientes que esa imagen ya no representa la esencia de tu empresa.</li>\r\n</ul>\r\n\r\n<p><strong>Pero antes de plantearte un cambio de logotipo ten en cuenta algunas cosas:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>&iquest;C&oacute;mo se siente tu p&uacute;blico objetivo y tu clientela con tu logotipo?</strong>&nbsp;Si se sienten muy identificados con tu imagen, puede ser que cambiarla totalmente a estas alturas sea un error. Tal vez tengas que plantearte hacer algunos ligeros retoques nada m&aacute;s.</li>\r\n	<li><strong>Esta vez elige un dise&ntilde;o de logotipo profesional</strong>&nbsp;para garantizar que tu imagen de marca permanezca en el tiempo y puedas utilizarla en cualquier soporte o tama&ntilde;o que necesites.</li>\r\n	<li><strong>Una imagen de marca no es algo que pueda estar cambiando continuamente</strong>&nbsp;porque eso dificulta la identificaci&oacute;n y la diferenciaci&oacute;n. Si te planteas un cambio, intenta que sea lo m&aacute;s definitivo posible.</li>\r\n</ul>\r\n\r\n<h2>&iquest;Es una buena opci&oacute;n comprar un logotipo en un banco de im&aacute;genes?</h2>\r\n\r\n<p>Muchos bancos de im&aacute;genes ofrecen logotipos predise&ntilde;ados a precio de risa. Desde 3 &euro; puedes comprar un logo prefabricado en el que s&oacute;lo necesitas sustituir el nombre de tu marca. Pero estos logotipos presentan varios problemas:</p>\r\n\r\n<ul>\r\n	<li><strong>No son &uacute;nicos:</strong>&nbsp;Igual que t&uacute;, cualquiera puede comprar el mismo logotipo y utilizarlo para su empresa. Eso significa que puede haber cientos de empresas con la misma imagen de marca. Tu marca no ser&aacute; f&aacute;cilmente reconocible ni destacar&aacute; sobre las dem&aacute;s.</li>\r\n	<li><strong>Suelen estar dise&ntilde;ados por sectores</strong>&nbsp;(logotipos para temas de salud, logotipos para empresas de medioambiente, etc.), lo cual hace muy probable que una empresa de tu competencia tenga el mismo logotipo que t&uacute;.</li>\r\n	<li><strong>No son originales:</strong>&nbsp;Como los dise&ntilde;ador@s que hacen este tipo de logotipos suelen hacerlos a destajo, son logotipos muy obvios, con simbolismos muy trillados y hechos en masa con ligeras variaciones. No s&oacute;lo habr&aacute; muchas empresas con el mismo logotipo, sino que tambi&eacute;n habr&aacute; muchas empresas con logotipos tremendamente parecidos al tuyo.</li>\r\n</ul>\r\n\r\n<h2>Errores en el dise&ntilde;o de un logotipo</h2>\r\n\r\n<ul>\r\n	<li><strong>Hacerlo t&uacute; mism@:</strong>&nbsp;A no ser que seas un profesional del dise&ntilde;o gr&aacute;fico, no te recomiendo que intentes dise&ntilde;ar tu logotipo. El resultado no ser&aacute; profesional y cometer&aacute;s errores que a la larga te saldr&aacute;n caros.</li>\r\n	<li><strong>Utilizar una imagen comprada.</strong></li>\r\n	<li><strong>Dise&ntilde;ar el logotipo para ti mism@ en lugar de para tus client@s.</strong></li>\r\n	<li><strong>Hacer un logotipo recargado visualmente</strong></li>\r\n	<li><strong>Elegir una tipograf&iacute;a poco legible</strong></li>\r\n	<li><strong>Usar logotipo que s&oacute;lo funcione en color.</strong></li>\r\n	<li><strong>Copiar &nbsp;a la competencia</strong></li>\r\n</ul>\r\n', 5, 0, 'ADMIN', 'la-importancia-del-logotipo-para-promocionar-tu-marca', 'La importancia del logotipo para promocionar tu marca', 'La importancia del logotipo para promocionar tu marca', 'La importancia del logotipo para promocionar tu marca', 1, 1, '2017-04-01 10:50:20', '2018-02-12 22:53:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributos`
--

CREATE TABLE `atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `atributos`
--

INSERT INTO `atributos` (`id`, `nombre`, `estado`) VALUES
(1, 'Color', 1),
(2, 'Tipo de impresion', 0),
(3, 'Colores impresión', 0),
(4, 'CKI', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(128) DEFAULT NULL,
  `subtitulo` varchar(128) DEFAULT NULL,
  `resumen` varchar(256) DEFAULT NULL,
  `btn_titulo` varchar(128) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `imagen` varchar(64) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `tipo_banner_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `subtitulo`, `resumen`, `btn_titulo`, `link`, `imagen`, `imagen_title`, `orden`, `estado`, `tipo_banner_id`, `creado`, `modificado`) VALUES
(1, 'banner 01', 'prueba1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Ver mas', 'banner01', '20180502103720.jpg', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-05-02 17:37:22'),
(2, 'banner 02', 'prueba2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'Ver mas', 'banner02', '20180502103813.jpg', '5', 2, 1, 1, '2017-02-10 10:50:20', '2018-05-02 17:38:15'),
(3, '', 'prueba3', '', 'Ver mas', 'banner03', '20180116121633.jpg', 'banner-03', 3, 0, 2, '2017-03-10 10:50:20', '2018-03-23 15:08:12'),
(4, NULL, 'prueba 04', NULL, NULL, 'banner04', 'banner-promocional.jpg', 'promocional', 4, 0, 2, '2018-02-07 12:25:58', '2018-03-23 15:08:13'),
(5, 'lapiceros', '', '', '', '', '20180503155632.jpg', 'lapicero', 1, 1, 2, '2018-05-03 15:56:32', '2018-05-03 22:56:32'),
(6, 'Promociones', 'HERRAMIENTA MANO', 'HERRAMIENTA MANO RESUMEN', '', '', '20180802000159.jpg', '1', 1, 1, 2, '2018-05-03 15:56:59', '2018-08-02 00:02:27'),
(7, 'CUADERNOS CORPORATIVOS', 'CUADERNOS CORPORATIVOS SUB', 'CUADERNOS HOB', '', '', '20180802000032.jpg', 'B15969_MINI_I132012082603221', 1, 1, 1, '2018-08-02 00:00:33', '2018-08-02 00:00:33'),
(8, 'llavero flor', 'llavero flor sub', '', '', '', '20180802000343.jpg', '8ddb0c_cbf00d911fdb4b5a1f31968c67862fec', 1, 1, 2, '2018-08-02 00:03:44', '2018-08-02 00:03:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo_pedido` varchar(64) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `costo_envio` decimal(10,2) DEFAULT NULL,
  `codigo_descuento` varchar(45) DEFAULT NULL,
  `porcentaje_descuento` varchar(45) DEFAULT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_detalle`
--

CREATE TABLE `carro_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `codigo` varchar(64) DEFAULT NULL,
  `cantidad` int(16) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `peso` varchar(128) DEFAULT NULL,
  `talla` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `carrito_id` bigint(20) UNSIGNED NOT NULL,
  `atributo_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogos`
--

CREATE TABLE `catalogos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(125) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `archivo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `catalogos`
--

INSERT INTO `catalogos` (`id`, `titulo`, `imagen`, `archivo`, `estado`, `creado`, `modificado`) VALUES
(1, 'REGALOS CORPORATIVOS 2018 ', '20180502170954.jpg', '20180502170955.pdf', 1, '2018-05-03 00:09:55', '2018-05-03 00:09:55'),
(2, 'Catalogo PERSONAL', '20180802001240.JPG', '20180802001240.pdf', 1, '2018-08-02 00:12:40', '2018-08-02 00:14:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(64) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `orden` smallint(6) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `banner` varchar(64) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `seo_keywords` varchar(150) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `atributos` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `padre_id` bigint(20) UNSIGNED DEFAULT '0',
  `tipo_categoria_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`, `descripcion`, `resumen`, `url`, `orden`, `seo_description`, `seo_title`, `banner`, `destacado`, `seo_keywords`, `imagen_title`, `atributos`, `estado`, `padre_id`, `tipo_categoria_id`, `creado`, `modificado`) VALUES
(1, 'Categoria Principal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 1, NULL, 1, '2017-01-10 10:50:20', '2017-01-10 10:50:20'),
(2, 'ALCANCIA', '20180404163324.jpg', '<p>descripcion</p>\r\n', 'Alcancia', 'alcancia', 1, 'Alcancia', 'Alcancia', 'banner1.jpg', 0, 'Alcancia', 'cat-alcancia', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-04-17 05:28:29'),
(3, 'Antiestrés', '20180405105605.jpg', '<p>descripcion</p>\r\n', 'Antiestrés', 'antiestres', 2, 'Antiestrés', 'Antiestrés', 'banner2.jpg', 0, 'Antiestrés', 'antiestres-1501866546', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-04-05 10:56:11'),
(4, 'BOLSA ECOLÓGICA DE TELA', '20180404164302.jpg', '<p>descripcion</p>\r\n', 'Bolsa Ecológica de Tela', 'bolsa-ecologica-de-tela', 1, 'Bolsa Ecológica de Tela', 'Bolsa Ecológica de Tela', NULL, 0, 'Bolsa Ecológica de Tela', 'cat-bolsa-ecologica-de tela', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-04-17 05:29:21'),
(5, 'Calculadora', '20180405105417.jpg', '<p>descripcion</p>\r\n', 'Calculadora', 'calculadora', 2, 'Calculadora', 'Calculadora', NULL, 0, 'Calculadora', 'cat-calculadoras', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-04-10 17:07:09'),
(6, 'Cuaderno de Corcho', 'categoria_servicio01.jpg', 'descripcion', 'Cuaderno de Corcho', 'cuaderno-de-corcho', 1, 'Cuaderno de Corcho', 'Cuaderno de Corcho', NULL, 0, 'Cuaderno de Corcho', '', '1', 1, 1, 2, '2017-01-10 10:50:20', '2018-04-10 17:07:10'),
(7, 'Cuaderno Ecológico', '20180405105753.jpg', '<p>descripcion comidas</p>\r\n', 'Cuaderno Ecológico', 'cuaderno-ecologico', 3, 'Cuaderno Ecológico', 'Cuaderno Ecológico', 'Cuaderno Ecológico', 0, 'Cuaderno Ecológico', 'cat-cuadernos', '1', 1, 1, 1, '2017-01-10 10:50:20', '2018-04-10 17:07:11'),
(8, 'Cuaderno Madera', '20180404162815.png', '', 'Cuaderno Madera', 'cuaderno-madera', 1, 'Cuaderno Madera', 'Cuaderno Madera', 'Cuaderno Madera', 0, 'Cuaderno Madera', 'cat-cuaderno-madera', '1', 1, 1, 1, '2018-02-09 17:16:14', '2018-04-10 17:07:12'),
(9, 'LLAVERO METALICO', '20180416223812.jpg', '', NULL, 'llavero-metalico', 1, 'llavero metalico publicitario lima peru', 'llavero metalico', NULL, 0, 'llavero metalico, llavero publicitario, llavero metalico lima, llavero resinado, llavero bautizo', 'Gancho_Porta_Car_4c9d1ef080470', '1', 1, 1, 1, '2018-04-17 05:38:13', '2018-05-03 08:06:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `orden` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id`, `producto_id`, `categoria_id`, `estado`, `orden`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 4, NULL, NULL),
(4, 2, 5, NULL, NULL),
(5, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `correo` varchar(128) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `razon_social` varchar(128) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `codigo` varchar(64) DEFAULT NULL,
  `fecha_codigo` datetime DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `descripcion` text,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(250) NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direccion` varchar(256) DEFAULT NULL,
  `rubro_id` int(11) DEFAULT NULL,
  `direccion_entrega` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `correo`, `telefono`, `ruc`, `razon_social`, `dni`, `codigo`, `fecha_codigo`, `imagen`, `logo`, `estado`, `descripcion`, `idioma_id`, `imagen_title`, `estado_id`, `password`, `creado`, `modificado`, `direccion`, `rubro_id`, `direccion_entrega`) VALUES
(1, 'Juan', 'Perez', 'juanperez@cuvox.de', '8745633', '1234567890', 'Juancito SAC', '12345678', NULL, NULL, 'imagen01.jpg', NULL, 1, NULL, 1, 'imagen01', 1, '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', '2017-01-10 10:50:20', '2017-07-10 10:50:20', 'villa', NULL, NULL),
(2, 'jose', 'alvarez', 'jalvarez@cuvox.de', '1234567', '1234567896', 'jalvarez sac', '78945612', NULL, NULL, 'imagen02.jpg', NULL, 1, NULL, 1, 'imagen02', 1, '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', '2017-01-10 10:50:20', '2017-06-10 10:50:20', 'san luis', NULL, NULL),
(4, 'Eduardo', 'Rosadio', 'erosadio@ajaxperu.com', '994548099', NULL, NULL, NULL, '59900e7725856e8cac90c42c39389295', NULL, NULL, NULL, 2, NULL, 1, NULL, 1, '$2y$10$wO5PPhjjeFDdTFoHA7009uvcL7Tr0Sij8EgoMGuc21IcD8r3jeKq.', '2018-02-12 01:30:51', '2018-02-13 18:35:35', 'jr rio Tumbes 387', NULL, NULL),
(5, 'Erick Rene', 'Huaracha', 'erickrene25@cuvox.de', '3214567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$N.qMCKMKU50890f9jEESD.cvjBxkyKjhR0dJy1Hf.DgD5zPm8abuu', '2018-02-13 11:55:39', '2018-02-13 17:59:22', 'San Borja', NULL, NULL),
(6, NULL, NULL, 'er.ick9014@gmail.com', '944261828', '98745612358', 'Erick S.A.C', NULL, '', NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$.ozeMq3EdqwQ8jlOLUQg8eBU8lS4jUkb2O1F82BImdhOUFEYuPIke', '2018-05-07 15:33:06', '2018-05-28 12:52:58', 'san juan de lurigancho', NULL, 'san juan de lurigancho n2'),
(7, NULL, NULL, 'erick1122@superrito.com', '3214568', '98745612358', 'Erick SAC', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$yW3HWhswRyjmHuNTk2a82.crhoXyT2WW7lYxa3wR6p1WsXyU290Pm', '2018-05-28 11:53:48', '2018-08-04 10:44:00', 'Vizcaya 163, Cercado de Lima 15021, Perú', NULL, 'Vizcaya 163, Cercado de Lima 15021, Perú'),
(8, 'Gloria', 'Apaza', 'ventas@allpublicidad.com.pe', '947022606', '20602324771', 'Gloria Apaza', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$gubkhXwczpLSZcxn4HwGsuBQGUbC6HqNbG7PzIGG6oYZlMeCbvRKm', '2018-07-24 00:11:26', '2018-08-01 23:44:59', 'MZ 108A LOTE 17 GRUPO 2 HUASCAR - SAN JUAN DE LURIGANCHO - LIMA', 2, 'MZ 108A LOTE 17 GRUPO 2 HUASCAR - SAN JUAN DE LURIGANCHO - LIMA'),
(9, NULL, NULL, 'er.ick9015@gmail.com', '3214568', '10234567891', 'erick SAC', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, '$2y$10$pIFXpFHl503QTEadR.n4SePdzArKJLy3qhQxG7NHcXqSGPxZdX4zy', '2018-08-07 14:30:57', '2018-08-07 14:30:57', 'san juan de lurigancho', 1, 'san juan de lurigancho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_web`
--

CREATE TABLE `clientes_web` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `razon_social` varchar(128) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `correo` varchar(128) NOT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `direccion` varchar(256) DEFAULT NULL,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `comentario` text,
  `respuesta` text,
  `aprobado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `autor_respuesta` varchar(45) DEFAULT 'admin',
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `correo`, `comentario`, `respuesta`, `aprobado`, `estado`, `autor_respuesta`, `articulo_id`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'Jone doe', 'Jone doe@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 0, 1, 'admin', 1, 1, '2017-01-10 10:50:20', '2017-01-11 14:11:25'),
(2, 'mike', 'mike@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'very goog Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 1, 'admin', 1, 1, '2017-01-12 10:50:20', '2017-01-15 14:11:25'),
(3, 'mike', 'mike@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'good', 0, 1, 'admin', 2, 1, '2017-02-01 10:50:20', '2017-03-01 14:11:25'),
(4, 'onrents', 'onrents@', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.', 'I don like', 0, 1, 'admin', 2, 1, '2017-04-01 10:50:20', '2017-05-01 14:11:25'),
(5, 'erick', 'er.ick9015@gmail.com', 'comentario de prueba', NULL, 0, 1, 'admin', 1, 1, '2017-12-18 15:50:06', '2017-12-18 15:50:06'),
(6, 'nombre', 'er.ick9015@gmail.com', 'asasa sa sa a sf ', NULL, 0, 1, 'admin', 1, 1, '2018-02-07 15:21:02', '2018-02-07 15:21:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `llave` varchar(150) DEFAULT NULL,
  `valor` text,
  `descripcion` text,
  `tipo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: input\n1: text area\n2: imagenes',
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `llave`, `valor`, `descripcion`, `tipo`, `estado`) VALUES
(1, 'correo_notificaciones', 'ventas@allpublicidad.com.pe, erosadio@ajaxperu.com, l14307@gmail.com', 'Correo al que llegaran las notificaciones de la web.', 0, 1),
(2, 'pie_pagina', 'COPYRIGHT ©2018 ALLPUBLICIDAD. TODOS LOS DERECHOS RESERVADOS', 'Texto que aparece como pie de página en la web.', 0, 1),
(3, 'correo_from', 'ventas@allpublicidad.com.pe', 'Correo a contacto', 0, 1),
(4, 'direccion', 'Mz 108A, Lte 17, Gp 2 Huascar, San Juan de Lurigancho - Lima  Perú, Referencia: A 5 minutos de la estación San Martin del Tren eléctrico.', 'Direccion de la Empresa que aparece en el lado izquierdo de la web.', 0, 1),
(5, 'dominio', 'www.allpublicidad.com.pe', 'Direccion web de la pagina', 0, 1),
(6, 'telefono_whatsapp', '947022606', '947022606', 0, 1),
(7, 'telefono', '+51 388-4433', 'Es el numero de telefono que ira en el header del portal', 0, 1),
(8, 'texto_pie', 'ALL PUBLICIDAD, Merchandising y Regalos Corporativos', 'Texto sobre nosotros', 0, 1),
(9, 'enlace_facebook', 'https://www.facebook.com', 'Direcion de fanpage Facebook', 0, 1),
(10, 'enlace_twitter', 'https://www.twitter.com', 'Red social Twiter', 0, 1),
(11, 'enlace_youtube', 'https://www.youtube.com', 'Direccion de canal de youtube', 0, 1),
(12, 'enlace_google_plus', 'https://www.google.com', 'Direccion de pagina de google+', 0, 1),
(13, 'enlace_instagram', 'https://www.instagram.com', 'Red Social Instagram', 0, 1),
(14, 'enlace_pinterest', 'https://www.pinterest.com', 'Red social Pinterest', 0, 1),
(15, 'logo', 'logo.jpg', 'logo de la empresa', 2, 1),
(16, 'nombre_comercial', 'AllPublicidad', 'Nombre Comercial', 0, 1),
(17, 'tipo_activacion', '2', '{\"valores\":{\"1\":\"si\",\"2\":\"No\"},\"descripcion\":\"tipo de activacion de cuenta\"}', 3, 1),
(18, 'moneda', 'S/.', 'tipo de moneda', 0, 1),
(19, 'tipo_tienda', '2', '{\"valores\":{\"1\":\"Pedidos\",\"2\":\"Cotizaciones\"},\"descripcion\":\"tipo de tienda cotizaci\\u00f3n o pedidos\"}', 3, 1),
(20, 'texto_horario', 'Nam libero tempore, cum soluta nobis est ses eligendi optio cumque cum soluta nobis est ses eligendi optio cumque.', 'texto de horario (footer)', 0, 1),
(21, 'horario1', 'Lunes a Viernes<br>8:30 am - 6:30 pm', 'horario primera linea', 0, 1),
(22, 'horario2', 'Sábados<br>8:30 am - 1:00 pm', 'horario segunda linea', 0, 1),
(24, 'telefono2', '', 'telefono', 0, 1),
(25, 'correo', 'ventas@allpublicidad.com.pe<br>ventas1@allpublicidad.com.pe<br>ventas2@allpublicidad.com.pe', 'Correo que se mostrara en la web', 0, 1),
(26, 'horario_head', 'Lun - Vie: 8am a 6pm<br>Sab: 9am a 1pm', 'horarios de la cabecera de la web', 0, 1),
(27, 'productosdestacados', '5', 'Cantidad de productos destacados a mostrar', 0, 1),
(28, 'telefono_rpc', '934 541 099', 'Teléfono RPC', 0, 1),
(29, 'telefono_rpm', '947 022 606', 'Teléfono RPM', 0, 1),
(30, 'porc_costo_admin', '8', 'porcentaje costo administrativo', 0, 1),
(31, 'porc_recargo_adelanto', '10', 'porcentaje de recargo por adelanto', 0, 1),
(32, 'footer_email', '<p><span style=\"color:#000000\"><strong><span style=\"background-color:#ffff00\">Por favor antes de hacer alg&uacute;n pago, consultar con su ejecutivo de cuenta el STOCK DE CADA PRODUCTO COTIZADO e indicar la separaci&oacute;n del mismo, ya que este puede variar en cualquier momento.</span></strong></span></p>\r\n\r\n<p><span style=\"color:#ff0000\"><strong>Condiciones Generales</strong></span><br />\r\n&bull; <strong>Los precios no incluyen IGV.</strong><br />\r\n&bull; Forma de Pago: <strong><span style=\"color:#4b0082\">50% Adelantado y 50% Contra Entrega &oacute; PAGO AL CONTADO (100% Adelantado) accede a un descuento adicional.</span></strong><br />\r\n&bull;<strong> </strong>Validez de la cotizaci&oacute;n: 5 d&iacute;as.<br />\r\n&bull; <strong>Entrega en Lima o en agencia.</strong></p>\r\n\r\n<p><strong>GARANTIZAMOS AL 100% LA SATISFACCI&Oacute;N DE SU IMAGEN EN LOS PRODUCTOS o devolvemos su dinero.</strong></p>\r\n\r\n<p><span style=\"color:#ff0000\"><strong>Datos de la Empresa</strong></span><br />\r\nRUC: <strong>20602324771</strong><br />\r\nRaz&oacute;n Social: <strong>IMPORTACIONES PROGMAC SAC</strong><br />\r\nRaz&oacute;n Comercial o Marca: ALL PUBLICIDAD<br />\r\n<strong><span style=\"color:#ff0000\">Cuenta Bancaria:</span></strong><br />\r\nBanco: BCP<br />\r\nTipo de cuenta: Corriente en Soles<br />\r\nNombre: <strong>IMPORTACIONES PROGMAC SAC</strong><br />\r\nNumero: 191-2472263-0-52<br />\r\nCCI: 002-191-002472263-052-52</p>\r\n\r\n<p><strong>Se aceptan pago con tarjetas pero con un 4% de recargo</strong></p>\r\n\r\n<p>Esperando que esta propuesta sea de su agrado y abarque sus expectativas.<br />\r\nCualquier consulta no dude en comunicarse conmigo.</p>\r\n\r\n<p>Atentamente,<br />\r\n<br />\r\nGloria<br />\r\n<strong>Ejecutiva de Cuenta</strong><br />\r\n<span style=\"color:#008000\"><strong>ALLPUBLICIDAD</strong></span><br />\r\nTel: <strong>3884433 </strong>&ndash; Celular:&nbsp;<strong>947022606</strong><br />\r\nWeb: <strong><span style=\"color:#008000\">www.allpublicidad.com.pe</span></strong><br />\r\nE-mail: <strong>ventas@allpublicidad.com.pe</strong></p>\r\n', 'Descripcion del pie email', 1, 1),
(33, 'igv', '18', 'igv(0.18) * 100', 0, 1),
(34, 'tipo_de_cambio', '3.28', 'tipo de cambio (Dolar)', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) UNSIGNED NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `estado2` tinyint(4) NOT NULL DEFAULT '2',
  `fecha` datetime DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` double(10,2) DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT '0.00',
  `igv` double(10,2) DEFAULT '0.00',
  `igv5050` double(10,2) DEFAULT '0.00',
  `subtotal5050` double(10,2) DEFAULT '0.00',
  `total5050` double(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `codigo`, `estado`, `estado2`, `fecha`, `cliente_id`, `total`, `subtotal`, `igv`, `igv5050`, `subtotal5050`, `total5050`) VALUES
(1, '000100001', 1, 2, '2018-05-03 17:30:37', 3, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(2, '000100002', 1, 3, '2018-05-07 15:44:18', 6, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(3, '000100003', 1, 2, '2018-05-22 10:25:11', 6, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(4, '000100004', 1, 3, '2018-05-22 11:33:22', 6, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(5, '000100005', 1, 2, '2018-05-22 11:35:54', 6, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(6, '000100006', 1, 3, '2018-05-22 14:43:30', 6, NULL, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, '000100007', 1, 2, '2018-05-25 12:08:02', 6, 2511.04, 2128.00, 383.04, 574.56, 3192.00, 3766.56),
(8, '000100008', 1, 2, '2018-05-31 10:37:27', 7, 1465.56, 1242.00, 223.56, 335.38, 1863.25, 1465.56),
(9, '000100009', 2, 3, '2018-07-24 13:16:14', 8, 485.68, 92.91, 74.09, 111.13, 139.37, 728.51),
(10, '000100010', 2, 2, '2018-07-24 18:44:57', 8, 35246.95, 29870.30, 5376.65, 8063.21, 44795.60, 35246.95),
(11, '000100011', 2, 2, '2018-07-24 18:50:18', 8, 791.54, 670.80, 120.74, 181.22, 1006.80, 791.54),
(12, '000100012', 2, 2, '2018-07-24 19:45:09', 8, 512.12, 434.00, 78.12, 117.18, 651.00, 512.12),
(13, '000100013', 2, 2, '2018-07-31 10:12:03', 7, 964.12, 817.05, 147.07, 220.60, 1225.53, 964.12),
(14, '000100014', 2, 2, '2018-07-31 10:35:10', 7, 252.30, 213.81, 38.49, 57.73, 320.73, 252.30),
(15, '000100015', 2, 2, '2018-07-31 10:36:17', 7, 366.34, 310.46, 55.88, 83.82, 465.69, 366.34),
(16, '000100016', 2, 2, '2018-07-31 10:49:25', 7, 419.35, 355.38, 63.97, 95.95, 533.08, 419.35),
(17, '000100017', 2, 2, '2018-07-31 11:54:04', 7, 504.36, 427.42, 76.94, 115.39, 641.08, 504.36),
(18, '000100018', 2, 2, '2018-07-31 12:35:32', 7, 810.90, 687.20, 123.70, 136.06, 755.91, 810.90),
(19, '000100019', 2, 2, '2018-07-31 12:52:17', 7, 810.90, 687.20, 123.70, 136.06, 755.91, 810.90),
(20, '000100020', 2, 2, '2018-07-31 12:57:42', 7, 657.54, 557.24, 100.30, 110.33, 612.96, 657.54),
(21, '000100021', 2, 2, '2018-07-31 14:16:37', 7, 665.97, 564.38, 101.59, 111.75, 620.81, 665.97),
(22, '000100022', 2, 2, '2018-08-02 16:19:26', 7, 527.81, 447.30, 80.51, 88.58, 492.03, 580.68),
(23, '000100023', 2, 3, '2018-08-02 18:07:37', 7, 1902.16, 647.50, 290.16, 319.16, 712.25, 2092.26),
(24, '000100024', 2, 2, '2018-08-01 22:45:41', 8, 13865.00, 11750.00, 2115.00, 2326.50, 12925.00, 13865.00),
(25, '000100025', 2, 2, '2018-08-01 23:10:54', 8, 8031.08, 6806.00, 1225.08, 1348.20, 7490.00, 8031.08),
(26, '000100026', 2, 2, '2018-08-01 23:13:57', 8, 5605.00, 4750.00, 855.00, 939.60, 5220.00, 5605.00),
(27, '000100027', 2, 2, '2018-08-02 00:28:03', 8, 5310.00, 4500.00, 810.00, 891.00, 4950.00, 5841.00),
(28, '000100028', 2, 2, '2018-08-02 18:14:16', 7, 3203.64, 2714.95, 488.69, 537.43, 2985.74, 3203.64),
(29, '000100029', 2, 2, '2018-08-02 18:22:08', 7, 2478.83, 2100.70, 378.13, 415.96, 2310.90, 2478.83),
(30, '000100030', 2, 3, '2018-08-04 10:45:51', 7, 1869.83, 897.60, 285.23, 313.73, 987.36, 2056.68),
(31, '000100031', 2, 2, '2018-08-03 20:20:56', 8, 378.78, 321.00, 57.78, 63.54, 353.00, 378.78),
(32, '000100032', 2, 2, '2018-08-06 19:28:14', 8, 5605.00, 4750.00, 855.00, 939.60, 5220.00, 5605.00),
(33, '000100033', 2, 2, '2018-08-06 19:35:16', 8, 5369.00, 4550.00, 819.00, 900.00, 5000.00, 5369.00),
(34, '000100034', 2, 2, '2018-08-06 19:38:42', 8, 5133.00, 4350.00, 783.00, 862.20, 4790.00, 5133.00),
(35, '000100035', 2, 2, '2018-08-06 19:45:06', 8, 4908.80, 4160.00, 748.80, 824.40, 4580.00, 4908.80),
(36, '000100036', 2, 2, '2018-08-06 21:00:32', 8, 4814.40, 4080.00, 734.40, 808.20, 4490.00, 4814.40),
(37, '000100037', 2, 2, '2018-08-06 21:05:51', 8, 2537.00, 2150.00, 387.00, 426.60, 2370.00, 2537.00),
(38, '000100038', 2, 2, '2018-08-06 21:19:10', 8, 644.28, 546.00, 98.28, 108.18, 601.00, 644.28),
(39, '000100039', 2, 2, '2018-08-06 21:19:32', 8, 401.79, 340.50, 61.29, 67.41, 374.50, 401.79),
(40, '000100040', 2, 2, '2018-08-06 21:19:58', 8, 1734.60, 1470.00, 264.60, 291.06, 1617.00, 1734.60),
(41, '000100041', 2, 2, '2018-08-06 21:20:25', 8, 1009.02, 855.10, 153.92, 169.52, 941.80, 1009.02),
(42, '000100042', 2, 2, '2018-08-06 21:20:57', 8, 1744.51, 1478.40, 266.11, 292.61, 1625.60, 1744.51),
(43, '000100043', 2, 2, '2018-08-06 21:21:46', 8, 3775.53, 3199.60, 575.93, 633.38, 3518.80, 3775.53),
(44, '000100044', 2, 2, '2018-08-06 21:33:24', 8, 6973.80, 5910.00, 1063.80, 1171.80, 6510.00, 6973.80),
(45, '000100045', 2, 2, '2018-08-06 21:34:03', 8, 13664.40, 11580.00, 2084.40, 2295.00, 12750.00, 13664.40),
(46, '000100046', 2, 2, '2018-08-06 21:34:34', 8, 14575.36, 12352.00, 2223.36, 2448.00, 13600.00, 14575.36),
(47, '000100047', 2, 2, '2018-08-06 21:35:03', 8, 21889.00, 18550.00, 3339.00, 3672.00, 20400.00, 21889.00),
(48, '000100048', 2, 2, '2018-08-06 21:35:53', 8, 31180.32, 26424.00, 4756.32, 5235.84, 29088.00, 31180.32),
(49, '000100049', 2, 2, '2018-08-06 21:36:19', 8, 43306.00, 36700.00, 6606.00, 7272.00, 40400.00, 43306.00),
(50, '000100050', 2, 2, '2018-08-07 14:34:29', 9, 216.01, 183.06, 32.95, 36.24, 201.37, 237.60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_atributos`
--

CREATE TABLE `detalle_atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `atributo_id` bigint(20) UNSIGNED NOT NULL,
  `valor` varchar(32) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_atributos`
--

INSERT INTO `detalle_atributos` (`id`, `nombre`, `descripcion`, `atributo_id`, `valor`, `estado`) VALUES
(1, 'Blanco', 'Blanco', 1, '#FFFFFF', 1),
(2, 'Rojo', 'Rojo', 1, '#FF0000', 1),
(3, 'Azul', 'Azul', 1, '#0078D7', 1),
(4, 'Serigrafía', 'Serigrafía', 2, 'Serigrafía', 0),
(5, 'Tampografía', 'Tampografía', 2, 'Tampografía', 0),
(6, 'Amarillo', 'Amarillo', 1, '#F9B522', 1),
(7, '1 color', '1 color', 3, '1 color', 0),
(8, '2 colores', '2 colores', 3, '2 colores', 0),
(9, '3 colores', '3 colores', 3, '3 colores', 0),
(10, 'Plateado', 'Plateado', 1, '#8a9597', 1),
(11, 'Negro', 'Negro', 1, '#000000', 1),
(12, 'CKI', 'PROVEEDOR', 4, '04', 0),
(13, 'Blanco Traslucido', 'Blanco Traslucido', 1, '#FFFFFF', 1),
(14, 'Verde', 'Verde', 1, '#006400', 1),
(15, 'Morado', 'Morado', 1, '#572364', 1),
(16, 'Rosado', 'Rosado', 1, '#eaa3c9', 1),
(17, 'Naranja', 'Naranja', 1, '#ff6d1f', 1),
(18, 'Celeste', 'Celeste', 1, '	#9cdfdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion`
--

CREATE TABLE `detalle_cotizacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `atributo_id` varchar(120) DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `cotizacion_id` int(10) UNSIGNED NOT NULL,
  `atributos` text,
  `dato_impresion` text,
  `comentario` text,
  `tiempoproduccion` int(10) DEFAULT '0',
  `precio5050` double(10,2) DEFAULT '0.00',
  `subtotal5050` double(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_cotizacion`
--

INSERT INTO `detalle_cotizacion` (`id`, `nombre`, `imagen`, `cantidad`, `precio`, `subtotal`, `estado`, `atributo_id`, `producto_id`, `cotizacion_id`, `atributos`, `dato_impresion`, `comentario`, `tiempoproduccion`, `precio5050`, `subtotal5050`) VALUES
(1, 'Cubo Antiestrés', '20180409112722.jpg', 3, '0.00', '0.00', 1, NULL, 11, 1, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"65\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', 'sin comentarios acerca de este producto', 0, 0.00, 0.00),
(2, 'Doctor Antiestrés', '20180404161433.jpg', 3, '0.00', '0.00', 1, NULL, 1, 2, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"37\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 0, 0.00, 0.00),
(3, 'Doctor Antiestrés', '20180404161433.jpg', 68, '116.73', '7937.64', 1, NULL, 1, 3, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"37\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 0, 0.00, 0.00),
(4, 'Doctor Antiestrés', '20180404161433.jpg', 68, '116.73', '7937.64', 1, NULL, 1, 4, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"37\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 0, 0.00, 0.00),
(5, 'Doctor Antiestrés', '20180404161433.jpg', 68, '116.73', '7937.64', 1, NULL, 1, 5, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"38\";s:17:\"atributos_nombres\";s:4:\"Azul\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"3\";s:15:\"atributos_valor\";s:7:\"#0078D7\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"3\";}', '', 0, 0.00, 0.00),
(6, 'Cubo Antiestrés', '20180409112722.jpg', 89, '124.25', '11058.25', 1, NULL, 11, 6, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"65\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 5, 0.00, 0.00),
(7, 'Doctor Antiestrés', '20180404161433.jpg', 68, '116.73', '7937.64', 1, NULL, 1, 6, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"36\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 5, 0.00, 0.00),
(8, 'Doctor Antiestrés', '20180404161433.jpg', 56, '38.00', '2128.00', 1, NULL, 1, 7, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"88\";s:17:\"atributos_nombres\";s:4:\"Azul\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"3\";s:15:\"atributos_valor\";s:7:\"#0078D7\";}}', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 5, 57.00, 3192.00),
(9, 'Doctor Antiestrés', '20180404161433.jpg', 25, '49.68', '1242.00', 1, NULL, 1, 8, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"92\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'Especificación...', 5, 74.53, 1863.25),
(10, 'PORTA CARTERA METALICA', '20180416231307.jpg', 1, '117.24', '117.24', 1, NULL, 15, 9, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"62\";s:17:\"atributos_nombres\";s:8:\"Plateado\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"10\";s:15:\"atributos_valor\";s:7:\"#8a9597\";}}', 'a:7:{s:2:\"id\";s:1:\"4\";s:14:\"tipo_impresion\";s:11:\"Pantografia\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 175.86, 175.86),
(11, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1, '130.38', '130.38', 1, NULL, 16, 9, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"72\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 195.57, 195.57),
(12, 'SOPORTE PARA CELULAR BUBLE CON ALCANCIA BLANCO', '20180518013454.jpg', 1, '71.06', '71.06', 1, NULL, 20, 9, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"83\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 106.59, 106.59),
(13, 'Alcancia casa', '20180518022339.jpg', 1, '92.91', '92.91', 1, NULL, 22, 9, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"85\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 139.37, 139.37),
(14, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 70, '6.39', '447.30', 1, NULL, 18, 10, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"78\";s:17:\"atributos_nombres\";s:7:\"Naranja\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"17\";s:15:\"atributos_valor\";s:7:\"#ff6d1f\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'necesito a un color por un lado del chanchito con nuestro logo.', 3, 9.58, 670.60),
(15, 'ALCANCIA HOMBRE', '20180515230307.jpg', 100, '3.62', '362.00', 1, NULL, 19, 10, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"82\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 5.43, 543.00),
(16, 'SOPORTE PARA CELULAR BUBLE CON ALCANCIA BLANCO', '20180518013454.jpg', 1500, '0.74', '1110.00', 1, NULL, 20, 10, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"83\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 1.11, 1665.00),
(17, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 300, '5.01', '1503.00', 1, NULL, 16, 10, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"72\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 7.51, 2253.00),
(18, 'Alcancia Mujer', '20180410163437.jpg', 1600, '16.53', '26448.00', 1, NULL, 12, 10, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"67\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 24.79, 39664.00),
(19, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 120, '5.59', '670.80', 1, NULL, 16, 11, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"71\";s:17:\"atributos_nombres\";s:17:\"Blanco Traslucido\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"13\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 8.39, 1006.80),
(20, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 70, '6.20', '434.00', 1, NULL, 18, 12, 'a:1:{i:0;a:5:{s:2:\"id\";s:2:\"75\";s:17:\"atributos_nombres\";s:7:\"Celeste\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"18\";s:15:\"atributos_valor\";s:8:\"	#9cdfdf\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 9.30, 651.00),
(21, 'Bolsa Ecológica de Tela', '20180404161916.jpg', 1, '0.00', '0.00', 1, NULL, 2, 13, '', 'a:1:{s:9:\"nro_color\";N;}', '', NULL, 0.00, 0.00),
(22, 'Doctor Antiestrés', '20180404161433.jpg', 9, '74.47', '670.23', 1, NULL, 1, 13, '', 'a:7:{s:2:\"id\";s:1:\"3\";s:14:\"tipo_impresion\";s:5:\"Laser\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'prueba', 5, 111.70, 1005.30),
(23, 'PORTA CARTERA METALICA', '20180416231307.jpg', 3, '48.94', '146.82', 1, NULL, 15, 13, 'a:2:{i:0;a:5:{s:2:\"id\";s:2:\"62\";s:17:\"atributos_nombres\";s:8:\"Plateado\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"10\";s:15:\"atributos_valor\";s:7:\"#8a9597\";}i:1;a:5:{s:2:\"id\";s:2:\"63\";s:17:\"atributos_nombres\";s:8:\"Plateado\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"10\";s:15:\"atributos_valor\";s:7:\"#8a9597\";}}', 'a:7:{s:2:\"id\";s:1:\"4\";s:14:\"tipo_impresion\";s:11:\"Pantografia\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 73.41, 220.23),
(24, 'Alcancia casa', '20180518022339.jpg', 3, '40.77', '122.31', 1, NULL, 22, 14, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"4\";}', '', 3, 61.16, 183.48),
(25, 'ALCANCIA HOMBRE', '20180515230307.jpg', 1, '91.50', '91.50', 1, NULL, 19, 14, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"3\";}', 'prueba', 3, 137.25, 137.25),
(26, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 3, '55.30', '165.90', 1, NULL, 18, 15, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 82.95, 248.85),
(27, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 4, '36.14', '144.56', 1, NULL, 16, 15, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'prueba', 3, 54.21, 216.84),
(28, 'Alcancia Mujer', '20180410163437.jpg', 1, '107.28', '107.28', 1, NULL, 12, 16, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"4\";}', '', 3, 160.92, 160.92),
(29, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 2, '124.05', '248.10', 1, NULL, 18, 16, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"6\";}', 'pruebaaa', 3, 186.08, 372.16),
(30, 'Alcancia Mujer', '20180410163437.jpg', 1, '92.52', '92.52', 1, NULL, 12, 17, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 138.78, 138.78),
(31, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 5, '40.80', '204.00', 1, NULL, 18, 17, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', 'prueba cantidad 5 3 colores tampografia', 3, 61.20, 306.00),
(32, 'ALCANCIA HOMBRE', '20180515230307.jpg', 10, '13.09', '130.90', 1, NULL, 19, 17, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"5\";}', '', 3, 19.63, 196.30),
(33, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 1, '172.80', '172.80', 1, NULL, 18, 18, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 190.08, 190.08),
(34, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1, '130.38', '130.38', 1, NULL, 16, 18, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 143.41, 143.41),
(35, 'Doctor Antiestrés', '20180404161433.jpg', 1, '384.02', '384.02', 1, NULL, 1, 18, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 5, 422.42, 422.42),
(36, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1, '130.38', '130.38', 1, NULL, 16, 19, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 143.41, 143.41),
(37, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 1, '172.80', '172.80', 1, NULL, 18, 19, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 190.08, 190.08),
(38, 'Doctor Antiestrés', '20180404161433.jpg', 1, '384.02', '384.02', 1, NULL, 1, 19, 'a:5:{i:0;a:5:{s:2:\"id\";s:2:\"91\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:2:\"92\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}i:2;a:5:{s:2:\"id\";s:2:\"93\";s:17:\"atributos_nombres\";s:4:\"Azul\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"3\";s:15:\"atributos_valor\";s:7:\"#0078D7\";}i:3;a:5:{s:2:\"id\";s:2:\"94\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}i:4;a:5:{s:2:\"id\";s:2:\"95\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 5, 422.42, 422.42),
(39, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1, '143.28', '143.28', 1, NULL, 16, 20, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 157.61, 157.61),
(40, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 1, '195.30', '195.30', 1, NULL, 18, 20, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"4\";}', '', 3, 214.83, 214.83),
(41, 'Doctor Antiestrés', '20180404161433.jpg', 1, '218.66', '218.66', 1, NULL, 1, 20, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"1\";}', '', 5, 240.52, 240.52),
(42, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1, '130.38', '130.38', 1, NULL, 16, 21, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 143.41, 143.41),
(43, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 70, '6.20', '434.00', 1, NULL, 18, 21, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 6.82, 477.40),
(44, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 70, '6.39', '447.30', 1, NULL, 18, 22, 'a:7:{i:0;a:5:{s:2:\"id\";s:2:\"75\";s:17:\"atributos_nombres\";s:7:\"Celeste\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"18\";s:15:\"atributos_valor\";s:8:\"	#9cdfdf\";}i:1;a:5:{s:2:\"id\";s:2:\"76\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}i:2;a:5:{s:2:\"id\";s:2:\"77\";s:17:\"atributos_nombres\";s:6:\"Morado\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"15\";s:15:\"atributos_valor\";s:7:\"#572364\";}i:3;a:5:{s:2:\"id\";s:2:\"78\";s:17:\"atributos_nombres\";s:7:\"Naranja\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"17\";s:15:\"atributos_valor\";s:7:\"#ff6d1f\";}i:4;a:5:{s:2:\"id\";s:2:\"79\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:5;a:5:{s:2:\"id\";s:2:\"80\";s:17:\"atributos_nombres\";s:5:\"Negro\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"11\";s:15:\"atributos_valor\";s:7:\"#000000\";}i:6;a:5:{s:2:\"id\";s:2:\"81\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 7.03, 492.03),
(45, 'Alcancia casa', '20180518022339.jpg', 75, '5.53', '414.75', 1, NULL, 22, 23, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 6.08, 456.23),
(46, 'SOPORTE PARA CELULAR BUBLE CON ALCANCIA BLANCO', '20180518013454.jpg', 75, '7.33', '549.75', 1, NULL, 20, 23, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"4\";}', '', 3, 8.06, 604.73),
(47, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 70, '9.25', '647.50', 1, NULL, 18, 23, 'a:7:{i:0;a:5:{s:2:\"id\";s:2:\"75\";s:17:\"atributos_nombres\";s:7:\"Celeste\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"18\";s:15:\"atributos_valor\";s:8:\"	#9cdfdf\";}i:1;a:5:{s:2:\"id\";s:2:\"76\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}i:2;a:5:{s:2:\"id\";s:2:\"77\";s:17:\"atributos_nombres\";s:6:\"Morado\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"15\";s:15:\"atributos_valor\";s:7:\"#572364\";}i:3;a:5:{s:2:\"id\";s:2:\"78\";s:17:\"atributos_nombres\";s:7:\"Naranja\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"17\";s:15:\"atributos_valor\";s:7:\"#ff6d1f\";}i:4;a:5:{s:2:\"id\";s:2:\"79\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:5;a:5:{s:2:\"id\";s:2:\"80\";s:17:\"atributos_nombres\";s:5:\"Negro\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"11\";s:15:\"atributos_valor\";s:7:\"#000000\";}i:6;a:5:{s:2:\"id\";s:2:\"81\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'prueba', 3, 10.18, 712.25),
(48, 'Bolsa Ecológica de Tela', '20180404161916.jpg', 1000, '0.00', '0.00', 1, NULL, 2, 24, '', 'a:1:{s:9:\"nro_color\";N;}', 'hola necesito con logo impreso', NULL, 0.00, 0.00),
(49, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 1000, '5.35', '5350.00', 1, NULL, 18, 24, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'hola necesito con logo impreso', 3, 5.89, 5890.00),
(50, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 1000, '5.33', '5330.00', 1, NULL, 16, 24, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 5.86, 5860.00),
(51, 'SOPORTE PARA CELULAR BUBLE CON ALCANCIA BLANCO', '20180518013454.jpg', 500, '2.14', '1070.00', 1, NULL, 20, 24, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 2.35, 1175.00),
(52, 'BOLSA NOTEX 40X32', '20180404161916.jpg', 600, '2.96', '1776.00', 1, NULL, 2, 25, 'a:8:{i:0;a:5:{s:2:\"id\";s:2:\"96\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:2:\"97\";s:17:\"atributos_nombres\";s:4:\"Azul\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"3\";s:15:\"atributos_valor\";s:7:\"#0078D7\";}i:2;a:5:{s:2:\"id\";s:2:\"98\";s:17:\"atributos_nombres\";s:5:\"Negro\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"11\";s:15:\"atributos_valor\";s:7:\"#000000\";}i:3;a:5:{s:2:\"id\";s:2:\"99\";s:17:\"atributos_nombres\";s:7:\"Naranja\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"17\";s:15:\"atributos_valor\";s:7:\"#ff6d1f\";}i:4;a:5:{s:2:\"id\";s:3:\"100\";s:17:\"atributos_nombres\";s:7:\"Celeste\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"18\";s:15:\"atributos_valor\";s:8:\"	#9cdfdf\";}i:5;a:5:{s:2:\"id\";s:3:\"101\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}i:6;a:5:{s:2:\"id\";s:3:\"102\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}i:7;a:5:{s:2:\"id\";s:3:\"103\";s:17:\"atributos_nombres\";s:8:\"Amarillo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"6\";s:15:\"atributos_valor\";s:7:\"#F9B522\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', 'hola logo a un color', 4, 3.25, 1950.00),
(53, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '5.03', '5030.00', 1, NULL, 1, 25, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"111\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"112\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'hola logo a un color', 3, 5.54, 5540.00),
(54, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.75', '4750.00', 1, NULL, 1, 26, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"111\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"112\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 5.22, 5220.00),
(55, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.50', '4500.00', 1, NULL, 1, 27, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"111\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"112\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.95, 4950.00),
(56, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 68, '9.30', '632.40', 1, NULL, 18, 28, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'pruebaa unooo', 3, 10.23, 695.64),
(57, 'Alcancia Mujer', '20180410163437.jpg', 75, '19.46', '1459.50', 1, NULL, 12, 28, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"3\";}', '', 3, 21.40, 1605.00),
(58, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 85, '7.33', '623.05', 1, NULL, 16, 28, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', 'pruebaa dos', 3, 8.06, 685.10),
(59, 'Alcancia Mujer', '20180410163437.jpg', 70, '19.13', '1339.10', 1, NULL, 12, 29, '', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 21.04, 1472.80),
(60, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 85, '8.96', '761.60', 1, NULL, 18, 29, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'pruebaaa numero 2', 3, 9.86, 838.10),
(61, 'ALCANCIA CHANCHITO PLASTICO', '20180515213141.jpg', 75, '9.16', '687.00', 1, NULL, 16, 30, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', '', 3, 10.08, 755.70),
(62, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 85, '10.56', '897.60', 1, NULL, 18, 30, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"3\";}', 'prueba numero 2', 3, 11.62, 987.36),
(63, 'BOLSA NOTEX 40X32', '20180404161916.jpg', 100, '3.21', '321.00', 1, NULL, 2, 31, 'a:8:{i:0;a:5:{s:2:\"id\";s:2:\"96\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:2:\"97\";s:17:\"atributos_nombres\";s:4:\"Azul\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"3\";s:15:\"atributos_valor\";s:7:\"#0078D7\";}i:2;a:5:{s:2:\"id\";s:2:\"98\";s:17:\"atributos_nombres\";s:5:\"Negro\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"11\";s:15:\"atributos_valor\";s:7:\"#000000\";}i:3;a:5:{s:2:\"id\";s:2:\"99\";s:17:\"atributos_nombres\";s:7:\"Naranja\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"17\";s:15:\"atributos_valor\";s:7:\"#ff6d1f\";}i:4;a:5:{s:2:\"id\";s:3:\"100\";s:17:\"atributos_nombres\";s:7:\"Celeste\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"18\";s:15:\"atributos_valor\";s:8:\"	#9cdfdf\";}i:5;a:5:{s:2:\"id\";s:3:\"101\";s:17:\"atributos_nombres\";s:4:\"Rojo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"2\";s:15:\"atributos_valor\";s:7:\"#FF0000\";}i:6;a:5:{s:2:\"id\";s:3:\"102\";s:17:\"atributos_nombres\";s:5:\"Verde\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:2:\"14\";s:15:\"atributos_valor\";s:7:\"#006400\";}i:7;a:5:{s:2:\"id\";s:3:\"103\";s:17:\"atributos_nombres\";s:8:\"Amarillo\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"6\";s:15:\"atributos_valor\";s:7:\"#F9B522\";}}', 'a:7:{s:2:\"id\";s:1:\"1\";s:14:\"tipo_impresion\";s:11:\"Serigrafía\";s:6:\"imagen\";s:18:\"20180504085836.JPG\";s:11:\"descripcion\";s:234:\"Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.\";s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-05-04 15:58:37\";s:9:\"nro_color\";s:1:\"1\";}', 'cotizar a un color por un lado.', 4, 3.53, 353.00),
(64, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.75', '4750.00', 1, NULL, 1, 32, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"123\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"124\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', 'Doctor a un color por un lado', 3, 5.22, 5220.00),
(65, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.55', '4550.00', 1, NULL, 1, 33, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"123\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"124\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 5.00, 5000.00),
(66, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.35', '4350.00', 1, NULL, 1, 34, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"123\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"124\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.79, 4790.00),
(67, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.16', '4160.00', 1, NULL, 1, 35, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.58, 4580.00),
(68, 'Doctor Antiestrés', '20180404161433.jpg', 1000, '4.08', '4080.00', 1, NULL, 1, 36, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.49, 4490.00),
(69, 'Doctor Antiestrés', '20180404161433.jpg', 500, '4.30', '2150.00', 1, NULL, 1, 37, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.74, 2370.00),
(70, 'Doctor Antiestrés', '20180404161433.jpg', 100, '5.46', '546.00', 1, NULL, 1, 38, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 6.01, 601.00),
(71, 'Doctor Antiestrés', '20180404161433.jpg', 50, '6.81', '340.50', 1, NULL, 1, 39, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 7.49, 374.50),
(72, 'Doctor Antiestrés', '20180404161433.jpg', 300, '4.90', '1470.00', 1, NULL, 1, 40, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 5.39, 1617.00),
(73, 'Doctor Antiestrés', '20180404161433.jpg', 170, '5.03', '855.10', 1, NULL, 1, 41, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 5.54, 941.80),
(74, 'Doctor Antiestrés', '20180404161433.jpg', 320, '4.62', '1478.40', 1, NULL, 1, 42, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 5.08, 1625.60),
(75, 'Doctor Antiestrés', '20180404161433.jpg', 760, '4.21', '3199.60', 1, NULL, 1, 43, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.63, 3518.80),
(76, 'Doctor Antiestrés', '20180404161433.jpg', 1500, '3.94', '5910.00', 1, NULL, 1, 44, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.34, 6510.00),
(77, 'Doctor Antiestrés', '20180404161433.jpg', 3000, '3.86', '11580.00', 1, NULL, 1, 45, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.25, 12750.00),
(78, 'Doctor Antiestrés', '20180404161433.jpg', 3200, '3.86', '12352.00', 1, NULL, 1, 46, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.25, 13600.00),
(79, 'Doctor Antiestrés', '20180404161433.jpg', 5000, '3.71', '18550.00', 1, NULL, 1, 47, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.08, 20400.00);
INSERT INTO `detalle_cotizacion` (`id`, `nombre`, `imagen`, `cantidad`, `precio`, `subtotal`, `estado`, `atributo_id`, `producto_id`, `cotizacion_id`, `atributos`, `dato_impresion`, `comentario`, `tiempoproduccion`, `precio5050`, `subtotal5050`) VALUES
(80, 'Doctor Antiestrés', '20180404161433.jpg', 7200, '3.67', '26424.00', 1, NULL, 1, 48, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.04, 29088.00),
(81, 'Doctor Antiestrés', '20180404161433.jpg', 10000, '3.67', '36700.00', 1, NULL, 1, 49, 'a:2:{i:0;a:5:{s:2:\"id\";s:3:\"125\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}i:1;a:5:{s:2:\"id\";s:3:\"126\";s:17:\"atributos_nombres\";s:6:\"Blanco\";s:11:\"atributo_id\";s:1:\"1\";s:9:\"atributos\";s:1:\"1\";s:15:\"atributos_valor\";s:7:\"#FFFFFF\";}}', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"1\";}', '', 3, 4.04, 40400.00),
(82, 'ALCANCÍA CHANCHITO PVC', '20180515225040.jpg', 3, '61.02', '183.06', 1, NULL, 18, 50, '', 'a:7:{s:2:\"id\";s:1:\"2\";s:14:\"tipo_impresion\";s:12:\"Tampografía\";s:6:\"imagen\";N;s:11:\"descripcion\";N;s:6:\"creado\";s:19:\"2018-04-28 17:25:48\";s:10:\"modificado\";s:19:\"2018-04-28 17:25:48\";s:9:\"nro_color\";s:1:\"2\";}', 'especificacion de prueba', 3, 67.12, 201.37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `name`, `estado`) VALUES
(1, 'cotizado', 1),
(2, 'pendiente', 1),
(3, 'aceptado', 1),
(4, 'entregado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(128) DEFAULT NULL,
  `ubigeo` varchar(64) DEFAULT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `ubigeo`, `pais_id`) VALUES
(1, 'AMAZONAS', '01', 1),
(2, 'ANCASH', '02', 1),
(3, 'APURIMAC', '03', 1),
(4, 'AREQUIPA', '04', 1),
(5, 'AYACUCHO', '05', 1),
(6, 'CAJAMARCA', '06', 1),
(7, 'CALLAO', '07', 1),
(8, 'CUSCO', '08', 1),
(9, 'HUANCAVELICA', '09', 1),
(10, 'HUANUCO', '10', 1),
(11, 'ICA', '11', 1),
(12, 'JUNIN', '12', 1),
(13, 'LA LIBERTAD', '13', 1),
(14, 'LAMBAYEQUE', '14', 1),
(15, 'LIMA', '15', 1),
(16, 'LORETO', '16', 1),
(17, 'MADRE DE DIOS', '17', 1),
(18, 'MOQUEGUA', '18', 1),
(19, 'PASCO', '19', 1),
(20, 'PIURA', '20', 1),
(21, 'PUNO', '21', 1),
(22, 'SAN MARTIN', '22', 1),
(23, 'TACNA', '23', 1),
(24, 'TUMBES', '24', 1),
(25, 'UCAYALI', '25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_proyecto`
--

CREATE TABLE `fotos_proyecto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `galeria_proyecto_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias_proyecto`
--

CREATE TABLE `galerias_proyecto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` smallint(5) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `proyecto_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_articulos`
--

CREATE TABLE `galeria_articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria_articulos`
--

INSERT INTO `galeria_articulos` (`id`, `imagen`, `imagen_title`, `estado`, `ruta_amazon`, `articulo_id`) VALUES
(1, 'articulo01.jpg', 'articulo-01', 1, NULL, 1),
(2, 'articulo02.jpg', 'articulo-02', 1, NULL, 2),
(3, '20180503184054.jpeg', '5a74e27bbca80', 1, NULL, 3),
(4, '20180503184041.jpeg', '58d1bafa31c39', 1, NULL, 4),
(5, '20180802000602.jpg', '50541116_3', 1, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_productos`
--

CREATE TABLE `galeria_productos` (
  `id` bigint(20) NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `galeria_productos`
--

INSERT INTO `galeria_productos` (`id`, `imagen`, `imagen_title`, `estado`, `ruta_amazon`, `producto_id`) VALUES
(1, '20180404160203.jpg', 'calculadora-1511372449', 1, '', 4),
(2, '20180404160235.png', 'CALCULADORA-CIENTIFICA-base', 1, '', 5),
(3, '20180404160527.jpg', 'mop012-mouse-pad-con-calculadora-arubajpg-MOP012', 1, '', 8),
(4, '20180404160642.jpg', 'ECOLOGICO-POST-IT-CALCULADORA-COMPLETO', 1, '', 7),
(5, '20180404161025.jpg', 'big_1374770282c-lips', 1, '', 6),
(6, '20180404161210.jpg', 'vertus', 1, '', 9),
(7, '20180404161433.jpg', 'antiestres-1501866546', 1, '', 1),
(8, '20180404161916.jpg', 'bolsa-ecologica-de tela', 1, '', 2),
(9, '20180404162430.jpg', 'cuadernos-ecologicos', 1, '', 3),
(10, '20180409112722.jpg', 'cubo-antiestres', 1, '', 11),
(11, '20180410163437.jpg', 'alcancia-1487090446', 1, '', 12),
(14, '20180416231307.jpg', 'Portabolsa-Lori-CDB01', 1, '', 15),
(15, '20180515213141.jpg', 'chanchito_rojo', 1, '', 16),
(16, '20180515225040.jpg', 'alcancia_pvc', 1, '', 18),
(17, '20180515230307.jpg', 'alcancia_persona', 1, '', 19),
(18, '20180518011548.jpg', 'alcancia-hombre-allpublicidad', 1, '', 19),
(19, '20180518013454.jpg', 'alcancia-buble-allpublicidad', 1, '', 20),
(20, '20180518021525.jpg', 'alcancia-lego-allpublicidad', 1, '', 21),
(21, '20180518022339.jpg', 'alcancia-casa-allpublicidad', 1, '', 22),
(22, '20180801234647.png', '688bc7_5b1580742da84b9188791537ab8fd315', 1, '', 16),
(23, '20180801234647.jpg', 'alcancia mitsubishi', 1, '', 16),
(24, '20180801234647_1.jpg', 'blue', 1, '', 16),
(25, '20180803214311.png', '!cid_2739588C541440E58D5919422E92172F@DESKTOPLKVOGQU', 1, '', 18),
(26, '20180803214312.jpg', '3010289', 1, '', 18),
(27, '20180803214312_1.jpg', 'chanchito celeste', 1, '', 18),
(28, '20180803214631.JPG', 'calculadora_CA-124', 1, '', 9),
(29, '20180803214721.jpg', '1376611_660729987272328_112216857_n', 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_servicios`
--

CREATE TABLE `galeria_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `servicios_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED DEFAULT '1',
  `icono` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `estado`, `icono`) VALUES
(1, 'español', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresion_producto`
--

CREATE TABLE `impresion_producto` (
  `id` int(11) NOT NULL,
  `impresion_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cant1` decimal(10,2) DEFAULT NULL COMMENT '0-50',
  `cant2` decimal(10,2) DEFAULT NULL COMMENT '51-99',
  `cant3` decimal(10,2) DEFAULT NULL COMMENT '100-300',
  `cant4` decimal(10,2) DEFAULT NULL COMMENT '301-500',
  `cant5` decimal(10,2) DEFAULT NULL COMMENT '501-1000',
  `cant6` decimal(10,2) DEFAULT NULL COMMENT '1001-3000',
  `cant7` decimal(10,2) DEFAULT NULL COMMENT '3001+'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `impresion_producto`
--

INSERT INTO `impresion_producto` (`id`, `impresion_id`, `producto_id`, `cant1`, `cant2`, `cant3`, `cant4`, `cant5`, `cant6`, `cant7`) VALUES
(6, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 4, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 7, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 2, 11, '10.00', '20.00', '30.00', '50.00', '60.00', '70.00', '80.00'),
(42, 1, 12, '0.20', '0.20', '0.20', '0.15', '0.15', '0.10', '0.10'),
(48, 1, 19, '5.00', '0.40', '0.20', '0.15', '0.10', '0.10', '0.08'),
(49, 2, 20, '5.00', '1.00', '0.80', '0.30', '0.20', '0.15', '0.10'),
(50, 1, 21, '5.00', '0.40', '0.20', '0.15', '0.15', '0.10', '0.08'),
(51, 1, 22, '5.00', '0.40', '0.20', '0.15', '0.15', '0.10', '0.08'),
(56, 1, 2, '0.50', '0.50', '0.30', '0.30', '0.25', '0.20', '0.20'),
(60, 2, 16, '5.00', '1.00', '0.80', '0.30', '0.20', '0.15', '0.10'),
(61, 2, 18, '5.00', '1.00', '0.80', '0.30', '0.20', '0.15', '0.10'),
(63, 2, 1, '1.00', '0.50', '0.40', '0.25', '0.20', '0.10', '0.10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `telefono` int(11) UNSIGNED DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `asunto` varchar(128) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '2',
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `telefono`, `correo`, `asunto`, `mensaje`, `respuesta`, `empresa`, `ruc`, `estado`, `creado`, `modificado`) VALUES
(1, 'Erick Huaracha', 3214568, 'er.ick9015@gmail.com', 'Asunto', 'mensaje de prueba', NULL, NULL, NULL, 1, '2017-12-13 16:26:55', '2018-04-17 05:19:25'),
(2, 'Rene Mamani', 3214568, 'er.ick9015@gmail.com', 'Asunto', 'mensaje de prueba', NULL, NULL, NULL, 2, '2017-12-13 16:32:59', '2017-12-13 16:32:59'),
(3, 'Erick Apellidos', 3214568, 'er.ick9015@gmail.com', 'asuntoo', 'Mensaje  Mensaje  Mensaje Mensaje Mensaje Mensaje ', NULL, NULL, NULL, 2, '2018-02-07 15:39:33', '2018-02-07 15:39:33'),
(4, 'Erick Huaracha', 3214568, 'eremks@gmail.com', 'Asunto', 'Mensaje Mensaje Mensaje Mensaje ', NULL, NULL, NULL, 2, '2018-02-07 15:40:38', '2018-02-07 15:40:38'),
(5, 'Erick Huaracha', 3214568, 'er.ick9015@gmail.com', 'Asunto', 'Mensaje de prueba', NULL, NULL, NULL, 2, '2018-05-07 22:56:53', '2018-05-07 22:56:53'),
(6, 'Erick Huaracha', 3214568, 'er.ick9015@gmail.com', 'Asunto!!', 'mensaje de prueba', NULL, NULL, NULL, 2, '2018-05-07 23:35:52', '2018-05-07 23:35:52'),
(7, 'prueba apellido prueba', 3214567, 'er.ick9015@gmail.com', 'asunto', 'mensaje de prueba numero 2', NULL, NULL, NULL, 1, '2018-08-02 19:04:16', '2018-08-03 23:32:54'),
(8, 'Gloria Apaza', 947022606, 'gloria.apaza@progmac.com.pe', 'cotización', 'contactenos uno', NULL, NULL, NULL, 1, '2018-08-03 23:07:50', '2018-08-03 23:08:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`, `estado`) VALUES
(1, 'superadministrador', 1),
(2, 'administrador', 1),
(3, 'vendedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(128) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `zona` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`, `codigo`, `zona`) VALUES
(1, 'Peru', 'PE', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `nombre`, `imagen`, `orden`, `estado`, `creado`, `modificado`) VALUES
(1, 'BORRADORES PUBLICITARIOS S/ 2.50 + IGV EL MILLAR preguntar', '20180802000721.jpg', 1, 1, '2018-04-06 16:29:03', '2018-08-02 00:10:32'),
(2, 'nueva promocion', '20180804103154.jpg', 2, 0, '2018-08-04 10:31:55', '2018-08-04 10:32:01'),
(3, 'Promocion de Prueba  Numero 1 abc', '20180805092047.jpg', 2, 1, '2018-08-05 09:19:32', '2018-08-05 09:21:15'),
(4, 'PROMOCIONES 3 ANTIESTRES  55', '20180806210741.jpg', 1, 0, '2018-08-06 21:07:42', '2018-08-06 21:08:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_frecuentes`
--

CREATE TABLE `preguntas_frecuentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(128) DEFAULT NULL,
  `respuesta` text,
  `autor` varchar(128) DEFAULT NULL,
  `orden` tinyint(3) UNSIGNED DEFAULT NULL,
  `mail_autor` varchar(128) DEFAULT NULL,
  `estado` tinyint(3) UNSIGNED DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas_frecuentes`
--

INSERT INTO `preguntas_frecuentes` (`id`, `pregunta`, `respuesta`, `autor`, `orden`, `mail_autor`, `estado`, `idioma_id`, `creado`, `modificado`) VALUES
(1, '¿Como comprar un producto por la pagina web? hh', '<p>e3333</p>\r\n', 'yo', 1, 'yo', 1, 1, '2017-01-10 10:50:20', '2018-08-03 23:06:28'),
(2, '¿Pregunta2?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A error est nihil vel enim quis aliquam debitis minima at quos ipsum ipsam, exercitationem cupiditate. Doloremque doloribus itaque nisi voluptates laboriosam.', 'a2', 2, 'a2@gmail.com', 1, 1, '2017-02-10 10:50:20', '2018-05-04 18:00:00'),
(3, '¿Pregunta3?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A error est nihil vel enim quis aliquam debitis minima at quos ipsum ipsam, exercitationem cupiditate. Doloremque doloribus itaque nisi voluptates laboriosam.', 'a3', 3, 'a3@gmail.com', 1, 1, '2017-03-10 10:50:20', '2018-05-04 18:00:04'),
(4, '¿Como comprar un producto por la pagina web? hh', '<p>e3333</p>\r\n', 'yo', 4, 'yo', 1, 1, '2018-08-02 00:17:58', '2018-08-02 00:17:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(256) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(128) DEFAULT NULL,
  `codigo` varchar(25) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `orden` bigint(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `precio_oferta` decimal(10,2) DEFAULT NULL,
  `oferta` tinyint(4) NOT NULL DEFAULT '2',
  `tags` varchar(128) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '1',
  `fecha_ingreso` datetime DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `cantidad` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tiempo_produccion` int(11) DEFAULT NULL,
  `c_movilidad` decimal(10,2) DEFAULT '0.00',
  `c_demasia` decimal(10,2) DEFAULT '0.00',
  `c_unit_embalaje` decimal(10,2) DEFAULT '0.00',
  `c_regalo` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `resumen`, `codigo`, `url`, `orden`, `precio`, `precio_oferta`, `oferta`, `tags`, `destacado`, `fecha_ingreso`, `seo_title`, `seo_description`, `seo_keywords`, `cantidad`, `estado`, `categoria_id`, `creado`, `modificado`, `tiempo_produccion`, `c_movilidad`, `c_demasia`, `c_unit_embalaje`, `c_regalo`) VALUES
(1, 'Doctor Antiestrés', '<p>Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibe ndum gravida eget, lacinia id purus. Susp endisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut e', '', 'doctor-antiestres', 1, '20.00', '0.00', 2, NULL, 1, '2017-06-09 10:50:20', 'Doctor Antiestrés', 'Doctor Antiestrés', 'Doctor Antiestrés', 0, 1, 3, '2017-01-10 10:50:20', '2018-08-06 19:44:42', 3, '20.00', '3.00', '0.05', '10.00'),
(2, 'BOLSA NOTEX 40X32', '<p>Bolsa para Expoeventos Medidas:40 x 32 cm, Colores Variados.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut e', '0301', 'bolsa-notex-40x32', 2, '10.00', '0.00', 2, NULL, 2, '2017-06-12 10:50:20', 'Bolsa Ecológica de Tela', 'Bolsa Ecológica de Tela Notex', 'Bolsa Ecológica de Tela notex', 1500, 1, 4, '2017-01-10 10:50:20', '2018-08-01 23:01:24', 4, '10.00', '5.00', '0.30', '10.00'),
(3, 'Libreta de Notas Espiralado', '<p>producto 03</p>\r\n', NULL, '', 'libreta-de-notas-espiralado', 3, '35.00', '0.00', 2, NULL, 2, '2017-06-12 10:50:20', 'Cuaderno Ecológico', 'Cuaderno Ecológico', 'Cuaderno Ecológico', 99, 1, 7, '2017-01-10 10:50:20', '2018-04-04 16:24:37', 0, '0.00', '0.00', '0.00', '0.00'),
(4, 'Mini Agenda con Calculadora', '<p>producto 04</p>\r\n', NULL, '', 'mini-agenda-con-calculadora', 4, '15.00', '10.00', 1, NULL, 1, '2017-08-01 10:50:20', 'Mini Agenda con Calculadora', 'Mini Agenda con Calculadora', 'Mini Agenda con Calculadora', 99, 1, 5, '2017-01-10 10:50:20', '2018-04-04 15:20:57', 0, '0.00', '0.00', '0.00', '0.00'),
(5, 'Calculadora con Base', '<p>producto 05</p>\r\n', NULL, '', 'calculadora-con-base', 5, '20.00', '0.00', 2, NULL, 2, '2017-08-01 10:50:20', 'Calculadora con Base', 'Calculadora con Base', 'Calculadora con Base', 99, 1, 5, '2017-01-10 10:50:20', '2018-04-04 15:19:15', 0, '0.00', '0.00', '0.00', '0.00'),
(6, 'Calculadora con Clips', '<p>nombre-atributo</p>\r\n', NULL, '', 'calculadora-con-clips', 6, '25.00', '0.00', 2, NULL, 1, NULL, 'Calculadora con Clips', 'Calculadora con Clips', 'Calculadora con Clips', 99, 1, 5, '2018-01-05 18:38:35', '2018-04-04 16:10:31', 0, '0.00', '0.00', '0.00', '0.00'),
(7, 'Calculadora con Post it', '<p>nombre-atributo</p>\r\n', NULL, '', 'calculadora-con-post-it', 7, '25.00', '0.00', 2, NULL, 2, NULL, 'Calculadora con Post it', 'Calculadora con Post it', 'Calculadora con Post it', 99, 1, 5, '2018-01-05 18:39:18', '2018-04-04 16:06:46', 0, '0.00', '0.00', '0.00', '0.00'),
(8, 'Mouse Pad con Calculadora', '<p>Descripci&oacute;n</p>\r\n', NULL, '', 'mouse-pad-con-calculadora', 8, NULL, NULL, 2, NULL, 2, NULL, 'Mouse Pad con Calculadora', 'Mouse Pad con Calculadora', 'Mouse Pad con Calculadora', 99, 1, 5, '2018-02-06 16:02:17', '2018-04-04 15:17:13', 0, '0.00', '0.00', '0.00', '0.00'),
(9, 'Calculadora Vertus', '<p>Calculadora Vertus</p>\r\n', NULL, '', 'calculadora-vertus', 9, NULL, NULL, 2, NULL, 1, NULL, 'Calculadora Vertus', 'Calculadora Vertus', 'Calculadora Vertus', 0, 1, 5, '2018-03-28 16:22:58', '2018-08-03 21:46:31', 10, '10.00', '11.00', '12.00', '13.00'),
(10, 'Calculadora Vertus', '<p>Calculadora Vertus</p>\r\n', NULL, '', 'calculadora-vertus', 9, NULL, NULL, 2, NULL, 2, NULL, 'Calculadora Vertus', 'Calculadora Vertus', 'Calculadora Vertus', NULL, 1, 5, '2018-03-28 16:23:46', '2018-03-28 16:23:46', 10, '10.00', '11.00', '12.00', '13.00'),
(11, 'Cubo Antiestrés', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', NULL, '', 'cubo-antiestres', 2, NULL, NULL, 2, NULL, 2, NULL, 'Cubo Antiestrés', 'Cubo Antiestrés', 'Cubo Antiestrés', 0, 1, 3, '2018-04-09 11:27:28', '2018-04-10 15:22:57', 5, '15.00', '10.00', '8.00', '13.00'),
(12, 'Alcancia Mujer', '<p>Material: Pl&aacute;stico<br />\r\nMedidas Producto: 21.50cm x 13.80cm</p>\r\n\r\n<p><strong>Presentacion:</strong>&nbsp;caja de cart&oacute;n color blanco</p>\r\n', NULL, '0101', 'alcancia-mujer', 1, NULL, NULL, 2, NULL, 2, NULL, 'Alcancia Mujer', 'Alcancia Mujer', 'alcancia-mujer-allpublicidad', 0, 1, 2, '2018-04-10 16:34:46', '2018-05-15 21:51:17', 3, '30.00', '3.00', '10.00', '10.00'),
(15, 'PORTA CARTERA METALICA', '<p>Colgador de cartera plateado de 4.5 cm con antideslizante en la parte posterior, bolsita y cajita negra&nbsp;aterciopelada por dentro.</p>\r\n', NULL, '2701', 'porta-cartera-metalica', 1, NULL, NULL, 2, NULL, 2, NULL, 'Porta cartera metalica', 'Porta cartera metalica', 'Porta cartera metalica, portacartera metalica, porta cartera, llavero colgador, llavero para mujer', 0, 1, 9, '2018-04-17 06:13:08', '2018-04-17 06:38:27', 3, '50.00', '3.00', '0.02', '15.00'),
(16, 'ALCANCIA CHANCHITO PLASTICO', '<p><strong>Material:&nbsp;</strong>Pl&aacute;stico<br />\r\n<strong>Medidas Producto:&nbsp;</strong>12.6 x 10.0 x 10.1 cm<br />\r\n<strong>Area de Impresi&oacute;n:&nbsp;</strong>4.0 cm</p>\r\n\r\n<p>tapa circular en la parte inferior.</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong>&nbsp;Embolsado individual.</p>\r\n', NULL, '0102', 'alcancia-chanchito-plastico', 1, NULL, NULL, 2, NULL, 2, NULL, 'alcancia-chanchito-plastico', 'alcancia-chanchito-plastico', 'alcancia-chanchito-allpublicidad', 0, 1, 2, '2018-05-15 22:31:42', '2018-05-15 22:32:07', 3, '50.00', '3.00', '0.28', '10.00'),
(17, 'ALCANCÍA CHANCHITO PVC', '<p><strong>Descripci&oacute;n: </strong>Alcanc&iacute;a de PVC en forma de cerdito, nariz quitap&oacute;n.</p>\r\n\r\n<p><strong>Medidas:</strong> Ancho:<strong> </strong>8 cm. Alto: 7.6 cm. Largo: 10 cm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong> Bolsita plastica transparente.</p>\r\n', NULL, '0103', 'alcancia-chanchito-pvc', 1, NULL, NULL, 2, NULL, 2, NULL, 'ALCANCÍA CHANCHITO PVC', 'ALCANCÍA CHANCHITO PVC', 'alcancia-chanchitov-pvc-allpublicidad', 0, 1, 2, '2018-05-15 23:48:30', '2018-05-15 23:48:30', 3, '50.00', '3.00', '0.20', '10.00'),
(18, 'ALCANCÍA CHANCHITO PVC', '<p><strong>Descripci&oacute;n: </strong>Alcanc&iacute;a de PVC en forma de cerdito, nariz quitap&oacute;n.</p>\r\n\r\n<p><strong>Medidas:</strong> Ancho:<strong> </strong>8 cm. Alto: 7.6 cm. Largo: 10 cm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong> Bolsita plastica transparente.</p>\r\n', NULL, '0103', 'alcancia-chanchito-pvc', 1, NULL, NULL, 2, NULL, 2, NULL, 'ALCANCÍA CHANCHITO PVC', 'ALCANCÍA CHANCHITO PVC', 'alcancia-chanchitov-pvc-allpublicidad', 0, 1, 2, '2018-05-15 23:50:41', '2018-08-03 21:43:13', 3, '50.00', '3.00', '0.20', '10.00'),
(19, 'ALCANCIA HOMBRE', '<p><strong>Material:&nbsp;</strong>Pl&aacute;stico<br />\r\n<strong>Medidas Producto:&nbsp;</strong>21.50cm x 13.80cm<br />\r\n<strong>Area de Impresi&oacute;n:&nbsp;</strong>9.0 cm</p>\r\n', NULL, '0104', 'alcancia-hombre', 1, NULL, NULL, 2, NULL, 2, NULL, 'alcancia-hombre-allpublicidad', 'alcancia-hombre-allpublicidad', 'alcancia-hombre-allpublicidad', 0, 1, 2, '2018-05-16 00:03:07', '2018-05-18 02:15:48', 3, '30.00', '3.00', '0.30', '10.00'),
(20, 'SOPORTE PARA CELULAR BUBLE CON ALCANCIA BLANCO', '<p>Material: Plastico<br />\r\nMedidas Producto: 10 cm x 4 cm,</p>\r\n\r\n<p>Presentaci&oacute;n: Embolsado individual.</p>\r\n', NULL, '0105', 'soporte-para-celular-buble-con-alcancia-blanco', 1, NULL, NULL, 2, NULL, 2, NULL, 'Alcancia buble porta celular', 'alcancia-buble-plastico-porta celular-allpublicidad', 'alcancia-buble-plastico-porta celular-allpublicidad', 1760, 1, 2, '2018-05-18 02:34:54', '2018-05-18 02:34:54', 3, '30.00', '3.00', '0.20', '10.00'),
(21, 'ALCANCIA LEGO', '<p>Color blanco</p>\r\n\r\n<p>Presentaci&oacute;n: Caja blanca.</p>\r\n', NULL, '0106', 'alcancia-lego', 1, NULL, NULL, 2, NULL, 2, NULL, 'Alcancia Lego', 'Alcancia lego allpublicidad', 'alcancia-lego-allpublicidad', 823, 1, 2, '2018-05-18 03:15:25', '2018-05-18 03:15:25', 3, '10.00', '3.00', '0.20', '10.00'),
(22, 'Alcancia casa', '<p><strong>Material:&nbsp;</strong>Pl&aacute;stico<br />\r\n<strong>Medidas Producto:&nbsp;</strong>10.20 x 8.9 x 8.6 cm<br />\r\n<strong>Area de Impresi&oacute;n:&nbsp;</strong>6.5 cm</p>\r\n\r\n<p><strong>Presentaci&oacute;n:</strong>&nbsp;&nbsp;caja de cart&oacute;n blanco.&nbsp;</p>\r\n', NULL, '0107', 'alcancia-casa', 1, NULL, NULL, 2, NULL, 2, NULL, 'Alcancia Casa', 'alcancia casa allpublicidad', 'alcancia-casa-allpublicidad', 90, 1, 2, '2018-05-18 03:23:39', '2018-05-18 03:23:39', 3, '30.00', '3.00', '0.28', '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_atributos`
--

CREATE TABLE `productos_atributos` (
  `productos_id` bigint(20) UNSIGNED NOT NULL,
  `atributos_multiples_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_intervalos`
--

CREATE TABLE `producto_intervalos` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `int1` decimal(10,2) DEFAULT NULL COMMENT '01-49',
  `int2` decimal(10,2) DEFAULT NULL COMMENT '50-100',
  `int3` decimal(10,2) DEFAULT NULL COMMENT '101-300',
  `int4` decimal(10,2) DEFAULT NULL COMMENT '301-500',
  `int5` decimal(10,2) DEFAULT NULL COMMENT '501-800',
  `int6` decimal(10,2) DEFAULT NULL COMMENT '801-1000',
  `int7` decimal(10,2) DEFAULT NULL COMMENT '1001-2500',
  `int8` decimal(10,2) DEFAULT NULL COMMENT '2501-4000',
  `int9` decimal(10,2) DEFAULT NULL COMMENT '4001-6000',
  `int10` decimal(10,2) DEFAULT NULL COMMENT '6001-10000',
  `int11` decimal(10,2) DEFAULT NULL COMMENT '10001-30000',
  `int12` decimal(10,2) DEFAULT NULL COMMENT '30000+'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto_intervalos`
--

INSERT INTO `producto_intervalos` (`id`, `producto_id`, `int1`, `int2`, `int3`, `int4`, `int5`, `int6`, `int7`, `int8`, `int9`, `int10`, `int11`, `int12`) VALUES
(1, 1, '25.00', '25.00', '20.00', '18.00', '18.00', '15.00', '15.00', '13.00', '13.00', '12.00', '10.00', '8.00'),
(2, 2, '30.00', '30.00', '25.00', '25.00', '20.00', '20.00', '18.00', '15.00', '15.00', '12.00', '10.00', '8.00'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, '0.00', '0.00', '0.00', '0.00', '1111.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, 12, '25.00', '25.00', '23.00', '20.00', '19.00', '19.00', '18.00', '16.00', '15.00', '13.00', '12.00', '10.00'),
(13, 15, '20.00', '20.00', '18.00', '15.00', '13.00', '12.00', '10.00', '8.00', '8.00', '7.00', '7.00', '6.00'),
(14, 16, '28.00', '25.00', '25.00', '20.00', '19.00', '18.00', '18.00', '17.00', '15.00', '13.00', '12.00', '10.00'),
(15, 18, '25.00', '20.00', '20.00', '19.00', '18.00', '18.00', '17.00', '15.00', '13.00', '12.00', '10.00', '8.00'),
(16, 19, '28.00', '25.00', '25.00', '20.00', '19.00', '18.00', '18.00', '17.00', '15.00', '13.00', '12.00', '10.00'),
(17, 20, '25.00', '20.00', '20.00', '19.00', '18.00', '17.00', '15.00', '13.00', '10.00', '9.00', '8.00', '7.00'),
(18, 21, '25.00', '20.00', '20.00', '19.00', '18.00', '18.00', '17.00', '15.00', '13.00', '12.00', '10.00', '8.00'),
(19, 22, '25.00', '25.00', '20.00', '20.00', '18.00', '17.00', '15.00', '13.00', '10.00', '9.00', '8.00', '7.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `abreviatura` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `abreviatura`, `estado`, `creado`, `modificado`) VALUES
(1, 'EYF', 'EYF', 1, '2018-03-23 11:13:08', '2018-04-17 06:26:40'),
(2, 'IMPORTACIONES FIDEL LIZARTE SAC', 'FIDELIZARTE', 1, '2018-03-26 17:38:10', '2018-04-17 06:27:15'),
(3, 'PROMOMERCH SAC', 'PROMOMERCH', 1, '2018-03-26 17:38:31', '2018-04-17 06:36:06'),
(4, 'CKI INTERNACIONAL SAC', 'CKI', 1, '2018-05-04 02:26:13', '2018-05-04 09:26:13'),
(5, 'PROMOS PERU SAC', 'PROMOS PERU', 1, '2018-05-04 02:26:35', '2018-05-04 09:26:35'),
(6, 'CORPORACION BELLAGIO PERU EIRL', 'CHIPER', 1, '2018-05-04 02:27:37', '2018-05-04 09:27:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_producto`
--

CREATE TABLE `proveedor_producto` (
  `id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `cant1` decimal(10,2) DEFAULT NULL COMMENT '50',
  `cant2` decimal(10,2) DEFAULT NULL COMMENT '100',
  `cant3` decimal(10,2) DEFAULT NULL COMMENT '200',
  `cant4` decimal(10,2) DEFAULT NULL COMMENT '300',
  `cant5` decimal(10,2) DEFAULT NULL COMMENT '400',
  `cant6` decimal(10,2) DEFAULT NULL COMMENT '500',
  `cant7` decimal(10,2) DEFAULT NULL COMMENT '1000',
  `cant8` decimal(10,2) DEFAULT NULL COMMENT '3000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor_producto`
--

INSERT INTO `proveedor_producto` (`id`, `proveedor_id`, `producto_id`, `stock`, `cant1`, `cant2`, `cant3`, `cant4`, `cant5`, `cant6`, `cant7`, `cant8`) VALUES
(8, 2, 10, 1500, '50.20', '48.00', '46.00', '44.00', '42.00', '40.00', '38.00', '36.00'),
(40, 1, 15, 0, '4.00', '4.00', '4.00', '4.00', '4.00', '3.80', '3.80', '3.80'),
(41, 3, 15, 0, '4.10', '4.10', '4.10', '4.10', '4.10', '3.90', '3.90', '3.90'),
(42, 2, 11, NULL, '100.00', '95.00', '90.00', '85.00', '80.00', NULL, NULL, NULL),
(44, 4, 12, NULL, '1.64', '1.64', '1.64', '1.64', '1.64', NULL, NULL, NULL),
(56, 4, 19, NULL, '1.57', '1.57', '1.57', '1.57', '1.57', NULL, NULL, NULL),
(57, 6, 20, NULL, '0.31', '0.31', '0.31', '0.31', '0.31', '0.30', '0.30', '0.30'),
(58, 5, 21, NULL, '4.59', '3.99', '3.99', '3.99', '3.99', '3.79', '3.79', '3.79'),
(59, 4, 22, NULL, '2.38', '2.38', '2.38', '2.38', '2.38', '2.38', '2.38', '2.38'),
(64, 4, 2, NULL, '1.20', '1.20', '1.20', '1.20', '1.20', NULL, NULL, NULL),
(71, 3, 16, NULL, '2.80', '2.80', '2.80', '2.80', '2.80', NULL, NULL, NULL),
(72, 4, 16, NULL, '2.68', '2.68', '2.68', '2.68', '2.68', NULL, NULL, NULL),
(73, 2, 18, NULL, '2.80', '2.80', '2.80', '2.80', '2.80', NULL, NULL, NULL),
(74, 3, 18, NULL, '5.00', '3.10', '3.10', '3.10', '3.10', NULL, NULL, NULL),
(75, 5, 18, NULL, '3.29', '2.79', '2.79', '2.79', '2.79', NULL, NULL, NULL),
(78, 1, 1, NULL, '4.50', '3.20', '3.00', '3.00', '2.88', NULL, NULL, NULL),
(79, 2, 1, NULL, '4.50', '3.20', '3.00', '3.00', '2.88', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `nombre`) VALUES
(1, 'dni'),
(2, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(64) DEFAULT NULL,
  `descripcion` text,
  `seccion` varchar(32) DEFAULT NULL,
  `imagen` varchar(128) DEFAULT NULL,
  `imagen_title` varchar(128) DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `orden` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `titulo`, `descripcion`, `seccion`, `imagen`, `imagen_title`, `seo_title`, `seo_description`, `seo_keywords`, `estado`, `visible`, `orden`) VALUES
(1, 'Inicio', 'Inicio', 'inicio', 'banner01.jpg', 'banner01', 'All Publicidad y Merchandising y Regalos Corporativos', 'All Publicidad y Merchandising y Regalos Corporativos', 'All Publicidad y Merchandising y Regalos Corporativos', 1, 2, 1),
(2, 'Nosotros', '<p>Somos una empresa peruana IMPORTACIONES PROGMAC SAC con su marca ALL PUBLICIDAD.</p>\r\n', 'nosotros', '20180212171123.jpg', 'nosotros', 'Nosotros', 'allpublicidad', 'allpublicidad', 1, 1, 2),
(3, 'Servicios', 'Servicios', 'servicios', 'banner03.jpg', 'banner03', 'Servicios', 'Servicios', 'Servicios', 1, 1, 3),
(4, 'Articulos', '<p>Articulos</p>\r\n', 'articulos', '20180212170600.jpg', 'articulos', 'Articulos', 'Articulos', 'Articulos', 1, 1, 4),
(5, 'Categorias', 'Productos y categorias', 'productos', 'banner05.jpg', 'banner05', 'Categorias', 'Categorias', 'Categorias', 1, 1, 5),
(6, 'Preguntas Frecuentes', '<p>Preguntas frecuentes</p>\r\n', 'prg_frecuentes', 'banner06.jpg', 'banner06', 'preguntas frecuentes', 'preguntas frecuentes', 'preguntas frecuentes', 1, 2, 6),
(7, 'Contáctenos', '<p>llame ahora y reciba un descuento</p>\r\n', 'contactenos', '20180802002540.jpg', 'TAPASOL COLAPSIBLE', 'Contáctenos', 'Contáctenos', 'Contáctenos', 1, 1, 7),
(8, 'Testimonios', 'Testimonios', 'testimonios', 'banner08.jpg', 'banner08', 'Testimonios', 'Testimonios', 'Testimonios', 1, 1, 8),
(9, 'Banners', '', 'banners', 'banner09.jpg', '', '', '', '', 1, 2, 9),
(10, 'Solo Servicios', 'Solo Servicios', 'solo_servicios', 'solo_servicio.jpg', 'servicios', 'Servicios', 'Servicios', 'Servicios', 1, 1, 10),
(11, 'Galeria de Fotos', 'Galeria de Fotos', 'galeria_albumes_fotos', 'banner11.jpg', 'banner10', 'Galeria de Fotos', 'Galeria de Fotos', 'Galeria de Fotos', 1, 1, 11),
(12, 'Galeria de videos', 'Galeria de videos', 'galeria_albumes_videos', 'banner12.jpg', 'banner11', 'Galeria de Videos', 'Galeria de Videos', 'Galeria de Videos', 1, 1, 12),
(13, 'Clientes', 'Clientes', 'clientes', 'banner13.jpg', 'banner13', 'Clientes', 'Clientes', 'Clientes', 1, 1, 13),
(14, 'Proyectos', 'Proyectos', 'proyectos', 'banner14.jpg', 'banner14', 'Proyectos', 'Proyectos', 'Proyectos', 1, 1, 14),
(15, 'Términos y condiciones', 'Términos y condiciones', 'terminos', 'terminos.jpg', 'terminos', 'Términos y condiciones', 'Términos y condiciones', 'Términos y condiciones', 1, 2, 15),
(16, 'Ofertas', 'Ofertas', 'oferta', 'inicio.jpg', 'Ofertas', 'Ofertas', 'Ofertas', 'Ofertas', 1, 2, 16),
(17, 'CKI', '<p>Preguntar siempre si tiene todo el producto completo, SI ATIENDE EL MISMO DIA PERO MAXIMO HASTA LAS 5:00 PM DE LO CONTRARIO NO TE ATIENDEN Y SE QUITAN.</p>\r\n', 'proveedores', NULL, 'Proveedores', 'Proveedores', 'Proveedores', 'Proveedores', 1, 1, 17),
(18, 'Servicios de Impresión', 'Servicios de Impresión', 'servicio_impresion', NULL, NULL, 'Servicios de Impresión', 'Servicios de Impresión', 'Servicios de Impresión', 1, 1, 18),
(19, 'Promociones', '<p>Comuniquese con su ejecutivo de cuenta.</p>\r\n', 'promociones', NULL, NULL, 'Promociones', 'Promociones', 'Promociones', 1, 1, 19),
(20, 'Por qué compramos', '<p>Somos importadores directos.</p>\r\n', 'porque_compramos', NULL, 'Por qué compramos', 'Por qué compramos', 'Por qué compramos', 'Por qué compramos', 1, 1, 20),
(21, 'Pedidos por Web', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', 'pedidos_web', NULL, 'Pedidos por Web', 'Pedidos por Web', 'Pedidos por Web', 'Pedidos por Web', 1, 1, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_globo` varchar(256) DEFAULT NULL,
  `texto_globo` text,
  `direccion` varchar(256) NOT NULL,
  `telefono` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `imagen` varchar(128) NOT NULL,
  `imagen_title` varchar(128) NOT NULL,
  `orden` bigint(20) DEFAULT NULL,
  `latitud_centro` varchar(50) DEFAULT NULL,
  `longitud_centro` varchar(50) DEFAULT NULL,
  `latitud_punto` varchar(50) DEFAULT NULL,
  `longitud_punto` varchar(50) DEFAULT NULL,
  `zoom` bigint(20) DEFAULT NULL,
  `tipo_mapa` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `titulo_globo`, `texto_globo`, `direccion`, `telefono`, `correo`, `titulo`, `imagen`, `imagen_title`, `orden`, `latitud_centro`, `longitud_centro`, `latitud_punto`, `longitud_punto`, `zoom`, `tipo_mapa`, `estado`) VALUES
(1, NULL, NULL, 'Sector 2 Grupo 5 Manzana M Lote 11', '2878808', 'rmariluzgonzales@gmail.com', 'Villa el Salvador', '20170309112319.jpg', '20170309112319', 1, '-12.216853106638633', '-76.9430923461914', '-12.215364109259195', '-76.94445490837097', 14, 'roadmap', 1),
(2, NULL, NULL, 'Jr Tumbes', '2885451', 'ajax@ajax.com', 'San Luis', '20170309115002.jpg', '20170309115002', 2, '-11.967874905431728', ' -77.00960321620698', '-11.967340463757552', ' -77.01067328453064', 18, 'roadmap', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `resumen` varchar(256) DEFAULT NULL,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `seo_title` varchar(150) DEFAULT NULL,
  `seo_description` varchar(150) DEFAULT NULL,
  `seo_keywords` varchar(150) DEFAULT NULL,
  `destacado` tinyint(4) NOT NULL DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `url`, `descripcion`, `resumen`, `orden`, `seo_title`, `seo_description`, `seo_keywords`, `destacado`, `estado`, `categoria_id`, `idioma_id`, `creado`, `modificado`) VALUES
(1, 'servicio 01', 'servicio01', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 1, 'titulo seo', 'Description', 'keywords seo', 0, 1, 6, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:28'),
(2, 'servicio 02', 'servicio02', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 2, 'titulo seo', 'Description', 'keywords seo', 0, 1, NULL, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:24'),
(3, 'servicio 03', 'servicio03', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 3, 'titulo seo', 'Description', 'keywords seo', 0, 1, NULL, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:25'),
(4, 'servicio 04', 'servicio04', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 4, 'titulo seo', 'Description', 'keywords seo', 0, 1, NULL, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:26'),
(5, 'servicio 05', 'servicio05', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 5, 'titulo seo', 'Description', 'keywords seo', 0, 1, NULL, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:26'),
(6, 'servicio 06', 'servicio06', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit pharetra nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis convallis lorem, ac volutpat magna.Suspendisse potenti...', 'Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti. Sed lobortis sagittis ante, ut luctus elit ph', 6, 'titulo seo', 'Description', 'keywords seo', 0, 1, NULL, 1, '2017-01-10 10:50:20', '2017-12-20 20:22:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_productos`
--

CREATE TABLE `solicitud_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `link` varchar(256) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '2',
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `producto_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_servicios`
--

CREATE TABLE `solicitud_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `telefono` varchar(256) DEFAULT NULL,
  `mensaje` text,
  `respuesta` text,
  `link` varchar(256) DEFAULT NULL,
  `empresa` varchar(128) DEFAULT NULL,
  `ruc` int(11) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `servicio_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `titulo` varchar(125) DEFAULT NULL,
  `documento` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `titulo`, `documento`) VALUES
(1, 'archivo', '20180212121614.xlsx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_atributos`
--

CREATE TABLE `stock_atributos` (
  `id` bigint(20) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `detalle_atributos_id` bigint(20) UNSIGNED NOT NULL,
  `productos_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_atributos_multiples`
--

CREATE TABLE `stock_atributos_multiples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED DEFAULT NULL,
  `atributos` varchar(128) NOT NULL,
  `precio` float UNSIGNED DEFAULT NULL,
  `precio_oferta` float UNSIGNED DEFAULT NULL,
  `atributos_nombres` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `atributo_id` int(10) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `atributos_valor` varchar(128) DEFAULT NULL,
  `proveedor_nombre` varchar(128) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock_atributos_multiples`
--

INSERT INTO `stock_atributos_multiples` (`id`, `cantidad`, `atributos`, `precio`, `precio_oferta`, `atributos_nombres`, `estado`, `atributo_id`, `producto_id`, `creado`, `modificado`, `atributos_valor`, `proveedor_nombre`, `proveedor_id`) VALUES
(62, 8055, '10', NULL, NULL, 'Plateado', 1, 1, 15, '2018-04-16 23:45:10', '2018-04-17 06:45:10', '#8a9597', 'EYF', 1),
(63, 2500, '10', NULL, NULL, 'Plateado', 1, 1, 15, '2018-04-16 23:45:10', '2018-04-17 06:45:10', '#8a9597', 'PROMOMERCH', 3),
(64, 15, '1', NULL, NULL, 'Blanco', 1, 1, 11, '2018-04-30 17:24:48', '2018-05-01 00:24:48', '#FFFFFF', 'prov1', 1),
(65, 25, '2', NULL, NULL, 'Rojo', 1, 1, 11, '2018-04-30 17:24:48', '2018-05-01 00:24:48', '#FF0000', 'prov1', 2),
(67, 3745, '1', NULL, NULL, 'Blanco', 1, 1, 12, '2018-05-15 20:51:17', '2018-05-15 21:51:17', '#FFFFFF', 'CKI', 4),
(82, 2600, '1', NULL, NULL, 'Blanco', 1, 1, 19, '2018-05-18 01:15:48', '2018-05-18 02:15:48', '#FFFFFF', 'CKI', 4),
(83, 1760, '1', NULL, NULL, 'Blanco', 1, 1, 20, '2018-05-18 01:34:54', '2018-05-18 02:34:54', '#FFFFFF', 'CHIPER', 6),
(84, 823, '1', NULL, NULL, 'Blanco', 1, 1, 21, '2018-05-18 02:15:25', '2018-05-18 03:15:25', '#FFFFFF', 'PROMOS PERU', 5),
(85, 90, '2', NULL, NULL, 'Rojo', 1, 1, 22, '2018-05-18 02:23:39', '2018-05-18 03:23:39', '#FF0000', 'CKI', 4),
(96, 1500, '1', NULL, NULL, 'Blanco', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#FFFFFF', 'CKI', 4),
(97, 1500, '3', NULL, NULL, 'Azul', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#0078D7', 'CKI', 4),
(98, 1500, '11', NULL, NULL, 'Negro', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#000000', 'CKI', 4),
(99, 1500, '17', NULL, NULL, 'Naranja', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#ff6d1f', 'CKI', 4),
(100, 1500, '18', NULL, NULL, 'Celeste', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '	#9cdfdf', 'CKI', 4),
(101, 1500, '2', NULL, NULL, 'Rojo', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#FF0000', 'CKI', 4),
(102, 1500, '14', NULL, NULL, 'Verde', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#006400', 'CKI', 4),
(103, 1500, '6', NULL, NULL, 'Amarillo', 1, 1, 2, '2018-08-01 23:01:24', '2018-08-01 23:01:24', '#F9B522', 'CKI', 4),
(113, 675, '13', NULL, NULL, 'Blanco Traslucido', 1, 1, 16, '2018-08-01 23:46:48', '2018-08-01 23:46:48', '#FFFFFF', 'CKI', 4),
(114, 903, '14', NULL, NULL, 'Verde', 1, 1, 16, '2018-08-01 23:46:48', '2018-08-01 23:46:48', '#006400', 'CKI', 4),
(115, 4970, '14', NULL, NULL, 'Verde', 1, 1, 16, '2018-08-01 23:46:48', '2018-08-01 23:46:48', '#006400', 'PROMOMERCH', 3),
(116, 1120, '18', NULL, NULL, 'Celeste', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '	#9cdfdf', 'FIDELIZARTE', 2),
(117, 3960, '14', NULL, NULL, 'Verde', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#006400', 'FIDELIZARTE', 2),
(118, 1895, '15', NULL, NULL, 'Morado', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#572364', 'FIDELIZARTE', 2),
(119, 8350, '17', NULL, NULL, 'Naranja', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#ff6d1f', 'FIDELIZARTE', 2),
(120, 9870, '1', NULL, NULL, 'Blanco', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#FFFFFF', 'FIDELIZARTE', 2),
(121, 1738, '11', NULL, NULL, 'Negro', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#000000', 'FIDELIZARTE', 2),
(122, 168, '2', NULL, NULL, 'Rojo', 1, 1, 18, '2018-08-03 21:43:13', '2018-08-03 21:43:13', '#FF0000', 'PROMOMERCH', 3),
(125, 2500, '1', NULL, NULL, 'Blanco', 1, 1, 1, '2018-08-06 19:44:42', '2018-08-06 19:44:43', '#FFFFFF', 'EYF', 1),
(126, 2500, '1', NULL, NULL, 'Blanco', 1, 1, 1, '2018-08-06 19:44:42', '2018-08-06 19:44:43', '#FFFFFF', 'FIDELIZARTE', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(10) UNSIGNED NOT NULL,
  `correo` varchar(125) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `correo`, `estado`, `creado`) VALUES
(1, 'erick@gmail.com', 2, '2018-05-07 19:46:35'),
(3, 'gloria.apaza@outlook.com', 1, '2018-08-02 04:53:37'),
(4, 'administracion@progmac.com.pe', 1, '2018-08-04 03:58:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `sumilla` varchar(255) DEFAULT NULL,
  `testimonio` text,
  `imagen` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `idioma_id` bigint(20) UNSIGNED NOT NULL,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_impresiones`
--

CREATE TABLE `tipos_impresiones` (
  `id` int(11) NOT NULL,
  `tipo_impresion` varchar(125) DEFAULT NULL,
  `imagen` varchar(64) DEFAULT NULL,
  `descripcion` text,
  `creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_impresiones`
--

INSERT INTO `tipos_impresiones` (`id`, `tipo_impresion`, `imagen`, `descripcion`, `creado`, `modificado`) VALUES
(1, 'Serigrafía', '20180504085836.JPG', 'Impresión a colores en superficies planas. La impresión se hace color por color no permite degrades. Productos que se pueden imprimir son libretas, alcancias planas, bolsas, porta retratos, resaltador entre otras superficies planas.', '2018-04-28 17:25:48', '2018-05-04 15:58:37'),
(2, 'Tampografía', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(3, 'Laser', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(4, 'Pantografia', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(5, 'Bordado', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(6, 'Estampado', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(7, 'Resinado', NULL, NULL, '2018-04-28 17:25:48', '2018-04-28 17:25:48'),
(8, 'Prueba', '20180503185041.jpeg', 'puq pwq wp', '2018-05-03 18:50:41', '2018-05-04 01:50:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_banners`
--

CREATE TABLE `tipo_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(64) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_banners`
--

INSERT INTO `tipo_banners` (`id`, `nombre_tipo`, `estado`) VALUES
(1, 'general', 1),
(2, 'pagina', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_categorias`
--

CREATE TABLE `tipo_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_categorias`
--

INSERT INTO `tipo_categorias` (`id`, `nombre`, `estado`) VALUES
(1, 'productos', 1),
(2, 'servicios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `usuario` varchar(128) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  `nivel_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `estado`, `activo`, `nivel_id`) VALUES
(1, 'Administrador', 'admin', '$2y$10$EkmWRqZT8CJw80n3YSFQD.zf1muVABiX4Wqc4VoeEZJYN9O6wIxc2', 1, 1, 1),
(4, 'Vendedor uno', 'vendedor1', '$2y$10$M0MQDOFKzDblSzRLK08RnuV0cJ7Ho175s.TfxsRamzUvmdUMv48ya', 1, 1, 3),
(5, 'Almendra', 'Ejecutivo Ventas 1', '$2y$10$mAXReebvTzJpgyt99ClFfOOoN0C8vCG0bkWwp.60s6cOAHgSSJ0TS', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `codigo_video` varchar(128) DEFAULT NULL,
  `video_title` varchar(128) DEFAULT NULL,
  `descripcion` text,
  `orden` bigint(20) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT '0',
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `ruta_amazon` varchar(256) DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `idioma_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albumes_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albumes_idiomas2_idx` (`idioma_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banners_tipo_banners1_idx` (`tipo_banner_id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carro_clientes1_idx` (`cliente_id`);

--
-- Indices de la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carro_detalle_productos1_idx` (`producto_id`),
  ADD KEY `fk_carro_detalle_carro1_idx` (`carrito_id`);

--
-- Indices de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`,`destacado`),
  ADD KEY `fk_categorias_categorias1_idx` (`padre_id`),
  ADD KEY `fk_categorias_tipo_categorias1_idx` (`tipo_categoria_id`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_categorias_productos_productos1_idx` (`producto_id`),
  ADD KEY `fk_categorias_productos_categorias1_idx` (`categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes_idiomas1_idx` (`idioma_id`),
  ADD KEY `fk_clientes_estados1_idx` (`estado_id`);

--
-- Indices de la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_clientes_web_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentarios_idiomas1_idx` (`idioma_id`),
  ADD KEY `fk_comentarios_articulos1_idx` (`articulo_id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_atributos_atributos1_idx` (`atributo_id`);

--
-- Indices de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_cotizacion_productos1_idx` (`producto_id`),
  ADD KEY `fk_detalle_cotizacion_cotizaciones1_idx` (`cotizacion_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`ubigeo`),
  ADD KEY `fk_estados_paises1_idx` (`pais_id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_albumes1_idx` (`album_id`),
  ADD KEY `fk_fotos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_proyecto_galerias_proyecto1_idx` (`galeria_proyecto_id`),
  ADD KEY `fk_fotos_proyecto_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_proyectos_proyectos1_idx` (`proyecto_id`),
  ADD KEY `fk_galeria_proyectos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_articulos_articulos1_idx` (`articulo_id`);

--
-- Indices de la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galerias_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galeria_servicios_servicios1_idx` (`servicios_id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresion_producto`
--
ALTER TABLE `impresion_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_frecuentes_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categorias1_idx` (`categoria_id`);

--
-- Indices de la tabla `productos_atributos`
--
ALTER TABLE `productos_atributos`
  ADD PRIMARY KEY (`productos_id`,`atributos_multiples_id`),
  ADD KEY `fk_productos_has_stock_atributos_multiples_stock_atributos__idx` (`atributos_multiples_id`),
  ADD KEY `fk_productos_has_stock_atributos_multiples_productos1_idx` (`productos_id`);

--
-- Indices de la tabla `producto_intervalos`
--
ALTER TABLE `producto_intervalos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyectos_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_servicios_categorias1_idx` (`categoria_id`),
  ADD KEY `fk_servicios_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitud_productos_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitud_informacion_idiomas1_idx` (`idioma_id`),
  ADD KEY `fk_solicitud_informacion_servicios1_idx` (`servicio_id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_atributos_detalle_atributos1_idx` (`detalle_atributos_id`),
  ADD KEY `fk_stock_atributos_productos1_idx` (`productos_id`);

--
-- Indices de la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_detalle_atributo_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Testimonios_idiomas1_idx` (`idioma_id`);

--
-- Indices de la tabla `tipos_impresiones`
--
ALTER TABLE `tipos_impresiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_banners`
--
ALTER TABLE `tipo_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_categorias`
--
ALTER TABLE `tipo_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_usuarios_niveles1_idx` (`nivel_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_albumes1_idx` (`album_id`),
  ADD KEY `fk_videos_idiomas1_idx` (`idioma_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `impresion_producto`
--
ALTER TABLE `impresion_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto_intervalos`
--
ALTER TABLE `producto_intervalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_impresiones`
--
ALTER TABLE `tipos_impresiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_banners`
--
ALTER TABLE `tipo_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_categorias`
--
ALTER TABLE `tipo_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes_fotos`
--
ALTER TABLE `albumes_fotos`
  ADD CONSTRAINT `fk_albumes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `albumes_videos`
--
ALTER TABLE `albumes_videos`
  ADD CONSTRAINT `fk_albumes_idiomas2` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `fk_banners_tipo_banners1` FOREIGN KEY (`tipo_banner_id`) REFERENCES `tipo_banners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_carro_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carro_detalle`
--
ALTER TABLE `carro_detalle`
  ADD CONSTRAINT `fk_carro_detalle_carro1` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carro_detalle_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_categorias1` FOREIGN KEY (`padre_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_tipo_categorias1` FOREIGN KEY (`tipo_categoria_id`) REFERENCES `tipo_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD CONSTRAINT `fk_categorias_productos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categorias_productos_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clientes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes_web`
--
ALTER TABLE `clientes_web`
  ADD CONSTRAINT `fk_clientes_web_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_articulos1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_atributos`
--
ALTER TABLE `detalle_atributos`
  ADD CONSTRAINT `fk_detalle_atributos_atributos1` FOREIGN KEY (`atributo_id`) REFERENCES `atributos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD CONSTRAINT `fk_detalle_cotizacion_cotizaciones1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_cotizacion_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_estados_paises1` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_albumes1` FOREIGN KEY (`album_id`) REFERENCES `albumes_fotos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fotos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos_proyecto`
--
ALTER TABLE `fotos_proyecto`
  ADD CONSTRAINT `fk_fotos_proyecto_galerias_proyecto1` FOREIGN KEY (`galeria_proyecto_id`) REFERENCES `galerias_proyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fotos_proyecto_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galerias_proyecto`
--
ALTER TABLE `galerias_proyecto`
  ADD CONSTRAINT `fk_galeria_proyectos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_galeria_proyectos_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_articulos`
--
ALTER TABLE `galeria_articulos`
  ADD CONSTRAINT `fk_galeria_articulos_articulos1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_productos`
--
ALTER TABLE `galeria_productos`
  ADD CONSTRAINT `fk_galerias_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria_servicios`
--
ALTER TABLE `galeria_servicios`
  ADD CONSTRAINT `fk_galeria_servicios_servicios1` FOREIGN KEY (`servicios_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD CONSTRAINT `fk_preguntas_frecuentes_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_atributos`
--
ALTER TABLE `productos_atributos`
  ADD CONSTRAINT `fk_productos_has_stock_atributos_multiples_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_stock_atributos_multiples_stock_atributos_mu1` FOREIGN KEY (`atributos_multiples_id`) REFERENCES `stock_atributos_multiples` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyectos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_servicios_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_productos`
--
ALTER TABLE `solicitud_productos`
  ADD CONSTRAINT `fk_solicitud_productos_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_servicios`
--
ALTER TABLE `solicitud_servicios`
  ADD CONSTRAINT `fk_solicitud_informacion_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_informacion_servicios1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_atributos`
--
ALTER TABLE `stock_atributos`
  ADD CONSTRAINT `fk_stock_atributos_detalle_atributos1` FOREIGN KEY (`detalle_atributos_id`) REFERENCES `detalle_atributos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_atributos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock_atributos_multiples`
--
ALTER TABLE `stock_atributos_multiples`
  ADD CONSTRAINT `fk_stock_detalle_atributo_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD CONSTRAINT `fk_Testimonios_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_niveles1` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_albumes1` FOREIGN KEY (`album_id`) REFERENCES `albumes_videos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videos_idiomas1` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
