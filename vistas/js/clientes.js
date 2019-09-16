// ----*********************EDITAR CLIENTE ↓↓↓

$(".tablas").on("click", ".btnEditarCliente", function() {
    var idCliente = $(this).attr("idCliente");
    //console.log("idCliente", idCliente);

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            // console.log(respuesta)
            $("#idCliente").val(respuesta["id"]);
            $("#editarCliente").val(respuesta["nombre"]);
            $("#editarDocumentoId").val(respuesta["documento"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);

        }


    });


});

// ----*********************EDITAR CLIENTE ↑↑↑

// ----*********************ELIMINAR CLIENTE ↓↓↓
$(".tablas").on("click", ".btnEliminarCliente", function() {
    var idCliente = $(this).attr("idCliente");
    //console.log("id del cliente: ", idCliente);

    swal({
        title: "¿Estás seguro de borrar el cliente?",
        text: "Si no lo estás, puedes cancelar la acción.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar cliente!"
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=clientes&idCliente=" + idCliente;
        }
    })

});
// ----*********************ELIMINAR CLIENTE ↑↑↑