<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Trabajo','id_trabajo'=>'','id_proyecto'=>$id_proyecto)); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edición de Trabajo</div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/proyectos/editar_trabajo/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formGaleriaTrabajos">
                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Proyectos</label>
                            <div class="col-sm-10">
                                <select name="proyecto_id" class="form-control chosen-select" id="trabajo_id" <?=in_array('proyecto_id', $requerid)? 'required':''; ?>>
                                    <?php foreach ($trabajo as $key => $value) {?>
                                    <option value="<?=$value['id']?>"><?= $value['nombre']?></option>
                                     <?php }  ?> 
                                     ?>
                                </select>
                                        <?php echo form_error('proyecto_id'); ?>
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
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="descripcion" placeholder="" value="<?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?>" <?=in_array('descripcion', $requerid)? 'required':''; ?>>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
                                <?php echo form_error('orden'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="destacado" value="1" <?php if($dataset['destacado']==1){ echo 'checked';} ?> <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                     Destacado
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="destacado" value="0"<?php if($dataset['destacado']==0){ echo 'checked';} ?> <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                No destacado
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                                Activo
                            </div>
                            <div class="col-sm-2">
                                 <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                            Inactivo
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <img src="files/proyectos/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" alt="<?=$dataset['imagen_title']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
                                <p><div class="alert alert-info"> La foto debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                                <input type="file" name="imagen">
                            </div>
                        </div>

                        <legend>Parámetros para SEO</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=( ! empty($dataset['seo_title']) ? $dataset['seo_title'] : '')?>" <?=in_array('descripcion', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=( ! empty($dataset['seo_description']) ? $dataset['seo_description'] : '')?>" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_description'); ?>
                            </div>
                        </div>                               
                        <div class="form-group">
                            <label class="col-sm-2 control-label">seo_keywords</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_keywords" placeholder="" value="<?=( ! empty($dataset['seo_keywords']) ? $dataset['seo_keywords'] : '')?>" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
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

<script>
  $("#trabajo_id option[value="+ <?=$dataset['proyecto_id']?> +"]").attr("selected",true);
</script>