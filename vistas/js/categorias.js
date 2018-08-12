//EDITAR CATEGORIA

//-------------------------------------

$(document).on("click", ".btnEditarCategoria", function () {

    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // if (window.matchMedia("(max-width:767px)").matches) {
            //     swal({
            //         title: "¡La categoría ha sido modificada con éxito!",
            //         type: "success",
            //         confirmButtonText: "Cerrar"
            //     }).then(function (result) {
            //         if (result.value) {
            //             window.location = "categorias";
            //         }
            //     });
            // }
            //console.log("respuesta", respuesta); //traemos respuesta
            $("#editarCategoria").val(respuesta["categoria"]); //seleccionamos el valor categoria de respuesta y lo colocamos en el input
            $("#idCategoria").val(respuesta["id"]);
        }
    })
});