<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Venta
        <small>Venta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Crear Venta</li>
      </ol>
    </section>




    <!-- Main content -->
    <section class="content">

      <div class="row">
        
          <!-- FORMULARIO DE VENTA ↓↓↓ -->
        <div class="col-lg-5 col-xs-12"> 
          <div class="box box-info">
            <div class="box-header with-border"></div>
            <form role="form" method="post"> 
              <div class="box-body">
                
                  <div class="box">
                    <!-- ENTRADA PARA VENDEDOR -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>
                      </div>
                    </div>
                    <!-- ENTRADA PARA VENDEDOR -->
                    <!-- ENTRADA PARA CODIGO FACTURA -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                        <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="36789" readonly>
                      </div>
                    </div>
                    <!-- ENTRADA PARA CODIGO FACTURA -->
                    <!-- ENTRADA PARA CLIENTE-->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                        <select name="seleccionarCliente" id="seleccionarCliente" class="form-control" required>
                          <option value="">Seleccionar cliente</option>
                        </select>
                        <span class="input-group-addon"><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button></span>
                      </div>
                    </div>
                    <!-- ENTRADA PARA CLIENTE-->
                    <!-- ENTRADA PARA AGREGAR PRODUCTO-->
                    <!-- Descripción del producto ↓↓-->
                    <div class="form-group row nuevoProducto">
                      <div class="col-xs-6"  style="padding-right:0px">
                        <div class="input-group">
                          <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>
                          <input type="text" name="agregarProducto" id="agregarProducto" placeholder="Descripción del producto" class="form-control" required>
                        </div>
                      </div>
                      <!-- Descripción del producto ↑↑-->
                      <!-- Cantidad del producto ↓↓ -->
                      <div class="col-xs-3">
                        <input type="number" name="nuevaCantidadProducto" id="nuevaCantidadProducto" class="form-control" min="1" placeholder="0" required>
                      </div>
                      <!-- Cantidad del producto ↑↑-- -->
                      <!-- Precio del producto ↓↓ -->
                      <div class="col-xs-3" style="padding-left:0px">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                          <input type="number" name="nuevoPrecioProducto" id="nuevoPrecioProducto" class="form-control" min="1" placeholder="000.000.00" readinly required>
                          
                        </div>
                        
                      </div>
                      <!-- Precio del producto ↑↑-- -->
                    </div>
                    <!-- BOTON PARA AGREGAR PRODUCTO--  -->
                    <button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>
                    <hr>
                    <!-- BOTON PARA AGREGAR PRODUCTO--  -->
                    <div class="row">
                      <!-- ENTRADA PARA IMPUESTOS ↓↓↓ -->
                      <div class="col-xs-8 pull-right">
                        <table class="table">
                          <thead>
                            <th>Impuesto</th>
                            <th>Total</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td style="width=:50%">
                                <div class="input-group">
                                  <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                </div>
                              </td>
                              <!-- ENTRADA PARA TOTAL VENTA ↓↓↓ -->
                              <td style="width: 50%">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 
                                  <input type="number" class="form-control" min="1" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                                  
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- ENTRADA PARA TOTAL VENTA E IMPUESTOS ↑↑↑ -->
                    <hr>
                    <!-- ENTRADA PARA METODO DE PAGO ↓↓ -->
                    <div class="row form-group">
                      <div class="col-xs-6" style="padding-right:0px">
                      
                        <!-- ENTRADA PARA METODO PAGO-->
                          <div class="input-group">
                            <span class="input-group-addon"><i class="ion ion-card"></i></span>
                            <select name="nuevoMetodoPago" id="nuevoMetodoPago" class="form-control" required>
                              <option value="">Seleccione método de pago</option>
                              <option value="Efectivo">Efectivo</option>
                              <option value="tarjetaCredito">Tarjeta Crédito</option>
                              <option value="tarjetaDebito">Tarjeta Débito</option>
                              <option value="consignacion">Consignación</option>
                              <option value="giro">Giro</option>
                            </select>
                          </div>
                        <!-- ENTRADA PARA METODO PAGO-->
                        
                        </div> <!-- cierro col-xs-6 -->
                        <div class="col-xs-6" style="padding-left:0px">
                          <div class="input-group">
                            <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          </div>
                        </div>
                    </div>
                    <br>
                    <!-- ENTRADA PARA METODO DE PAGO ↑↑-->
                    <!-- ENTRADA PARA AGREAR PRODUCTO-->
                  </div>
                
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Guardar Venta</button>
              </div><!--cierro box footer-->
            </form>            
          </div>
        </div> 
          <!-- FORMULARIO DE VENTA ↑↑↑ -->

        <!-- TABLA DE PRODUCTOS ↓↓↓ -->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="box box-danger">
            <div class="box-header with-border"></div>
            <div class="box-body">
              <table class="table table-hover table-bordered table-striped  dt-responsive tablas">
                <thead>
                  <tr class="text-uppercase">
                    <th style="width:10px">No.</th>
                    <th>Imágen</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <!-- MOSTRAR productos ↓↓ -->
                <tr class="text-uppercase">
                    <td>1</td>
                    <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                    <td>102</td>
                    <td>Lorem ipsum dolor sit</td>
                    <td>50</td>
                    <td><button class="btn btn-info">Agregar Ítem</button></td>
                  </tr>
                <!-- MOSTRAR productos ↑↑ -->
                  
                  
                </tbody>
              </table>
            </div> <!-- cierro box body-->
          </div> <!-- cierro box danger-->    
        </div> <!-- cierro col-lg-7-->
        <!-- TABLA DE PRODUCTOS ↑↑↑ -->

      </div> <!--cierro row-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- MODAL AGREGAR CLIENTE ↓↓↓ -->

    <!-- Modal -->
<div id="modalAgregarCliente" class="modal modal-info fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header" style="background: #f39c12; color: white">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Agregar Cliente</h4>
			</div>

			<div class="modal-body">
				<div class="box-body">

						<!-- ENTRADA PARA CLIENTES -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingrese el nombre del cliente" required>
						</div>
					</div>
						<!-- ENTRADA PARA CLIENTES -->

						<!-- ENTRADA PARA DOCUMENTO ID -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
							<input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingrese el documento" required>
						</div>
					</div>
						<!-- ENTRADA PARA DOCUMENTO ID -->

						<!-- ENTRADA PARA EMAIL -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingrese el Email del cliente" required>
						</div>
					</div>
						<!-- ENTRADA PARA EMAIL -->

						<!-- ENTRADA PARA TELEFONO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingrese el teléfono del cliente" data-inputmask="'mask':'(999) 999 99 99'" data-mask required>
						</div>
					</div>
						<!-- ENTRADA PARA TELEFONO -->

						<!-- ENTRADA PARA DIRECCION -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							<input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingrese la dirección del cliente" required>
						</div>
					</div>
						<!-- ENTRADA PARA DIRECCION -->

            	<!-- ENTRADA PARA FECHA DE NACIMIENTO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingrese la fecha de nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
						</div>
					</div>
						<!-- ENTRADA PARA FECHA DE NACIMIENTO -->

				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Cliente</button>

			</div>
		</form>

    <!-- ACCION PARA CREAR UN CLIENTE -->
    <?php
      $crearCliente = new ControladorClientes();
      $crearCliente -> ctrCrearCliente();

    ?>
    <!-- ACCION PARA CREAR UN CLIENTE -->

    </div>

  </div>
</div>

<!-- MODAL AGREGAR CLIENTE ↑↑↑-->