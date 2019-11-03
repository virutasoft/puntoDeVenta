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

    // REGISTRO DE VENTAS ↓↓↓
    static public function mdlIngresarVenta($tabla, $datos){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor,productos, impuesto, neto, total, metodo_pago)VALUES(:codigo, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":id_vendedor",$datos["id_vendedor"], PDO::PARAM_INT);
        $stmt->bindParam(":productos",$datos["productos"], PDO::PARAM_STR);
        $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
        $stmt->bindParam(":neto",$datos["neto"], PDO::PARAM_STR);
        $stmt->bindParam(":total",$datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago",$datos["metodo_pago"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            # code...
            return "ok";

        } else {
            # code...
            return "error";
        }// fin if execute
        $stmt->close();
        $stmt= null;
    }//fin mdlMostrarVentas

    // REGISTRO DE VENTAS ↑↑↑

}// fin class modeloVentas
// CLASE MODELO VENTAS ↑↑↑