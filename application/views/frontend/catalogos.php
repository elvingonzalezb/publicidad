<div class="body-content outer-top-xs">
	<div class='container-fluid'>
		<div class='row outer-bottom-sm'>
			<div class="col-md-2" id="carritoFloat">
                <?=getItemsCarrito()?>
            </div>
			<div class='col-md-7'>
				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="list-titulo-cat">
								<h1><?=$banner['titulo'] ?></h1>
							</div>
							<div class="category-product  inner-top-vs">
								<div class="row">
									{catalogos}     
									<div class="col-sm-6 col-md-4 wow fadeInUp bloque-catprod">
										<div class="products">
											<div class="product">
												<div class="product-image">
													<div class="image">
														<img class="img-responsive border-img" src="assets/frontend/images/blank.gif" data-echo="files/catalogos/{imagen}" alt="{titulo}">
													</div>
													<!-- /.image -->
												</div>
												<!-- /.product-image -->
												<div class="product-info text-center">
													<a href="files/catalogos/{archivo}" download=""><h3 class="name">{titulo}</h3></a>
													<div class="product-price text-left">
													</div>
												</div>
												<!-- <div class="cart clearfix animate-effect text-center">
													<a class="btn btn-primary btn-xs btn-prod" href="files/catalogos/{archivo}" download="{slugurl}">Descargar</a>
												</div> -->
												<!-- /.cart -->
											</div>
										</div>
									</div>
									{/catalogos}
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
			<div class='col-md-3 sidebar'>
				<div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categorías</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            {menu}
                            <li class="dropdown menu-item">
                                <a href="<?=base_url('productos/')?>{url}-{id}" class="dropdown-toggle">{nombre}</a>
                            </li>
                            {/menu}
                        </ul>
                    </nav>
                </div>
                <!-- <div class="sidebar-module-container">
                    <h3 class="section-title">Categorías</h3>
                    <div class="sidebar-filter">
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <div class="sidebar-widget-body m-t-10">
                                <ul class="list">
                                    {menu}
                                    <li><i class="fa fa-check" aria-hidden="true"></i><a href="<?=base_url('productos/')?>{url}-{id}">{nombre}</a></li>
                                    {/menu}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->           
            </div>
            <!-- /.sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>