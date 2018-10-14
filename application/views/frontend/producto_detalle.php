<div class="breadcrumb">

	<div class="container">

		<div class="breadcrumb-inner">

			<ul class="list-inline list-unstyled">

				<li><a href="./">Inicio</a></li>

				<li><a href="productos">Producto</a></li>

				<li class='active'><?= $producto['nombre'] ?></li>

			</ul>

		</div>

	</div>

</div>

<div class="body-content outer-top-xs">

	<div class='container-fluid'>

		<div class='row single-product outer-bottom-sm'>

			<div class="col-md-2" id="carritoFloat">

            	<?=getItemsCarrito()?>

           	</div>

			<div class='col-md-7'>

				<div class="row  wow fadeInUp">

					<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">

						<div class="product-item-holder size-big single-product-gallery small-gallery">



						

							<div id="owl-single-product">

								<?php foreach ($producto['imagenes'] as $key => $value): ?>

								<div class="single-product-gallery-item" id="slide<?=$key?>">

									<a data-lightbox="image-<?=$key?>" data-title="<?=$producto['nombre']?>" href="files/productos/<?=$value['imagen']?>">

										<img class="img-responsive" alt="abcd" src="files/productos/<?=$value['imagen']?>" data-echo="files/productos/<?=$value['imagen']?>" />

									</a>

								</div>

								<?php endforeach ?>

								<!-- /.single-product-gallery-item -->

							</div>

							<!-- /.single-product-slider -->

						

							<div class="single-product-gallery-thumbs gallery-thumbs">

								<div id="owl-single-product-thumbnails">

									<?php foreach ($producto['imagenes'] as $key => $value): ?>

									<div class="item">

										<a class="horizontal-thumb <?=($key=='0')? 'active':'';?>" data-target="#owl-single-product" data-slide="<?=$key?>" href="#slide<?=$key?>">

										<img class="img-responsive" width="85" alt="1234" src="files/productos/<?=$value['imagen']?>" data-echo="files/productos/<?=$value['imagen']?>" />

										</a>

									</div>

									<?php endforeach ?>

								</div>

								<!-- /#owl-single-product-thumbnails -->

							</div>

						



							<!-- /.gallery-thumbs -->

						</div>

						<!-- /.single-product-gallery -->

					</div>

					<!-- /.gallery-holder -->   

					<div class='col-sm-6 col-md-7 product-info-block'>

						<!-- ## PRODUCTO DETALLE ## -->

						<form method="post" action="{url_post}" id="detalleProducto">
						<!--<form method="post" action="frontend/pedido/agregar" id="detalleProducto">-->
							<div class="product-info">
								<h1 class="name text-left"><?=$producto['nombre']?></h1>
								<div>
									<?php if (!empty($producto['codigo'])): ?>
									<strong>Codigo: </strong><?=$producto['codigo']?>	
									<?php endif ?>
								</div>
								<input type="hidden" id="productoID" name="id" value="<?=$producto['id']?>">
								<div class="description-container m-t-20">
									<?=$producto['descripcion']?>
								</div>
								<?php //echo '<pre>';print_r($atributos);;echo '</pre>'; ?>
								<?php if (!empty($atributos)): ?>
								<div class="attributes-list outer-top-vs">
									<fieldset class="attribute_fieldset">
										<?php $ii = 0; ?>
										<?php foreach ($atributos as $at_key => $at_value): ?>
										<div class="row">
											<label for="group_1" class="col-sm-4 attribute_label attribute-key"><?=$at_value['nombre'] ?></label>
											<div class="col-sm-8 attribute_list">
											<?php if ($at_key == 1): ?>
												<?php foreach ($at_value['atributos'] as $avc_key => $avc_value): ?>
													<span class="colores list-colores" id="rdb<?=$avc_value['id']?>" title="<?=$avc_value['atributos_nombres']?>" style="background: <?=$avc_value['atributos_valor'] ?>"></span>
												<?php endforeach ?>
											<?php else: ?>
												<select class="form-control selectpicker attribute_select no-print" name="atributos[<?=$ii?>]" required="obligatorio">
													<option value="0" disabled selected>Seleccionar</option>	
													<?php foreach ($at_value['atributos'] as $avi_key => $avi_value): ?>
														<option value="<?=$avi_value['id']?>"><?=$avi_value['atributos_nombres']?></option>
													<?php endforeach ?>
												</select>
											<?php endif ?>
											</div>
										</div>
										<?php $ii++; ?>
										<?php endforeach ?> 
									</fieldset>
								</div>
								<?php endif ?>
						
							<div class="attributes-list" id="tipos_impresion">
									<?php if (!empty($tipos)): ?>
										<div class="row">
											<label for="group_1" class="col-sm-4 attribute_label attribute-key">Tipos de Impresión</label>
											<div class="col-sm-8 attribute_list tipo-impresion">
												<?php foreach ($tipos as $tkey => $tvalue): ?>
													<div>
														<input type="radio" id="tImpresion<?=$tvalue['id']?>" name="tipo_impresion" value="<?=$tvalue['id']?>" required>
														<label for="tImpresion<?=$tvalue['id']?>"><?=$tvalue['tipo_impresion']?></label>
														<a href="javascript:;" data-fancybox="" data-src="#impresion<?=$tvalue['id']?>" class="iexclamation" title="más información"><i class="fa fa-exclamation" aria-hidden="true"></i></a>
														<div style="display: none;" id="impresion<?=$tvalue['id']?>" class="clearfix fancy-impresion">
														<div class="col-xs-12 col-md-6">
																<h2><?=$tvalue['tipo_impresion']?></h2>
																<p><?=$tvalue['descripcion']?></p>
															</div>
															<div class="col-xs-12 col-md-6">
																<img class="img-responsive" src="files/impresiones/medianas/<?=$tvalue['imagen']?>" alt="<?=$tvalue['tipo_impresion']?>">
															</div>
													    </div>
													</div>
												<?php endforeach ?>
											</div>									
										</div>
										<div class="row">
											<label for="group_1" class="col-sm-4 attribute_label attribute-key">Logo Impresión a:</label>
											<div class="col-sm-8 attribute_list">
												<select class="form-control attribute_select no-print" name="nro_color" required>
													<option value="" disabled selected>Seleccione</option>
													<option value="1">1 color</option>
													<option value="2">2 colores</option>
													<option value="3">3 colores</option>
													<option value="4">4 colores</option>
													<option value="5">5 colores</option>
													<option value="6">6 colores</option>
												</select>
											</div>								
										</div>
									<?php endif ?>	
								</div>
								<div class="description-container m-t-20">
									* Los costos son precios unitarios y sin igv.
								</div>
								<div class="quantity-container info-container">
									<div class="row">
										<div class="col-sm-6 col-md-4">
											<span class="label cant-detalle">Cantidad :</span>
										</div>
										<div class="col-sm-6 col-md-2">
											<div class="cart-quantity">
												<div class="quant-input">
													<input type="text" id="inputCantidad" name="cantidad" value="1" min="1">
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<!-- <a id="btnAddCar" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Añadir al carrito</a> -->
											<button id="btnAddCar" type="submit" class="btn btn-primary"> COTIZAR </button>
										</div>
									</div>
									<!-- /.row -->
								</div>
								<div class="product-social-link m-t-20 text-right">
									<span class="social-label">Compartir :</span>
									<div class="social-icons">
										<ul class="list-inline">
											<li><a href="<?=CompartirRedes('facebook',$producto['url_share']);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
											<li><a href="<?=CompartirRedes('twitter',$producto['url_share']);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<!-- <li><a href="<?= dataConfig('enlace_youtube') ?>"><i class="fa fa-youtube"></i></a></li> -->
											<li><a href="<?=CompartirRedes('google+',$producto['url_share']);?>" target="_blank"><i class="fa fa-google"></i></a></li>
											<!-- <li><a href="<?= dataConfig('enlace_instagram') ?>"><i class="fa fa-instagram"></i></a></li> -->
											<li><a href="<?=CompartirRedes('pinterest',$producto['url_share']);?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
										</ul>
										<!-- /.social-icons -->
									</div>
								</div>
							</div>
							<!-- /.product-info -->
						</form>

						<!-- ## PRODUCTO DETALLE ## -->

					</div>

					<!-- /.col-sm-7 -->

				</div>

				<!-- /.row -->

			</div>

			<!-- /.col -->

			<div class='col-md-3 sidebar'>

				<div class="side-menu animate-dropdown outer-bottom-xs">

                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categorías</div>

                    <nav class="yamm megamenu-horizontal" role="navigation">

                        <ul class="nav">

                            {categorias}

                            <li class="dropdown menu-item">

                                <a href="<?=base_url('productos/')?>{url}-{id}" class="dropdown-toggle">{nombre}</a>

                            </li>

                            {/categorias}

                        </ul>

                    </nav>

                </div>

			</div>

			<div class="clearfix"></div>

			<!-- /.sidebar -->

			

			<!-- <div class="clearfix"></div> -->

		</div>

		<!-- /.row -->

		<section class="section wow fadeInUp outer-top-xs outer-bottom-sm" id="prodRelacionados">

				<h3 class="section-title">Productos Relacionados<h3>

				<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

					{aleatorios}

					<div class="item item-carousel">

						<div class="products">

							<div class="product">

								<div class="product-image">

									<div class="image">

										<a href="productos/{url}-{id}/detalle"><img  src="assets/images/blank.gif" data-echo="files/productos/medianas/{imagen}" alt="{nombre}" class="img-responsive"></a>

									</div>

									<!-- /.image -->			

									<div class="tag sale"><span>sale</span></div>

								</div>

								<!-- /.product-image -->

								<div class="product-info text-left">

									<h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>

									<!-- /.product-price -->

								</div>

							</div>

							<!-- /.product -->

						</div>

									<!-- /.products -->

					</div>

					{/aleatorios}

				</div>

				<!-- /.home-owl-carousel -->

			</section>

		<!-- <div class="blog-page">

			<div class="row single-product outer-bottom-sm">

				<div class="col-xs-12 col-sm-12 col-md-12">

		            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">

		                <div class="fadeInUp outer-bottom-vs inner-top-vs">

							<div class="row">

		                        {}

		                        <div class="col-md-6">

		                            <div class="wide-banner cnt-strip">

		                                <div class="image">

		                                    <img class="img-responsive" data-echo="files/productos/{}" src="assets/frontend/images/blank.gif" alt="">

		                                </div>

		                                <div class="strip">

		                                    <div class="strip-inner">

		                                        <h3 class="hidden-xs">{}</h3>

		                                        <h2>{}</h2>

		                                    </div>

		                                </div>

		                            </div>

		                        </div>

		                        {/}

		                        <div class="col-md-6">

		                        	<div>

		                        		<h1>CONSULTAS</h1>

		                        		<p><?//=dataConfig('telefono_whatsapp')?></p>

		                        	</div>

		                        </div>

		                    </div>

		                </div>

		            </div>

		        </div>

			</div>

		</div> -->	

	</div>

	<!-- /.container -->

</div>

<!-- /.body-content -->



<script type="text/javascript">

	function colorActiveBtn(id) {

		$( ".colores" ).removeClass("btnColorActive");

		$( "#"+id ).addClass( "btnColorActive" );

	}

</script>

	<style type="text/css">

	

		.fancybox-thumbs {

		  top: auto;

		  width: auto;

		  bottom: 10px;

		  left: 0;

		  right : 0;

		  height: 80px;

		  background: transparent;

		}



		.fancybox-thumbs > ul > li {

		  border-color: transparent;

		}



		.fancybox-container--thumbs .fancybox-caption-wrap, 

		.fancybox-container--thumbs .fancybox-controls, 

		.fancybox-container--thumbs .fancybox-slider-wrap {

		  right: 0;

		  bottom: 0;

		}



		@media all and (max-width: 800px) {



			.fancybox-thumbs {

				display: none !important;

			}



			.fancybox-container--thumbs .fancybox-controls,

			.fancybox-container--thumbs .fancybox-slider-wrap,

			.fancybox-container--thumbs .fancybox-caption-wrap {

				bottom: 0;

			}



		}

	</style>