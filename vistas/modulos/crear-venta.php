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
            <div class="box-body">
              <form role="form" method="post">
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
                        <input type="number" name="nuevoPrecioProducto" id="nuevoPrecioProducto" class="form-control" min="1" placeholder="000.000.00" readinly required>
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                      </div>
                      
                    </div>
                    <!-- Precio del producto ↑↑-- -->
                  </div>
                   <!-- BOTON PARA AGREGAR PRODUCTO--  -->
                   <button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>
                   <hr>
                   <!-- BOTON PARA AGREGAR PRODUCTO--  -->
                  <!-- ENTRADA PARA AGREAR PRODUCTO-->
                </div>
              </form>
            </div>
          </div>
        </div> 
          <!-- FORMULARIO DE VENTA ↑↑↑ -->

        <!-- TABLA DE PRODUCTOS ↓↓↓ -->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="box box-danger"></div>    
        </div>
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