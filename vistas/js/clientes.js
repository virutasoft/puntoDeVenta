//EDITAR CLIENTE ↓↓
/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function() {

        var idCliente = $(this).attr("idCliente");

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

                console.log(respuesta)
            }

        })

    })
    //EDITAR CLIENTE ↑↑