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
                                <h1><?=$seccion['titulo'] ?></h1>
                                <h4 style="color: #ff0101;">Todos los productos de ventas por mayor son enviados a su oficina o domicilio GRATIS!</h4>
                            </div>
                            <div class="category-product  inner-top-vs">
                                <div class="row">
                                    {categorias}     
                                    <div class="col-sm-6 col-md-4 wow fadeInUp bloque-catprod">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('productos/')?>{url}"><img class="img-responsive border-img" src="assets/frontend/images/blank.gif" data-echo="{ruta}" alt="{nombre}"></a>
                                                    </div>
                                                    <!-- /.image -->
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-center">
                                                    <h3 class="name"><a href="<?=base_url('productos/')?>{url}">{nombre}</a></h3>
                                                </div>
                                                <div class="cart clearfix animate-effect text-center">
                                                    <a class="btn btn-primary btn-xs" href="<?=base_url('productos/')?>{url}">Productos</a>
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                        </div>
                                    </div>
                                    {/categorias}
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
            <!-- /.col -->
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
            </div>
            <!-- /.sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>