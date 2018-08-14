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


//ELIMINAR CATEGORIA

//-------------------------------------

$(document).on("click", ".btnEliminarCategoria", function () {
    var idCategoria = $(this).attr("idCategoria");

    swal({
        title: "Eliminación de categoría",
        text: "¿Estás seguro de borrar la categoría?, si no lo estás, puedes cancelar la acción",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Sí, borrar categoría.",
        cancelButtonColor: "#d33",
        cancelButtonText: "No borrar"
    }).then(function (result) {
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria;
        }
    })

});

//ELIMINAR CATEGORIA

//-------------------------------------↑↑↑↑