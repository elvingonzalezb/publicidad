<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo')); ?>
<!-- <script type="text/javascript" src="dashboard/adminbsb/js/jquery.validate.min.js"></script> -->
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
					<a class="btn" href="dashboard/usuarios/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a listado</u></a>
					<div class="clearfix"></div>
				</div>
				<?=$this->session->flashdata('message');?>
				<div class="panel-body p-b-25">
					<form class="form-horizontal" action="dashboard/usuarios/nuevo" method="post" enctype="multipart/form-data" id="formUsuario">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="nombre" placeholder="" value="">
								<?php echo form_error('nombre'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Usuario</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="usuario" placeholder="" value="" required>
								<?php echo form_error('usuario'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Clave</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="" value="" required>
								<?php echo form_error('password'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Repetir Clave</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="cfmPassword" name="cfmPassword" placeholder="" value="" required>
								<input type="hidden" name="nivel_id" value="3">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked >
								Activo
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" >
								Inactivo
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 p-l-15">
								<button type="submit" class="btn btn-sm btn-success">Grabar</button>
							</div>
						</div>
					</form>
				</div>
				<!-- fin del context -->
			</div>
			<!-- fin del header -->
		</div>
		<!--/row-->
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){ 
	$("#formUsuario").validate({
	    rules: {
	        nombre:{required: true},
	        usuario:{required: true},
	        password: { 
	            required: true,
	            minlength: 6,
	            maxlength: 10,
	        } , 
	        cfmPassword: { 
	            equalTo: "#password",
	            minlength: 6,
	            maxlength: 10
	        }
	    },
	    messages:{
	        nombre: {required: "Este campo es requerido."},
	        usuario: {required: "Este campo es requerido."},
	        password: { 
	            required:"Este campo es requerido.",
	            minlength:"Introduzca al menos 6 caracteres."
	        },
	        cfmPassword:{required:"Este campo es requerido.",equalTo:"Por favor, introduzca el mismo valor."}
	    }
	});
});
</script>