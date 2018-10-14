<!-- tabla para editar-->
<script src="assets/dashboard/adminbsb/js/jquery.tabledit.min.js"></script>
<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Atributo')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">ATRIBUTO</div>
				<div class="panel-body p-b-25">
					<div><?=$this->session->flashdata('message');?></div>
					<form class="form-horizontal" action="dashboard/atributos/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formAtributo">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" <?=in_array('nombre', $required)? 'required':''; ?>>
								<?=form_error('nombre'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="aero" <?=in_array('estado', $required)? 'required':''; ?>>
								<label for="estado">Activo</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="blue" <?=in_array('estado', $required)? 'required':''; ?>>
								<label for="estado">Inactivo</label>
							</div>
						</div>
						<legend>Detalle del atributo</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<a title="Agregar nuevo item" href="javascript:void(0);" id="addRow" class="btn btn-primary"> Agregar nuevo detalle</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="clearfix">
									<table id="editTable" class="table table-striped">
										<thead>
											<tr id="Tablehead">
												<th></th>
												<th>Nombre</th>
												<th>Descripción</th>
												<th>valor</th>
												<th style="display: none;"></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($detalle as $key => $value): ?>
											<tr data-atributo="<?=$value['atributo_id']?>">
												<td><?=$value['id']?></td>
												<td><?=$value['nombre']?></td>
												<td><?=$value['descripcion']?></td>
												<td><?=$value['valor']?></td>
												<td style="display: none;" class="atributos-class"><?=$value['atributo_id']?></td>
											</tr>
										<?php endforeach ?>
										</tbody>
									</table>
								</div>
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
<script>
$(document).ready(function () {
    $('#editTable').Tabledit({
        url: 'dashboard/atributos/ajaxDetalleAtributo',
        hideIdentifier: true,
        columns: {
          identifier: [0, 'a_id'],                    
          editable: [[1, 'a_nombre'], [2, 'a_descripcion'], [3, 'a_valor'], [4, 'a_atributo_id']]
        },
        restoreButton: false,
		onAjax:function(action, serialize) {
			if(action == 'delete'){
				var array = serialize.split("&");
				var varID = array[0].split("=");
				var numID = $("#editTable").children('tbody').children('tr').length;
				var lastID = $("#editTable tbody tr:last").attr("id");
				if (numID == 2) { if (varID[1] !== 'xx' && lastID == 'xx') { swal("Necesita al menos un valor del atributo"); return false;}}
				if (numID ==1) { 
					if (varID !== 'xx' || varID == 'xx' ) { swal("Necesita al menos un valor del atributo"); return false;}
				}	
			}
		},
		onSuccess:function(data, textStatus, jqXHR) {
			if(data.action == 'delete'){
				$('#'+data.a_id).remove();
			}
			if(data.action == 'edit'){
				if (data.a_id !== 'true') {
					$("#editTable tr:last").attr("id", data.a_id);
					$("#editTable tr:last td .tabledit-span.tabledit-identifier").text(data.a_id);
					$("#editTable tr:last td .tabledit-input.tabledit-identifier").val(data.a_id);
				}
			}
		}
    });
    $("#formAtributo").submit(function() {
	var numID = $("#editTable").children('tbody').children('tr').length;
		if (numID < 2) { 
			var lastID = $("#editTable tr:last").attr("id");
			if (lastID == 'xx') {swal("Necesita al menos un valor del atributo."); return false;}
		}
	});
	$("#addRow").click(function() {
		var lastID = $("#editTable tr:last").attr("id");
		if (lastID == undefined) {lastID = 'xx'}
		if (lastID == 'xx') {swal("Completar el valor, para seguir añadiendo."); return false;}
		var atrID = parseInt($("#editTable tr:last").data("atributo"));
		var clone = $("table tr:last").clone();
		$(".tabledit-view-mode span", clone).text("");
		$(".tabledit-view-mode input", clone).val("");
		clone.appendTo("table");
		$("#editTable tr:last").attr("id", "xx");
		$("#editTable tr:last td .tabledit-span.tabledit-identifier").text("xx");
		$("#editTable tr:last td .tabledit-input.tabledit-identifier").val("xx");

		$("#editTable tr:last .atributos-class span").text(atrID);
		$("#editTable tr:last .atributos-class input").val(atrID);
		$("#editTable tr:last .tabledit-edit-button").trigger("click");
	});
});

</script>