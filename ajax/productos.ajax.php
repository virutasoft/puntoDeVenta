<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

    // GENERAR CODIGO A  PARTIR DE IDCATEGORIA ↓↓↓
    public $idCategoria;
    
    public function ajaxCrearCodigoProducto(){

        $item = "id_Categoria";
        $valor = $this->idCategoria;
        
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
        
        // RESPUESTAS DE ESTE METODO
        echo json_encode($respuesta);

    }// fin ajaxCrearCodigoProducto
    
    
    // GENERAR CODIGO A  PARTIR DE IDCATEGORIA ↑↑↑
    
    
    
    
}// FIN CLASE AJAXPRODUCTOS

//-------------------------------------
// CREACION DE OBJETOS

// GENERAR CODIGO A  PARTIR DE IDCATEGORIA ↓↓↓
if (isset($_POST["idCategoria"])) {
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();
}
// GENERAR CODIGO A  PARTIR DE IDCATEGORIA ↑↑↑