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

    // CREAR VENTA ↓↓
    static public function ctrCrearVenta(){
        if (isset($_POST["nuevaVenta"])) {
            # code...
            // ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR STOCK Y AUMENTAR VENTAS PRODUCTOS ↓
            $listaProductos = json_decode($_POST["listaProductos"], true);

            $totalProductosComprados = array();

            foreach ($listaProductos as $key => $value) {

                array_push($totalProductosComprados, $value["cantidad"]);
                # code...
                $tablaProductos = "productos";
                $item= "id";
                $valor = $value["id"];

                $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);
                //var_dump($traerProducto["ventas"]);

                $item1a = "ventas";
                $valor1a = $value["cantidad"]+$traerProducto["ventas"];

                $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a,$valor1a,$valor);

                $item1b = "stock";
                $valor1b= $value["stock"];

                $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos,$item1b,$valor1b, $valor);

            }// ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR STOCK Y AUMENTAR VENTAS PRODUCTOS ↑
            $tablaClientes = "clientes";

            $item= "id";
            $valor= $_POST["seleccionarCliente"];
            $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);
            $item1= "compras";
            $valor1= array_sum($totalProductosComprados)+$traerCliente["compras"];

            $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes,$item1, $valor1, $valor);

                // GUARDAR COMPRA ↓↓
                $tabla= "ventas";
                
                $datos = array(
                "id_vendedor" =>$_POST["idVendedor"],
                "id_cliente" =>$_POST["seleccionarCliente"],
                "codigo" =>$_POST["nuevaVenta"],
                "productos" =>$_POST["listaProductos"],
                "impuesto" =>$_POST["nuevoPrecioImpuesto"],
                "neto" =>$_POST["nuevoPrecioNeto"],
                "total" =>$_POST["totalVenta"],
                "metodo_pago" =>$_POST["listaMetodoPago"]);

                $respuesta= ModeloVentas::mdlIngresarVenta($tabla, $datos);

                if ($respuesta == "ok") {
                    # code...
                    echo '<script>
                    localStorage.removeItem("rango");
                        swal({
                            type: "success",
                            title: "¡Operación exitosa!",
                            text: "La venta ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "ventas";
                            }
                        });
                    </script>';
                } else {
                    # code...
                    echo"<script> 
                        swal({
                                type: 'error',
                                title: '¡Operación fallida!',
                                text: 'Ocurrió un error al ingresar los datos en la venta.',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar'
                            }).then(function(result){
                                if(result.value){
                                    window.location = 'crear-venta';
                                }
                            })
                    </script>";
                }
                
                // GUARDAR COMPRA ↑↑
            
        }// fin if isset
    }//fin ctr crear venta
    // CREAR VENTA ↑↑
}// CIERRO CONTROLADORVENTAS
// CONTROLADOR VENTAS ↑↑↑
