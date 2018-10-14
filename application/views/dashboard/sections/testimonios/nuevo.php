<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo testimonio</div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/testimonios/nuevo" method="post" enctype="multipart/form-data" id="formTestimonios">
                        <div class="form-group">
                                <label class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sumilla</label>
                            <div class="col-sm-10">
                                <textarea style="resize: none;" rows="5" class="form-control" name="sumilla" <?=in_array('sumilla', $requerid)? 'required':''; ?>><?=( ! empty($dataset['sumilla']) ? $dataset['sumilla'] : '')?></textarea>
                                <?php echo form_error('sumilla'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Testimonio</label>
                            <div class="col-sm-10">
                            <textarea class="form-control"  id="ckeditor" name="testimonio" <?=in_array('testimonio', $requerid)? 'required':''; ?>></textarea>
                                <?php echo form_error('testimonio'); ?>
                            </div>
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
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                            <input type="file" name="imagen" required>
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
    </div>
</div>