<?php

require_once "conexion.php";

class ModeloCategorias{

    // CREAR CATEGORIA  ↓↓↓
    static public function mdlIngresarCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");
        $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
        
    }// cierre mdlIngresarCategoria
    // CREAR CATEGORIA  ↑↑↑

    //MOSTRAR CATEGORIA ↓↓↓

    static public function mdlMostrarCategorias($tabla, $item, $valor){

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();
            return $stmt -> fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt->fetchAll();//devolvemos todos los items de la tabla


        }
        $stmt -> close();
        $stmt = null;


    }// cierre mdlMostrarCategorias

    //MOSTRAR CATEGORIA ↑↑↑

    // EDITAR CATEGORIA  ↓↓↓
    static public function mdlEditarCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
        
    }// cierre mdlIngresarCategoria
    // EDITAR CATEGORIA  ↑↑↑


    //BORRAR CATEGORÍA ↓↓↓
    static public function mdlBorrarCategoria($datos, $tabla){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt -> execute()) {
            # code...
            return "ok";

        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }//fin mdlBorrarCategoria
    //BORRAR CATEGORÍA ↑↑↑
}//cierre modeloCategorias