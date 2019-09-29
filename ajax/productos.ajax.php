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
    
    //---------------------------------------


// EDITAR PRODUCTO ↓↓↓
    public $idProducto;

    public function ajaxEditarProducto(){
        $item = "id";
        $valor = $this->idProducto;

        $respuesta = controladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);

    }// fin method ajaxEditarProducto


// EDITAR PRODUCTO ↑↑↑
    
    
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

// EDITAR PRODUCTO ↓↓↓
if (isset($_POST["idProducto"])) {
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}
// EDITAR PRODUCTO ↑↑↑

