/* ========================================================================
 * Validacion de Formularios
 * ======================================================================== */

 $(document).ready(function(){ 

    function deleteCarro() {
        swal({
          title: "AllPublicidad",
          text: "Esta a punto de eliminar su pedido. ¿Esta seguro que desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Eliminar",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: 'POST',
                url: 'frontend/ajax/eliminaCarro',
                data: { },
                dataType : 'json',
                success: function(resultado) {
                    rpt=resultado.dato;
                    if(rpt=='ok'){
                        $('.post_text_area').addClass('vacio');
                        $('.vacio').html('Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a>');
                        $('#numItem').text(resultado.num);
                        swal({
                                title: 'AllPublicidad',
                                text: 'Su pedido ha sido eliminado.',
                                html: true,
                                confirmButtonText: 'Aceptar',
                                confirmButtonColor: '#1BB4B9',
                                type : 'success'
                            },
                            function(){}
                        );
                    }
                }
            });
        });
    }

    function goProductos(url) {
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/seguirAgregando',
            data: { },
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt=='ok')
                {
                    location.href = url;
                }
            }
        }); 
    }

    /*function aplicarCupon(){
        cupon = $('#cupon').val();
        if(is.empty(cupon.trim())){
            swal({
                    title: 'AllPublicidad',
                    text: 'Debe ingresar el código de descuento.',
                    html: true,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1BB4B9',
                },
                function(){
                    $("#cupon").focus();
                    return false;
                }
            );
        }else{
            $.ajax({
                    type: 'POST',
                    url: 'frontend/ajax/aplicarDescuento',
                    data: {
                        cupon : cupon
                    },
                    dataType : 'json',
                    success: function(resultado) {
                        rpt = resultado.msg;
                        if(rpt=='ok'){
                            swal({
                                    title: 'AllPublicidad',
                                    text: 'El cupon de descuento fue aplicado a los precios del carrito correctamente.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                    type : 'success'
                                },
                                function(){
                                    $("#list_car").load(location.href+" #list_car>*","");
                                    $('#cupon').val('');
                                }
                            );
                        }else if(rpt == 'not'){
                            swal({
                                    title: 'AllPublicidad',
                                    text: 'El codigo de descuento expiró o no existe.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'rep'){
                            swal({
                                    title: 'AllPublicidad',
                                    text: 'El codigo de descuento ya fue utilizado para este carro.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'no-prod'){
                            swal({
                                    title: 'AllPublicidad',
                                    text: 'El producto no se encuentra en la lista de compra.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'no-cat'){
                            swal({
                                    title: 'AllPublicidad',
                                    text: 'No hay productos de la categoría a la que quiere aplicar el código de descuento.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }

                    }
            });  

        }  
    }*/

    $('#tyc').click(function(e) {
        
        if($('#tyc').prop('checked')){
            $('#botonPagar').removeAttr("disabled");
        }else{
            $('#botonPagar').attr("disabled", true);
        }
    });


    function cargaPrecioTalla(id_producto){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/cargaPrecioTalla',
            data: {id_producto: id_producto},
            dataType : 'json',
            success: function(json) {
                precio = json.precio;
                precio_oferta = json.precio_oferta;
                talla = json.talla;
                stock = json.stock;

                if(precio_oferta == 0.00){
                    $('#precio_mostrar').html('S./ ' + precio);
                    $('#precio_oferta_mostrar').html('');
                    $('.precio-ori').removeClass('precio-old');
                    $('.precio-ofe').addClass('hidden-precio');
                    $('#precio').val(precio);
                }else{
                    $('#precio_mostrar').html('S./ ' + precio);
                    $('#precio_oferta_mostrar').html('S./ ' + precio_oferta);
                    $('.precio-ori').addClass('precio-old');
                    $('.precio-ofe').removeClass('hidden-precio');
                    $('#precio').val(precio_oferta);
                }

                $('#id_producto').val(id_producto);
                $('#talla').val(talla);
                $('#stock_talla').html(stock);
                $('#stock').val(stock);
            }
        }); 
    }

});
/*function continuarCompra() {
    var bool = 1;

        $("form#form-continuar-compra :input").each(function(){

            var input = $(this);
            if ( (input.val() == '' | input.val() == 0 | input.val() == null) | (input.attr('type') == 'radio' & !input.is(':checked'))) {
                if (input.hasClass('no-required')==false) {
                    bool = 2;
                    console.log(input);
                    swal("Mensaje", 'Completar los campos' , "warning");
                    return false;
                }
            }
        });
        if (bool == 1) {
            //$('#form-continuar-compra').submit();
        }
}*/
function deleteItem(id) {
    swal({
        title: "AllPublicidad",
        text: "¿Está seguro que desea eliminar el item?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/eliminaItemCarro',
            data: { id: id},
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt == 'ok'){
                    swal({
                        title: 'AllPublicidad',
                        text: 'El item fue eliminado.',
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#1BB4B9',
                        type : 'success'
                    },function(){}
                    );
                    $("#list_car").load(location.href+" #list_car>*","");
                    $("#carritoFloat").load(location.href+" #carritoFloat>*","");
                    $("#itemCountCar").load(location.href+" #itemCountCar>*","");
                    
                    $('#numItem').text(resultado.num);
                    if(resultado.num == 0){
                        $('.post_text_area').addClass('vacio');
                        $('.vacio').html('Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a>');
                    }
                }
            }
        });
    });
}
function updateCantidad(id) {
    aux =  $("#cant_"+id).val();
    producto_id =  $("#prodID_"+id).val();
    atributo_id =  $("#atributo_"+id).val();
    cantidad = parseInt(aux);
    if( cantidad == 0 || isNaN(cantidad) || (aux.trim()) === '' ) {
        $("#cant_"+id).focus();
        return false;
    }else {
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/actualizaCarro',
            data: {
                carro_id:id,
                cantidad:cantidad,
                atributo_id:atributo_id,
                producto_id:producto_id
            },
            dataType : 'json',
            success: function(resultado) {
                if (resultado.estado == 2){
                    swal("Mensaje", resultado.mensaje , "warning");
                }else{
                    $("#detalleProducto").submit();
                    rpt = resultado.dato;
                    new_cantidad = resultado.new_cantidad;
                    new_subtotal = resultado.new_subtotal;
                    new_total = resultado.new_total;
                    if(rpt=='ok'){
                        $("#list_car").load(location.href+" #list_car>*","");
                        $("#carritoFloat").load(location.href+" #carritoFloat>*","");
                        //$("#itemCountCar").load(location.href+" #itemCountCar>*","");
                        $('#cant_'+id).val(new_cantidad);
                        $('#new_subtotal_'+id).text(new_subtotal);
                        $('#new_total').text(new_total);
                        
                    }
                }
            }
        });     
    }
}
function updateComentario(id) {
    comentario =  $("#comen_"+id).val();
    producto_id =  $("#prodID_"+id).val();
    /*if( comentario == '') {
        swal({
            title: 'AllPublicidad',
            text: 'Debes ingresar un comentario.',
            html: true,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#1BB4B9',
            },
            function(){
                $("#comen_"+id).focus();
                return false;
            }
        );
    }else {*/
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/actualizaCarro',
            data: {
                carro_id:id,
                comentario:comentario,
                producto_id:producto_id
            },
            dataType : 'json',
            success: function(resultado) {
                //$("#detalleProducto").submit();
                rpt = resultado.dato;
                if(rpt=='ok'){
                    $("#list_car").load(location.href+" #list_car>*","");
                    $("#carritoFloat").load(location.href+" #carritoFloat>*","");
                }
                
            }
        });     
    //}
}
function updateColor(id,idCarrito) {

    producto_id =  $("#prodID_"+idCarrito).val();
    
    $.ajax({
        type: 'POST',
        url: 'frontend/ajax/actualizaCarro',
        data: {
            carro_id:idCarrito,
            atributo_id:id,
            producto_id:producto_id
        },
        dataType : 'json',
        success: function(resultado) {
            if (resultado.estado == 2){
               swal("Mensaje", resultado.mensaje , "warning");
            }else{
                //$("#detalleProducto").submit();
                rpt = resultado.dato;
                if(rpt=='ok'){
                    swal({
                        title: 'AllPublicidad',
                        text: 'El Item fue actualizado satisfactoriamente.',
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#1BB4B9',
                        type : 'success'
                        },
                        function(){
                            $("#list_car").load(location.href+" #list_car>*","");
                            //$("#carritoFloat").load(location.href+" #carritoFloat>*","");
                            //$("#itemCountCar").load(location.href+" #itemCountCar>*","");
                        }
                    );
                }
            }
        }
    });     
}
function updateImpresion(id,idCarrito) {
    producto_id =  $("#prodID_"+idCarrito).val();
    
    $.ajax({
        type: 'POST',
        url: 'frontend/ajax/actualizaCarro',
        data: {
            carro_id:idCarrito,
            impresion_id:id,
            producto_id:producto_id
        },
        dataType : 'json',
        success: function(resultado) {
            if (resultado.estado == 2){
                $("#tipoImpresion"+idCarrito).focus(); return false;
                //swal("Mensaje", resultado.mensaje , "warning");
            }else{
                //$("#detalleProducto").submit();
                rpt = resultado.dato;
                if(rpt=='ok'){
                    $("#list_car").load(location.href+" #list_car>*","");
                }
            }
        }
    });     
}
function updateNroColor(cantidad,idCarrito) {
    producto_id =  $("#prodID_"+idCarrito).val();
    
    $.ajax({
        type: 'POST',
        url: 'frontend/ajax/actualizaCarro',
        data: {
            carro_id:idCarrito,
            nro_color:cantidad,
            producto_id:producto_id
        },
        dataType : 'json',
        success: function(resultado) {
            if (resultado.estado == 2){
                $("#nroColor"+idCarrito).focus(); return false;
                //swal("Mensaje", resultado.mensaje , "warning");
            }else{
               // $("#detalleProducto").submit();
                rpt = resultado.dato;
                if(rpt=='ok'){
                    $("#list_car").load(location.href+" #list_car>*","");
                    /*swal({
                        title: 'AllPublicidad',
                        text: 'El Item fue actualizado satisfactoriamente.',
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#1BB4B9',
                        type : 'success'
                    },
                    function(){
                        
                        //$("#carritoFloat").load(location.href+" #carritoFloat>*","");
                        //$("#itemCountCar").load(location.href+" #itemCountCar>*","");
                    }
                );*/}
            }
        }
    });     
}

function impresionChange(id_carrito) {
        var id_impresion = $("#tipoImpresion"+id_carrito).val();
        updateImpresion(id_impresion,id_carrito);
    }
function nroColores(id_carrito) {
        var impresion = $("#tipoImpresion"+id_carrito).val();
        if (impresion == '' | impresion == '0' | impresion == null) {
           $("#nroColor"+id_carrito).focus(); return false;
            //swal("Mensaje", 'Seleccione un Tipo de Impresión' , "warning");
        }else{
            var cantidad = $("#nroColor"+id_carrito).val();
            updateNroColor(cantidad,id_carrito);
        }
    }
function atributosAjax(){
    $.ajax({
        data:  {"atributo_id" : $("#selectAtributos").val(), "producto_id" : $("#productoID").val() },
        url:   'frontend/productos/getDatoAtributo',
        dataType: "json",
        type:  'post',
        success:  function (response) {
            if (response.estado == 1){
                $('#precio').text(response.d_precio);
                $('#precioOferta').text(response.d_precio_oferta);
                $('#inputPrecio').val(response.precio);
                if (response.cantidad < 1) {
                    $('#msjStock').text("agotado");
                }else{
                    $('#msjStock').text(response.cantidad);
                }
            }                           
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
        }
    });
}

function colorPrecioAjax(codigo){
    $.ajax({
        data:  {"atributo_id" : codigo, "producto_id" : $("#productoID").val() },
        url:   'frontend/productos/getDatoAtributo',
        dataType: "json",
        type:  'post',
        success:  function (response) {
            if (response.estado == 1){
                $('#precio').text(response.d_precio);
                $('#precioOferta').text(response.d_precio_oferta);
                $('#inputPrecio').val(response.precio);
                if (response.cantidad < 1) {
                    $('#msjStock').text("agotado");
                }else{
                    $('#msjStock').text(response.cantidad);
                    $('#selectAtributos').val(codigo);
                }
            }                           
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
        }
    });
}

/*$("#btnAddCar").click(function() {
    atributo = $("#selectAtributos").val();
    stock = $("#inputCantidad").val();
    productoID = $("#productoID").val();
    if ($("#selectAtributos").length > 0) {
        if (atributo == '' || atributo == '0' || atributo < 1) {
            swal("Mensaje", "Seleccione un atributo del producto", "warning");
            return false;
        }
    }
    $.ajax({
        data:  {"atributo_id" : atributo, "producto_id" : productoID, "stock": stock},
        url:   'frontend/productos/verificarStock',
        dataType: "json",
        type:  'post',
        beforeSend: function () {
        },
        success:  function (response) {
            if (response.estado == 2){
                swal("Mensaje", response.mensaje , "warning");
            }else{
                $("#detalleProducto").submit();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error!", "Inténtalo de nuevo", "error");
        }
    });
});*/
/*$("#btnAddCar").click(function() {
    atributo = $(".inputColor:checked").val();
    stock = $("#inputCantidad").val();
    productoID = $("#productoID").val();
    if ($(".inputColor").length > 0) {
        if ($(".inputColor:checked").length == 0) {
            swal("Mensaje", "Seleccione un color", "warning");
            return false;
        }else{
            $("#detalleProducto").submit();
        }
    }else{
        $("#detalleProducto").submit();
    }
});*/
$('#detalleProducto').submit(function() {
    atributo = $(".inputColor:checked").val();
    stock = $("#inputCantidad").val();
    productoID = $("#productoID").val();
    if ($(".inputColor").length > 0) {
        if ($(".inputColor:checked").length == 0) {
            swal("Mensaje", "Seleccione un color", "warning");
            return false;
        }
    }
});

$("#formCliente").validate({
    rules: {
        nombres:{required: true},
        apellidos:{required: true},
        correo:{required: true,email: true},
        telefono:{required: true},
        direccion:{required: true},
        password: { 
            required: true,
            minlength: 6,
            maxlength: 10,
        } , 
        cfmPassword: { 
            equalTo: "#password",
            minlength: 6,
            maxlength: 10
        }
    },
    messages:{
        nombres: {required: "Este campo es requerido."},
        apellidos: {required: "Este campo es requerido."},
        direccion: {required: "Este campo es requerido."},
        correo: {required: "Este campo es requerido.",email: "Por favor, introduce una dirección de correo electrónico válida."},
        telefono: {required: "Este campo es requerido."},
        password: { 
            required:"Este campo es requerido.",
            minlength:"Introduzca al menos 6 caracteres."
        },
        cfmPassword:{equalTo:"Por favor, introduzca el mismo valor."}
    }
});

  // $("#formServicio").validate({
   
  //     rules: {
  //       nombre:{required: true, minlength:5},
  //       empresa:{required: true, minlength:2},
  //       correo:{required: true},
  //       telefono:{required: true},
  //       mensaje:{required: true, minlength: 5}
  //       },
  //       messages: {
  //           nombre: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           empresa:{
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 2 caracteres."
  //                   },
  //           correo: {
  //                       required: "Por favor, introduzca su correo",
  //                       minlength: "Por favor, introduzca el @ ."
  //                   },
  //           mensaje: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           telefono: "Por favor, introduzca datos numéricos"
  //       }

  //   });

  $("#formArticulo").validate({
   
        rules: {
        nombre: {required: true, minlength:5},
        correo: {required: true},
        comentario: {required: true, minlength: 5}
        },

        messages: {
            nombre: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    },
            correo: {
                        required: "Por favor, introduzca su correo",
                        minlength: "Por favor, introduzca el @ ."
                    },
            comentario: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    }
        }

    });

  $("#formContactenos").validate({
   
      rules: {
        nombre:{required: true, minlength:5},
        empresa:{required: true, minlength:2},
        correo:{required: true},
        telefono:{required: true},
        mensaje:{required: true, minlength: 5}
        },
        messages: {
            nombre: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    },
            empresa:{
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 2 caracteres."
                    },
            correo: {
                        required: "Por favor, introduzca su correo",
                        minlength: "Por favor, introduzca el @ ."
                    },
            mensaje: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    },
            telefono: "Por favor, introduzca datos numéricos"
        }

    });

  // $("#formProducto").validate({
   
  //     rules: {
  //       nombre:{required: true, minlength:5},
  //       empresa:{required: true, minlength:2},
  //       correo:{required: true},
  //       telefono:{required: true},
  //       mensaje:{required: true, minlength: 5}
  //       },
  //       messages: {
  //           nombre: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           empresa:{
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 2 caracteres."
  //                   },
  //           correo: {
  //                       required: "Por favor, introduzca su correo",
  //                       minlength: "Por favor, introduzca el @ ."
  //                   },
  //           mensaje: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           telefono: "Por favor, introduzca datos numéricos"
  //       }

  //   });
function fnSuscripcion() {
    
    var correo =  $("#sp-email").val().trim();
    var emailReg = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
    //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if ((emailReg.test( correo )) && correo!=="") {
        $.ajax({
            data: {"correo" : correo},
            url: 'frontend/inicio/addSuscripcion',
            dataType: "json",
            type:  'post',
            success: function (response) {
                console.log(response);
                $('#msj-suscriptor').html('<span class="success">'+response.msj+'</span>');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#msj-suscriptor').html('<span class="error">'+response.msj+'</span>');
            }
        });
    }else{
        $('#msj-suscriptor').html('<span class="error">Correo inválido*</span>');
    }
}