<legend>Atributos</legend>
<?php foreach ($atributos as $a_key => $atributo): ?>
<div class="form-group">
    <label class="col-sm-2 control-label">Proveedor</label>
    <div class="col-sm-10">
        <select class="form-control chosen-select prov<?=$atributo['id']?>">
            <option value="">Seleccione</option>
            <?php foreach ($proveedores as $key => $value): ?>
            <option data-id="<?php echo $value['id'] ?>" data-valor="<?php echo $value['abreviatura'] ?>"  value="<?php echo $value['nombre']; ?>"><?php echo $value['nombre'].' ('.$value['abreviatura'].')'; ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"><?php echo $atributo['nombre']; ?></label>
	<div class="col-sm-10">
		<select class="form-control chosen-select select<?=$atributo['id']?>">
			<option value="">Seleccione</option>
			<?php foreach ($atributo['detalle'] as $ad_key => $option): ?>
			<option data-id="<?php echo $option['id'] ?>" data-valor="<?php echo $option['valor'] ?>"  value="<?php echo $option['nombre']; ?>"><?php echo $option['nombre']; ?></option>
			<?php endforeach ?>
		</select>
	</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Stock</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="cantidad" id="cantidad" min="0" step="1" value="">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 "></label>
    <div class="col-sm-10">
        <input type="button" onclick="agregaPrecioLista<?=$atributo['id']?>()" value="AGREGAR <?php echo $atributo['nombre']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <div id="contenedor_elegidos" class="clearfix">
            <table width="100%" cellpadding="0" border="1" cellspacing="0" id="tablaPrecios<?=$atributo['id']?>">
                <thead>
                    <th width="20%" style="text-align:center;">PROVEEDOR</th>
                    <th width="10%" style="text-align:center;">COLOR</th>
                    <th width="20%" style="text-align:center;">STOCK</th>
                    <th width="20%" style="text-align:center;">ACCION</th>
                </thead>
                <tbody>
                <?php 
                if (isset($detalle) && count($detalle['query'])>0) {
                    foreach ($detalle['query'][$atributo['id']] as $q_key => $q_value) {
                ?>
                    <tr id="fila_<?=$atributo['id'].$q_value['atributos']?>">
                        <td height="25" align="center" valign="middle"><?php echo $q_value['proveedor_nombre'] ?></td>
                        <td height="25" align="center" valign="middle">
                            <span><?= $q_value['atributos_nombres'] ?>: <i style="border: 1px solid #4a4a4a;padding: 0 10px;background-color:<?=$q_value['atributos_valor']?>"></i></span>
                            <?php 
                            /*$nombre_atributo = $q_value['atributos_nombres'];
                            if (strstr($nombre_atributo, '#') && strlen(trim($nombre_atributo))==7):*/ ?>
                                <!-- <span>COLOR: <i style="border: 1px solid #ccc;padding: 0 10px;background-color:<?php //echo $nombre_atributo?>"></i></span><br> -->
                            <?php //else: ?>
                                <span class="product-color"><? //=$q_value['atributos_valor']?></span><br>
                            <?php //endif ?>
                        </td>
                        <td height="25" align="center" valign="middle"><?php echo $q_value['cantidad'] ?></td>
                        <td align="center" valign="middle"><a href="javascript:quitarPrecioLista<?=$atributo['id']?>('<?=$q_value['atributos']?>')" style="color:red">ELIMINAR</a></td>
                    </tr>
                <?php
                    }
                } 
                 ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" class="form-control" id="atributos<?=$atributo['id']?>" name="datos[<?= $a_key ?>]" value="<?=( isset($detalle['datos'][$atributo['id']]) && !empty($detalle['datos'][$atributo['id']]) ? $detalle['datos'][$atributo['id']] : '')?>" >
    </div>
</div>
<script type="text/javascript">
    function agregaPrecioLista<?=$atributo['id']?>() {
        /*listado*/
        atributos = $('#atributos<?=$atributo['id']?>').val();
        cantidad = $('#cantidad').val();
        atributo = $('.select<?=$atributo['id'] ?>').val();
        atributos_id = $('.select<?php echo $atributo['id']; ?>').find(':selected').data('id');
        atributo_valor = $('.select<?php echo $atributo['id']; ?>').find(':selected').data('valor');
        proveedor_id = $('.prov<?php echo $atributo['id']; ?>').find(':selected').data('id');
        proveedor_nombre = $('.prov<?php echo $atributo['id']; ?>').find(':selected').data('valor');
        /*comprobar repetido*/
        bool = true;
        if (atributo !== '') {
            var arrayAtributos = atributos.split('|');
            $.each(arrayAtributos, function(index, value) { 
                subArrayAtributos = value.split(',');
                if ((subArrayAtributos[1] == atributos_id) && (subArrayAtributos[6] == proveedor_id)) {
                    bool = false;
                    return false;
                }
            });
            if (bool == true) {
                datos = atributo_valor+','+atributos_id+','+<?=$atributo['id'] ?>+','+atributo+','+cantidad+','+proveedor_nombre+','+proveedor_id;
                if (atributos !== '') {
                    $("#atributos<?=$atributo['id']?>").val(atributos+'|'+datos);
                }else{
                    $("#atributos<?=$atributo['id']?>").val(datos);
                }
                if(datos!=="")
                {
                    str = '<tr id="fila_<?=$atributo['id']?>'+atributos_id+'">';
                    /*if ( atributo.indexOf("#") != -1) {
                        name_atributo = '<span>COLOR: <i style="border: 1px solid #ccc;padding: 0 10px;background-color:'+atributo+'"></i></span>';
                    } else {
                        name_atributo = atributo;
                    }*/
                    str += '<td height="25" align="center" valign="middle">'+proveedor_nombre+'</td>';
                    str += '<td height="25" align="center" valign="middle"><span>'+atributo+': <i style="border: 1px solid #4a4a4a;padding: 0 10px;background-color:'+atributo_valor+'"></i></span></td>';
                    str += '<td height="25" align="center" valign="middle">'+cantidad+'</td>';
                    str += '<td align="center" valign="middle"><a href="javascript:quitarPrecioLista<?=$atributo['id']?>(\''+atributos_id+'\')" style="color:red">ELIMINAR</a></td>';
                    str += '</tr>';
                    $("table#tablaPrecios<?=$atributo['id']?> tbody").append(str);
                }
            }else{
                swal('','<?=$atributo['nombre']?> se encuentra seleccionado','warning');
            }
        }else{
            swal('','Seleccione un <?=$atributo['nombre']?>','warning');
        }
    }
    
    function quitarPrecioLista<?=$atributo['id']?>(atributos_id) {
        atributos = $('#atributos<?=$atributo['id']?>').val();
        var arrayAtributos = atributos.split('|');
        //console.log(arrayAtributos);
        $.each(arrayAtributos, function(index, value) { 
            subArrayAtributos = value.split(',');
            if (subArrayAtributos[1] == atributos_id) {
                indice = index;
                return false;
            }
        });
        arrayAtributos.splice(indice, 1);
        arrString = arrayAtributos.join("|");
        $('#atributos<?=$atributo['id']?>').val(arrString);
        $("#fila_<?=$atributo['id']?>"+atributos_id).remove();
        console.log(indice);
    }
</script>
<?php endforeach ?>