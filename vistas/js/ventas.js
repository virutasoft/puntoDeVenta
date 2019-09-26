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
                var precio = respuesta["precio_venta"];

                $(".nuevoProducto").append(
                    '<div class="row" style="padding:5px 15px">' +
                    '<div class="col-xs-6"  style="padding-right:0px">' +
                    '<div class="input-group">' +
                    '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto recuperarBoton" idProducto="' + idProducto + '" ><i class="fa fa-times"></i></button></span>' +
                    '<input type="text" name="agregarProducto" id="agregarProducto" placeholder="' + descripcion + '" class="form-control" required readonly>' +
                    '</div>' +
                    '</div>' +

                    '<!-- Descripción del producto ↑↑-->' +

                    '<!-- Cantidad del producto ↓↓ -->' +

                    '<div class="col-xs-3">' +
                    '<input type="number" name="nuevaCantidadProducto" id="nuevaCantidadProducto" class="form-control" min="1" value= "1" stock="' + stock + '" required>' +
                    ' </div>' +

                    ' <!-- Cantidad del producto ↑↑-- -->' +
                    '<!-- Precio del producto ↓↓ -->' +

                    '<div class="col-xs-3" style="padding-left:0px">' +
                    '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>' +
                    '<input type="number" name="nuevoPrecioProducto" id="nuevoPrecioProducto" class="form-control" min="1" value="' + precio + '" readonly required>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
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

});
// QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR EL BOTON ↑↑↑