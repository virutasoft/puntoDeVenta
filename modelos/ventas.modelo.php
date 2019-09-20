<?php
require_once "conexion.php";

// CLASE MODELO VENTAS ↓↓↓
class ModeloVentas{
    //mdlMostrarVentas ↓↓
    static public function mdlMostrarVentas($tabla,$item,$valor){
        if ($item != null) {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item ORDER BY fecha DESC");
            $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            # code...
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");
            $stmt->bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt= null;
        
    }
    //mdlMostrarVentas ↑↑
}// fin class modeloVentas
// CLASE MODELO VENTAS ↑↑↑