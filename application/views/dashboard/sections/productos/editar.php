<link href="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.css" media="all" rel="stylesheet">
<script src="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.min.js" type="text/javascript"></script>
<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Producto')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">PRODUCTO</div>
				<div class="panel-body p-b-25">
					<div><?=$this->session->flashdata('message');?></div>
					<form class="form-horizontal" action="dashboard/productos/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>/<?=$id_categoria?>" method="post" enctype="multipart/form-data" id="formProductos" name="formProducto">
						<div class="form-group">
							<label class="col-sm-2 control-label">Categoria</label>
							<div class="col-sm-10">

								<select class="form-control chosen-select" onchange="getAjaxAtributos()" id="selectedCategoria" data-placeholder="Seleccionar" data-rule-chosen-required="true" name="categoria_id" <?=in_array('categoria_id', $requerid)? 'required':''; ?>>
									<option value=""></option>
									<?php recursive($categorias); ?>
                                </select>
								<?=form_error('categoria_id'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugName" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
								<?=form_error('nombre'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Url</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugUrl" id="" name="url" placeholder="" value="<?=( ! empty($dataset['url']) ? $dataset['url'] : '')?>" <?=in_array('url', $requerid)? 'required':''; ?>>
		            			<?=form_error('url'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Codigo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" autocomplete="off" name="codigo" placeholder="" value="<?=( ! empty($dataset['codigo']) ? $dataset['codigo'] : '')?>" <?php echo in_array('codigo', $requerid)? 'required':''; ?>>
								<?=form_error('codigo'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control"  id="ckeditor" name="descripcion" <?=in_array('descripcion', $requerid)? 'required':''; ?>><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
								<?=form_error('descripcion'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Orden</label>
							<div class="col-sm-10">
								<input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
								<?=form_error('orden'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="aero" <?=in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Activo</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="blue" <?=in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Inactivo</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Destacado</label>
							<div class="col-sm-2">
								<input type="radio" id="" name="destacado" value="<?= _ACTIVO ?>" <?php if($dataset['destacado']==_ACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="aero" <?=in_array('destacado', $requerid)? 'required':''; ?>>
								<label for="destacado">Si</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="destacado" value="<?= _INACTIVO ?>"<?php if($dataset['destacado']==_INACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="blue" <?=in_array('destacado', $requerid)? 'required':''; ?>>
								<label for="destacado">No</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
			                    <div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
			                    <input type="file" name="files" id="fileuploader" multiple>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="col-sm-12">
									<?php foreach ($galerias as $galeria): ?>
									<div class="col-sm-2 m-b-30" id="img-<?=$galeria['id'] ?>">
										<a href="javascript:void(0)" onclick="eliminarGaleriaImg(<?=$galeria['id']; ?>);return false;" class="btn-close-galeria" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
										<a href="files/productos/thumbs/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" data-lightbox="gallery" data-title="<?=$galeria['imagen_title']; ?>">
											<img class="img-responsive" src="files/productos/thumbs/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" alt="<?=$galeria['imagen_title']; ?>">
										</a>
									</div>
									<?php endforeach ?>
								</div>
								<div id="ajax-message" class="col-sm-12"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">OFERTA</label>
							<div class="col-sm-2">
								<input type="radio" id="" name="oferta" value="<?= _ACTIVO ?>" <?php if($dataset['oferta']==_ACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="aero" <?=in_array('oferta', $requerid)? 'required':''; ?>>
								<label for="oferta">Si</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="oferta" value="<?= _INACTIVO ?>"<?php if($dataset['oferta']==_INACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="blue" <?=in_array('oferta', $requerid)? 'required':''; ?>>
								<label for="oferta">No</label>
							</div>
						</div>

						<div id="ajaxAtributos"></div>
						<div class="form-group">
                            
                        </div>


                        <div class="form-group">
							<label class="col-sm-2 control-label">Tiempo de producción</label>
							<div class="col-sm-10">
								<input type="number" min="0" class="form-control" id="" style="width: 65px;display: inline-block;" name="tiempo_produccion" placeholder="" value="<?=( ! empty($dataset['tiempo_produccion']) ? $dataset['tiempo_produccion'] : '')?>" <?=in_array('tiempo_produccion', $requerid)? 'required':''; ?>>
								(número de días)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Movilidad</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_movilidad" placeholder="" value="<?=( ! empty($dataset['c_movilidad']) ? $dataset['c_movilidad'] : '')?>" <?=in_array('c_movilidad', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo de Demasia</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_demasia" placeholder="" value="<?=( ! empty($dataset['c_demasia']) ? $dataset['c_demasia'] : '')?>" <?=in_array('c_demasia', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Unitario Embalaje</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_unit_embalaje" placeholder="" value="<?=( ! empty($dataset['c_unit_embalaje']) ? $dataset['c_unit_embalaje'] : '')?>" <?=in_array('c_unit_embalaje', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Costo Regalo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" style="width: 65px;" name="c_regalo" placeholder="" value="<?=( ! empty($dataset['c_regalo']) ? $dataset['c_regalo'] : '')?>" <?=in_array('c_regalo', $requerid)? 'required':''; ?>>
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
										<input class="" type="checkbox" id="chb_<?=$value['id']?>" value="On" name="impresiones[<?=$key?>][estado]" <?=(!empty($costoImpresion[$value['id']]) ? 'checked' : '')?>>
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant1']) ? $costoImpresion[$value['id']]['cant1'] : '')?>" name="impresiones[<?=$key?>][cant1]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant2']) ? $costoImpresion[$value['id']]['cant2'] : '')?>" name="impresiones[<?=$key?>][cant2]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant3']) ? $costoImpresion[$value['id']]['cant3'] : '')?>" name="impresiones[<?=$key?>][cant3]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant4']) ? $costoImpresion[$value['id']]['cant4'] : '')?>" name="impresiones[<?=$key?>][cant4]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant5']) ? $costoImpresion[$value['id']]['cant5'] : '')?>" name="impresiones[<?=$key?>][cant5]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant6']) ? $costoImpresion[$value['id']]['cant6'] : '')?>" name="impresiones[<?=$key?>][cant6]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($costoImpresion[$value['id']]['cant7']) ? $costoImpresion[$value['id']]['cant7'] : '')?>" name="impresiones[<?=$key?>][cant7]">
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
										<label class="tb-pvpd">0-49</label>
										<label class="tb-pvpd">50-499</label>
										<label class="tb-pvpd">500-999</label>
										<label class="tb-pvpd">1000 - 4999</label>
										<label class="tb-pvpd">5000 +</label>
									</div>
								</div>
								<?php foreach ($proveedores as $key => $value): ?>
								<div class="form-group">
									<label class="col-sm-2 control-label"><?=$value['abreviatura']?></label>
									<div class="col-sm-10">
										<input class="tb-pvpd" type="hidden" value="<?=$value['id']?>" name="proveedor[<?=$key?>][proveedor_id]">

										<input class="" type="checkbox" value="On" name="proveedor[<?=$key?>][estado]" <?=(!empty($cantidades[$value['id']]) ? 'checked' : '')?>>

										<!-- <input class="tb-pvpd" type="text" placeholder="Stock" value="<?//=(!empty($cantidades[$value['id']]['stock']) ? $cantidades[$value['id']]['stock'] : '')?>" name="proveedor[<?=$key?>][stock]"> -->
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($cantidades[$value['id']]['cant1']) ? $cantidades[$value['id']]['cant1'] : '')?>" name="proveedor[<?=$key?>][cant1]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($cantidades[$value['id']]['cant2']) ? $cantidades[$value['id']]['cant2'] : '')?>" name="proveedor[<?=$key?>][cant2]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($cantidades[$value['id']]['cant3']) ? $cantidades[$value['id']]['cant3'] : '')?>" name="proveedor[<?=$key?>][cant3]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($cantidades[$value['id']]['cant4']) ? $cantidades[$value['id']]['cant4'] : '')?>" name="proveedor[<?=$key?>][cant4]">
										<input class="tb-pvpd" type="text" placeholder="0.00" value="<?=(!empty($cantidades[$value['id']]['cant5']) ? $cantidades[$value['id']]['cant5'] : '')?>" name="proveedor[<?=$key?>][cant5]">
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
								<input type="checkbox" id="" value="On" name="intervalo[1][estado]" <?=(!empty($intervalo['int1']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[1][int]" placeholder="" value="<?=(!empty($intervalo['int1']) ? $intervalo['int1'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">50-100</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[2][estado]" <?=(!empty($intervalo['int2']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[2][int]" placeholder="" value="<?=(!empty($intervalo['int2']) ? $intervalo['int2'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">101-300</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[3][estado]" <?=(!empty($intervalo['int3']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[3][int]" placeholder="" value="<?=(!empty($intervalo['int3']) ? $intervalo['int3'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">301-500</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[4][estado]" <?=(!empty($intervalo['int4']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[4][int]" placeholder="" value="<?=(!empty($intervalo['int4']) ? $intervalo['int4'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">501-800</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[5][estado]" <?=(!empty($intervalo['int5']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[5][int]" placeholder="" value="<?=(!empty($intervalo['int5']) ? $intervalo['int5'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">801-1000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[6][estado]" <?=(!empty($intervalo['int6']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[6][int]" placeholder="" value="<?=(!empty($intervalo['int6']) ? $intervalo['int6'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">1001-2500</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[7][estado]" <?=(!empty($intervalo['int7']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[7][int]" placeholder="" value="<?=(!empty($intervalo['int7']) ? $intervalo['int7'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">2501-4000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[8][estado]" <?=(!empty($intervalo['int8']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[8][int]" placeholder="" value="<?=(!empty($intervalo['int8']) ? $intervalo['int8'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">4001-6000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[9][estado]" <?=(!empty($intervalo['int9']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[9][int]" placeholder="" value="<?=(!empty($intervalo['int9']) ? $intervalo['int9'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">6001-10000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[10][estado]" <?=(!empty($intervalo['int10']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[10][int]" placeholder="" value="<?=(!empty($intervalo['int10']) ? $intervalo['int10'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">10001-30000</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[11][estado]" <?=(!empty($intervalo['int11']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[11][int]" placeholder="" value="<?=(!empty($intervalo['int11']) ? $intervalo['int11'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">30001+</label>
							<div class="col-sm-10">
								<input type="checkbox" id="" value="On" name="intervalo[12][estado]" <?=(!empty($intervalo['int12']) ? 'checked' : '')?> >
								<input type="text" id="" class="form-control" name="intervalo[12][int]" placeholder="" value="<?=(!empty($intervalo['int12']) ? $intervalo['int12'] : '')?>" style="display:inline-block;width: 100px;" ><span>&nbsp;%</span>
							</div>
						</div>
						<legend>Parámetros para SEO</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label">Titulo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=$dataset['seo_title']?>" <?=in_array('seo_title', $requerid)? 'required':''; ?>>
								<?=form_error('seo_title'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=$dataset['seo_description']?>" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
								<?=form_error('seo_description'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keywords</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_keywords" placeholder="" value="<?=$dataset['seo_keywords']?>" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
								<?=form_error('seo_keywords'); ?>
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
		if ($space > 0) 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".str_repeat("&nbsp;", $space)."&nbsp;".$value['nombre'];
		else 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".$value['nombre'];

		if (is_array($value['sub_categorias']) && !empty($value['sub_categorias'])) 
			recursive($value['sub_categorias'], $space + 1);
	}
}
 ?>
<script>
window.addEventListener('load', getAjaxAtributos, false);
$('.chosen-select').val([<?=$dataset['categoria_id'] ?>]).trigger('chosen:updated');

function eliminarGaleriaImg(id_imagen) {
    swal({
        title: "¿Estás seguro?",
        text: "¡No podrás recuperar esta imagen!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sí, borrar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            data:  { "id_imagen" : id_imagen },
			url:   'dashboard/productos/eliminarGaleriaImg',
			dataType: "json",
			type:  'post',
            success: function (response) {
            	$('#img-'+id_imagen).remove();
                swal("¡Hecho!", "¡Se eliminó con éxito!", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
            }
        });
    });
}

function getAjaxAtributos() {
	$.ajax({
		data:  {"id_categoria" : $("#selectedCategoria").val(),"producto_id" : <?=$dataset['id']?> },
		url:   'dashboard/atributos/getAjaxAtributos_edit',
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
		width: 95px;
		margin: 0;
		padding: 0;
	}
</style>