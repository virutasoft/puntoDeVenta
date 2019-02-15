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
        //var_dump($stmt);
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
    //MOSTRAR CLIENTE ↓↓↓
    static public function mdlMostrarClientes($tabla, $item, $valor){
        if ($item != null) {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =: $item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        } else {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
        
    }//fin mdlMostrarClientes
    //MOSTRAR CLIENTE ↑↑↑

}//fin class modeloClientes
//----------------MODELO AGREGAR CLIENTES ↑↑↑