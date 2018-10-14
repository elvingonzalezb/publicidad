<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="utf-8">
	<base href="<?= BASE_URL ?>">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="<?=( ! empty($seo['seo_description']) ? $seo['seo_description'] : '')?>" name="description">
	<meta content="<?=( ! empty($seo['seo_keywords']) ? $seo['seo_keywords'] : '')?>" name="keywords">
	<meta content="" name="author">
	<title><?=( ! empty($seo['seo_title']) ? $seo['seo_title'] : '')?></title><!-- Custom Styling -->

	<!--FACEBOOK SHARING-->
	<?php if (isset($seo_fb)): ?>
	<meta property="og:url"                content="<?=base_url().$this->uri->uri_string ?>" />
	<meta property="og:type"               content="<?=( ! empty($seo_fb['type']) ? $seo_fb['type'] : '')?>" />
	<meta property="og:title"              content="<?=( ! empty($seo_fb['seo_title']) ? $seo_fb['seo_title'] : '')?>" />
	<meta property="og:description"        content="<?=( ! empty($seo_fb['seo_description']) ? $seo_fb['seo_description'] : '')?>" />
	<meta property="og:image"              content="<?=( ! empty($seo_fb['imagen']) ? $seo_fb['imagen'] : '')?>" />	
	<?php endif ?>
	
	<!--FACEBOOK SHARING-->

	<link href="assets/frontend/css/style.css" rel="stylesheet" type="text/css"><!-- Responsive Stylesheet -->
	<link href="assets/frontend/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="assets/frontend/css/flexslider.css" rel="stylesheet" type="text/css">
	<link href="assets/frontend/css/datepicker.css" rel="stylesheet" type="text/css">
	<link href="assets/frontend/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
	<link href="assets/frontend/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
	<link href="assets/frontend/css/component.css" rel="stylesheet" type="text/css">
	<!--custom-->
	<link href="assets/frontend/css/custom.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/frontend/plugins/sweetalert/css/sweetalert.css">

	<script src="assets/frontend/js/jquery.js" type="text/javascript">
	</script> 
</head>
<body>
	<div id='backTop'>
		<i aria-hidden="true" class="fa fa-arrow-up"></i>
	</div><!-- Header -->
	<header>
		<!-- Topbar -->
		<div class="topbar" id="topbar-login">
			<div class="container">
				<ul>
					<?= getLogueado(); ?>
				</ul>
				
			</div>
		</div>
		<div class="topbar">
			<div class="container">
				<div class="t-links">
					<a href=""><i class="fa fa-phone" aria-hidden="true"></i> <?=dataConfig('telefono')?></a> <a href=""><i class="fa fa-envelope" aria-hidden="true"></i> <?=dataConfig('correo'); ?></a>
				</div>
				<div class="t-options">
					<?php //getLogueado()?>
					<div class="icons_t" id="carritoProducts">
						<span class="icon-cart"></span>
						<div class="cart-drop" id="cart-items">
							<?= getItemsCarrito(); ?>
						</div>
					</div>
					<div class="icons_t">
						<span class="fa fa-search"></span>
						<div class="search-box">
							<form id="myFormSearch" action="frontend/productos/resultado" method="get">
								<input class="form-control" name="search" placeholder="Search..." type="text">
								<!--<a class="search-button" onclick="document.getElementById('myFormSearch').submit();"></a>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /Topbar -->
		<!-- Info Section -->
		<div class="topinfo">
			<div class="container">
				<div class="row">
					<!-- Information -->
					<div class="col-sm-7 col-lg-8 col-md-8 col-xs-12">
						<div class="c_info">
							<!-- Contact Number -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="c_contact">
									<span class="icon-map"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
									<div class="detail">
										<span class="subtitle"><strong><?= dataConfig('direccion') ?></strong></span>
									</div>
								</div>
							</div><!-- /Contact Number -->
							<!-- Email Info -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="c_contact">
									<span class="icon-clock-o"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
									<div class="detail">
										<span class="subtitle"><strong><?= dataConfig('horario_head') ?></strong></span>
									</div>
								</div>
							</div><!-- /Email Info -->
						</div>
					</div><!-- /Information -->
					<!-- Social Links -->
					<div class="tm_top_social">
						<?php if (dataConfig('enlace_facebook') !== ''): ?>
							<a target="_blank" href="<?=dataConfig('enlace_facebook')?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
						<?php endif ?>
						<?php if (dataConfig('enlace_twitter') !== ''): ?>
							<a target="_blank" href="<?=dataConfig('enlace_twitter')?>"><i aria-hidden="true" class="fa fa-twitter"></i></a>	
						<?php endif ?>
						<?php if (dataConfig('enlace_google_plus') !== ''): ?>
							<a target="_blank" href="<?=dataConfig('enlace_google_plus')?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>	
						<?php endif ?>
						<?php if (dataConfig('enlace_instagram') !== ''): ?>
							<a target="_blank" href="<?=dataConfig('enlace_instagram')?>"><i aria-hidden="true" class="fa fa-instagram"></i></a>	
						<?php endif ?>
						<?php if (dataConfig('enlace_pinterest') !== ''): ?>
							<a target="_blank" href="<?=dataConfig('enlace_pinterest')?>"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a>	
						<?php endif ?><!-- 
						<a href="#"><span class="icon-facebook"></span></a>
						<a href="#"><span class="icon-twitter-logo"></span></a>
						<a href="#"><span class="icon-instagram"></span></a>
						<a href="#"><span class="icon-pinterest"></span></a>
						<a href="#"><span class="icon-google-plus"></span></a> -->
					</div><!-- /Social Links -->
				</div>
			</div>
		</div><!-- /Info Section -->
		<!-- Menu Bar -->
		<div class="tm-main-menu">
			<div class="container">
				<!-- Logo -->
				<a class="logo-top" href="./"><img alt="Logo" src="<?=base_url('assets/frontend/img/logo.png')?>"></a> <!-- /Logo -->
				<!-- Menu -->
				<div class="nav-wrapper">
					<ul>
						<?php $this->load->view("frontend/includes/menu", array()); ?>
					</ul>
				</div><!-- /Menu -->
			</div>
		</div><!-- /Menu Bar -->
		<!-- Mobile Menu -->
		<div class="dl-menuwrapper" id="dl-menu">
			<button class="dl-trigger">Open Menu</button>
			<ul class="dl-menu">
				<?php $this->load->view("frontend/includes/menu", array()); ?>
			</ul>
		</div><!-- /dl-menuwrapper -->
		<!-- /Mobile Menu -->
	</header><!-- /Header -->