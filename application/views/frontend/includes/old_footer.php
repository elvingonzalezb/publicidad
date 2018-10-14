	<!-- Footer -->
	<footer class="tm-footer">
		<div class="container">
			<div class="row">
				<div class="footer-logo">
					<img alt="logo" src="<?=base_url('assets/frontend/img/logo.png')?>">
					<p class="logo-caption"><?=dataConfig('texto_pie'); ?></p>
				</div>
				<div class="col-sm-4">
					<div class="footer-widget opening-hours">
						<h4 class="footer-heading">HORARIO DE ATENCIÓN</h4>
						<ul>
							<li><?=dataConfig('horario1')?></li>
							<li><?=dataConfig('horario2')?></li>
						</ul>
						<p><?=dataConfig('texto_horario')?></p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="footer-widget latest-news">
						<h4 class="footer-heading">ENLACES DIRECTOS</h4>
						<ul class="link-menu">
							<?php $this->load->view("frontend/includes/menu", array()); ?>
							<li><a href="terminos-y-condiciones">Términos y condiciones</a></li>
						</ul>
					</div>
				</div>
				<!-- <div class="col-sm-3">
					<div class="footer-widget twitter-feeds">
						<h4 class="footer-heading">SERVICIOS</h4>
						<ul>
							<?php //$servicios = getServicios(); ?>
							<?php //foreach ($servicios as $sKey => $sValor): ?>
							<li>
								<a href="servicios/<? //=$sValor['url'].'-'.$sValor['id']?>"><? //=$sValor['nombre']?></a>
							</li>	
							<?php //endforeach ?>
						</ul>
					</div>
				</div> -->
				<div class="col-sm-4">
					<div class="contact-info">
						<h4 class="footer-heading">CONTÁCTENOS</h4>
						<ul>
							<li><span><?=dataConfig('direccion'); ?></span> </li>
							<li><span><?=dataConfig('telefono'); ?> / <?=dataConfig('telefono2'); ?></span></li>
							<li><span><?=dataConfig('correo'); ?></span></li>
						</ul>
					</div>
					<div class="footer-widget social-links">
						<h4 class="footer-heading">SIGUENOS</h4>
						<ul>
							<?php if (dataConfig('enlace_facebook') !== ''): ?>
							<li>
								<a target="_blank" href="<?=dataConfig('enlace_facebook')?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
							</li>	
							<?php endif ?>
							<?php if (dataConfig('enlace_twitter') !== ''): ?>
							<li>
								<a target="_blank" href="<?=dataConfig('enlace_twitter')?>"><i aria-hidden="true" class="fa fa-twitter"></i></a>
							</li>	
							<?php endif ?>
							<?php if (dataConfig('enlace_google_plus') !== ''): ?>
							<li>
								<a target="_blank" href="<?=dataConfig('enlace_google_plus')?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
							</li>	
							<?php endif ?>
							<?php if (dataConfig('enlace_instagram') !== ''): ?>
							<li>
								<a target="_blank" href="<?=dataConfig('enlace_instagram')?>"><i aria-hidden="true" class="fa fa-instagram"></i></a>
							</li>	
							<?php endif ?>
							<?php if (dataConfig('enlace_pinterest') !== ''): ?>
							<li>
								<a target="_blank" href="<?=dataConfig('enlace_pinterest')?>"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a>
							</li>	
							<?php endif ?>
						</ul>
					</div>
				</div>
				<div class='clearfix'></div>
			</div>
		</div>
		<div class="copyright-bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<p class="pull-left"><?=dataConfig('pie_pagina')?></p> <p class="pull-right">TODOS LOS DERECHOS RESERVADOS</p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- /Footer -->
	<!-- Scripts -->
	
	<script src="assets/frontend/js/bootstrap.min.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/jquery.flexslider.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/datepicker.min.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/owl.carousel.min.js" type="text/javascript">
	</script>
	<script src="assets/frontend/js/imagesloaded.pkgd.min.js" type="text/javascript">
	</script>
	<script src="assets/frontend/js/jquery.filterizr.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/modernizr.custom.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/jquery.dlmenu.js" type="text/javascript">
	</script> 
	<script src="assets/frontend/js/bullseye.js" type="text/javascript">
	</script> 
	<?php if (isset($scriptMapa)): ?>
		<!--AIzaSyCwLMvFNtlNXc-CkL8Oz7PEZAiKz8Li7LE-->
		<!--AIzaSyAM0jAl7rekbDw_0oRb6W-rZZKLD0e8Idk-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwLMvFNtlNXc-CkL8Oz7PEZAiKz8Li7LE" type="text/javascript">
	</script> 	
	<?php endif ?>
	<?php if (isset($scriptlightslider)): ?>
		<link type="text/css" rel="stylesheet" href="assets/frontend/css/lightslider.css" />
		<script src="assets/frontend/js/lightslider.js"></script>
	<?php endif ?>
	<?php if (isset($scriptFancy)): ?>
	<link type="text/css" rel="stylesheet" href="assets/frontend/css/jquery.fancybox.min.css" />
	<script src="assets/frontend/js/jquery.fancybox.min.js"></script>
	<?php endif ?>
	

	<script src="assets/frontend/js/custom.js" type="text/javascript">
	</script>

	<!--Nuestras validaciones y funciones-->
	<script src="assets/frontend/js/jquery.validate.min.js"></script>
	<script src="assets/frontend/js/frontend-script.js"></script>
	<!--<script src="assets/frontend/js/validation.js"></script>-->

	<!-- SWEETALERT.JS -->
	<script src="assets/frontend/plugins/sweetalert/js/sweetalert.min.js"></script>
</body>
</html>