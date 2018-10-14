<?php if (!empty($tipos)): ?>
	<div class="row">
		<label for="group_1" class="col-sm-2 attribute_label attribute-key">Tipos de Impresión</label>
		<div class="col-sm-10 attribute_list">
			<select class="form-control selectpicker attribute_select no-print" name="tipo_impresion" required>
				<option value="" disabled selected>Seleccione</option>
				<?php foreach ($tipos as $tkey => $tvalue): ?>
				<option value="<?= $tvalue['id'] ?>"><?= $tvalue['tipo_impresion'] ?></option>	
				<?php endforeach ?>
			</select>
		</div>									
	</div>
<!-- 	<div class="row">
		<label for="group_1" class="col-sm-2 attribute_label attribute-key">Nro de colores</label>
		<div class="col-sm-10 attribute_list">
			<select class="form-control selectpicker attribute_select no-print" name="nro_color" required>
				<option value="" disabled selected>Seleccione</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</div>								
	</div> -->
<?php endif ?>