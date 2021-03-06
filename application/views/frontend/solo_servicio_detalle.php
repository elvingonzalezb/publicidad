<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Inicio</a></li>
				<li class='active'>Detalle del servicio</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
						<img class="img-responsive" src="files/solo_servicios/<?=$dataset_por_id['imagen']; ?>" alt="">
						<h1><?=$dataset_por_id['nombre']?></h1>
						<p><?=$dataset_por_id['descripcion']?></p>
					</div>

					<div class="col-md-12 contact-form">
						<div class="blog-write-comment m-t-20">
						    <div class="col-md-12 contact-title">
						        <h4>INFORMACIÓN DEL SERVICIO</h4>
						    </div>
							<?= validation_errors() ?>
							<?=$this->session->flashdata('message')?>
							<form class="register-form" role="form" action="frontend/solo_servicios/enviarInformacion" method="post" enctype="multipart/form-data" id="formServicio">
								
						        <div class="col-md-4 ">
						            <div class="form-group">
						                <label class="info-title" for=""> Nombre <span>*</span></label>
						                    <input type="text" name="nombre" class="form-control unicase-form-control text-input" id="" placeholder="Nombre">
						            </div>
						        </div>
						        						    						        
						        <div class="col-md-4 ">
						            <div class="form-group">
							            <label class="info-title" for=""> Telefono <span>*</span></label>
							            <input type="text" name="telefono" class="form-control unicase-form-control text-input" id="" placeholder="Telefono">
						            </div>
						        </div>

						        <div class="col-md-4">
						            <div class="form-group">
							            <label class="info-title" for="">Direcciòn de email<span>*</span></label>
							            <input type="email" class="form-control unicase-form-control text-input" name="correo" id="" placeholder="admin@unicase.com">
						            </div>
						        </div>
						            
						        <div class="col-md-4 ">
						            <div class="form-group">
						            <label class="info-title" for=""> Empresa <span>*</span></label>
						                <input type="text" name="empresa" class="form-control unicase-form-control text-input" id="" placeholder="Empresa">
						            </div>
						        </div>

						        <div class="col-md-12">
						            <div class="form-group">
							            <label class="info-title" for="">Consulta <span>*</span></label>
							            <textarea name="mensaje" class="form-control unicase-form-control" id=""></textarea>
						            </div>
						        </div>
						        
								<div class="col-md-12">
								<?= $recaptcha?>
								</div>

								<input type="hidden" name="idioma_id" value="1">
								<input type="hidden" name="servicio_id" id="?=$dataset_por_id['id']?>" value="<?=$dataset_por_id['id']?>">
								<input type="hidden" name="url" id="<?=$dataset_por_id['url']?>" value="<?=$dataset_por_id['url']?>">
								
						        <div class="col-md-12 outer-bottom-small m-t-20">
						            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Solicitar informacion</button>
						        </div>

						    </form>
						</div>
					</div>
				</div>
				<div class="col-md-3 sidebar">
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
		    				<form>
		        				<div class="control-group">
		            				<input placeholder="Type to search" class="search-field">
		            				<a href="#" class="search-button"></a>   
		        				</div>
		    				</form>
						</div>						
								
						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
						    <h3 class="section-title">BLOGS</h3>
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
							</ul>

							<div class="tab-content">
							   <div class="tab-pane active m-t-20" id="popular">
							   	<?php foreach ($articulo as $key => $value): ?> 
									<div class="blog-post inner-bottom-30 " >
										<img class="img-responsive" src="files/articulos/<?= $value['imagen']?>" alt="">
										<h4><a href="blog-details.html">Blog</a></h4>
										<span class="author"><?= $value['autor']?></span>
										<?php $comentario=(($value['num_comentarios']<>1) ? 'comentarios':'comentario') ?>
										<span class="review"><?= $value['num_comentarios']?> <?= $comentario?></span>
										<span class="date-time"><?=$comentarios[0]['creado']?></span>
										<p><?=$comentarios[0]['comentario']?></p>
										
									</div>
								<?php endforeach ?>	
								</div>
							</div>
						</div>
						<!-- ============================================== PRODUCT TAGS ============================================== -->
						<div class="sidebar-widget product-tag wow fadeInUp">
							<h3 class="section-title">Product tags</h3>
							<div class="sidebar-widget-body outer-top-xs">
								<div class="tag-list">					
									<a class="item" title="Phone" href="category.html">Phone</a>
									<a class="item active" title="Vest" href="category.html">Vest</a>
									<a class="item" title="Smartphone" href="category.html">Smartphone</a>
									<a class="item" title="Furniture" href="category.html">Furniture</a>
									<a class="item" title="T-shirt" href="category.html">T-shirt</a>
									<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
									<a class="item" title="Sneaker" href="category.html">Sneaker</a>
									<a class="item" title="Toys" href="category.html">Toys</a>
									<a class="item" title="Rose" href="category.html">Rose</a>
								</div><!-- /.tag-list -->
							</div><!-- /.sidebar-widget-body -->
						</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>