 <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <div class="container">
        <ul class="list-inline list-unstyled">
          <li><a href="./">Inicio</a></li>
          <li class='active'>Mi cuenta</li>
        </ul>
      </div>
    </div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->

<div class="tm-page-client">
  <div class="container" id="postCliente">
    <div class="sign-in-page inner-bottom-sm">
      <div class="row">
        <!-- create a new account -->
        <div class="col-md-12 col-sm-12 create-new-account">
          <h4 class="sub-titulo">MI CUENTA</h4>
          <p class="text title-tag-line"></p>
          <div class="well">
            <?=$this->session->flashdata('message')?>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" class="tab-profile" data-toggle="tab">Mis datos</a></li>
                <li><a href="#password" class="tab-password" data-toggle="tab">Cambiar contraseña</a></li>
                <!-- <li><a href="clientes/mis-pedidos" >Mis pedidos</a></li> -->
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="profile">
                  <form name="updateform" method="post" action="clientes/update" class="form-cliente register-form outer-top-xs">
                    <!-- <div class="form-group">
                      <label class="info-title" for="firstname">Nombres</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="firstname" name="nombres" autocomplete="off" value="{nombres}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="lastname">Apellidos</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="lastname" name="apellidos" autocomplete="off" value="{apellidos}">
                    </div> -->
                    <div class="form-group">
                      <label class="info-title" for="lastname">Razón Social</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="razon_social" name="razon_social" autocomplete="off" value="{razon_social}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="lastname">RUC</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="ruc" name="ruc" autocomplete="off" value="{ruc}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="email">Correo</label>
                      <p class="form-control unicase-form-control text-input" readonly>{correo}</p>
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="email">Teléfono</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="telefono" name="telefono" autocomplete="off" value="{telefono}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="lastname">Dirección Fiscal de la factura</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="direccion" name="direccion" autocomplete="off" value="{direccion}">
                    </div>
                    <div class="form-group">
                      <label class="info-title" for="lastname">Dirección de Entrega</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="direccion_entrega" name="direccion_entrega" autocomplete="off" value="{direccion_entrega}">
                    </div>
                    <!--
                    <div class="form-group">
                      <label class="info-title" for="email">Dirección</label>
                      <input type="text" class="form-control unicase-form-control text-input" id="address" name="address">
                    </div>
                    -->
                    <div class="form-group mgt-20">
                      <button class="btn-upper btn btn-primary checkout-page-button">Actualizar</button>
                    </div>

                  </form><!--end form -->
                </div>
                <div class="tab-pane fade" id="password">
                  <form name="updateform" method="post" action="clientes/password" class="form-cliente register-form outer-top-xs">
                      <div class="form-group">
                        <label class="info-title" for="passwd">Contraseña actual</label>
                        <input type="password" class="form-control unicase-form-control text-input old_clave" name="old_clave">
                      </div>
                      <div class="form-group">
                        <label class="info-title" for="passwd">Contraseña nueva</label>
                        <input type="password" class="form-control unicase-form-control text-input new_clave" name="new_clave">
                      </div>
                      <div class="form-group mgt-20">
                        <button class="btn-upper btn btn-primary checkout-page-button">Cambiar contraseña</button>
                      </div>
                  </form>
                </div>
              </div>
          </div>
        </div><!-- create a new account -->     
      </div><!-- /.row -->
    </div><!-- /.sigin-in-->
  </div><!-- /.container -->
</div><!-- /.body-content -->
<script>$(".nav-tabs a.tab-password").trigger('chosen:updated');</script>