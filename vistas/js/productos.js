// CARGAR LA TABLA DESDE AJAX

// VERIFICAR LA LLEGADA DE LOS DATOS json

// $.ajax({

//     url: "ajax/datatable-productos.ajax.php",
//     success: function (respuesta) {
//         console.log(respuesta);
//     }
// });

$(".tablaDeProductos").DataTable({
  ajax: "ajax/datatable-productos.ajax.php",
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
$("#nuevoPrecioCompra,#editarPrecioCompra").change(function () {
  if ($(".porcentaje").prop("checked")) {
    var valorPorcentaje = $(".nuevoPorcentaje").val();
    //console.log("ValorPorcentaje", valorPorcentaje);
    var porcentaje =
      Number(($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#nuevoPrecioCompra").val());
    //console.log("porcentaje", porcentaje);
    var editarporcentaje =
      Number(($("#editarPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#editarPrecioCompra").val());

    $("#nuevoPrecioVenta").val(porcentaje);
    $("#nuevoPrecioVenta").prop("readonly", true);

    $("#editarPrecioVenta").val(editarporcentaje);
    $("#editarPrecioVenta").prop("readonly", true);
  }
});
// AGREGANDO PRECIO DE VENTA ↑↑↑

// CAMBIO DE PORCENTAJE ↓↓↓
$(".nuevoPorcentaje").change(function () {
  if ($(".porcentaje").prop("checked")) {
    var valorPorcentaje = $(this).val();
    //console.log("ValorPorcentaje", valorPorcentaje);
    var porcentaje =
      Number(($("#nuevoPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#nuevoPrecioCompra").val());
    //console.log("porcentaje", porcentaje);

    var editarporcentaje =
      Number(($("#editarPrecioCompra").val() * valorPorcentaje) / 100) +
      Number($("#editarPrecioCompra").val());

    $("#nuevoPrecioVenta").val(porcentaje);
    $("#nuevoPrecioVenta").prop("readonly", true);

    $("#editarPrecioVenta").val(editarporcentaje);
    $("#editarPrecioVenta").prop("readonly", true);
  }
});

$(".porcentaje").on("ifUnchecked", function () {
  //INSERTAR AQUI DESPUES UNA VARIABLE PARA GUARDAR EL VALOR DE LA OPERACION QUE SE HIZO

  $("#nuevoPrecioVenta").prop("readonly", false);
  //Y AQUI,BORRAR EL VALOR DEL CUADRO DE TEXTO
  $("#editarPrecioVenta").prop("readonly", false);
});

$(".porcentaje").on("ifChecked", function () {
  //AQUI PARA RECUPERAR EL VALOR  DE LA OPERACION
  $("#nuevoPrecioVenta").prop("readonly", true);
  $("#editarPrecioVenta").prop("readonly", true);
});

// CAMBIO DE PORCENTAJE ↑↑↑

//--- *********************SUBIENDO LA FOTO DEL PRODUCTO ↓↓↓
$(".nuevaImagen").change(function () {
  var imagen = this.files[0];
  //console.log("imagen", imagen);

  // VALIDANDO EL FORMATO DE LA IMAGEN JPG O PNG
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarimg").attr("src", rutaImagen);
    });
  }
});

//---*********************SUBIENDO LA FOTO DEL PRODUCTO ↑↑↑

// EDITAR PRODUCTO ↓↓↓
$(".tablaDeProductos tbody").on("click", "button.btnEditarProducto", function () {
  var idProducto = $(this).attr("idProducto");
  //console.log("idProducto", idProducto); //llevo el idProducto a ajax para que me traiga toda la información de la bd en esa fila
  var datos = new FormData();
  datos.append("idProducto", idProducto); //a la variable datos le edicionamos con append el idProducto para que haga la consulta en la BD

  //ajax ↓↓↓
  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log("Respuesta", respuesta);
      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria", respuesta["id_categoria"]);
      $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          //console.log("imagen", respuesta);
          $("#editarCategoria").val(respuesta["id"]);
          $("#editarCategoria").html(respuesta["categoria"]);
        }
      });

      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarStock").val(respuesta["stock"]);
      $("#editarPrecioCompra").val(respuesta["precio_compra"]);
      $("#editarPrecioVenta").val(respuesta["precio_venta"]);

      if (respuesta["imagen"] != "") {
        $("#imagenActual").val(respuesta["imagen"]);
        $(".previsualizarImg").attr("src", respuesta["imagen"]);
      }
      // console.log("imagen", respuesta["imagen"]);
    }
  });
  //ajax ↑↑↑
});
// EDITAR PRODUCTO ↑↑↑

//BORRAR PRODUCTO ↓↓↓
$(".tablaDeProductos tbody").on("click", "button.btnEliminarProducto", function () {
  var idProducto = $(this).attr("idProducto");
  var codigo = $(this).attr("codigo");
  var imagen = $(this).attr("imagen");
  //console.log('id', idProducto);
  //console.log('codigo', codigo);
  //console.log('imagen', imagen);

  swal({
    title: 'Eliminación de productos',
    text: '¿Está seguro de eliminar este producto? Si no lo está, puede cancelar.',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: '¡Si, borrar producto!'
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=productos&idProducto=" + idProducto + "&imagen=" + imagen + "&codigo=" + codigo;
    }

  });


});
//BORRAR PRODUCTO ↑↑↑