<?php
//VUELVO A CARGAR ESTOS ARCHIVOS PORQUE NO SIRVEN LOS DEL INDEX PARA HACER ESTO, DEBO HACERLO DIRECTAMTNE EN ESTE ARCHIVO
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
//AHORA DEBO REQUERIR TAMBIÈN LOS ARCHIVOS DE CATEGORIAS PARA PODERLOS LLAMAR EN ESTE ARCHIVO ↓↓↓
// aqui no van las catergorias porque no se necesitan



class TablaProductosVentas{
    
    // MOSTRAR LA TABLA DE PRODUCTOS ↓↓↓
    
        public function mostrarTablaProductosVentas(){

            //SOLICITAMOS LA INFORMACION DESDDE LA BASE DE DATOS ↓↓↓
            $item = null;
            $valor = null;

            $productos = controladorProductos::ctrMostrarProductos($item, $valor);
            
            $datosJson = '{
                "data": [';
                
                for ($i=0; $i < count($productos); $i++) {
                    //TRAEMOS LA IMAGEN ↓↓↓
                    $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
                    //TRAEMOS LA IMAGEN ↑↑↑

                    // STOCK DINÁMICO ↓↓↓
                    if ($productos[$i]["stock"] <= 10) {
                        $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";
                    } else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){
                        $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";
                    } else{
                        
                        $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
                    }
                    
                    // STOCK DINÁMICO ↑↑↑
                    
                    // CREAMOS LA ESTRUCTURA HTML EN VARIABLES Y TRAEMOS ALGUNAS ACCIONES ↓↓↓
                    
                    $botones = "<div class='btn-group'><button class='btn btn-info recuperarBoton agregarProducto' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";
                    // CREAMOS LA ESTRUCTURA HTML EN VARIABLES Y TRAEMOS ALGUNAS ACCIONES ↑↑↑
                    
                   


                    
                    $datosJson .= '[
                        "'.($i+1).'",
                        "'.$imagen.'",
                        "'.$productos[$i]["codigo"].'",
                        "'.$productos[$i]["descripcion"].'",
                        "'.$stock.'",
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
    $activarProductosVentas = new TablaProductosVentas();       //instanciamos
    $activarProductosVentas -> mostrarTablaProductosVentas();   //ejecutamos metodo de la clase
// ACTIVAR LA TABLA DE PRODUCTOS ↑↑↑