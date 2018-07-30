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

                  <?php

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
                    //var_dump($usuarios);
                    foreach ($usuarios as $key => $value) {

                      //var_dump($value["nombre"]);
                      
                      echo '<tr>
                              <td>'.$value["id"].'</td>
                              <td>'.$value["nombre"].'</td>
                              <td>'.$value["usuario"].'</td>';

                              if ($value["foto"] != "") {

                                echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px" alt=""></td>';

                              } else {
                                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>';
                              }
                              
                              

                              echo '<td>'.$value["perfil"].'</td>';
 
                              if ($value["estado"] != 0 ) {
                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario = "'.$value["id"].'" estadoUsuario = "0">Activo</button></td>';
                              } else{
                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario = "'.$value["id"].'" estadoUsuario = "1">Inactivo</button></td>';
                              }

                              
                              echo '<td>'.$value["ultimo_login"].'</td>
                              <td>
                                <div class="btn-group">
                                <button class="btn btn-warning btnEditarUsuario" idUsuario = "'.$value["id"].'" data-toggle = "modal" data-target = "#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
            
                                </div>
                              </td>
                            </tr>';

                    }

                  ?>

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
							<input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese el nombre del nuevo usuario" autocomplete="off" required>
						</div>
					</div>
						<!-- ENTRADA PARA NOMBRE -->

						<!-- ENTRADA PARA USUARIO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingrese el nuevo Usuario" autocomplete="off" required>
						</div>
					</div>
						<!-- ENTRADA PARA USUARIO -->

						<!-- ENTRADA PARA PASSWORD -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control input-lg"name="nuevoPassword" placeholder="Ingrese la nueva contraseña para el usuario" autocomplete="off" required>
							
              
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
						<input type="file" name="nuevaFoto" class="nuevaFoto text-center">
						<p class="help-block">Peso máximo de la foto: 2Mb</p>
						<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle previsualizar" width="100px">
					</div>
						<!-- ENTRADA PARA SUBIR FOTO -->


				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Usuario</button>

			</div>

      <?php

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();


      ?>

		</form>
    </div>

  </div>
</div>

  <!-- MODAL EDITAR USUARIO -->


<!-- Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<form role="form" method="post" enctype="multipart/form-data">
  <div class="modal-header" style="background: #00c0ef; color: white">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Editar Usuario</h4>
  </div>

  <div class="modal-body">
    <div class="box-body">

        <!-- ENTRADA PARA EDITAR NOMBRE -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" value="" autocomplete="off" required>
        </div>
      </div>
        <!-- ENTRADA PARA EDITAR NOMBRE -->

        <!-- ENTRADA PARA EDITAR USUARIO -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-key"></i></span>
          <input type="text" class="form-control input-lg" name="editarUsuario" id ="editarUsuario" value="" autocomplete="off" readonly>
        </div>
      </div>
        <!-- ENTRADA PARA EDITAR USUARIO -->

        <!-- ENTRADA PARA EDITAR PASSWORD -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" autocomplete="off" required>
          <input type="hidden" id = "passwordActual" name="passwordActual">
        </div>
      </div>
        <!-- ENTRADA PARA EDITAR PASSWORD -->

        <!-- ENTRADA PARA EDITAR PERFIL -->
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-users"></i></span>
          <select name="editarPerfil"  class="form-control input-lg">
            <option value="" id="editarPerfil"></option>
            <option value="Administrador">Administrador</option>
            <option value="Especial">Especial</option>
            <option value="Vendedor">Vendedor</option>
          </select>
        </div>
      </div>
        <!-- ENTRADA PARA EDITAR PERFIL -->

        <!-- ENTRADA PARA EDITAR SUBIR FOTO -->
      <div class="form-group text-center">
        <div class="panel text-center" style="background:#00c0ef; color: white">SUBIR FOTO DEL USUARIO</div>
        <input type="file" name="editarFoto" class="nuevaFoto text-center">
        <p class="help-block">Peso máximo de la foto: 2Mb</p>
        <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle previsualizar" width="100px">
        <input type="hidden" name="fotoActual" id="fotoActual">
      </div>
        <!-- ENTRADA PARA EDITAR SUBIR FOTO -->
              

    
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

    <button type="submit" class="btn btn-success">Modificar Usuario</button>

  </div>

  <?php

    $editarUsuario = new ControladorUsuarios();
    $editarUsuario -> ctrEditarUsuario();


  ?>

</form>
</div>

</div>
</div>

<!-- MODAL EDITAR USUARIO -->