<footer id="footer" class="footer color-bg">
	<div class="footer-bottom inner-bottom-sm">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<!-- <div class="outer-bottom-xs">
						<img src="assets/frontend/images/logo-footer.png" class="img-responsive">
					</div> -->
					<div class="module-heading outer-bottom-xs">
						<h4 class="module-title">contáctanos</h4>
					</div>
					<div class="module-body">

						<ul class="toggle-footer" style="">
							<li class="media">
								<div class="media-body">
									<p class="about-us"><?=dataConfig('direccion')?></p>
								</div>
								<div class="media-body">
									<p class="about-us">Teléfono: <?=dataConfig('telefono')?></p>
								</div>
								<div class="media-body">
									<p class="about-us">Email: <a class="foot-email" href="mailto:<?=dataConfig('correo')?>"><?=dataConfig('correo')?></a></p>
								</div>
								<div class="media-social">
									<a href="" target="_blank"><i class="fa fa-facebook"></i></a>
									<a href="" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="" target="_blank"><i class="fa fa-linkedin"></i></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="module-heading outer-bottom-xs">
						<h4 class="module-title">Categorías</h4>
					</div>
					<div class="module-body">
						<?php //$menu_categoria = getFrontCatFooter(); ?>
						<ul class='list-unstyled'>
							<?php //foreach ($menu_categoria as $mc_key => $mc_value): ?>
							<li class="li-cat"><a href="productos/<?//=$mc_value['url'].'-'.$mc_value['id']?>"><?//=$mc_value['nombre']?></a></li>
							<?php //endforeach ?>
						</ul>
					</div>
				</div> -->
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="module-heading outer-bottom-xs">
						<h4 class="module-title">Menú</h4>
					</div>
					<div class="module-body">
						<ul class='list-unstyled'>
							<li><a href="./">Inicio</a></li>
							<li><a href="empresa">La Empresa</a></li>
							<li><a href="promociones">Promociones</a></li>
							<li><a href="productos">Productos</a></li>
							<li><a href="catalogos">Catalogos</a></li>
							<li><a href="servicio-de-impresion">Servicio de Impresión</a></li>
							<li><a href="ofertas">Ofertas</a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="module-heading outer-bottom-xs">
						<h4 class="module-title">Información</h4>
					</div>
					<div class="module-body">
						<ul class='list-unstyled'>
							<li><a href="empresa">A cerca de Nosotros</a></li>
							<li><a href="por-que-compramos">¿Por qué compranos?</a></li>
							<li><a href="mapa-de-sitio">Mapa de Sitio</a></li>
							<!-- <li><a href="boletin">Boletín</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-bar">
		<div class="container">
			<div class="col-xs-12 col-sm-6 no-padding">
				<div class="copyright"><?=dataConfig('pie_pagina')?></div>
			</div>
			<div class="col-xs-12 col-sm-6 no-padding">
				<div class="clearfix payment-methods">
					<div class="copyright">Desarrollado por <a href="http://www.ajaxperu.com/" target="_blank">Ajax Perú</a></div>
				</div>
				<!-- /.payment-methods -->
			</div>
		</div>
	</div>
</footer>

<!-- <div id="carritoFloat">
	<?//=getItemsCarrito()?>
</div> -->

<!-- Google Map Javascript Codes -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR5cmH902qtdgCfRkTDQTItWr7nMLKpzI"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTuazTT4ftRrTOscHQYPabgJPLiBS9YXc"></script>-->
<script src="assets/frontend/js/bootstrap.min.js"></script>
<script src="assets/frontend/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/frontend/js/owl.carousel.min.js"></script>
<script src="assets/frontend/js/echo.min.js"></script>
<script src="assets/frontend/js/jquery.easing-1.3.min.js"></script>
<script src="assets/frontend/js/bootstrap-slider.min.js"></script>
<script src="assets/frontend/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/frontend/js/lightbox.min.js"></script>
<script src="assets/frontend/js/bootstrap-select.min.js"></script>
<script src="assets/frontend/js/wow.min.js"></script>
<script src="assets/frontend/plugins/elevatezoom/jquery.elevatezoom.js"></script>
<script src="assets/frontend/js/scripts.js"></script>
<?php if (isset($scriptFancy)): ?>
	<link type="text/css" rel="stylesheet" href="assets/frontend/css/jquery.fancybox.min.css" />
	<script src="assets/frontend/js/jquery.fancybox.min.js"></script>
<?php endif ?>
<!-- SWEETALERT.JS -->
<script src="assets/frontend/js/jquery.validate.min.js"></script>
<script src="assets/frontend/plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="assets/frontend/js/validation.js"></script>
<!-- <script src="assets/frontend/plugins/is/is.min.js"></script> -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b6a0fbadf040c3e9e0c6281/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>