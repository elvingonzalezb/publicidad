<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">RUBROS</div>
		<div style="position: relative;text-align: right;padding-bottom: 15px;">
			<a class="btn" href="dashboard/rubros/nuevo"><i style="margin-right:5px;" class="fa fa-plus"></i><u>Nuevo Rubro</u></a>
			<div class="clearfix"></div>
		</div>
		<div class="panel-body">
			<?=$this->session->flashdata('message');?>
			<table class="table table-striped table-hover js-exportable dataTable" data-title="titulo" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="5%">N°</th>
						<th>RUBRO</th>
						<th width="18%" class="noExport">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataset as $key => $value): ?>
					<tr id="fila-<?=$value['id']?>">
						<td><?=$key+1?></td>
						<td><?=$value['nombre']?></td>
						<td class="center">
							<a class="btn btn-info" href="dashboard/rubros/editar/<?=$value['id']?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
								Editar
							</a>
							<a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'rubros/delete');">
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