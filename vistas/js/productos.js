// CARGAR LA TABLA DESDE AJAX

// VERIFICAR LA LLEGADA DE LOS DATOS json

// $.ajax({

//     url: "ajax/datatable-productos.ajax.php",
//     success: function (respuesta) {
//         console.log(respuesta);
//     }
// });





$('.tablaDeProductos').DataTable({
    "ajax": "ajax/datatable-productos.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});

// CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO ↓↓↓
$("#nuevaCategoria").change(function () {

    var idCategoria = $(this).val();
    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (!respuesta) {
                var nuevoCodigo = idCategoria + "01";
                $("#nuevoCodigo").val(nuevoCodigo);
            } else {
                //console.log("respuesta", respuesta);
                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                //ASIGNO VALOR DEL NUEVO CODIGO SUMADO AL VALOR DEL ELEMENTO CON EL ID NUEVOCODIGO
                $("#nuevoCodigo").val(nuevoCodigo);

            }
        }
    });

});
// CAPTURANDO LA CATEGORIA PARA ASIGNAR CODIGO ↑↑↑

// AGREGANDO PRECIO DE VENTA ↓↓↓
$("#nuevoPrecioCompra").change(function () {
    if ($(".porcentaje").prop("checked")) {

        var valorPorcentaje = $(".nuevoPorcentaje").val();
        //console.log("ValorPorcentaje", valorPorcentaje);
        var porcentaje = Number((($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100)) + Number($("#nuevoPrecioCompra").val());
        //console.log("porcentaje", porcentaje);

        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly", true);
    }
});
// AGREGANDO PRECIO DE VENTA ↑↑↑

// CAMBIO DE PORCENTAJE ↓↓↓
$(".nuevoPorcentaje").change(function () {
    if ($(".porcentaje").prop("checked")) {

        var valorPorcentaje = $(".nuevoPorcentaje").val();
        //console.log("ValorPorcentaje", valorPorcentaje);
        var porcentaje = Number((($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100)) + Number($("#nuevoPrecioCompra").val());
        //console.log("porcentaje", porcentaje);

        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly", true);
    }
});

$(".porcentaje").on("ifUnchecked", function () {
    //INSERTAR AQUI DESPUES UNA VARIABLE PARA GUARDAR EL VALOR DE LA OPERACION QUE SE HIZO

    $("#nuevoPrecioVenta").prop("readonly", false);
    //Y AQUI,BORRAR EL VALOR DEL CUADRO DE TEXTO
})
$(".porcentaje").on("ifchecked", function () {
    //AQUI PARA RECUPERAR EL VALOR  DE LA OPERACION
    $("#nuevoPrecioVenta").prop("readonly", true);
})


// CAMBIO DE PORCENTAJE ↑↑↑


//--- *********************SUBIENDO LA FOTO DEL PRODUCTO ↓↓↓
$(".nuevaImagen").change(function () {

    var imagen = this.files[0];
    console.log("imagen", imagen);

    // VALIDANDO EL FORMATO DE LA IMAGEN JPG O PNG
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir imágenes",
            text: "Esta imágen debe venir en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    } else if (imagen["size"] > 2000000) {
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir imágenes",
            text: "Esta imágen debe tener un peso inferior o igual a 2 Mb." + "       " + "Suba una imágen más liviana.",
            type: "error",
            confirmButtonText: "Cerrar"
        });
    } else {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function (event) {
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);

        });
    }

});
//---*********************SUBIENDO LA FOTO DEL PRODUCTO ↑↑↑