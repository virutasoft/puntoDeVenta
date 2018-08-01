<?php

class ControladorUsuarios{

/*----------------------------------------*/ 
# INGRESO USUARIO
/*----------------------------------------*/ 
    static public function ctrIngresoUsuario(){
        if (isset($_POST["ingUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $encriptar = crypt($_POST["ingPassword"],'$2y$10$hd9uofQlqErN5AnkiSQphOEstEw1bPkUImaDD3oDVFyzAYUWGCpUqn');

                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                

                //validacion de usuario y contraseña ↓↓
            if($respuesta['usuario'] == $_POST['ingUsuario'] && $respuesta['password'] == $encriptar){

                if ($respuesta['estado'] == 1) {
                    # code...
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["perfil"] = $respuesta["perfil"];
                    $_SESSION["foto"] = $respuesta["foto"];
    
                    /**************************************
                     * REGISTRAR FECHA ULTIMO LOGIN
                    * ************************* ************/   
                    date_default_timezone_set("America/Bogota");

                    $fecha = date("Y-m-d");
                    $hora = date("H:i:s");

                    $fechaActual = $fecha." ". $hora;

                    $item1 = "ultimo_login";
                    $valor1 = $fechaActual;

                    $item2 = "id";
                    $valor2 = $respuesta["id"];

                    $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario( $tabla, $item1, $valor1, $item2, $valor2);

                    if ($ultimoLogin == "ok") {
                        echo '<script> window.location = "inicio";</script>'; 
                        
                    } 
                    
                } else {
                    echo "<div class='alert alert-danger disabled' style='margin-top:20px;  border:1px solid orange; text-align:center;'>El usuario aún no se encuentra activo en el sistema, comunícate con el Administrador para recibir activación.</div>";
                }
                
                   /* echo "<div class='alert alert-success' style='margin-top:20px;  border:1px solid green; text-align:center;'>¡¡Bienvenido al sistema!!</div>";*/


            }else{
                echo "<div class='alert alert-danger disabled' style='margin-top:20px;  border:1px solid orange; text-align:center;'>Error al ingresar tu Usuario o contraseña, vuelve a intentarlo.</div>";
            }
            }

        }//ingUsuario
    }//ctrIngresoUsuario

/*----------------------------------------*/ 
# CREAR REGISTRO DE USUARIO
/*----------------------------------------*/ 
    static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/

                $ruta = "";

                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    =============================================*/

                    $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

                    mkdir($directorio, 0755);

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "usuarios";

                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                            "usuario" => $_POST["nuevoUsuario"],
                            "password" => $encriptar,
                            "perfil" => $_POST["nuevoPerfil"],
                            "foto"=>$ruta);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
            
                if($respuesta == "ok"){

                    echo '<script>

                    swal({

                        type: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "usuarios";

                        }

                    });
                

                    </script>';


                }	


            }else{

                echo '<script>

                    swal({

                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "usuarios";

                        }

                    });
                

                </script>';

            }


        }


    }
/*----------------------------------------*/ 
# CREAR METODO MOSTRAR USUARIO
/*----------------------------------------*/
    static public function ctrMostrarUsuario($item, $valor){

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;

    }//cierre metodo ctrMostrarUsuarios()


         /*----------------------------------------*/ 
        # CREAR METODO EDITAR USUARIO
        /*----------------------------------------*/
    static public function ctrEditarUsuario(){

        if (isset($_POST["editarUsuario"])) {
            
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                //******************* VALIDAR IMAGEN */

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                    
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    
                    /*----------------------------------------------------------------*/ 
                    # CREAMOS DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    /*----------------------------------------------------------------*/ 
                
                    $directorio = "vistas/img/usuarios/". $_POST["editarUsuario"];

                    // PRIMERO PREGUNTAMOS SI EXITE OTRA IMAGEN EN LA BASE DE DATOS

                    if (!empty($_POST["fotoActual"])){  
                        unlink($_POST["fotoActual"]);
                    } else {
                        
                        //crear directorio con sus permisos correspondientes
                        mkdir($directorio, 0755);
                        
                    }
                
                
                    
                    /*----------------------------------------------------------------*/ 
                    # DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO
                    # DE PHP
                    /*----------------------------------------------------------------*/ 
                    //validamos si la i9magen viene en JPG
                    
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        
                        $aleatorio = mt_rand(100,999);
                        //guardar imagen en directorio ↓↓↓
                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";
                        //var_dump($ruta);
                        //cortar la imagen ↓↓↓
                
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                
                        //guarda la foto en la ruta que le estamos asignando ↓↓↓
                        imagejpeg($destino, $ruta);
                        //validamos si la i9magen viene en PNG
                    }
                    //validamos si la i9magen viene en PNG
                
                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        
                        $aleatorio = mt_rand(100,999);
                        //guardar imagen en directorio ↓↓↓
                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";
                        //var_dump($ruta);
                        //cortar la imagen ↓↓↓
                
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                
                        //guarda la foto en la ruta que le estamos asignando ↓↓↓
                        imagepng($destino, $ruta);
                        //validamos si la i9magen viene en PNG
                }
                                    //var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));        
                }
                
                $tabla = "usuarios";

                if ($_POST["editarPassword"] != "") {
                    # code...
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        # code...
                        $encriptar = crypt($_POST["editarPassword"],'$2y$10$hd9uofQlqErN5AnkiSQphOEstEw1bPkUImaDD3oDVFyzAYUWGCpUqn');
                    } else {
                    
                        echo '<script>
                                
                                    swal({
                                        type: "error",
                                        title: "Error de llenado de datos",
                                        text: "La contraseña no puede ir vacia o llevar caracteres especiales. /n Escriba solo números y letras",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
            
                                        }).then((result)=>{
                                            if(result.value){
                                                window.location = "usuarios";
                                            }
                                        });
                                        
                        
                        
                                </script>';
                        
                    }
                } else {
                    $encriptar = $passwordActual;
                }

                //enviamos los datos al modelo
                $datos = array("nombre" => $_POST['editarNombre'],
                            "usuario" => $_POST['editarUsuario'],
                            "password" => $encriptar,
                            "perfil" => $_POST['editarPerfil'],
                            "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    // var_dump($respuesta);
                    
                echo '<script>
                
                        swal({
                            type: "success",
                            title: "Confirmación de Edición de Usuario",
                            text: "!! El usuario ha sido editado correctamente !!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false

                            }).then((result)=>{
                                if(result.value){
                                    window.location = "usuarios";
                                }
                            });
                
    
    
                    </script>';

                } 
            

            }else{
                echo '<script>
                        
                swal({
                    type: "error",
                    title: "Error de llenado de datos",
                    text: "El nombre no puede ir vacio o llevar caracteres especiales.",
                    showConfirmB utton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                    
        
        
                </script>';
            }/*cierre pregmatch*/ 
            
        }//cierre de isset

    }//cierre metodo ctrEditarUsuario()
    
/*----------------------------------------*/ 
# BORRAR  USUARIO
/*----------------------------------------*/
    static public function ctrBorrarUsuario(){
        if (isset($_GET["idUsuario"])) {
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];
            if ($_GET["fotoUsuario"] != "") {
                unlink($_GET["fotoUsuario"]);
                //var_dump($_GET["usuario"]);
                rmdir("vistas/img/usuarios/". $_GET["usuario"]);
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                # code...
                echo '<script>
                                
                                    swal({
                                        type: "success",
                                        title: "Usuario eliminado",
                                        text: "El usuario se eliminó correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false
            
                                        }).then((result)=>{
                                            if(result.value){
                                                window.location = "usuarios";
                                            }
                                        });
                                        
                        
                        
                                </script>';
            }
        }
    }// cierre metodo borrarUsuario()


}//clase ControladorUsuarios