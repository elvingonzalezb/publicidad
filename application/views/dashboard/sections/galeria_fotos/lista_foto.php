    <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">GALERÍA DE FOTOS</div>
                <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Ruta</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataset as $key => $value): ?>
                                
                                <tr id="fila-<?=$value['id']?>">
                                    <td class="center"><?=$key+1?></td> 
                                    <td><img class="img-responsive" src="files/galeria_fotos/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>"></td>
                                    <td><?=$value['nombre']?></td>
                                    <td>
                                        <button class="btn" id="btn<?=$value['id']?>" onclick="copyClipboard('btn<?=$value['id']?>')" data-clipboard-text="<?=$value['imagen']?>" data-toggle="tooltip" >Copiar ruta</button>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/galeria_fotos/editar_foto/<?=$value['id']?>/<?=$id_album?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'galeria_fotos/delete_foto');">
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

<script>
function copyClipboard(idbutton) {
    var clipboard = new Clipboard('#'+idbutton);
    //$('#btnToggleTip').click(function(){
    //$('[data-toggle="tooltip"]').tooltip({trigger: 'click',placement:"bottom", title:"Hooray!"}); 
}
$(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip({
        trigger: 'click',
        placement:"bottom",
        title:"Copiado!",
        delay: {show: 500, hide: 100}
    });  
});

</script>