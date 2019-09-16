// ----*********************EDITAR USUARIO ↓↓↓

$(".tablas").on("click", ".btnEditarCliente", function() {
    var idCliente = $(this).attr("idCliente");
    console.log("idCliente", idCliente);

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
            $("#editarCliente").val(respuesta["nombre"]);
            $("#editarDocumentoId").val(respuesta["documento"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);

        }


    });


});

// ----*********************EDITAR USUARIO ↑↑↑