<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php"; 

//----------------------------
#EDITAR CLIENTE ↓↓
//----------------------------

class AjaxClientes{
    public $idCliente;

    public function ajaxEditarCliente(){
        $item = "id";
        $valor = $this->idCliente;
        //var_dump($item, $valor);
        $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);
        // var_dump($respuesta);
        
        echo json_encode($respuesta);
        

        //var_dump($respuesta);
    }//fin function ajaxEditarCliente
}// fin clase AjaxEditarClientes

//----------------------------
#EDITAR CLIENTE ↑↑
//----------------------------
//----------------------------
#OBJETO EDITAR CLIENTE ↓↓
//----------------------------
if (isset($_POST["idCliente"])) {
    # code...
    $cliente = new AjaxClientes();
    $cliente -> idCliente = $_POST["idCliente"];
    $cliente ->ajaxEditarCliente();
}
