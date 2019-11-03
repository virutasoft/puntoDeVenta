// CARGAR LA TABLA dinameica de ventasDESDE AJAX

// VERIFICAR LA LLEGADA DE LOS DATOS json

// $.ajax({

//     url: "ajax/datatable-ventas.ajax.php",
//     success: function(respuesta) {
//         console.log(respuesta);
//     }
// });

$(".tablaVentas").DataTable({
    ajax: "ajax/datatable-ventas.ajax.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
});


// AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA ↓↓↓
$(".tablaVentas tbody").on("click", "button.agregarProducto", function() {
    var idProducto = $(this).attr("idProducto");
    //console.log("este es el id del producto ", idProducto);
    // desactivar boton agregar prodcuto
    $(this).removeClass("btn-info agregarProducto")
    $(this).addClass("btn-default");
    // desactivar boton agregar prodcuto

    var datos = new FormData();
    datos.append("idProducto", idProducto);
    //console.log(datos);
    // ajax ↓↓↓
    $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                //console.log("respuesta", respuesta);
                var descripcion = respuesta["descripcion"];
                var stock = respuesta["stock"];
                // EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTÉ EN CERO ↓↓
                if (stock == 0) {
                    swal({
                        title: "Error de producto",
                        text: "No hay stock disponible para " + descripcion + ".",
                        type: "error",
                        confirmButtonText: "Entendido!"
                    });
                    $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass("btn-default");
                    $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass("btn-info agregarProducto");
                    return;
                }
                // EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTÉ EN CERO ↓↓
                var precio = respuesta["precio_venta"];

                $(".nuevoProducto").append(
                    '<div class="row" style="padding:5px 15px">' +
                    '<div class="col-xs-6"  style="padding-right:0px">' +
                    '<div class="input-group">' +
                    '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto recuperarBoton" idProducto="' + idProducto + '" ><i class="fa fa-times"></i></button></span>' +
                    '<input type="text" name="agregarProducto" class="form-control nuevaDescripcionProducto agregarProducto" idProducto="' + idProducto + '" value="' + descripcion + '" placeholder="' + descripcion + '"  required readonly>' +
                    '</div>' +
                    '</div>' +

                    '<!-- Descripción del producto ↑↑-->' +

                    '<!-- Cantidad del producto ↓↓ -->' +

                    '<div class="col-xs-3">' +
                    '<input type="number" name="nuevaCantidadProducto" class="form-control nuevaCantidadProducto"  min="1" value= "1" stock="' + stock + '" nuevoStock="' + Number(stock - 1) + '" required>' +
                    ' </div>' +

                    ' <!-- Cantidad del producto ↑↑-- -->' +
                    '<!-- Precio del producto ↓↓ -->' +

                    '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +
                    '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
                    '<input type="text" name="nuevoPrecioProducto" precioReal="' + precio + '" class="form-control nuevoPrecioProducto"  value="' + precio + '" readonly required>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                // FUNCION SUMAR TOTAL DE PRECIOS ↓
                sumarTotalPrecios();
                // FUNCION AGREGAR IMPUESTO ↓
                agregarImpuesto();
                //AGRUPAR PRODUCTOS EN FORMATO JSON ↓
                listarProductos();
                // PONER FORMATO AL PRECIO DE LOS PRODUCTOS
                $(".nuevoPrecioProducto").number(true, 2);

            }
        })
        // ajax ↑↑↑
});
// AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA ↓↓↓

// CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA ↓↓
$(".tablaVentas").on("draw.dt", function() {
        //console.log("perra");
        if (localStorage.getItem("quitarProducto") != null) {
            var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));
            for (var i = 0; i < listaIdProductos.length; i++) {
                $("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").removeClass("btn-default");
                $("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").addClass("btn-info agregarProducto");

            }
        }
    })
    // CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA ↑↑

// QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR EL BOTON ↓↓↓
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function() {
    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");
    // almacenar en el localStorage el id del producto a quitar ↓↓

    if (localStorage.getItem("quitarProducto") == null) {
        idQuitarProducto = [];
    } else {
        idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
    }

    idQuitarProducto.push({ "idProducto": idProducto });
    localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

    // almacenar en el localStorage el id del producto a quitar ↑↑
    //console.log(idProducto);
    $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass("btn-default");
    $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass("btn-info agregarProducto");

    if ($(".nuevoProducto").children().length == 0) {
        $("#nuevoImpuestoVenta").val(0);
        $("#nuevoTotalVenta").val(0);
        $("#totalVenta").val(0);
        $("#nuevoTotalVenta").attr("total", 0);

    } else {
        // FUNCION SUMAR TOTAL DE PRECIOS ↓
        sumarTotalPrecios();
        // FUNCION AGREGAR IMPUESTO ↓
        agregarImpuesto();
        //AGRUPAR PRODUCTOS EN FORMATO JSON ↓
        listarProductos();
    }


});
// QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR EL BOTON ↑↑↑

// AGREGANDO PRODUCTO DESDE EL BOTON PARA DISPOSITIVOS ↓↓↓
var numProducto = 0;
$(".btnAgregarProducto").click(function() {

    numProducto++;

    var datos = new FormData();
    datos.append("traerProductos", "ok");
    // ajax ↓↓
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $(".nuevoProducto").append(
                '<div class="row" style="padding:5px 15px">' +
                '<div class="col-xs-6"  style="padding-right:0px">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto recuperarBoton" idProducto><i class="fa fa-times"></i></button></span>' +
                '<select class="form-control nuevaDescripcionProducto" id="producto' + numProducto + '"  idProducto name="nuevaDescripcionProducto" required>' +
                '<option>Seleccione el producto</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<!-- Descripción del producto ↑↑-->' +

                '<!-- Cantidad del producto ↓↓ -->' +

                '<div class="col-xs-3 ingresoCantidad">' +
                '<input type="number" name="nuevaCantidadProducto" class="form-control nuevaCantidadProducto"  min="1" value= "1" stock nuevoStock required>' +
                ' </div>' +

                ' <!-- Cantidad del producto ↑↑-- -->' +
                '<!-- Precio del producto ↓↓ -->' +

                '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
                '<input type="text" name="nuevoPrecioProducto" precioReal="" class="form-control nuevoPrecioProducto" readonly required>' +
                '</div>' +
                '</div>' +
                '</div>'
            );
            // AGREGAMOS PRODUCTOS AL SELECT ↓↓
            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index) {
                if (item.stock != 0) {
                    $("#producto" + numProducto).append(
                        '<option idProducto="' + item.id + '" value="' + item.descripcion + '">' + item.descripcion + '</option>'
                    )
                }

            } // funcionForEach
            // AGREGAMOS PRODUCTOS AL SELECT ↑↑
            // FUNCION SUMAR TOTAL DE PRECIOS ↓
            sumarTotalPrecios();
            // FUNCION AGREGAR IMPUESTO ↓
            agregarImpuesto();

            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS
            $(".nuevoPrecioProducto").number(true, 2);
        }
    });
    // ajax ↑↑
});
// AGREGANDO PRODUCTO DESDE EL BOTON PARA DISPOSITIVOS ↑↑↑

// SELECCIONAR PRODUCTO ↓↓↓
$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function() {
    var nombreProducto = $(this).val();
    var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

    var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

    var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
            $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"]) - 1);
            $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
            $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);

            //AGRUPAR PRODUCTOS EN FORMATO JSON ↓
            listarProductos();
        }
    });
});
// SELECCIONAR PRODUCTO ↑↑↑

// MODIFICAR LA CANTIDAD ↓↓↓
$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function() {
    var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
    var precioFinal = $(this).val() * precio.attr("precioReal");
    precio.val(precioFinal)

    var nuevoStock = Number($(this).attr("stock")) - $(this).val();
    $(this).attr("nuevoStock", nuevoStock);

    //validar el stock al modificar la cantidad
    if (Number($(this).val()) > Number($(this).attr("stock"))) {
        // SI LA CANTIDAD ES SUPERIOR AL STOCK, REGRESAR LOS VALORES INICIALES ↓↓
        $(this).val(1);
        precio.val(precio.attr("precioReal")) //AGREGADO EXTRA PARA DEVOLVER EL VALOR DEL PRECIO A LA UNIDAD
            // var precioFinal = $(this).val() * precio.attr("precioReal");
            // precio.val(precioFinal);
        sumarTotalPrecios();
        // FUNCION AGREGAR IMPUESTO ↓
        agregarImpuesto()
            // SI LA CANTIDAD ES SUPERIOR AL STOCK, REGRESAR LOS VALORES INICIALES ↑↑
        swal({
            title: "Error de producto",
            text: "¡Solo hay " + $(this).attr("stock") + " unidades!",
            type: "error",
            confirmButtonText: "¡Correcto!"
        });

    }
    // FUNCION SUMAR TOTAL DE PRECIOS ↓
    sumarTotalPrecios();
    // FUNCION AGREGAR IMPUESTO ↓
    agregarImpuesto();
    //AGRUPAR PRODUCTOS EN FORMATO JSON ↓
    listarProductos();
});
// MODIFICAR LA CANTIDAD ↑↑↑

// SUMAR TODOS LOS PRECIOS ↓↓↓
function sumarTotalPrecios() {
    var precioItem = $(".nuevoPrecioProducto");
    var arraySumaPrecio = [];
    for (let i = 0; i < precioItem.length; i++) {
        arraySumaPrecio.push(Number($(precioItem[i]).val()));
    }
    //console.log(arraySumaPrecio)

    function sumaArrayPrecios(total, numero) {
        return total + numero;
    } // fin sumarArrayPrecios ↑
    var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
    //console.log(sumaTotalPrecio)
    $("#nuevoTotalVenta").val(sumaTotalPrecio);
    $("#totalVenta").val(sumaTotalPrecio);
    $("#nuevoTotalVenta").attr("total", sumaTotalPrecio);
} // fin sumarTotalPrecios ↑↑
// SUMAR TODOS LOS PRECIOS ↑↑↑


////////////////////////////////////////////

//FALTA ARREGLAR LO DE AGREGAR CORRECTAMENTE LOS ITEMS EN DISPOSITIVOS MÓVILES

////////////////////////////////////////////

// AGREGAR IMPUESTO A LA VENTA ↓↓↓
// FUNCION AGREGAR IMPUESTO ↓↓
function agregarImpuesto() {
    var impuesto = $("#nuevoImpuestoVenta").val();
    var precioTotal = $("#nuevoTotalVenta").attr("total");
    var precioImpuesto = Number(precioTotal * impuesto / 100);
    var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
    $("#nuevoTotalVenta").val(totalConImpuesto);
    $("#totalVenta").val(totalConImpuesto);
    $("#nuevoPrecioImpuesto").val(precioImpuesto);
    $("#nuevoPrecioNeto").val(precioTotal);
} // FUNCION AGREGAR IMPUESTO ↑↑
// AGREGAR IMPUESTO A LA VENTA ↑↑↑

// CUANDO CAMBIE EL IMPUESTO ↓↓
$("#nuevoImpuestoVenta").change(function() {
        agregarImpuesto();
    })
    // CUANDO CAMBIE EL IMPUESTO ↑↑

// CAMBIAR FORMATO AL PRECIO FINAL ↓↓
$("#nuevoTotalVenta").number(true, 2);
// CAMBIAR FORMATO AL PRECIO FINAL ↑↑

// SELECCIOAR METODO DE PAGO ↓↓
$("#nuevoMetodoPago").change(function() {
    var metodo = $(this).val();
    if (metodo == "Efectivo") {
        $(this).parent().parent().removeClass("col-xs-6");
        $(this).parent().parent().addClass("col-xs-4");
        $(this).parent().parent().parent().children(".cajasMetodoPago").html(
            '<div class="col-xs-4">' +
            '<div class="input-group">' +
            '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
            '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000.000.00" required>' +
            '</div>' +
            '</div>' +
            '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">' +
            '<div class="input-group">' +
            '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
            '<input type="text" class="form-control" id="nuevoCambioEfectivo" name="nuevoCambioEfectivo" placeholder="000.000.00" readonly required>' +
            '</div>' +
            '</div>'
        );
        // AGREGAR FORMATO AL PRECIO 
        $("#nuevoCambioEfectivo").number(true, 2);
        $("#nuevoValorEfectivo").number(true, 2);

        //LISTAR MÉTODO EN LA ENTRADA
        listarMetodos();
    } else {
        $(this).parent().parent().removeClass("col-xs-4");
        $(this).parent().parent().addClass("col-xs-6");
        $(this).parent().parent().parent().children(".cajasMetodoPago").html(
            '<div class="col-xs-6" style="padding-left:0px">' +
            '<div class="input-group">' +
            '<input type="text" class="form-control" id="nuevoCodigoTransaccion"' + 'name="nuevoCodigoTransaccion" placeholder="Código transacción" required>' +
            '<span class="input-group-addon"><i class="fa fa-lock"></i></span>' +
            '</div>' +
            '</div>'
        );
    }
});
// SELECCIOAR METODO DE PAGO ↑↑

// CAMBIO EN EFECTIVO ↓↓
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function() {
    var efectivo = $(this).val();
    //console.log(efectivo)
    var cambio = Number(efectivo) - Number($("#nuevoTotalVenta").val());
    console.log(cambio)
    var nuevoCambioEfectivo = $(this).parent().parent().parent().children("#capturarCambioEfectivo").children().children("#nuevoCambioEfectivo");
    //console.log($(this).parent().parent().parent().children(".capturarCambioEfectivo").children().children(".nuevoCambioEfectivo"));
    nuevoCambioEfectivo.val(cambio);
});
// CAMBIO EN EFECTIVO ↑↑

// CAMBIO TRANSACCION ↓↓
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function() {
    //LISTAR MÉTODO EN LA ENTRADA AL CAMBIAR EL CÓDIGO DE LA TRANSACCION
    listarMetodos();
}); // CAMBIO TRANSACCION ↑↑

// LISTAR TODOS LOS PRODUCTOS ↓↓↓
function listarProductos() {
    var listaProductos = [];

    //var id = ;
    var descripcion = $(".nuevaDescripcionProducto");
    var cantidad = $(".nuevaCantidadProducto");
    var precio = $(".nuevoPrecioProducto");
    //var total = ;
    // CICLO FOR
    for (let i = 0; i < descripcion.length; i++) {
        listaProductos.push({
                "id": $(descripcion[i]).attr("idProducto"),
                "descripcion": $(descripcion[i]).val(),
                "cantidad": $(cantidad[i]).val(),
                "stock": $(cantidad[i]).attr("nuevoStock"),
                "precio": $(precio[i]).attr("precioReal"),
                "total": $(precio[i]).val()
            }) //fin push a listaProductos
    } // CICLO FOR
    //ASIGNAMOS LA LISTA EN DATOS JSON AL INPUT OCULTO ↓
    $("#listaProductos").val(JSON.stringify(listaProductos));
    //ASIGNAMOS LA LISTA EN DATOS JSON AL INPUT OCULTO ↑
} // LISTAR TODOS LOS PRODUCTOS ↑↑↑

// LISTAR METODO PAGO ↓↓
function listarMetodos() {
    var listaMetodos = "";
    if ($("#nuevoMetodoPago").val() == "Efectivo") {
        $("#listaMetodoPago").val("Efectivo");
    } else {
        $("#listaMetodoPago").val($("#nuevoMetodoPago").val() + " - " + $("#nuevoCodigoTransaccion").val());
    }
} // LISTAR METODO PAGO ↑↑