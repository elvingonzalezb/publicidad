<div class="body-content outer-top-xs">
    <div class="container-fluid">

        <div class="row inner-bottom-sm">
            <div class="col-md-2" id="carritoFloat">
                <?=getItemsCarrito()?>
            </div>
            <div class="col-md-10">
                <div class="contact-page row">
                    <div class="col-md-12 contact-map outer-bottom-vs total-mapa">
                        <?php $latitud_punto=$mapa['latitud_punto'];?>
                        <?php $longitud_punto=$mapa['longitud_punto'];?>
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCwLMvFNtlNXc-CkL8Oz7PEZAiKz8Li7LE&q=<?=$latitud_punto?>,<?=$longitud_punto?>&zoom=17" style="border:0" allowfullscreen="" frameborder="0" height="250" width="100%"></iframe>
                    </div>
                    <div class="col-md-12">
                        <div class="breadcrumb">
                                <?php if($banner['visible']==1){?>
                                <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$banner['imagen']?>);">
                                </div>
                                <?php }?>
                                <div class="breadcrumb-inner">
                                    <div class="container">
                                        <ul class="list-inline list-unstyled">
                                            <li><a href="./">Inicio</a></li>
                                            <li class='active'><?= $banner['titulo'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-9 contact-form">
                        <div class="col-md-12 contact-title">
                            <h4>Mensajes</h4>
                        </div>
                        <div class="col-md-12 contact-title">
                            <?= validation_errors() ?>
                            <?=$this->session->flashdata('message')?>
                        </div>
                        <form class="register-form" role="form" action="frontend/contactenos/enviarMensaje" method="post" enctype="multipart/form-data" id="formContactenos">
                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName"> Nombre <span>*</span></label>
                                        <input class="form-control unicase-form-control text-input" required name="nombres" placeholder="Nombre" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName"> Apellidos <span>*</span></label>
                                        <input class="form-control unicase-form-control text-input" required name="apellidos" placeholder="Apellido" type="text">
                                    </div>
                                </div>
                           
                            <div class="col-md-4 ">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputName"> Telefono <span>*</span></label>
                                    <input type="text" name="telefono" class="form-control unicase-form-control text-input" id="" placeholder="Telefono">
                                  </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="info-title" for="">Direcciòn de email<span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" name="correo" id="" placeholder="Correo">
                                  </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="info-title" for="">Asunto<span>*</span></label>
                                    <input class="form-control unicase-form-control text-input" required name="asunto" placeholder="Asunto" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="info-title" for="">Mensaje <span>*</span></label>
                                    <textarea name="mensaje" class="form-control unicase-form-control" id=""></textarea>
                                  </div>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Enviar mensaje</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 contact-info">
                        <div class="contact-title">
                            <h4>INFORMACIÓN</h4>
                        </div>
                        <div class="clearfix address">
                            <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                            <span class="contact-span"><?= dataConfig('direccion') ?></span>
                        </div>
                        <div class="clearfix phone-no">
                            <span class="contact-i"><i class="fa fa-mobile"></i></span>
                            <span class="contact-span"><?= dataConfig('telefono') ?><br><?= dataConfig('telefono_whatsapp') ?></span>
                        </div>
                        <div class="clearfix email">
                            <span class="contact-i"><i class="fa fa-envelope"></i></span>
                            <span class="contact-span">Contacto: <?= dataConfig('correo_notificaciones') ?></span>
                        </div>
                    </div>          
                </div>
            </div>
            
        </div>
    </div>
</div>