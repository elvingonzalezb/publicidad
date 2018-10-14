<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
                <div class="box col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Stock</div>
						
						<div class="panel-body p-b-25">
							<?=$this->session->flashdata('message')?>
							<form class="form-horizontal" action="dashboard/secciones/stock/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formSecciones">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10">
										<input type="text" <?=in_array('titulo', $requerid)? 'required':''; ?>  class="form-control slugName" id="" name="titulo" placeholder="" value="<?=( ! empty($dataset['titulo']) ? $dataset['titulo'] : '')?>" >
										<?php echo form_error('titulo'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<?=getIconImage($dataset['documento'])?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Archivo</label>
									<div class="col-sm-10">
										<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
										<input type="file" name="documento">
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
	</div>
</div>
<?php 
function getIconImage($documento='')
{
	if ($documento !== '') {
		$mime = explode(".", $documento);
		$count = count($mime);
		$count--;
		return '<a href="files/archivos/'.$documento.'" target="_blank" title="VER BROCHURE"><img alt="'.$mime[$count].'" src="assets/dashboard/adminbsb/images/'.$mime[$count].'.png"><p>'.$documento.'</p></a>';
	}else{
		return '<p></p>';
	}
	
}
 ?>