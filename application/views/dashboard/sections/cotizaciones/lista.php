<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<div class="page-body">
    <div class="panel panel-default">
        <div class="panel-heading">Listado de Solicitudes</div>
        <div class="panel-body">
            <div><?php echo($this->session->flashdata('success'));?></div>
            <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">NRO</th>
                        <th width="8%">COD. SOLICITUD</th>
                        <th width="15%">CLIENTE</th>
                        <!--<th width="8%">CODS PRODS</th>-->
                        <th width="5%">ESTADO</th>
                        <th width="12%">FECHA VENTA</th>
                        <th width="13%">ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordenes as $key => $value): ?>
                    <tr id="fila-<?=$value['id']?>">
                        <td class="center"><?=$key+1?></td>
                        <td><?=$value['codigo_orden']?></td>
                        <td><?=$value['razon_social']?></td>
                        <td class="center" id="idCot<?=$value['id']?>">
                            <?php if ($value['estado2']==_C_PENDIENTE): ?>
                            <span class="label label-warning">Pendiente</span>
                            <?php else: ?>
                            <span class="label label-success">Aceptado</span>  
                            <?php endif ?>
                            
                        </td>
                        <td class="center"><?=$value['fecha_venta']?></td>
                        <?php if ($value['estado2'] == _C_PENDIENTE): ?>
                        <td id="accion<?=$value['id']?>">
                            
                            <a class="btn btn-xs btn-primary" href="javascript:actualizarCotizacion(<?=$value['id']?>);"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;ACEPTAR</a><br /><br />
                            <a class="btn btn-xs btn-success" href="dashboard/cotizaciones/cotizar/<?=$value['id']?>"><i class="fa fa-thumbs-up icon-white"></i> &nbsp;VOLVER A COTIZAR</a><br /><br />
                            <a class="btn btn-xs btn-success" href="javascript:enviarCotiDolar(<?=$value['id']?>)"><i class="fa fa-thumbs-up icon-white"></i> &nbsp;COTIZAR EN $</a><br /><br />
                            <a class="btn btn-xs btn-info" href="dashboard/cotizaciones/detalle/<?=$value['id']?>"><i class="fa fa-eye icon-white"></i> VER</a>
                            <a class="btn btn-xs btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'cotizaciones/delete')"><i class="fa fa-trash icon-white"></i> &nbsp;&nbsp;BORRAR</a><br /><br />
                        </td>
                        <?php endif ?>
                        <?php if ($value['estado2'] == _C_ACEPTADO): ?>
                        <td id="accion<?=$value['id']?>">
                            <a class="btn btn-xs btn-info" href="dashboard/cotizaciones/detalle/<?=$value['id']?>"><i class="fa fa-eye icon-white"></i> VER</a>
                            <a class="btn btn-xs btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'cotizaciones/delete')"><i class="fa fa-trash icon-white"></i> &nbsp;&nbsp;BORRAR</a><br /><br />
                        </td> 
                        <?php endif ?>
                    </tr>
                    <?php endforeach;?>                              
                </tbody>
            </table>
        </div>
    </div>
</div>