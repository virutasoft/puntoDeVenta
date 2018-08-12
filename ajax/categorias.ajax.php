<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
//editar categoria ↓↓↓
    public $idCategoria;

    public function ajaxEditarCategoria(){

        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
        
        echo json_encode($respuesta);
    }//fin editarCategoria
//editar categoria ↑↑↑

}// fin AjaxCategorías

//editar categoria ↓↓↓
if (isset($_POST["idCategoria"])) {
    # code...
    $categoria = new AjaxCategorias();
    $categoria ->idCategoria = $_POST["idCategoria"];
    $categoria -> ajaxEditarCategoria();
}
//editar categoria ↑↑↑

