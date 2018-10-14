<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo Video')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Video</div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/galeria_videos/nuevo_video" method="post" enctype="multipart/form-data" id="formGaleriaVideos">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="ckeditor" name="descripcion" placeholder="" value="" <?=in_array('descripcion', $requerid)? 'required':''; ?>></textarea>
                            <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                            <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="1" <?=in_array('orden', $requerid)? 'required':''; ?>>
                            <?php echo form_error('orden'); ?>
                            </div>
                        </div>       
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="destacado" value="1" <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                Destacado
                                </div>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="destacado" value="0" checked <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                No destacado
                                </div>
                            </label>
                        </div>               
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked <?=in_array('estado', $requerid)? 'required':''; ?>>
                                Activo
                                </div>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                Inactivo
                                </div>
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link (Youtube)</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="link" placeholder="" value="" <?=in_array('link', $requerid)? 'required':''; ?>>
                            <?php echo form_error('link'); ?>
                            </div>
                        </div>
                        
                        <input type="hidden" name="idioma_id" value="1">
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