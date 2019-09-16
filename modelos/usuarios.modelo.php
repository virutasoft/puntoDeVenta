<?php

require_once "conexion.php";

class ModeloUsuarios{

    //mostrar usuarios

    static public function mdlMostrarUsuarios($tabla, $item, $valor){

        if ($item != "") {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
            $stmt -> execute();
            // var_dump($stmt);
            return $stmt -> fetch();
            # code...
        } else {

            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    
            $stmt -> execute();
            return $stmt -> fetchAll();
        }

        $stmt -> close(); //cierra la conexion

        $stmt = null; //devuelve un valor nulo
        
    }//fin MdlMostrarUsuarios

    //REGISTRO DE USUARIOS ↓↓

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, perfil, foto) VALUES(:nombre, :usuario, :password, :perfil, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"],PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"],PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"],PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
            
        }
        
        $stmt-> close();

        $stmt=null;

    }//fin metodo mdlIngresarUsuario

    //---************************REGISTRO DE USUARIOS ↑↑

    // //---************************EDITAR USUARIOS ↓↓

    static public function mdlEditarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");
        //enlazamos parametros de insercion

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;

    }   //fin mdlEditarUsuario
    //---************************REGISTRO DE USUARIOS ↑↑

    //---************************ACTUALIZAR USUARIO ↓↓
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        //ENLAZAMOS PARAMETROS
        $stmt->bindParam(":".$item1,$valor1,PDO::PARAM_STR);
        $stmt->bindParam(":".$item2,$valor2,PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return "ok";
            
        } else {
            return "error";   
        }
        $stmt->close();
        $stmt = null;

    }# fin mdlActualizarUsuario
    //---************************ACTUALIZAR USUARIO ↑↑

    //---************************BORRAR USUARIO ↓↓
    static public function mdlBorrarUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(':id', $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            # code...
            return  "ok";
        } else {
            # code...
            return "error";
        }
        $stmt -> close();
        $stmt= null;
        

    }
    //---************************BORRAR USUARIO ↑↑



}   //fin ModeloUsuarios