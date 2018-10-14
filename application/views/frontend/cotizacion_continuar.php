<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Home</a></li>
				<li class='active'>Cotizacion</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
						<form method="post" action="frontend/cotizaciones/enviar">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="cart-description item">Imagen</th>
										<th class="cart-product-name item">Nombre</th>
										<th class="cart-product-name item">Impresión</th>
										<th class="cart-qty item">Cantidad</th>
									</tr>
								</thead>
								<!-- /thead -->
								<tbody>
								<?php 
								$total = 0;
								foreach ($pedido as $key => $item): ?>
									<tr>
										<td class="cart-image">
											<a class="entry-thumbnail" href="javascript:void(0)">
											<img src="<?=base_url('files/productos/thumbs/'); ?><?=$item['item_imagen']?>" alt="">
											</a>
										</td>
										<td class="cart-product-name-info">
											<h4 class='cart-product-description'><a href="javascript:void(0)">
												<strong><?=$item['item_nom_cat']?></strong><br>
												<?=$item['item_nombre']?><br>
												<?=$item['item_codigo']?>
												</a></h4>
											<div class="row">
											</div>
											<!-- /.row -->
											<div class="cart-product-info">
											</div>
										</td>
										<td class="cart-product-quantity">
											<div class="cart-product-info">
												<div style="display: block">
													<div class="row" style="display: flex;align-items: center;">
														<?php //if (is_array($item['item_atributos'])): ?>
														<!-- <label  class="col-sm-4 attribute_label attribute-key">Color</label>
														<div class="col-sm-8 text-left">
															<span class="colores at-color" title="<? //=$item['item_atributos'][0]['atributos_nombres']?>" style="background: <?//= $item['item_atributos'][0]['atributos_valor']?>"></span>
														</div> -->
														<?php //endif ?>
													</div>	
												</div>
												<div style="display: block;">
													<div class="row" style="display: flex;align-items: center;">
														<label class="col-sm-4 attribute_label attribute-key">Impresión</label>
														<span class="col-sm-8 text-left"><?= isset($item['item_impresion']['tipo_impresion'])? $item['item_impresion']['tipo_impresion']:'No disponible'; ?></span>
													</div>
												</div>
												<div style="display: block;">
													<div class="row">
														<label class="col-sm-4 attribute_label attribute-key">Cantidad Color</label>
														<span class="col-sm-8 text-left">
															<?php 
															$cantColor = $item['item_impresion']['nro_color'];
															if (!empty($cantColor)) {
																echo ($cantColor==1)? $cantColor.' color': $cantColor.' colores';
															}else{
																echo '-';
															} ?>
															</span>
													</div>
												</div>
														
											</div>
										</td>
										<td class="cart-product-quantity">
											<div class="quant-input"><?=$item['item_cantidad']?></div>
										</td>
									</tr>
								<?php 
								endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="5">
											<div class="shopping-cart-btn">
												<a href="<?=base_url('cotizacion')?>" class="btn btn-upper btn-primary outer-left-xs pull-left">Editar Pedido</a>
												<div class="col-md-8">
													<div  class="pull-right">
													</div>
												</div>
												<button type="submit" class="col-md-2 pull-right btn btn-upper btn-success pull-right outer-right-xs">Cotizar</button>
											</div>
											<!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>