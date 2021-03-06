    <?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'','id_trabajo'=>'','id_proyecto'=>$id_proyecto)); ?>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">GALERIA DE TRABAJOS</div>
                <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Orden</th>
                                    <th>Destacado</th>
                                    <th>Estado</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataset as $key => $value): ?>
                                <?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                                <?php $destacado = (($value['destacado']==_ACTIVO) ? 'DESTACADO': 'NO DESTACADO')?>
                                <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                                 <?php $class_destacado = (($value['destacado']==_ACTIVO) ? 'label-success': ' label-warning')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td class="center"><?=$key+1?></td> 
                                    <td><img class="img-responsive" src="files/proyectos/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>"></td>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=$value['orden']?></td>
                                    <td><label type="label" class="label <?=$class_destacado?>"><?=$destacado?></label></td>
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idAlb<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idAlb<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'proyectos/ajaxEstado/2?>');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/proyectos/editar_trabajo/<?=$value['id']?>/<?=$id_proyecto?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'proyectos/delete_trabajo');">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Borrar
                                        </a>
                                        <?php 
                                            $href='dashboard/proyectos/lista_foto/'.$value['id'];
                                            $texto='galeria de fotos';
                                        ?>
                                        <a class="btn btn-success" href="<?=$href?>">
                                            <i class="glyphicon glyphicon-align-justify icon-white"></i>
                                            <?=$texto?>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>                              
                            </tbody>                        
                    </table>
                </div>
        </div>
    </div>