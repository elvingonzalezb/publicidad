<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edición de Suscripciones</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
					<a class="btn" href="dashboard/suscripciones/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a suscripciones</u></a>
					<div class="clearfix"></div>
				</div>
				
				<div class="panel-body p-b-25">
					<?=$this->session->flashdata('message');?>
					<form class="form-horizontal" action="dashboard/suscripciones/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formRubro">
						<div class="form-group">
							<label class="col-sm-2 control-label">Correo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="correo" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" required>
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