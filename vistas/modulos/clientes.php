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
            <table class="table table-bordered table-striped  dt-responsive">
              <thead>
                <tr>
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
                <tr>
                  <td>1</td>
                  <td>JUAN VILLEGAS</td> 
                  <td>81611230</td> 
                  <td>juan@gmail.com</td> 
                  <td>3186428293</td> 
                  <td>CR 2 E 22 04</td> 
                  <td>1982-15-11</td> 
                  <td>35</td> 
                  <td>2017-12-11 12:05:32</td> 
                  <td>2016-12-11 10:09:54</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                <tr>
                  <td>2</td>
                  <td>MELANIA MOTTA</td> 
                  <td>81611230</td> 
                  <td>melania@gmail.com</td> 
                  <td>3186428293</td> 
                  <td>CR 2 E 22 04</td> 
                  <td>1982-15-11</td> 
                  <td>35</td> 
                  <td>2017-12-11 12:05:32</td> 
                  <td>2016-12-11 10:09:54</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                <tr>
                  <td>3</td>
                  <td>ROQUE TIQUE</td> 
                  <td>81611230</td> 
                  <td>roque@gmail.com</td> 
                  <td>3186428293</td> 
                  <td>CR 2 E 22 04</td> 
                  <td>1982-15-11</td> 
                  <td>35</td> 
                  <td>2017-12-11 12:05:32</td> 
                  <td>2016-12-11 10:09:54</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>
                
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


  <!-- MODAL AGREGAR CLIENTE -->

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

  <!-- MODAL AGREGAR CLIENTE -->