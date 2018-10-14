<div class="body-content outer-top-xs">
	<div class='container-fluid'>
		<div class='row outer-bottom-sm'>
			<div class="col-md-2" id="carritoFloat">
                <?=getItemsCarrito()?>
           	</div>
			<div class='col-md-10'>
				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="list-titulo-cat">
								<h1><?=$banner['titulo'] ?></h1>
							</div>
							<div class="category-product  inner-top-vs">
								<div class="row">
									{dataset}     
									<div class="col-sm-6 col-md-4 wow fadeInUp bloque-catprod">
										<div class="products">
											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="files/paquetes/{imagen}" data-lightbox="image-1" data-title="{nombre}">
															<img class="img-responsive border-img" src="assets/frontend/images/blank.gif" data-echo="files/paquetes/{imagen}" alt="{nombre}">
														</a>
													</div>
													<!-- /.image -->
												</div>
												<!-- /.product-image -->
												<div class="product-info text-center">
													<h3 class="name"><a href="files/paquetes/{imagen}" data-lightbox="image-1" data-title="{nombre}">{nombre}</a></h3>
													<div class="product-price text-left">
													</div>
												</div>
												<div class="cart clearfix animate-effect text-center">
													<!-- <a class="btn btn-primary btn-xs btn-prod" href="<? //=base_url('productos/')?>">Más Detalles</a>
													<a class="btn btn-primary btn-xs btn-prod" href="<? //=base_url('productos/')?>">Cotizar</a> -->
												</div>
												<!-- /.cart -->
											</div>
										</div>
									</div>
									{/dataset}
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">
						<div class="text-right">
							<div class="pagination-container">
								<ul class="list-inline list-unstyled">
									{paginacion}
								</ul>
								<!-- /.list-inline -->
							</div>
							<!-- /.pagination-container -->  
						</div>
						<!-- /.text-right -->
					</div>
				</div>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>