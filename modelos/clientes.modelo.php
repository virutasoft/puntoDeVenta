<?php

require_once "conexion.php";

//----------------MODELO AGREGAR CLIENTES ↓↓↓
class ModeloClientes{
    //INGRESAR CLIENTE ↓↓↓
    static public function mdlIngresarCliente($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento) VALUES(:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        var_dump($stmt);
        if ($stmt->execute()) {
            # code...
            return "ok";
        } else {
            # code...
            return "error";
        }
        $stmt->close();
        $stmt = null;
        
    }//fin mdlAgregarCliente
    //INGRESAR CLIENTE ↑↑↑
}//fin class modeloClientes
//----------------MODELO AGREGAR CLIENTES ↑↑↑