<!-- Breadcrumb header -->

    <div class="tm-breadcrumb" style="background-image: url('assets/frontend/img/banner-carrito.jpg');">

        <div class="container">

            <h1 class="tm-section-heading">CARRITO</h1>

            <ul>

                <li>

                    <a href="./">INICIO</a>

                </li>

                <li>

                    <a href="#">/ CARRITO</a>

                </li>

            </ul>

        </div>

    </div><!-- /Breadcrumb header -->

    <!-- Shop -->

    <div class="tm-shop-list">

        <div class="container">

            <div class="row">
            	<?php if (count($carrito)>0): ?>
				<form action="<?=base_url('pedido/continuar')?>" method="post" id="form-continuar-compra" class="table-responsive">
					<div class="" id="list_car">
						<table id="cart" class="table table-hover table-condensed">
		    				<thead>
								<tr>
									<th>ITEM</th>
									<th></th>
									<th>CANTIDAD</th>
									<th>PRECIO</th>
									<th class="text-center">SUBTOTAL</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$total = 0 ;
								foreach ($carrito as $key => $item): ?>
								<tr>
									<td data-th="Product">
										<a href=""><img src="<?=base_url('files/productos/thumbs/').$item['item_imagen']; ?>" alt="<?=$item['item_nombre']?>" class="img-thumbnail"/></a>
									</td>
									<td data-th="nameProduct">
										<h4 class="nomargin">
											<?=$item['item_nombre']?>
											<?php if ($item['item_atributo_id']): ?>
												<br><span class="h6"><strong>Medida:</strong> <?=$item['item_atributo_nombre']?></span>
											<?php endif ?>
										</h4>
									</td>
									<td data-th="Quantity">
										<div class="div-cantidad">
											<input type="hidden" value="<?=$item['item_id']?>" id="prodID_<?=$key?>">
											<input type="hidden" value="<?=$item['item_atributo_id']?>" id="atributo_<?=$key?>">
											<input type="number" class="form-cant text-center" min="1" size="1" title="Cantidad" value="<?=$item['item_cantidad']?>" id="cant_<?=$key?>">
											<a class="btn btn-info btn-sm" title="Actualizar cantidad" href="javascript:updateCantidad('<?=$key?>')"><i class="fa fa-refresh"></i></a>
										</div>
									</td>
									<td data-th="Price"><?=dataConfig('moneda').number_format($item['item_precio'],2)?></td>
									<td data-th="Subtotal" class="text-center" id="new_subtotal_<?=$key?>"><?=dataConfig('moneda').number_format($item['item_subtotal'],2)?></td>
									<td class="actions" data-th="">
									<a class="btn btn-danger btn-sm" href="javascript:deleteItem('<?=$item['item_carroID']?>')" title="cancel"><i class="fa fa-trash-o"></i></a>				
								</td>
								</tr>
								<?php $total = $total + $item['item_subtotal']; ?>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td colspan="3" class="text-right"><strong>TOTAL: </strong></td>
									<td class="text-center"><strong id="new_total"><?=dataConfig('moneda').' '.number_format($total,2)?></strong></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="6">
										<a href="<?=base_url('productos')?>" class="btn btn-cart pull-left"><i class="fa fa-angle-left"></i> Seguir comprando</a>
										<button type="submit" id='continuar_compra' class="btn btn-cart pull-right">Continuar Compra <i class="fa fa-angle-right"></i></button>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="form-group">
						<label>Comentarios/mensaje</label>
						<textarea class="form-control" rows="4" name="mensaje"><?php echo !empty($mensaje)? $mensaje : ''; ?></textarea>
					</div>
				</form>

				<?php else: ?>

					<p>Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a></p>

				<?php endif ?>

            </div>

        </div>

    </div>