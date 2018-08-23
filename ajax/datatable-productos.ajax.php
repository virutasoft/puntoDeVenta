<?php
//VUELVO A CARGAR ESTOS ARCHIVOS PORQUE NO SIRVEN LOS DEL INDEX PARA HACER ESTO, DEBO HACERLO DIRECTAMTNE EN ESTE ARCHIVO
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
//AHORA DEBO REQUERIR TAMBIÈN LOS ARCHIVOS DE CATEGORIAS PARA PODERLOS LLAMAR EN ESTE ARCHIVO ↓↓↓
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class TablaProductos{
    
    // MOSTRAR LA TABLA DE PRODUCTOS ↓↓↓
    
        public function mostrarTablaProductos(){

            //SOLICITAMOS LA INFORMACION DESDDE LA BASE DE DATOS ↓↓↓
            $item = null;
            $valor = null;

            $productos = controladorProductos::ctrMostrarProductos($item, $valor);
            // CREAMOS LA ESTRUCTURA HTML EN VARIABLES ↓↓↓

            $botones = "<div class='btn-group'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button><button class='btn btn-danger'><i class='fa fa-times'></i></button></div>";

            // CREAMOS LA ESTRUCTURA HTML EN VARIABLES ↑↑↑
            
            $datosJson = '{
                "data": [';
                    
                for ($i=0; $i < count($productos); $i++) {
                    $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
                    $datosJson .= '[
                        "'.($i+1).'",
                        "'.$imagen.'",
                        "'.$productos[$i]["codigo"].'",
                        "'.$productos[$i]["descripcion"].'",
                        "Taladros",
                        "'.$productos[$i]["stock"].'",
                        "$'.$productos[$i]["precio_compra"].'",
                        "$'.$productos[$i]["precio_venta"].'",
                        "'.$productos[$i]["fecha"].'",
                        "'.$botones.'"
                    ],';
                }//fin for DATOSJSON
                $datosJson = substr($datosJson, 0, -1);// extraemos el último caracter del final del último ítem de la variable datosJson, o sea, la coma que sobra
                $datosJson .= ']}';
            

            //SOLICITAMOS LA INFORMACION DESDDE LA BASE DE DATOS ↑↑↑
    
        echo $datosJson;
                
        }// fin metodo mostrarTablaProductos
    
    // MOSTRAR LA TABLA DE PRODUCTOS ↑↑↑

}// FIN TABLAPRODUCTOS

//CREAMOS EL OBJETO POR FUERA DEL METODO PARA PODER ACTIVARLO

// ACTIVAR LA TABLA DE PRODUCTOS ↓↓↓
    $activarProductos = new TablaProductos();       //instanciamos
    $activarProductos -> mostrarTablaProductos();   //ejecutamos metodo de la clase
// ACTIVAR LA TABLA DE PRODUCTOS ↑↑↑