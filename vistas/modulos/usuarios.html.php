<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Usuarios
        <small>Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>




    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuarios</button>
          
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped  dt-responsive tablas">
              <thead>
                <tr>
                  <th style="width:10px">No.</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Último login</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Usuario Administrador</td>
                  <td>Admin</td>
                  <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-success btn-xs">Activo</button></td>
                  <td>2017-12-25 12:05:32</td>
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>1</td>
                  <td>Usuario Administrador</td>
                  <td>Admin</td>
                  <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-success btn-xs">Activo</button></td>
                  <td>2017-12-25 12:05:32</td>
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>1</td>
                  <td>Usuario Administrador</td>
                  <td>Admin</td>
                  <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-danger btn-xs">Inactivo</button></td>
                  <td>2017-12-25 12:05:32</td>
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


  <!-- MODAL AGREGAR USUARIO -->

    <!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<form role="form" method="post" enctype="multipart/form-data">
			<div class="modal-header" style="background: #f39c12; color: white">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Agregar Usuario</h4>
			</div>

			<div class="modal-body">
				<div class="box-body">

						<!-- ENTRADA PARA NOMBRE -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese el nombre del nuevo usuario" required>
						</div>
					</div>
						<!-- ENTRADA PARA NOMBRE -->

						<!-- ENTRADA PARA USUARIO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="text" class="form-control input-lg"name="nuevoUsuario" placeholder="Ingrese el nuevo Usuario" required>
						</div>
					</div>
						<!-- ENTRADA PARA USUARIO -->

						<!-- ENTRADA PARA PASSWORD -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control input-lg"name="nuevoPassword" placeholder="Ingrese la nueva contraseña para el usuario" required>
						</div>
					</div>
						<!-- ENTRADA PARA PASSWORD -->

						<!-- ENTRADA PARA PERFIL -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users"></i></span>
							<select name="nuevoPerfil"  class="form-control input-lg">
								<option value="">Seleccione un perfil para el usuario</option>
								<option value="Administrador">Administrador</option>
								<option value="Especial">Especial</option>
								<option value="Vendedor">Vendedor</option>
							</select>
						</div>
					</div>
						<!-- ENTRADA PARA PERFIL -->

						<!-- ENTRADA PARA SUBIR FOTO -->
					<div class="form-group text-center">
						<div class="panel text-center" style="background:#00c0ef; color: white">SUBIR FOTO DEL USUARIO</div>
						<input class="text-center" type="file" name="nuevaFoto" id="nuevaFoto">
						<p class="help-block">Peso máximo de la foto: 5Mb</p>
						<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle text-center" width="100px">
					</div>
						<!-- ENTRADA PARA SUBIR FOTO -->


				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Usuario</button>

			</div>
		</form>
    </div>

  </div>
</div>

  <!-- MODAL AGREGAR USUARIO -->