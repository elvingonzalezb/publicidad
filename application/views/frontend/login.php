 <div class="breadcrumb">
        <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url('assets/frontend/img/banner-login.jpg');">
        </div>
        <!-- cierre banner -->
		<div class="breadcrumb-inner">
			<div class="container">
				<ul class="list-inline list-unstyled">
					<li><a href="./">Inicio</a></li>
					<li class='active'>Acceso</li>
				</ul>
			</div>
		</div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->

<div class="tm-login-info">
	<div class="container" id="redirectLogin">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
				<div class="col-md-6 col-sm-6">
					<h4 class="sub-titulo">INGRESAR</h4>
					<p class="">Ingrese a continuación el correo y clave que uso al registrarse</p>
					<form class="register-form outer-top-xs" role="form" action="clientes/login" method="post" enctype="multipart/form-data">
						
						<?=$this->session->flashdata('message')?>
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Correo <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" name="email" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputPassword1">Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="clave" value="" required>
						</div>
						<div class="radio outer-xs">
							<a href="clientes/olvido" class="forgot-password pull-right">¿Olvidaste tu contraseña?</a><br>
							<!-- <a href="clientes/reenviar-activacion" class="forgot-password pull-right">Volver a enviar correo de activación</a> -->
							
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">INGRESAR</button>
					</form>
				</div>
				<!-- Sign-in -->
				<!-- create a new account -->
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="sub-titulo">REGÍSTRATE</h4>
					<p class="text title-tag-line">Llene el formulario que se muestra a continuación.</p>
					<form class="register-form outer-top-xs" id="formCliente" role="form" action="clientes/registrate" method="post" enctype="multipart/form-data">
						<?php if (validation_errors()) : ?>
						<div class="form-group has-feedback">
							<?= validation_errors() ?>
						</div>
						<?php endif; ?>
						<?=$this->session->flashdata('message_add')?>
						<!-- <div class="form-group">
							<label class="info-title" for="">Nombres <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="nombres" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Apellidos <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="apellidos" >
						</div> -->
						<div class="form-group">
							<label class="info-title" for="rubro_id">Tipo de Documento <span>*</span></label>
							<select class="form-control unicase-form-control text-input" required name="rubro_id">
								<option disabled selected>Seleccione</option>
							<?php foreach ($rubros as $key => $value): ?>
								<option value="<?=$value['id']?>"><?=$value['nombre']?></option>
							<?php endforeach ?>	
							</select>
						</div>
						<div class="form-group">
							<label class="info-title" for="">Razón Social <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="razon_social" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">RUC <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="ruc" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Correo <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" name="correo" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="">Teléfono <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="telefono" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Dirección Fiscal de la factura<span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="direccion" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="ck_direccion">Dirección de factura es igual que de entrega? <input id="ck_direccion" class="ck_direccion" type="checkbox" class="text-input" name="ck_direccion"></label>
						</div>
						
						<div class="form-group">
							<label class="info-title" for="">Dirección de Entrega<span>*</span></label>
							<input type="text" id="direcEntrega" class="form-control unicase-form-control text-input" name="direccion_entrega" required>
						</div>
						
						<div class="form-group">
							<label class="info-title" for="">Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="password" id="password" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="">Repetir Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="cfmPassword" id="cfmPassword" required>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Crear cuenta</button>
					</form>
				</div>
				<!-- create a new account -->			
			</div>
			<!-- /.row -->
		</div>
		<!-- /.sigin-in-->
	</div>
	<!-- /.container -->
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#ck_direccion").change(function () {
		if(this.checked) {
			$("#direcEntrega").prop('disabled', true);
			$("#direcEntrega").val('');
		}else{
			$("#direcEntrega").prop('disabled', false);
		}
	});
});
</script>