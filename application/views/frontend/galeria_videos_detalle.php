<?php if($banner['visible']==1){?>
    <div class="tm-breadcrumb" style="background-image:url(files/secciones/<?=$banner['imagen']?>);">
        <div class="container">
            <h1 class="tm-section-heading">Galeria de Videos</h1>
            <ul>
                <li>
                    <a href="./">INICIO</a>
                </li>
                <li>
                    <a href="#">/ Galeria de Videos</a>
                </li>
            </ul>
        </div>
    </div><!-- /Breadcrumb header -->
<?php }?>


    <div class="tm-doctors-style-2 main">
        <div class="container">
            <!-- <h1 class="tm-section-heading">GALERIA DE VIDEOS</h1> -->
            <div class="row">
                <div class="doctors-wrapper">
                    {dataset}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 smf">
                        <div class="doctor-box">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 nopadding">
                                <div class="doctor-thumbnail">
                                    <a data-fancybox href="http://www.youtube.com/watch?v={codigo_video}"><img alt="{video_title}" class="img-responsive" src="http://i2.ytimg.com/vi/{codigo_video}/hqdefault.jpg"></a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="doctor-info">
                                    <h2 class="tm-box-heading"><a data-fancybox href="http://www.youtube.com/watch?v={codigo_video}">{nombre}</a></h2>
                                    {descripcion}
                                    <a class="tm-btn btn-blue" data-fancybox href="http://www.youtube.com/watch?v={codigo_video}">VER VIDEO</a>
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
        </div>
    </div><!-- /Our Dentists -->