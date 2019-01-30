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
                    
                    //  VALIDAR LA IMAGEN ↓↓↓  
                    if(isset($_FILES["nuevaImagen"]["tmp_name"])){

                        list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
    
                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
    
                        /*=============================================
                        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO
                        =============================================*/
    
                        $directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];
    
                        mkdir($directorio, 0755);
    
                        /*=============================================
                        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        =============================================*/
    
                        if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";
    
                            $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagejpeg($destino, $ruta);
    
                        }
    
                        if($_FILES["nuevaImagen"]["type"] == "image/png"){
    
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
    
                            $aleatorio = mt_rand(100,999);
    
                            $ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";
    
                            $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						
    
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                            imagepng($destino, $ruta);
    
                        }
    
                    }
                    //  VARLIDAR LA IMAGEN ↑↑↑    


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
    
    //EDITAR PRODUCTO ↓↓↓
    static public function ctrEditarProducto(){
        if (isset($_POST["editarDescripcion"])) {
            # code...
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',$_POST["editarDescripcion"]) && 
            preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
            preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
            preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])) {
                # code...
                $ruta = $_POST["imagenActual"];
                //var_dump($_POST["imagenActual"]);
                
                if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {
                    # code...
                    list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
                        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO
                    =============================================*/

                    $directorio = "vistas/img/productos/".$_POST["editarCodigo"];

                    /*=============================================
                        PRIMERO PREGUNTAMOS SI EXISTE UNA IMAGEN EN LA BD
                    =============================================*/

                    if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {
                        # code...
                        unlink($_POST["imagenActual"]);
                    }else{
                        mkdir($directorio, 0755);
                    }//fin if empty image

                    /*=============================================
                        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/

                    if ($_FILES["editarImagen"]["type"] == "image/jpeg") {
                        # code...
                            /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/
                            $aleatorio = mt_rand(100,999);
                            $ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";
                            $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                    }// fin if editar imagen
    
                    if ($_FILES["editarImagen"]["type"] == "image/png") {
                        # code...
                        /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/
                        $aleatorio = mt_rand(100,999);
                        $ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";
                        $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }//fin if editar imagen png
                }//fin if para validar si viene imagen 

                $tabla = "productos";
                $datos = array('id_categoria' => $_POST["editarCategoria"],
                                'codigo' => $_POST["editarCodigo"],
                                'descripcion' => $_POST["editarDescripcion"],
                                'stock' => $_POST["editarStock"],
                                'precio_compra' => $_POST["editarPrecioCompra"],
                                'precio_venta' => $_POST["editarPrecioVenta"],
                                'imagen' => $ruta );

                //respuesta de la base de datos
                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);
                //var_dump("respuesta: ".$respuesta);
                
                if ($respuesta == "ok") {
                    # code...
                    echo "<script>
                    swal({
                        type: 'success',
                        title: 'Confirmación de modificación de producto',
                        text: 'El producto ha sido modificado correctamente',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then(function(result){
                        if(result.value){
                            window.location = 'productos';
                        }
                    })
                    </script>";
                }
            }/*fin if preg_match*/else{
                echo "<script>
                    swal({
                        type: 'error',
                        title: 'Error al modificar el producto',
                        text: 'El producto no puede ir vacío o llevar caracteres especiales',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar'
                    }).then(function(result){
                        if(result.value){
                            window.location = 'productos';
                        }
                    })
                </script>";
            }
        }// fin if
    }#fin ctrEditarProducto
    //EDITAR PRODUCTO ↑↑↑

}//FIN CLASS CONTROLADORPRODUCTOS