<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Detalle Venta')); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">DETALLES DE VENTA</div>
		<div class="panel-body">
			<div class="row clearfix">
				<div class="col-sm-12">
					<h3><strong>Datos de la venta</strong></h3>
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td><strong>Nro de Cotización:</strong></td>
								<td><?php $nro = $orden['codigo']; echo $nro; ?></td>
							</tr>
							<tr>
								<td><strong>Fecha y hora de Compra:</strong></td>
								<td>
								<?php
                                    $aux_f = explode(" ", $orden['fecha']);
                                    $aux_f2 = explode("-", $aux_f[0]);
                                    $fecha_1 = $aux_f2[2]."-".$aux_f2[1]."-".$aux_f2[0];
                                    $fecha_orden = $fecha_1." ".$aux_f[1];
                                    echo $fecha_orden; 
                                ?>
                                </td>
							</tr>
						</tbody>
					</table>
					<hr>
					<h3><strong>Datos del Cliente</strong></h3>
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td><strong>Razón Social:</strong></td>
								<td>
									<?php echo $cliente['razon_social']; ?>
								</td>
                                </tr>
							<tr>
								<td><strong>RUC:</strong></td>
								<td>
								<?php echo $cliente['ruc']; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Dirección Fiscal de la factura:</strong></td>
								<td>
								<?php echo $cliente['direccion']; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Dirección de Entrega:</strong></td>
								<td>
								<?php echo $cliente['direccion_entrega']; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Teléfono:</strong></td>
								<td><?php echo $cliente['telefono']; ?></td>
							</tr>
							<tr>
								<td><strong>Email:</strong></td>
								<td><?php echo $cliente['correo']; ?></td>
							</tr>
							<!--<tr>
								<td><strong>Pais:</strong></td>
								<td><?php echo $pais; ?></td>
							</tr>
							<tr>
								<td><strong>Ciudad:</strong></td>
								<td><?php echo $ciudad; ?></td>
							</tr>
							<tr>
								<td><strong>Direccion:</strong></td>
								<td><?php echo $cliente['direccion']; ?></td>
							</tr>-->
						</tbody>
					</table>
					<hr>
					<h3><strong>Contenido</strong></h3>
					<table class="table table-striped table-hover js-exportable dataTable">
						<thead>
							<tr>
								<th>Imagen</th>
								<th>Producto</th>
								<th>Impresión</th>
								<th>Cantidad</th>
								<th>P Unit. 50/50</th>
								<th>Subtotal 50/50</th>
								<th>P. Unit. Contado</th>
								<th>Subtotal Contado</th>
							</tr>
						</thead>
						<tbody>
								<?php
								$i = 0;
								$subtotal = 0;
								$subtotal5050 = 0;
								foreach($detalles as $detalle)
								{
									$id_detalle = $detalle['id'];
									$precio = $detalle['precio'];
									$st = $precio*($detalle['cantidad']);
									$subtotalunit = redondeado($st, 2);
									$subtotalunit = number_format($subtotalunit, 2, '.', '');

									$precio5050 = $detalle['precio5050'];
									$st5050 = $precio5050*($detalle['cantidad']);
									$subtotalunit5050 = redondeado($st5050, 2);
									$subtotalunit5050 = number_format($subtotalunit5050, 2, '.', '');
								?>
								<tr>
									<td class="center"><a href="#" target="_blank"><img src="files/productos/thumbs/<?=$detalle['imagen']?>" alt="<?=$detalle['nombre']?>"></a></td>
									<td class="center"><?=$detalle['nombre']?>
										<?php if (is_array($detalle['atributos']) && count($detalle['atributos'])>0) { ?>
										<br><span style="font-weight:bold;">Color</span>
										<ul class="li-atrib">
											<?php foreach ($detalle['atributos'] as $akey => $avalue) {
											echo '<li> <span class="color" style="background-color:'.$avalue['atributos_valor'].'"></span></li>';
											} ?>
										</ul>
										<?php } ?>
									<a href="javascript:;" onclick="boxComent<?=$detalle['id']?>();" data-fancybox="" data-src="#coment<?=$detalle['id']?>">ver Comentarios</a>
									<script type="text/javascript">function boxComent<?=$detalle['id']?>() {swal("<?=(!empty($detalle['comentario'])? $detalle['comentario']:'No se encontro comentario..')?>");}</script>
									</td>
									<td class="center" style="text-transform: uppercase;">
										<?php if (is_array($detalle['dato_impresion']) && count($detalle['dato_impresion'])>0) { ?>
										<br><span>Impresión: <?=$detalle['dato_impresion']['tipo_impresion']?></span><br>
										<span>Nro colores: <?=$detalle['dato_impresion']['nro_color']?></span>
										<?php } ?>
									</td>
									<td class="center">
										<?=$detalle['cantidad']?>
										<input type="hidden" name="cantidad_<?=$i?>" id="cantidad_<?=$i?>" value="<?=$detalle['cantidad']?>">
									</td>
									<td class="center" id="precio5050_<?=$i?>">
										<?=$precio5050?>
									</td>
									<td class="center" id="id_subtotal5050_<?=$i?>">S/. <?=number_format($subtotalunit5050,2)?></td>
									<td class="center">
										<?=$precio?>
									</td>
									<td class="center" id="id_subtotal_<?=$i?>">S/. <?=number_format($subtotalunit,2)?></td>
								</tr>
								<?php 
									$subtotal=$subtotal + $subtotalunit;
									$subtotal5050=$subtotal5050 + $subtotalunit5050;
									$i++;
								}
								?>
								<tr>
									<td colspan="4"></td>
									<td><strong>SUBTOTAL</strong></td>
									<td id="celdaSubTotal5050"><strong><?php echo 'S/. '.number_format($subtotal5050,2); ?></strong></td>
									<td></td>
									<td id="celdaSubTotal"><strong><?php echo 'S/. '.number_format($subtotal,2); ?></strong></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>IGV</strong></td>
									<td id="celdaIgv5050"><strong><?php echo 'S/. '.number_format((($subtotal5050*18)/100),2); ?></strong></td>
									<td></td>
									<td id="celdaIgv"><strong><?php echo 'S/. '.number_format((($subtotal*18)/100),2); ?></strong></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>TOTAL</strong></td>
									<td id="celdaTotal5050"><strong><?php echo 'S/. '.number_format(($subtotal5050*1.18),2); ?></strong></td>
									<td></td>
									<td id="celdaTotal"><strong><?php echo 'S/. '.number_format(($subtotal*1.18),2); ?></strong></td>
								</tr>
							</tbody>
					</table>
					<a class="btn btn-danger" href="dashboard/cotizaciones/lista">VOLVER</a>
				</div>
			</div>
		</div>
	</div>
</div>