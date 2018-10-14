<link href="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.css" media="all" rel="stylesheet">
<script src="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.min.js" type="text/javascript"></script>
<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo Producto')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">PRODUCTO</div>
				<?=$this->session->flashdata('message');?>
				<div class="panel-body p-b-25">
					<form class="form-horizontal" action="dashboard/productos/nuevo" method="post" enctype="multipart/form-data" id="formProductos">
						<div class="form-group">
							<label class="col-sm-2 control-label">Categoria</label>
							<div class="col-sm-10">
								<select class="form-control chosen-select" id="selectedCategoria" onchange="getAjaxAtributos()" data-placeholder="Seleccionar" data-rule-chosen-required="true" name="categoria_id" <?=in_array('categoria_id', $requerid)? 'required':''; ?>>
									<option></option>
									<?php recursive($dataset); ?>
                                </select>
								<?php echo form_error('categoria_id'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugName" autocomplete="off" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Url</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugUrl" id="" name="url" placeholder="" <?php echo in_array('url', $requerid)? 'required':''; ?>>
								<?php echo form_error('url'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Codigo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" autocomplete="off" name="codigo" placeholder=""  <?php echo in_array('codigo', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control"  id="ckeditor" name="descripcion" <?php echo in_array('descripcion', $requerid)? 'required':''; ?>></textarea>
								<?php echo form_error('descripcion'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Orden</label>
							<div class="col-sm-10">
								<input type="number" min="1" class="form-control" id="" name="orden" <?php echo in_array('orden', $requerid)? 'required':''; ?>>
								<?php echo form_error('orden'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked data-icheck-theme="square" data-icheck-color="aero" <?php echo in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Activo</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" data-icheck-theme="square" data-icheck-color="blue" <?php echo in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Inactivo</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Destacado</label>
							<div class="col-sm-2">
								<input type="radio" id="" name="destacado" value="<?= _ACTIVO ?>" data-icheck-theme="square" data-icheck-color="aero" <?=in_array('destacado', $requerid)? 'required':''; ?>>
								<label for="destacado">Si</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="destacado" value="<?= _INACTIVO ?>" checked data-icheck-theme="square" data-icheck-color="blue" <?=in_array('destacado', $requerid)? 'required':''; ?>>
								<label for="destacado">No</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
								<input type="file" name="files[]" id="fileuploader" multiple <?php echo in_array('files[]', $requerid)? 'required':''; ?>>
								<?php echo form_error('files[]'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">OFERTA</label>
							<div class="col-sm-2">
								<input type="radio" id="" name="oferta" value="<?= _ACTIVO ?>" data-icheck-theme="square" data-icheck-color="aero" <?php echo in_array('oferta', $requerid)? 'required':''; ?>>
								<label for="oferta">Si</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="oferta" value="<?= _INACTIVO ?>" checked data-icheck-theme="square" data-icheck-color="blue" <?php echo in_array('oferta', $requerid)? 'required':''; ?>>
								<label for="oferta">No</label>
							</div>
						</div>
						<div id="ajaxAtributos"></div>
						<div class="form-group">
                            
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Tiempo de producción</label>
							<div class="col-sm-10">
								<input type="number" min="0" class="form-control" id="" style="width: 65px;display: inline-block;" name="tiempo_produccion" placeholder="" value="" <?=in_array('tiempo_produccion', $requerid)? 'required':''; ?>>
								(número de días)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Movilidad</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_movilidad" placeholder="0.00" value="" <?=in_array('c_movilidad', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo de Demasia</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_demasia" placeholder="0.00" value="" <?=in_array('c_demasia', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Unitario Embalaje</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_unit_embalaje" placeholder="0.00" value="" <?=in_array('c_unit_embalaje', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Regalo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_regalo" placeholder="0.00" value="" <?=in_array('c_regalo', $requerid)? 'required':''; ?>>
							</div>
						</div>
						
						<legend>Costo de Impresión</legend>
						<div class="form-group" style="overflow: auto; margin: 20px;">
							<div id="proveedorProducto">
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<label style="width: 20px;"></label>
										<!-- <label class="tb-pvpd">Stock</label> -->
										<label class="tb-pvpd">0-50</label>
										<label class="tb-pvpd">51-99</label>
										<label class="tb-pvpd">100-300</label>
										<label class="tb-pvpd">301-500</label>
										<label class="tb-pvpd">501-1000</label>
										<label class="tb-pvpd">1001-3000</label>
										<label class="tb-pvpd">3001+</label>
										<!-- <label class="tb-pvpd">3000</label> -->
									</div>
								</div>
								<?php foreach ($impresiones as $key => $value): ?>
								<div class="form-group">
									<label class="col-sm-2 control-label"><?=$value['tipo_impresion']?></label>
									<div class="col-sm-10">
										<input class="tb-pvpd" type="hidden" value="<?=$value['id']?>" name="impresiones[<?=$key?>][impresion_id]">
										<input class="" type="checkbox" id="chb_<?=$value['id']?>" value="On" name="impresiones[<?=$key?>][estado]" >
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant1]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant2]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant3]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant4]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant5]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant6]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="impresiones[<?=$key?>][cant7]">
									</div>
								</div>
								<?php endforeach ?>
							</div>
							<strong>NOTA:</strong> Verificar que esta marcado o de lo contrario no se aplicara lo cambios.
						</div>
						<legend>Costo por Proveedor</legend>
						<div class="form-group" style="overflow: auto; margin: 20px;">
							<div id="proveedorProducto">
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<label style="width: 20px;"></label>
										<!-- <label class="tb-pvpd">Stock</label> -->
										<label class="tb-pvpd">50</label>
										<label class="tb-pvpd">100</label>
										<label class="tb-pvpd">200</label>
										<label class="tb-pvpd">300</label>
										<label class="tb-pvpd">400</label>
										<label class="tb-pvpd">500</label>
										<label class="tb-pvpd">1000</label>
										<label class="tb-pvpd">3000</label>
									</div>
								</div>
								<?php foreach ($proveedores as $key => $value): ?>
								<div class="form-group">
									<label class="col-sm-2 control-label"><?=$value['abreviatura']?></label>
									<div class="col-sm-10">
										<input class="tb-pvpd" type="hidden" value="<?=$value['id']?>" name="proveedor[<?=$key?>][proveedor_id]">

										<input class="" type="checkbox" value="On" name="proveedor[<?=$key?>][estado]">

										<!-- <input class="tb-pvpd" type="text" placeholder="Stock" value="" name="proveedor[<?=$key?>][stock]"> -->
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant1]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant2]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant3]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant4]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant5]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant6]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant7]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="" name="proveedor[<?=$key?>][cant8]">
									</div>
								</div>
								<?php endforeach ?>
							</div>
							<strong>NOTA:</strong> Verificar que esta marcado o de lo contrario no se aplicara lo cambios.
						</div>

						<legend>% Ganancia Intervalos Fijos para todos los Producto</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label">01-49</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[1][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[1][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">50-100</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[2][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[2][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">101-300</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[3][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[3][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">301-500</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[4][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[4][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">501-800</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[5][estado]" <?=(!empty($intervalo['int5']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[5][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">801-1000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[6][estado]">
								<input type="text" id="" class="form-control" name="intervalo[6][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">1001-2500</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[7][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[7][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">2501-4000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[8][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[8][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">4001-6000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[9][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[9][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">6001-10000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[10][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[10][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">10001-30000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[11][estado]" >
								<input type="text" id="" class="form-control" name="intervalo[11][int]" placeholder="" value="<?=(!empty($intervalo['int11']) ? $intervalo['int11'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">30001+</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[12][estado]">
								<input type="text" id="" class="form-control" name="intervalo[12][int]" placeholder="" value="" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>

						<legend>Parámetros para SEO</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label">Titulo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_title" placeholder="" <?php echo in_array('seo_title', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_title'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_description" placeholder="" <?php echo in_array('seo_description', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_description'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keywords</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_keywords" placeholder="" <?php echo in_array('seo_keywords', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_keywords'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 p-l-15">
								<button type="submit" class="btn btn-sm btn-success">Grabar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
 function recursive($array,$space = 0) {
	foreach ($array as $key => $value) {
		$deshabilitado = ($value['padre'] == '1')? 'disabled': '';
		if ($space > 1) 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".str_repeat("&nbsp;", $space)."&nbsp;".$value['nombre'];
		else 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".$value['nombre'];

		if (is_array($value['sub_categorias']) && !empty($value['sub_categorias'])) 
			recursive($value['sub_categorias'], $space + 1);
	}
}
 ?>
<script>
function getAjaxAtributos(argument) {
	$.ajax({
		data:  {"id_categoria" : $("#selectedCategoria").val() },
		url:   'dashboard/atributos/getAjaxAtributos',
		//dataType: "json",
		type:  'post',
		beforeSend: function (response) {
			$('#ajaxAtributos').text('Procesando...');
		},
		success:  function (response) {
			$("#ajaxAtributos").html(response);                        
        }
    });
}
</script>
<style type="text/css">
	#proveedorProducto{
		width: 885px;
	}
	#proveedorProducto label.control-label {
		width: 16% !important;
		text-align: right;
	}
	#proveedorProducto .col-sm-10 {
		width: 83%;
		display: inline-block;
	}
	#proveedorProducto label.tb-pvpd{
		text-align: center;
	}
	#proveedorProducto label.tb-pvpd,input.tb-pvpd {
		width: 75px;
		margin: 0;
		padding: 0;
	}
</style>