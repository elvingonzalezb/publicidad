<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edicion de Impresion</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
					<a class="btn" href="dashboard/impresiones/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Impresiones</u></a>
					<div class="clearfix"></div>
				</div>
				
				<div class="panel-body p-b-25">
					<?=$this->session->flashdata('message');?>
					<form class="form-horizontal" action="dashboard/impresiones/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formImpresion">
						<div class="form-group">
							<label class="col-sm-2 control-label">Tipo Impresión</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="tipo_impresion" placeholder="" value="<?=( ! empty($dataset['tipo_impresion']) ? $dataset['tipo_impresion'] : '')?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="" name="descripcion" required><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<img class="img-responsive" src="files/impresiones/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" alt="<?=$dataset['tipo_impresion']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Imagen</label>
							<div class="col-sm-10">
								<input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
								<input type="file" class="form-control" id="" name="imagen" required>
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