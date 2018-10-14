<div class="body-content" id="top-banner-and-menu">
   
    <div class="container">
        {banners}
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">Categorías Destacadas</h3>
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="category-product  inner-top-vs">
                        <div class="row">
                            {categoriasDestacadas}     
                            <div class="col-sm-3 col-md-55 wow fadeInUp bloq-iniprod">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="productos/{url}-{id}"><img class="img-responsive border-img" src="assets/frontend/images/blank.gif" data-echo="files/categorias/medianas/{imagen}" alt="{nombre}"></a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-center">
                                            <h3 class="name"><a href="productos/{url}-{id}">{nombre}</a></h3>
                                            <div class="product-price text-left">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/categoriasDestacadas}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp" style="background-color: #f8f8f8;">
        <div class="container">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">Productos Destacados</h3>
            </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="category-product  inner-top-vs">
                        <div class="row">
                            {productosDestacados}     
                            <div class="col-sm-3 col-md-55 wow fadeInUp bloq-iniprod">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="productos/{url}-{id}/detalle"><img class="img-responsive border-img" src="assets/frontend/images/blank.gif" data-echo="files/productos/medianas/{imagen}" alt="{nombre}"></a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-center">
                                            <h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>
                                            <div class="product-price text-left">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {/productosDestacados}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




        <!-- <section class="section featured-product wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">Productos Destacadas</h3>
            </div>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-item="5"> 
            {productosDestacados}
                <div class="item item-carousel">
                    <div class="products product-destacados">
                        <div class="product">       
                            <div class="product-image">
                                <div class="image">
                                    <a href="productos/{url}-{id}/detalle"><img src="files/productos/{imagen}" data-echo="files/productos/{imagen}" class="border-img img-responsive" alt=""></a>
                                </div>       
                            </div>
                    
                            <div class="product-info text-left">
                                <h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>
                                <div class="product-price text-left">
                                {colores}
                                    <span title="{atributos_nombres}" class="colores" style="background: {atributos_valor}"></span>
                                {/colores}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {/productosDestacados}
            </div>
        </section> -->
    <div class="container">
        <section class="section outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">Últimos Articulos</h3>
            <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">
                    {articulos}
                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="articulos/{url}-{id}"><img data-echo="files/articulos/medianas/{imagen}" width="270" height="135" src="assets/frontend/images/blank.gif" alt=""></a>
                                </div>
                            </div>
                            <!-- /.blog-post-image -->
                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="articulos/{url}-{id}">{nombre}</a></h3>
                                <span class="info">By {autor} | {creado}</span>
                                <p class="text">{resumen}</p>
                                <a href="articulos/{url}-{id}" class="btn_article lnk">Leer más</a>
                            </div>
                            <!-- /.blog-post-info -->
                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->
                    {/articulos}
                </div>
                <!-- /.owl-carousel -->
            </div>
            <!-- /.blog-slider-container -->
        </section>
    
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
<div id="footer-suscripcion">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3><strong>Suscribete</strong> para recibir nuestras ofertas y promociones</h3>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input class="btn btn-lg" name="email" id="sp-email" autocomplete="off" type="email" placeholder="Tu Email..." required>
                            <!-- <button class="btn btn-info btn-lg" type="submit">Enviar</button> -->
                            <a href="javascript:fnSuscripcion();" id="btnsuscriptor" class="btn btn-info btn-lg">Enviar</a>
                            <div id="msj-suscriptor"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>