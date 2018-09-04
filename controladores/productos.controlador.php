<?php

// CONTROLADOR DE PRODUCTOS

class ControladorProductos{


    // MOSTRAR PRODUCTOS ↓↓↓
    static public function ctrMostrarProductos($item, $valor){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    }//fin ctrmostarProductos
    // MOSTRAR PRODUCTOS ↑↑↑

    // CREAR PRODUCTO ↓↓↓
    static public function ctrCrearProducto(){

        if (isset($_POST["nuevaDescripcion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["nuevaDescripcion"]) &&       preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) && 
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) && 
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])) {

                    $ruta = "vistas/img/productos/default/anonymous.png";
                    $tabla = 'productos';
                    $datos = array(
                        "id_categoria" => $_POST["nuevaCategoria"],
                        "codigo" => $_POST["nuevoCodigo"],
                        "descripcion" => $_POST["nuevaDescripcion"],
                        "stock" => $_POST["nuevoStock"],
                        "precio_compra" => $_POST["nuevoPrecioCompra"],
                        "precio_venta" => $_POST["nuevoPrecioVenta"],
                        "imagen" => $ruta);
                        
                    //respuesta de la base de datos
                        $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);
                        
                        if ($respuesta == 'ok') {
                            echo "<script> 
                        swal({
                                type: 'success',
                                title: 'Confirmación de ingreso de datos',
                                text: 'El producto ha sido guardado correctamente.',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar'  
                            }).then(function(result){
                                if(result.value){
                                    window.location = 'productos';
                                }
                            })
                    </script>";
                        }
                
                }/*preg match*/else{
                    echo"<script> 
                        swal({
                                type: 'error',
                                title: 'Error de ingreso de datos',
                                text: 'El producto no puede ir vacío o llevar caacteres especiales.',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar'
                            }).then(function(result){
                                if(result.value){
                                    window.location = 'productos';
                                }
                            })
                    </script>";
                }
        }//isset
        
    }// fin ctrCrearProducto
    // CREAR PRODUCTO ↑↑↑
    
    

}//FIN CLASS CONTROLADORPRODUCTOS