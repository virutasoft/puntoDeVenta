<?php

class TablaProductos{
    
    // MOSTRAR LA TABLA DE PRODUCTOS ↓↓↓
    
        public function mostrarTablaProductos(){
            
        echo '{
            "data": [
            [
                "Tiger Nixon",
                "System Architect",
                "Edinburgh",
                "5421",
                "2011/04/25",
                "$320,800"
            ],
            [
                "Garrett Winters",
                "Accountant",
                "Tokyo",
                "8422",
                "2011/07/25",
                "$170,750"
            ]
            ]
        }';
                
        }// fin metodo mostrarTablaProductos
    
    // MOSTRAR LA TABLA DE PRODUCTOS ↑↑↑

}// FIN TABLAPRODUCTOS

//CREAMOS EL OBJETO POR FUERA DEL METODO PARA PODER ACTIVARLO

// ACTIVAR LA TABLA DE PRODUCTOS ↓↓↓
    $activarProductos = new TablaProductos();       //instanciamos
    $activarProductos -> mostrarTablaProductos();   //ejecutamos metodo de la clase
// ACTIVAR LA TABLA DE PRODUCTOS ↑↑↑