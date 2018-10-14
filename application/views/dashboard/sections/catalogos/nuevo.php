<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo</div>
                  <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/catalogos/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a listado</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/catalogos/nuevo" method="post" enctype="multipart/form-data" id="formCatalogos">  

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="titulo" placeholder="" <?php echo in_array('titulo', $requerid)? 'required':''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Documento (*.pdf)</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input type="file" name="archivo">
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