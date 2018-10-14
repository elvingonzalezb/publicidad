<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Inicio</a></li>
				<li class='active'>Detalle del Articulo</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-padding-bd">
	<div class="container-fluid">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-2" id="carritoFloat">
                	<?=getItemsCarrito()?>
           		</div>
				<div class="col-md-7">
					<div class="blog-post wow fadeInUp">
						<img class="img-responsive" src="files/articulos/<?=$dataset['imagen']; ?>" alt="">
						<h1><?= $dataset['nombre'] ?></h1>
						<span class="author"><?=$dataset['autor']?></span>
						<?php $comentario=(($dataset['num_comentarios']<>1) ? 'comentarios':'comentario') ?>
						<span class="review"><?=$dataset['num_comentarios']?> <?= $comentario?></span>
						<span class="date-time"><?=date_format(date_create($dataset['creado']), 'Y-m-d')?></span>
						<p><?=$dataset['descripcion']?></p>
						<div class="social-media">
							<span>Compartir post:</span>
							<ul class="list-inline">
								<li><a href="<?=CompartirRedes('facebook',$articulo['url_share']);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?=CompartirRedes('twitter',$articulo['url_share']);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?= dataConfig('enlace_youtube') ?>"><i class="fa fa-youtube"></i></a></li>
								<li><a href="<?=CompartirRedes('google+',$articulo['url_share']);?>" target="_blank"><i class="fa fa-google"></i></a></li>
								<li><a href="<?= dataConfig('enlace_instagram') ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a href="<?=CompartirRedes('pinterest',$articulo['url_share']);?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>
					<hr>
					<?php if($dataset['num_comentarios']!=0) {?>
					<!-- Traemos los comentarios si hay comentario -->
					<div class="blog-review wow fadeInUp">
						<div class="row">
							<div class="col-md-12">
								<h3 class="title-review-comments"><?=$dataset['num_comentarios']?> <?= $comentario?></h3>
							</div>
							<?php foreach ($dataset['comentarios'] as $key => $value_comentario) {  ?>
							<div class="col-md-2 col-sm-2">
								<!-- imagen de la persona que realiza comentario -->
								<img src="<?=base_url('assets/frontend/images/blog-post/c1.jpg')?>" alt="Responsive image" class="img-rounded img-responsive">
							</div>
							<!-- operacion ternaria para decidir el estilo segun la platilla cuando hay respuesta del admin se dara otro estilo -->
							<?php $class_comments = (!empty($value_comentario['respuesta']) ? 'col-md-10 col-sm-10 blog-comments outer-bottom-xs': 'col-md-10 col-sm-10') ?>
							<div class="<?=$class_comments?>">
								<?php if(!empty($value_comentario['respuesta'])){?>
								<div class="blog-comments inner-bottom-xs">
									<h4><?=$value_comentario['nombre']?></h4>
									<span class="review-action pull-right">
										<p><?=date_format(date_create($value_comentario['creado']), 'd-m-Y')?></p>
									</span>
									<p><?=$value_comentario['comentario']?><</p>
								</div>
								<div class="blog-comments-responce outer-top-xs">
									<div class="row">
										<div class="col-md-2 col-sm-2">
											<img src="<?=base_url('assets/frontend/images/blog-post/c1.jpg')?>" alt="Responsive image" class="img-rounded img-responsive">
										</div>
										<div class="col-md-10 col-sm-10 outer-bottom-xs">
											<div class="">
												<h4><?=$value_comentario['autor_respuesta']?></h4>
												<span class="review-action pull-right">
													<p><?=date_format(date_create($value_comentario['modificado']), 'd-m-Y')?></p>
												</span>
												<p><?=$value_comentario['respuesta']?></p>
											</div>
										</div>
									</div>
								</div>
								<?php }else{?>
								<!-- no hay respuesta se traen solo ciertos datos -->
								<div class="blog-comments inner-bottom-xs outer-bottom-xs">
									<h4><?=$value_comentario['nombre']?></h4>
									<span class="review-action pull-right">
										<p><?=date_format(date_create($value_comentario['creado']), 'd-m-Y')?></p>
									</span>
									<p><?=$value_comentario['comentario']?></p>
								</div>
								<?php }?>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php } else {?>
					<div class="blog-review wow fadeInUp">
						<div class="row">
							<div class="col-md-12">
								<h3 class="title-review-comments"><?=$dataset['num_comentarios']?> <?= $comentario?></h3>
							</div>
						</div>
					</div>
					<hr>
					<?php }?>		
					<div class="blog-write-comment m-t-20">
						<div class="row">
							<div class="col-md-12">
								<h4>Dejar un comentario</h4>
							</div>
							<?= validation_errors() ?>
							<?=$this->session->flashdata('message')?>
							<form class="register-form" role="form" action="frontend/articulos/enviarComentario" method="post" enctype="multipart/form-data" id="formArticulo">
								<div class="col-md-4">
									<div class="form-group">
										<label class="info-title" for="exampleInputName"> Nombre <span>*</span></label>
										<input type="text" name="nombre" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Nombre" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="info-title" for="exampleInputEmail1">Dirección de email<span>*</span></label>
										<input type="email" class="form-control unicase-form-control text-input" name="correo" id="exampleInputEmail1" placeholder="Correo">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="info-title" for="exampleInputComments">Comentario <span>*</span></label>
										<textarea class="form-control unicase-form-control" name="comentario" id="exampleInputComments"></textarea>
									</div>
								</div>
								<div>
									<input type="hidden" name="idioma_id" value="1">
									<input type="hidden" name="articulo_id" id="idArt<?=$dataset['id']?>" value="<?=$dataset['id']?>">
									<input type="hidden" name="url" value="<?=$dataset['url']?>">
								</div>
								<div class="col-md-12 outer-bottom-small m-t-20">
									<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Enviar comentario</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3 sidebar top-articulos">
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small"></div>
						<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
							<div class="more-info-tab clearfix ">
								<h3 class="new-product-title pull-left">Articulos Recientes</h3>
							</div>
							<div class="tab-content outer-top-xs">
								<div class="tab-pane in active" id="all">
									<div class="product-slider">
										{recientes}
										<div class="item item-carousel space-services">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image front-img">
															<a href="articulos/{url}-{id}"><img class="img-responsive" src="files/articulos/{imagen}" data-echo="files/articulos/{imagen}" alt="{nombre}"></a>
														</div>
													</div>
													<div class="product-info text-center">
														<h3 class="name"><a href="articulos/{url}-{id}">{nombre}</a></h3>
														<div class="description"></div>
													</div>
													<div class="cart clearfix text-center">
														<a class="btn btn-primary btn-detalle" href="articulos/{url}-{id}">VER DETALLE</a>
													</div>
												</div>
											</div>
										</div>
										{/recientes}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	function dias_transcurridos($fecha,$fecha_f)
	{
		$fecha_i = date_format(date_create($fecha), 'Y-m-d');
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return $dias;
	}
	?>