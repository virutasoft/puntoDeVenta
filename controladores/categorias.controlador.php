<?php

class ControladorCategorias{

    // CREAR CATEGORIAS ↓↓↓
    static public function ctrcrearCategoria(){

        if (isset($_POST["nuevaCategoria"])) {
            if (preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $_POST["nuevaCategoria"])) {
                
                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];
                $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
                var_dump($respuesta);
                if($respuesta == "ok"){
                    echo'<script> 
                    swal({
                            type: "success",
                            title: "Operación exitosa!!",
                            text: "La categoría ha sido creada correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"   
                        }).then(function(result){
                            if(result.value){
                                window.location = "categorias";
                            }
                        })
                </script>';
                }

            }else{
                echo"<script> 
                        swal({
                                type: 'error',
                                title: 'Error de creación',
                                text: 'La categoría no puede ir vacía o llevar caracteres especiales.',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar',
                                closeOnConfirm: false   
                            }).then(function(result)->{
                                if(result.value){
                                    window.location = 'categorias';
                                }
                            })
                    </script>";
            }// cierre pregmatch nuevaCategoría
        } //cierre isset nuevaCategoria

    } // cierre crearCategoria
    // CREAR CATEGORIAS ↑↑↑

    //MOSTRAR CATEGORÍAS ↓↓↓
    static public function ctrMostrarCategorias($item, $valor){

        $tabla = 'categorias';

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item,$valor);

        return $respuesta;
    }
    //MOSTRAR CATEGORÍAS ↑↑↑



    // EDITAR CATEGORIAS ↓↓↓
    static public function ctrEditarCategoria(){

        if (isset($_POST["editarCategoria"])) {
            if (preg_match("/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/", $_POST["editarCategoria"])) {
                
                $tabla = "categorias";
                $datos = array("categoria"=> $_POST["editarCategoria"],
                                "id" => $_POST["idCategoria"]);
                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
                var_dump($datos);
                var_dump($respuesta);
                if($respuesta == "ok"){
                    echo'<script> 
                    swal({
                            type: "success",
                            title: "Operación exitosa!!",
                            text: "La categoría ha sido modificada con éxito.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"   
                        }).then(function(result){
                            if(result.value){
                                window.location = "categorias";
                            }
                        })
                </script>';
                }

            }else{
                echo"<script> 
                        swal({
                                type: 'error',
                                title: 'Error de creación',
                                text: 'La categoría no puede ir vacía o llevar caracteres especiales.',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar',
                                closeOnConfirm: false   
                            }).then(function(result)->{
                                if(result.value){
                                    window.location = 'categorias';
                                }
                            })
                    </script>";
            }// cierre pregmatch editarCategoría
        } //cierre isset editarCategoria

    } // cierre editararCategoria
    // EDITAR CATEGORIAS ↑↑↑



} //cierre clase ControladorCategorias