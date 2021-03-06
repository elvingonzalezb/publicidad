<link href="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.css" media="all" rel="stylesheet">
<script src="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.min.js" type="text/javascript"></script>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">PRODUCTO</div>
				<div class="panel-body p-b-25">
					<div><?=$this->session->flashdata('success');?></div>
					<form class="form-horizontal" action="dashboard/productos/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formProducto" name="formProducto">
						<div class="form-group">
							<label class="col-sm-2 control-label">Categoria</label>
							<div class="col-sm-10">

								<select class="form-control chosen-select" data-rule-chosen-required="true" name="categoria_id[]" multiple="multiple" <?=in_array('categoria_id[]', $requerid)? 'required':''; ?>>
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
										<a href="files/productos/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" data-lightbox="gallery" data-title="<?=$galeria['imagen_title']; ?>">
											<img class="img-responsive" src="files/productos/thumbs/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" alt="<?=$galeria['imagen_title']; ?>">
										</a>
									</div>
									<?php endforeach ?>
								</div>
								<div id="ajax-message" class="col-sm-12"></div>
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
$('.chosen-select').val([<?=$dataset['categorias'] ?>]).trigger('chosen:updated');

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
</script>