<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
    // editar usuario

    public $idUsuario;  //recojo el id usuario que me envia js
    //cuando se ejecute este metodo ↓↓↓, se pueda capturar el idUsuario
    public function ajaxEditarUsuario(){

        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

        echo json_encode($respuesta);

    } //fin metodo ajaxEditarUsuario
/** ------------------ ACTIVAR USUARIO*/
public $activarId;
public $activarUsuario;

    public function ajaxActivarUsuario(){

        $tabla = "usuarios";
        $item1 = "estado";
        $valor1 = $this->activarUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }# fin ajaxActivarUsuario

/** ------------------ ACTIVAR USUARIO*/
/** ------------------ INICIO VALIDAR QUE NO SE REPITA EL USUARIO*/
    public $validarUsuario;

    //creamos el metodo para valida el usuario y que nos envia la info a la BD
    public function AjaxValidarUsuario(){
        //la tarea que va a realizar este metodo publico es mostrar el uduario que coincida con el nombre de usuario que vien guardado de la base de datos

        //enviamos esto a la BD ↓↓↓
        $item = "usuario";
        $valor = $this->validarUsuario;

        //el controlador se lo envia al modelo y el modelo devuelve una respuesta
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

        echo json_encode($respuesta);


    } // fin metodo ajaxValidarUsuario

/** ------------------ FIN VALIDAR QUE NO SE REPITA EL USUARIO*/

}//fin clase ajaxUsuario

//--------objeto editar usuario

if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    
    $editar ->idUsuario = $_POST["idUsuario"];
    
    $editar ->ajaxEditarUsuario();
} 

//--------objeto activar usuario

if (isset($_POST["activarUsuario"])) {
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();
    
}

//--------OBJETO PARA VALIDAR EL usuario REPETIDO

if (isset($_POST["validarUsuario"])) {
    #almacenamos en valUsuario la clase
    $valUsuario = new AjaxUsuarios();
    // relacionamos la variable publica con la variable POST
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    //ejecutamos el metodo ajaxValidarUsuario
    $valUsuario ->AjaxValidarUsuario();

}
