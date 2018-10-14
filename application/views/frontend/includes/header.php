<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<!--FACEBOOK SHARING-->
		<?php if (isset($seo_fb)): ?>
		<meta property="og:url"                content="<?=base_url().$this->uri->uri_string ?>" />
		<meta property="og:type"               content="<?=( ! empty($seo_fb['type']) ? $seo_fb['type'] : '')?>" />
		<meta property="og:title"              content="<?=( ! empty($seo_fb['seo_title']) ? $seo_fb['seo_title'] : '')?>" />
		<meta property="og:description"        content="<?=( ! empty($seo_fb['seo_description']) ? $seo_fb['seo_description'] : '')?>" />
		<meta property="og:image"              content="<?=( ! empty($seo_fb['imagen']) ? $seo_fb['imagen'] : '')?>" />
		<meta property='og:site_name' content='D&L'/>
		<?php endif ?>
		<!--FACEBOOK SHARING-->
		<meta name='format-detection' content='telephone=no'>
		<meta name="description" content="<?=( ! empty($seo['seo_description']) ? $seo['seo_description'] : '')?>">
		<meta name="author" content="AjaxPeru">
		<meta name="keywords" content="<?=( ! empty($seo['seo_keywords']) ? $seo['seo_keywords'] : '')?>">
		<meta name="robots" content="all">
		<title><?=( ! empty($seo['seo_title']) ? $seo['seo_title'] : '')?></title>
		<base href='<?= BASE_URL ?>'>
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
		<!-- Customizable CSS -->
		<link rel="stylesheet" href="assets/frontend/css/main.css">
		<link rel="stylesheet" href="assets/frontend/css/green.css">
		
		<link rel="stylesheet" href="assets/frontend/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/frontend/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/frontend/css/owl.theme.css">-->
		<link href="assets/frontend/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/frontend/css/animate.min.css">
		<link rel="stylesheet" href="assets/frontend/css/rateit.css">
		<link rel="stylesheet" href="assets/frontend/css/bootstrap-select.min.css">
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
		<!-- Fonts --> 
		<link href='https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i' rel='stylesheet' type='text/css'>
		<!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'> -->
		<link rel="stylesheet" href="assets/frontend/css/custom.css">
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/frontend/images/favicon.ico">
		<link rel="stylesheet" href="assets/frontend/plugins/sweetalert/css/sweetalert.css">
		<script src="assets/frontend/js/jquery-1.11.1.min.js"></script>
	</head>
	<body class="cnt-home">
		<header class="header-style-1 header-style-3">
			<div class="top-bar animate-dropdown">
				<div class="container">
					<div class="header-top-inner">
						<div class="cnt-account pull-left">
							<ul class="list-unstyled">
								<li>
									<i class="icon fa fa-phone"></i> RPM: <?=dataConfig('telefono_rpm')?>
								</li>
								<li>
									<i class="icon fa fa-phone"></i> <?=dataConfig('telefono_rpc')?>
								</li>
							</ul>
						</div>
						<div class="cnt-account pull-right">
							<ul class="list-unstyled">
								<?= getLogueado(); ?>
								<li class="head-rs">
									<a><i class="fa fa-facebook" aria-hidden="true"></i></a>
									<a><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<a><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								</li>
							</ul>
						</div>
						<!-- /.cnt-account -->
						<div class="clearfix"></div>
					</div>
					<!-- /.header-top-inner -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.header-top -->
			<div class="main-header">
				<div class="container">
					<div class="row head-informacion">
						<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
							<div class="logo">
								<a href="./">
								<img src="assets/frontend/images/logo.png" alt="" class="img-responsive">
								</a>
							</div>
							<!-- /.logo -->
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-4">
									<div class="block-head">
										<div class="info-icons col-xs-4">
											<i class="fa fa-whatsapp fa-3" aria-hidden="true"></i>
										</div>
										<div class="col-xs-8">
											<span class="subtitulo">Whatsapp</span>
											<span><?=dataConfig('telefono_whatsapp')?></span>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="block-head">
										<div class="info-icons col-xs-4">
											<i class="fa fa-phone fa-3" aria-hidden="true"></i>
										</div>
										<div class="col-xs-8">
											<span class="subtitulo">Llámanos</span>
											<span><?=dataConfig('telefono')?></span>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-5">
									<div class="block-head">
										<div class="info-icons col-xs-4">
											<i class="fa fa-envelope-o fa-3" aria-hidden="true"></i>
										</div>
										<div class="col-xs-8">
											<span class="subtitulo">Email</span>
											<span><?=dataConfig('correo')?></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-3">
									<div class="block-head">
										<span class="subtitulo">Horario de Atención</span>
										<span><?=dataConfig('horario1')?></span><br>
										<span><?=dataConfig('horario2')?></span>
									</div>
								</div>
							</div>
						</div>
						
						<!-- /.top-search-holder -->
						<div class="col-md-2">
							<img src="assets/frontend/img/express.jpg" alt="Express" class="img-responsive">
							<h4><strong>Envios GRATIS!<br> en Lima</strong></h4>
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.main-header -->
			<?php $this->load->view("frontend/includes/menu", array()); ?>
		</header>