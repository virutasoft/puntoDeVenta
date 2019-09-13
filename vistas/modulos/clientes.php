<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Clientes
        <small>Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Clientes</li>
      </ol>
    </section>




    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button>
          
        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered table-striped  dt-responsive tablas">
              <thead>
                <tr class="text-uppercase">
                  <th style="width:10px">No.</th>
                  <th>Nombre</th>
                  <th>Documento ID</th>
                  <th>Email</th>
                  <th>Teléfonos</th>
                  <th>Dirección</th>
                  <th>Fecha Nacimiento</th>
                  <th>Total de compras</th>
                  <th>Última compra</th>
                  <th>Creación del cliente</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <!-- MOSTRAR CLIENTES ↓↓ -->
                <?php
                  $item = null;
                  $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                //var_dump($clientes);
                foreach ($clientes as $key => $value) {
                  # code...
                  echo '<tr class="text-uppercase">
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td> 
                          <td>'.$value["documento"].'</td> 
                          <td>'.$value["email"].'</td> 
                          <td>'.$value["telefono"].'</td> 
                          <td>'.$value["direccion"].'</td> 
                          <td>'.$value["fecha_nacimiento"].'</td> 
                          <td>'.$value["compras"].'</td> 
                          <td>0000-00-00 00:00:00</td> 
                          <td>'.$value["fecha"].'</td> 
                          <td>
                            <div class="btn-group">
                            <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'" ><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                            </div>
                          </td>
                        </tr>';
                }
                //var_dump($value["nombre"]);
                ?>
              <!-- MOSTRAR CLIENTES ↑↑ -->
                
                
              </tbody>
            </table>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

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


<!-- *********************************************************************************** -->


  <!-- MODAL EDITAR CLIENTE ↓↓↓-->

    <!-- Modal -->
    <div id="modalEditarCliente" class="modal modal-warning fade" role="dialog">
  		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<form role="form" method="post">
				<div class="modal-header" style="background: #f39c12; color: white">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Editar Cliente</h4>
				</div>

				<div class="modal-body">
					<div class="box-body">

							<!-- ENTRADA PARA CLIENTES -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente"  required>
							</div>
						</div>
							<!-- ENTRADA PARA CLIENTES -->

							<!-- ENTRADA PARA DOCUMENTO ID -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
								<input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
							</div>
						</div>
							<!-- ENTRADA PARA DOCUMENTO ID -->

							<!-- ENTRADA PARA EMAIL -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
							</div>
						</div>
							<!-- ENTRADA PARA EMAIL -->

							<!-- ENTRADA PARA TELEFONO -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
								<input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono"  data-inputmask="'mask':'(999) 999 99 99'" data-mask required>
							</div>
						</div>
							<!-- ENTRADA PARA TELEFONO -->

							<!-- ENTRADA PARA DIRECCION -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
							</div>
						</div>
							<!-- ENTRADA PARA DIRECCION -->

					<!-- ENTRADA PARA FECHA DE NACIMIENTO -->
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
								<input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>
							</div>
						</div>
							<!-- ENTRADA PARA FECHA DE NACIMIENTO -->

					
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

					<button type="submit" class="btn btn-success">Guardar Cambios en el cliente</button>

				</div>
			</form>

    <!-- ACCION PARA CREAR UN CLIENTE -->
    <?php
      $editarCliente = new ControladorClientes();
      $editarCliente -> ctrEditarCliente();

    ?>
    <!-- ACCION PARA CREAR UN CLIENTE -->

    </div>

  </div>
</div>

  <!-- MODAL EDITAR CLIENTE ↑↑↑-->