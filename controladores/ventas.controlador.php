<?php
// CONTROLADOR VENTAS ↓↓↓
class ControladorVentas{


    // MOSTRAR VENTAS ↓↓
    static public function ctrMostrarVentas($item, $valor){
        $tabla = "ventas";
        $respuesta = ModeloVentas::mdlMostrarVentas($tabla,$item,$valor);
        return $respuesta;
        
        
    }// fin ctrMostrarVentas

    // MOSTRAR VENTAS ↑↑
}// CIERRO CONTROLADORVENTAS
// CONTROLADOR VENTAS ↑↑↑
