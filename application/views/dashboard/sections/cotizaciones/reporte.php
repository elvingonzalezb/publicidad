<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="page-body">
    <div class="panel panel-default">
        <div class="panel-heading">Reporte</div>
        <div class="panel-body">
            <div class="panel-body p-b-25">
                <form class="form-horizontal" action="dashboard/cotizaciones/reporte" method="post" enctype="multipart/form-data" id="">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <legend>Fecha Inicio</legend>
                            <input autocomplete="off" type="text" class="form-control datepicker" id="" name="fecha_inicio" placeholder="00/00/0000" value="" required>
                        </div>
                        <div class="col-sm-4">
                            <legend>Fecha Final</legend>
                            <input autocomplete="off" type="text" class="form-control datepicker" id="" name="fecha_fin" placeholder="00/00/0000" value="" required>
                        </div>
                        <div class="col-sm-4">
                            <legend>Estado</legend>
                            <label for="radio-1">Aceptado</label>
                            <input type="radio" name="estado2" id="radio-1" value="<?= _C_ACEPTADO ?>" checked>
                            <label for="radio-2">Pendiente</label>
                            <input type="radio" name="estado2" id="radio-2" value="<?= _C_PENDIENTE ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>

            <?php if (!empty($cotizaciones)): ?>
            <?php 
            $moneda = dataConfig('moneda');
            $total = 0;
            $total50 = 0;
             ?>
            <?=$this->session->flashdata('message');?>
            <table class="table table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">NRO</th>
                        <th width="8%">COD. SOLICITUD</th>
                        <th width="15%">ESTADO</th>
                        <th width="12%">FECHA VENTA</th>
                        <th width="13%">SUBTOTAL 50/50</th>
                        <th width="13%">SUBTOTAL CONTADO</th>
                        <th width="13%">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cotizaciones as $key => $value): ?>
                        <?php 
                        $total50 = $total50+$value['subtotal5050'];
                        $total = $total+$value['subtotal'];
                         ?>
                    <tr id="fila-<?=$value['id']?>">
                        <td class="center"><?=$key+1?></td>
                        <td><?=$value['codigo']?></td>
                        <?php $estado = (($value['estado2']==_C_ACEPTADO) ? 'Aceptado': 'Pendiente')?>
                        <?php $class = (($value['estado2']==_C_ACEPTADO) ? 'success': 'warning')?>
                        <td><span class="label label-<?= $class ?>"><?= $estado ?></span></td>
                        <td class="center"><?=$value['fecha']?></td>
                        <td class="center"><?=$moneda.number_format($value['subtotal5050'],2)?></td>
                        <td class="center"><?=$moneda.number_format($value['subtotal'],2)?></td>
                        <td><a class="btn btn-xs btn-info" href="dashboard/cotizaciones/detalle/<?=$value['id']?>"><i class="fa fa-eye icon-white"></i> VER</a></td>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total:</strong></td>
                        <td class="center"><?=$moneda.number_format($total50,2)?></td>
                        <td class="center"><?=$moneda.number_format($total,2)?></td>
                    </tr>                           
                </tbody>
            </table>    
            <?php endif ?>
            
        </div>
    </div>
</div>
<script>
$( function() {
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
        $(".datepicker").datepicker();
    });
    //$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
} );
</script>