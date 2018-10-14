<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">SUSCRIPCIONES</div>
		<div class="panel-body">
			<?=$this->session->flashdata('message');?>
			<table class="table table-striped table-hover js-exportable dataTable" data-title="titulo" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="5%">N°</th>
						<th>CORREO</th>
						<th>ESTADO</th>
						<th width="18%" class="noExport">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataset as $key => $value): ?>
					<?php $estado = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
					<?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
					<tr id="fila-<?=$value['id']?>">
						<td><?=$key+1?></td>
						<td><?=$value['correo']?></td>
						<td>
							<form action="" id="estadoAjax">
								<input type="hidden" id="idBan<?=$value['id']?>" value="<?=$value['id']?>">
								<input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
								<button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
								onclick="actualizarEstado($('#idBan<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'suscripciones/ajaxEstado');return false;"><?=$estado?></button>
                                <span id="divResultado<?=$value['id']?>"></span>
							</form>
						</td>
						<td class="center">
							<!-- <a class="btn btn-info" href="dashboard/suscripciones/editar/<?=$value['id']?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
								Editar
							</a> -->
							<a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'suscripciones/delete');">
								<i class="glyphicon glyphicon-trash icon-white"></i>
								Borrar
							</a>
						</td>
					</tr>
					<?php endforeach;?>                              
				</tbody>
			</table>
		</div>
	</div>
</div>