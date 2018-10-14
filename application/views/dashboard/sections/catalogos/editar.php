<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edición</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/catalogos/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar al listado</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/catalogos/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formCatalogos">
                          
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="titulo" placeholder="" value="<?=( ! empty($dataset['titulo']) ? $dataset['titulo'] : '')?>" <?=in_array('titulo', $requerid)? 'required':''; ?>>
                                <?=form_error('titulo'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <?=getIconImage($dataset['archivo'])?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Documento (*.pdf)</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input type="hidden" name="antpdf" value="<?=$dataset['archivo']?>">
                                <input type="file" name="archivo">
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
                            <img src="files/catalogos/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="200" alt="<?=$dataset['titulo']?>">
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
function getIconImage($documento='')
{
    if ($documento !== '') {
        $mime = explode(".", $documento);
        $count = count($mime);
        $count--;
        return '<a href="files/catalogos/'.$documento.'" target="_blank" title="VER CATALOGO"><img alt="'.$mime[$count].'" src="assets/dashboard/adminbsb/images/'.$mime[$count].'.png"><p>'.$documento.'</p></a>';
    }else{
        return '<p></p>';
    }
    
}
 ?>