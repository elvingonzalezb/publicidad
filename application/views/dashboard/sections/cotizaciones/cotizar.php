<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Cotizar')); ?>
<script src="assets/dashboard/plugins/lightbox2/ui/modals.js"></script>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">Cotizar la Solicitud</div>
		<div class="panel-body">
			<div class="row clearfix">
				<div class="col-sm-12">
					<h3><strong>Datos de la cotización</strong></h3>
					<form class="form-horizontal" action="dashboard/cotizaciones/enviar" method="post">
						<?php
						if(isset($resultado) && ($resultado=="success"))
						{
							echo '<div class="alert alert-success">';
							echo '<button type="button" class="close" data-dismiss="alert">×</button>';
							echo '<strong>RESULTADO:</strong> Precios Actualizados';
							echo '</div>';
						}
						?> 
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td><strong>Nro de Cotización:</strong></td>
									<td><?php $nro = $orden['codigo']; echo $nro; ?></td>
								</tr>
								<tr>
									<td><strong>Fecha y hora de Compra:</strong></td>
									<td><?php echo date_format(date_create($orden['fecha']), 'd-m-Y H:i:s'); ?></td>
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
								<!-- <tr>
									<td><strong>Nombre y apellidos:</strong></td>
									<td><?php //echo $cliente['nombres']." ".$cliente['apellidos']; ?></td>
								</tr> -->
								<tr>
									<td><strong>Teléfono:</strong></td>
									<td><?php echo $cliente['telefono']; ?></td>
								</tr>
								<tr>
									<td><strong>Email:</strong></td>
									<td><?php echo $cliente['correo']; ?></td>
								</tr>
								<tr>
									<td>Estado:</td>
									<td class="center">
										<?php $estado = (($orden['estado']==_C_ACEPTADO) ? 'Aceptado': 'Pendiente')?>
										<?php $class = (($orden['estado']==_C_ACEPTADO) ? 'btn-success': 'btn-warning')?>
										<form action="" id="estadoAjax">
                                            <input type="hidden" id="estadoCotizacion" value="<?=$orden['estado']?>">
                                            <button type="button" id="btnCotizacion" class="btn <?=$class?>"
                                            onclick="actualizarCotizacion(<?=$orden['id']?>);return false;"><?=$estado?></button>
                                            <span id="divResultado<?=$orden['id']?>"></span>
                                        </form>
									</td>
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
						<table class="table table-striped table-hover js-exportable">
							<thead>
								<tr>
									<th>Imagen</th>
									<th>Producto</th>
									<th>Impresión</th>
									<th>Cantidad</th>
									<th>Precio Unitario 50/50</th>
									<th>Subtotal 50/50</th>
									<th>Precio Unitario</th>
									<th>Subtotal</th>
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
										<!-- <input type="hidden" name="precio5050_<?//=$i?>" id="precio5050_<?//=$i?>" class="span6 typeahead" value="<?//=$precio5050?>"> -->
									</td>
									<td class="center" id="id_subtotal5050_<?=$i?>">S/. <?=number_format($subtotalunit5050,2)?></td>
									<td class="center">
									<input type="text" name="precio_<?=$i?>" id="precio_<?=$i?>" class="span6 typeahead" value="<?=$precio?>" onkeyup="calSubtotal();" >
									<input type="hidden" name="id_detalle_<?=$i?>" id="id_detalle_<?=$i?>" value="<?=$detalle['id']?>">
									<input type="hidden" name="cantidad_<?=$i?>" id="cantidad_<?=$i?>" value="<?=$detalle['cantidad']?>">
									</td>
									<td class="center" id="id_subtotal_<?=$i?>">S/. <?=number_format($subtotalunit,2)?></td>
								</tr>
								<?php 
									$subtotal=$subtotal + $subtotalunit;
									$subtotal5050=$subtotal5050 + $subtotalunit5050;
									$i++;
								} 
								$igv = ($subtotal*18)/100;
								$igv5050 = ($subtotal5050*18)/100;

								$total = $subtotal*1.18;
								$total5050 = $subtotal5050*1.18;
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
									<td id="celdaIgv5050"><strong><?php echo 'S/. '.number_format($igv5050,2); ?></strong></td>
									<td></td>
									<td id="celdaIgv"><strong><?php echo 'S/. '.number_format($igv,2); ?></strong></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>TOTAL</strong></td>
									<td id="celdaTotal5050"><strong><?php echo 'S/. '.number_format($total5050,2); ?></strong></td>
									<td></td>
									<td id="celdaTotal"><strong><?php echo 'S/. '.number_format($total,2); ?></strong></td>
								</tr>
							</tfoot>
						</table>
						<div class="form-actions">
							<input type="hidden" id="rec_adelanto" name="rec_adelanto" value="<?=dataConfig('porc_recargo_adelanto')?>">
							<input type="hidden" name="cliente_id" value="<?php echo $orden['cliente_id']; ?>">
							<input type="hidden" name="num_items" id="num_items" value="<?php echo $i; ?>">
							<input type="hidden" name="id" id="id" value="<?php echo $orden['id']; ?>">

							<input type="hidden" name="subtotal" id="input_subtotal" value="<?=$subtotal?>">
							<input type="hidden" name="subtotal5050" id="input_subtotal5050" value="<?=$subtotal5050?>">
							
							<input type="hidden" name="igv" id="input_igv" value="<?=$igv?>">
							<input type="hidden" name="igv5050" id="input_igv5050" value="<?=$igv5050?>">

							<input type="hidden" name="total" id="input_total" value="<?=$total?>">
							<input type="hidden" name="total5050" id="input_total5050" value="<?=$total5050?>">
							
							<input type="submit" class="btn btn-primary" value="ENVIAR COTIZACIÓN">
							&nbsp;&nbsp;
							<a class="btn btn-danger" href="dashboard/cotizaciones/lista">VOLVER AL LISTADO</a>
							<!--<a class="btn btn-warning" href="javascript:enviarCotizacion('<?=$orden['id']?>')" >ENVIAR COTIZACIÓN</a>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	ul.li-atrib{
		padding: 0 20px;
	}
	table span.color{
		width: 22px;
		height: 22px;
		display: inline-block;
		border-radius: 8px;
		border: 1px solid #8c8c8c;
	}
</style>