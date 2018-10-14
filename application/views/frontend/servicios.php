<?php if($banner['visible']==1){?>
<!-- Breadcrumb header -->
    <div class="tm-breadcrumb" style="background-image:url(files/secciones/<?=$banner['imagen']?>">
        <div class="container">
            <h1 class="tm-section-heading">Servicios</h1>
            <ul>
                <li>
                    <a href="./">INICIO</a>
                </li>
                <li>
                    <a href="#">/ Servicios</a>
                </li>
            </ul>
        </div>
    </div><!-- /Breadcrumb header -->
<?php }?>
    <!-- Services -->
    <div class="tm-services-style-3 main">
        <div class="container">
            <h1 class="tm-section-heading"><?=strtoupper(mostrarTitulo(3));?></h1>
            <div class="row">
                <div class="services-wrapper">
                    {dataset}
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 smf">
                        <div class="service-box">
                            <div class="service-image"><img alt="{nombre}" src="files/servicios/medianas/{imagen}"></div>
                            <div class="service-detail">
                                <h3 class="service-title"><a href="<?=base_url('servicios/')?>{url_id}">{nombre}</a></h3>
                                <p class="service-description">{resumen}</p>
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
        </div>
    </div><!-- /Services -->