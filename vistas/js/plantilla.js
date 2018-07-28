/*sidebarmenu*/ 
$('.sidebar-menu').tree();

// DATATABLE

$(".tablas").DataTable({

    "language": {

        "decimal":        "",
        "emptyTable":     "No hay datos disponibles en la tabla",
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered":   "(Filtrado _MAX_ del total entradas)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Muestra _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscar:",
        "zeroRecords":    "No se encontraron datos almacenados",
        "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },
        "aria": {
            "sortAscending":  ": active para ordenar columnas ascendentemente",
            "sortDescending": ": active para ordenar columnas descendentemente"
        }
    }


});