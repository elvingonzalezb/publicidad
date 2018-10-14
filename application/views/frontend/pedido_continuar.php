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
<div class="tm-shop-list">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
						<table id="cart" class="table table-hover table-condensed">
		    				<thead>
								<tr>
									<th>ITEM</th>
									<th></th>
									<th>CANTIDAD</th>
									<th>PRECIO</th>
									<th class="text-center">SUBTOTAL</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$total = 0;
								foreach ($pedido as $key => $item): ?>
								<tr>
									<td data-th="Product">
										<a href=""><img src="<?=base_url('files/productos/thumbs/').$item['item_imagen']; ?>" alt="<?=$item['item_nombre']?>" class="img-thumbnail"/></a>
									</td>
									<td data-th="nameProduct">
										<h4 class="nomargin"><?=$item['item_nombre']?>
											<?php if ($item['item_atributo_id']): ?>
												<br><span class="h6"><strong>Medida:</strong> <?=$item['item_atributo_nombre']?></span>
											<?php endif ?>
										</h4>
									</td>
									<td data-th="Quantity">
										<?=$item['item_cantidad']?>
									</td>
									<td data-th="Price"><?=dataConfig('moneda').number_format($item['item_precio'],2)?></td>
									
									<td data-th="Subtotal" class="text-center"><?=dataConfig('moneda').number_format($item['item_subtotal'],2)?></td>
								</tr>
								<?php 
								$total = $total + $item['item_subtotal'];
								endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td colspan="3" class="text-right"><strong>TOTAL: </strong></td>
									<td class="text-center"><strong><?=dataConfig('moneda').number_format($total,2)?></strong></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="5">
										<div class="shopping-cart-btn">
											<a href="<?=base_url('pedido')?>" class="btn btn-upper btn-primary outer-left-xs pull-left">Editar Pedido</a>
											<div class="col-md-8">
												<div  class="pull-right">
													<input style="display: inline-block; min-height: 0px !important;" type="checkbox" class="checkbox" name="tyc" id="tyc" >Debe aceptar los 
													<a href="terminos-y-condiciones" target="_blank">Terminos y Condiciones.</a>
												</div>
											</div>
											<button type="button" id="botonPagar" class="col-md-2 pull-right btn btn-upper btn-success pull-right outer-right-xs" disabled>Pagar</button>
										</div>
										<!-- /.shopping-cart-btn -->
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($mensaje) && !empty($mensaje)): ?>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h4><strong>Comentarios/mensaje</strong></h4>
				<p><?=$mensaje?></p>
			</div>
			
		</div>	
		<?php endif ?>
		
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div>
	<!-- /.container -->
</div>
<!-- /.body-content -->
<script src="https://checkout.culqi.com/v2/"></script>
<script>
	//Culqi.publicKey = 'pk_test_Vo4FsPYqWr7b0fiN';
	Culqi.publicKey = 'pk_live_vwAFhX4D1Ka88xlr';
      Culqi.settings({
        title: 'Pifer System',
        currency: 'USD',
        order: '<?=$numpedido?>',
        description: 'Compra web',
        amount: <?= $total * 100 ?>
       });
       $('#botonPagar').on('click', function (e) {
            // Abre el formulario con las opciones de Culqi.configurar
            Culqi.open();
            e.preventDefault();
        });

// Recibimos Token del Culqi.js
	function culqi() {
		if (Culqi.token) {
			//console.log(Culqi);
			$.ajax({
				type: 'POST',
				url: 'pedido/enviar',
				datatype: 'json',
				data: { 
					token: Culqi.token.id, 
					total: <?= $total * 100 ?>,
					email: Culqi.token.email,
                    numpedido: '<?=$numpedido?>',
					installments: Culqi.token.metadata.installments 
				},
				/*datatype: 'json',*/
				beforeSend: function () {
					swal({
						title: "Pifer System",
						text: "Espere mientras se procesa su compra por favor...",
						imageUrl: "assets/frontend/img/loader.gif",
						showConfirmButton: false
					});
				},
				success: function (data){
					if (data.tipo == 'success') {
						swal({
						  title: data.message,
						  //text: data.message,
						  html: true
						},function(){
							/**redireccionar al listado de sus compras.**/
							location.href = data.redirect;
							}
						);
						
					}
					if (data.tipo == 'error') {
						swal({
							title: "Pifer System",
							text: data.message,
							imageUrl: "assets/frontend/img/loader.gif",
							showConfirmButton: true
						});
					}
					
				}
              });
          } else {
          	console.log(Culqi.error);
          }
        }
</script>