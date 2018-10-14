<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edición de Proveedor</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
					<a class="btn" href="dashboard/proveedores/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a listado</u></a>
					<div class="clearfix"></div>
				</div>
				<?=$this->session->flashdata('message');?>
				<div class="panel-body p-b-25">
							<form class="form-horizontal" action="dashboard/proveedores/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formProveedor">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nombres</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" <?=in_array('nombre', $required)? 'required':''; ?>>
										<?php echo form_error('nombre'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Abreviatura</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="abreviatura" placeholder="" value="<?=( ! empty($dataset['abreviatura']) ? $dataset['abreviatura'] : '')?>" <?=in_array('abreviatura', $required)? 'required':''; ?>>
										<?php echo form_error('abreviatura'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-2">
										<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> <?=in_array('estado', $required)? 'required':''; ?>>
										Activo
									</div>
									<div class="col-sm-2">
										<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> <?=in_array('estado', $required)? 'required':''; ?>>
										Inactivo
									</div>
					            </div>

								<div class="form-group">
									<div class="col-sm-offset-2 p-l-15">
										<button type="submit" class="btn btn-sm btn-success">Grabar</button>
									</div>
								</div>
							</form>
				</div>  <!-- fin del context -->
			</div>  <!-- fin del header -->
		</div><!--/row-->
	</div>
</div>