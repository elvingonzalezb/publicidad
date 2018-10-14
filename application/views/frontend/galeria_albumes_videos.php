<!-- Breadcrumb header -->
<?php if($banner['visible']==1){?>
    <div class="tm-breadcrumb" style="background-image:url(files/secciones/<?=$banner['imagen']?>);">
        <div class="container">
            <h1 class="tm-section-heading">GALERIA ALBUMES DE VIDEOS</h1>
            <ul>
                <li>
                    <a href="./">INICIO</a>
                </li>
                <li><a href="#">/ GALERIA ALBUMES DE VIDEOS</a></li>
            </ul>
        </div>
    </div><!-- /Breadcrumb header -->
<?php }?>
    <!-- Shop -->
    <div class="tm-shop-list">
        <div class="container">
                    <h1 class="tm-section-heading">GALERIA ALBUMES DE VIDEOS</h1>
                    <div class="row">
                        {dataset}
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 smf">
                            <div class="tm-product-box">
                                <div class="product-image"><img alt="{video_title}" src="files/galeria_videos/{video}"></div>
                                <div class="product-details">
                                    <h4 class="product-title"><a href="<?=base_url('galeria-videos/')?>{url_id}">{nombre}</a></h4>
                                    <div class="col-sm-12 nopadding ">
                                        <div class="product-detalle">
                                            <a href="<?=base_url('galeria-videos/')?>{url_id}">VER DETALLE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/dataset}
                        <div class="tm-pagination">
                            <ul>
                                {paginacion}
                            </ul>
                        </div>
            </div>
            
        </div>
    </div><!-- /Shop -->
