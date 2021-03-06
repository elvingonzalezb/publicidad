	<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
    <div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">ATRIBUTOS</div>
		<div class="panel-body">
			<div><?=$this->session->flashdata('success');?></div>
			<table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="5%">N°</th>
						<th>Nombre</th>
						<th>Estado</th>
						<th width="18%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataset as $key => $value): ?>
					<?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
					<?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
					<tr id="fila-<?=$value['id']?>">
						<td class="center"><?=$key+1?></td>
						<td><?=$value['nombre']?></td>
						<td class="center">
							<form action="" id="estadoAjax">
								<input type="hidden" id="idProduct<?=$value['id']?>" value="<?=$value['id']?>">
								<input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
								<button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
								onclick="actualizarEstado($('#idProduct<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'atributos/ajaxEstado');return false;"><?=$status?></button>
								<span id="divResultado<?=$value['id']?>"></span>
							</form>
						</td>
						<td class="center">
							<a class="btn btn-info" href="dashboard/atributos/editar/<?=$value['id']?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
								Editar
							</a>
							<a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarItem(<?=$value['id']?>,'atributos/delete');return false;">
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