<div class="breadcrumb">

	<div class="container">

		<div class="breadcrumb-inner">

			<ul class="list-inline list-unstyled">

				<li><a href="./">Home</a></li>

				<li class='active'>Cotización</li>

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

					<div class="table-responsive post_text_area">

					<?php if (count($carrito)>0): ?>
						<form action="<?=base_url('cotizacion/continuar')?>" method="post" id="form-continuar-compra">
							<div class="" id="list_car">
								<table class="table table-bordered">
									<thead>

									<tr>

											<th class="cart-description item">Imagen</th>

											<th class="cart-product-name item">Nombre</th>

											<th class="cart-qty item">Impresión</th>

											<th class="cart-product-name item">Cantidad</th>

											<th class="cart-product-name item">Especificación</th>

											<th class="cart-romove item"></th>

										</tr>

									</thead>

									<!-- /thead -->

									<tbody>

									<?php 

									$total = 0 ;

									foreach ($carrito as $key => $item): ?>

										<tr>

											<td class="cart-image">

												<a class="entry-thumbnail" href="javascript:void(0)">

												<input type="hidden" name="item[<?=$key?>][item_carroID]" value="<?=$item['item_carroID']?>" id="carId<?=$key?>" >

												<img src="<?=base_url('files/productos/thumbs/').$item['item_imagen']; ?>" alt="<?=$item['item_nombre']?>" class="img-responsive">

												</a>

											</td>

											<td class="cart-product-name-info">

												<h4 class='cart-product-description'>

													<a href="javascript:void(0)">

														<strong><?=$item['item_nom_cat']?></strong><br>

														<?=$item['item_nombre']?><br>

														<?=$item['item_codigo']?>

													</a>

												</h4>

												<div class="row">

												</div>

												<!-- /.row -->

												<div class="cart-product-info">

												</div>

											</td>

											<td class="cart-product-quantity">

												<div class="cart-product-info">

													<?php 

													$impresionId = (isset($item['item_impresion']['id']))? $item['item_impresion']['id']: '0';

													$nroColor = (isset($item['item_impresion']['nro_color']))? $item['item_impresion']['nro_color']: '0';

													//$colorId = (isset($item['item_atributos'][0]['id']))? $item['item_atributos'][0]['id']: '0';

													 ?>

													<!-- <div style="display: block;"><? //=getColorCotizacion($item['item_id'],$colorId,$key)?></div> -->

													<div style="display: block;"><?=getImpresionesCoti($item['item_id'],$impresionId,$key,$nroColor)?></div>

												</div>

											</td>

											<td class="cart-product-quantity">

												<input type="hidden" value="<?=$item['item_id']?>" id="prodID_<?=$key?>">

												<input type="text" name="item[<?=$key?>][item_cantidad]" onblur="updateCantidad('<?=$key?>')" size="1" title="Cantidad" value="<?=$item['item_cantidad']?>" id="cant_<?=$key?>" class="input-cantidad" >

											</td>

											<td class="cart-product-coment">

												<textarea class="form-control no-required uptcoment" rows="4" onblur="updateComentario('<?=$key?>')" name="item[<?=$key?>][item_comentario]" id="comen_<?=$key?>" style="resize: none;" ><?= (isset($item['item_comentario'])? $item['item_comentario']:'') ?></textarea>

											</td>

											<td class="romove-item"><a href="javascript:deleteItem('<?=$item['item_carroID']?>')" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>

										</tr>

									<?php endforeach ?>

									</tbody>

									<tfoot>

										<tr>

											<td colspan="7">

												<div class="shopping-cart-btn">

													<span class="">

													<a href="<?=base_url('productos')?>" class="btn btn-upper btn-primary outer-left-xs">Seguir comprando</a>

													<button type="submit" id='continuar_compra' class="btn btn-upper btn-primary pull-right outer-right-xs">Continuar</button>

													</span>

												</div>

												<!-- /.shopping-cart-btn -->

											</td>

										</tr>

									</tfoot>

									

								</table>

							</div>

						</form>

						<?php else: ?>

							<p>Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una cotización dando click <a href="./">aquí</a></p>

						<?php endif ?>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- /.container -->

</div>

<!-- /.body-content -->

<script type="text/javascript">

	function colorActiveBtn(id_color,id_carrito){

		$(".color"+id_carrito).removeClass("btnColorActive");

		$("#rdb"+id_color).addClass("btnColorActive");

		updateColor(id_color,id_carrito);

	}

</script>