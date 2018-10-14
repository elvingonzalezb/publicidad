<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row outer-bottom-sm'>
            <div class='col-md-12'>
                <div class="search-result-container">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="list-titulo-cat">
                                <h1><?=$seccion['titulo'] ?></h1>
                            </div>
                            <div class="category-product  inner-top-vs">
                                <div class="row">
                                    {productos}     
                                    <div class="col-sm-6 col-md-3 wow fadeInUp bloque-catprod">
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
                                                    <div class="product-price text-center">
                                                        {codigo}
                                                        {colores}
                                                        <span title="{atributos_nombres}" class="colores" style="background: {atributos_valor}"></span>
                                                        {/colores}
                                                    </div>
                                                </div>
                                                <div class="cart clearfix animate-effect text-center">
                                                    <a class="btn btn-primary btn-xs" href="<?=base_url('productos/')?>{url}">Más Detalles</a>
                                                    <!-- <a data-fancybox data-type="ajax" id="" data-src="productos/ajax_cotizacion/{id}" class="btn btn-primary btn-xs btn-prod" href="javascript:;">Cotizar</a> -->
                                                    <a class="btn btn-primary btn-xs btn-coti agregarCotizacion" href="javascript:;" data-producto="{id}">Cotizar</a>
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                        </div>
                                    </div>
                                    {/productos}
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
<script type="text/javascript">
$( document ).ready(function() {
    $( ".agregarCotizacion" ).click(function() {
        id_producto = $( this ).data( "producto" );
        $.fancybox.open({
            src  : 'productos/ajax_cotizacion/'+id_producto,
            type : 'ajax',
            opts : {
                afterShow : function( instance, current ) {
                    
                    $.ajax({
                        data: {
                            "id" : id_producto,
                            "cantidad" : '1',
                            'cn_atributos':'no'
                            },
                        url: 'frontend/cotizaciones/agregar',
                        //dataType: "json",
                        type:  'post',
                        success: function (response) {
                            $("#list_car").load(location.href+" #list_car>*","");
                            $("#carritoFloat").load(location.href+" #carritoFloat>*","");
                            $("#itemCountCar").load(location.href+" #itemCountCar>*","");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr);
                            console.log(ajaxOptions);
                            console.log(thrownError);
                        }
                    });
                }
            }
        });
    });
});
</script>