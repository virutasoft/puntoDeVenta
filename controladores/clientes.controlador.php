<?php

//--------------------------------
#CLASE  CLIENTE ↓↓↓
//--------------------------------
class ControladorClientes{
    //CREAR CLIENTES
    static public function ctrCrearCliente(){
        if (isset($_POST["nuevoCliente"])) {
            # code...
            if (preg_match('/^[a-zA-ZñÑáéíóú´´AÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[0-9]+$/',$_POST["nuevoDocumentoId"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST["nuevoEmail"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])) {
                # code...
                $tabla = 'clientes';

                $datos = array('nombre' => $_POST["nuevoCliente"],
                                'documento' => $_POST["nuevoDocumentoId"],
                                'email' => $_POST["nuevoEmail"],
                                'telefono' => $_POST["nuevoTelefono"],
                                'direccion' => $_POST["nuevaDireccion"],
                                'fecha_nacimiento' => $_POST["nuevaFechaNacimiento"]
                            );

                            //respuesta de la base de datos
                            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
                            //var_dump($datos);
                            if ($respuesta == 'ok') {
                                # code...
                                echo "<script>
                                    swal({
                                        type:'success',
                                        title:'Creación de clientes',
                                        text:'El cliente ha sido creado correctamente',
                                        showConfirmButton: true,
                                        confirmButtonText: 'Perfecto',
                                        closeOnConfirm: false
                                    }).then(function(result){
                                        if (result.value) {
                                            window.location = 'clientes';
                                        }
                                    })
                                </script>";
                            }
                            

            } else {
                # code...
                echo "<script>
                    swal({
                        type: 'error',
                        title: 'Creación de clientes',
                        text:'El cliente no puede ir vacío o llear caracteres especiales',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then(function(result){
                        if (result.value) {
                            window.location = 'clientes';
                        }
                    })
                </script>";
            }
            
        }
    }//fin ctrCrearCliente  

//----------------------------
#MOSTRAR CLIENTES ↓↓
//----------------------------
static public function ctrMostrarClientes($item, $valor){
    $tabla = 'clientes';
    $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

    return $respuesta;
}//fin ctrMostrarClientes
//----------------------------
#MOSTRAR CLIENTES ↑↑
//----------------------------

//-------------------------------
#EDITAR CLIENTE ↓↓↓
//-------------------------------
static public function ctrEditarCliente(){

    if (isset($_POST["editarCliente"])) {
        # code...
        if (preg_match('/^[a-zA-ZñÑáéíóú´´AÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
            preg_match('/^[0-9]+$/',$_POST["editarDocumentoId"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$_POST["editarEmail"]) &&
            preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) &&
            preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])) {
            # code...
            $tabla = 'clientes';

            $datos = array('nombre' => $_POST["editarCliente"],
                            'documento' => $_POST["editarDocumentoId"],
                            'email' => $_POST["editarEmail"],
                            'telefono' => $_POST["editarTelefono"],
                            'direccion' => $_POST["editarDireccion"],
                            'fecha_nacimiento' => $_POST["editarFechaNacimiento"]
                        );

                        //respuesta de la base de datos
                        $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
                        //var_dump($datos);
                        if ($respuesta == 'ok') {
                            # code...
                            echo "<script>
                                swal({
                                    type:'success',
                                    title:'Edición de clientes',
                                    text:'El cliente ha sido creado correctamente',
                                    showConfirmButton: true,
                                    confirmButtonText: 'Perfecto',
                                    closeOnConfirm: false
                                }).then(function(result){
                                    if (result.value) {
                                        window.location = 'clientes';
                                    }
                                })
                            </script>";
                        }
                        

        } else {
            # code...
            echo "<script>
                swal({
                    type: 'error',
                    title: 'Edición de clientes',
                    text:'El cliente no puede ir vacío o llear caracteres especiales',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false
                }).then(function(result){
                    if (result.value) {
                        window.location = 'clientes';
                    }
                })
            </script>";
        }
        
    }

} //fin ctrEditarCliente
//-------------------------------
#EDITAR CLIENTE ↑↑↑
//-------------------------------

}//fin class controladorClientes
//--------------------------------
#CLASE  CLIENTE ↑↑↑
//--------------------------------