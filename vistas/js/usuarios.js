//--- *********************SUBIENDO LA FOTO DEL USUARIO ↓↓↓
$(".nuevaFoto").change(function () {

    var imagen = this.files[0];
    console.log("imagen", imagen);

    // VALIDANDO EL FORMATO DE LA IMAGEN JPG O PNG
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir imágenes",
            text: "Esta imágen debe venir en formato JPG o PNG",
            type: "error",
            confirmButtonText: "Cerrar"
        });

    } else if (imagen["size"] > 2000000) {
        $(".nuevaFoto").val("");

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
//---*********************SUBIENDO LA FOTO DEL USUARIO ↑↑↑


// ----*********************EDITAR USUARIO ↓↓↓

$(document).on("click", ".btnEditarUsuario", function () {
    var idUsuario = $(this).attr("idUsuario");
    //console.log("idUsuario", idUsuario);

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {
                $(".previsualizar").attr("src", respuesta["foto"]);
            }

        }


    });


});

// ----*********************EDITAR USUARIO ↑↑↑

// ----*********************ACTIVAR USUARIO ↓↓↓
$(document).on("click", ".btnActivar", function () {
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function ($respuesta) {

        }

    });

    if (estadoUsuario == 0) {
        $(this).removeClass("btn-success");
        $(this).addClass("btn-danger");
        $(this).html("Inactivo");
        $(this).attr("estadoUsuario", 1);
    } else {
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).html("Activo");
        $(this).attr("estadoUsuario", 0);
    }

});

// ----*********************ACTIVAR USUARIO ↑↑↑


// ----*********************REVISAR USUARIO REPETIDO ↓↓↓

$("#nuevoUsuario").change(function () {
    var usuario = $(this).val();
    var datos = new FormData();
    //adicionamos la variable post "validarUsuario"
    datos.append("validarUsuario", usuario);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log("respuesta", respuesta);
        }
    })

});

// ----*********************REVISAR USUARIO REPETIDO ↑↑↑