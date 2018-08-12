<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Categorías
        <small>Categorías</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Categorías</li>
      </ol>
    </section>




    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar Categorías</button>
          
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped  dt-responsive tablas">
              <thead>
                <tr>
                  <th style="width:10px">No.</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>

              <?php
                //llamado para listar categorias

                # solicitamos una respuesta a la BD
                // para hacer re-utilizable el metodo, se suelen colocar parametros
                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                //var_dump($categorias);

                foreach ($categorias as $key => $value) {
                  echo '<tr>
                  <td>'.($key+1).'</td>
                  <td class="text-uppercase">'.$value["categoria"].'</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

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


  <!-- MODAL AGREGAR CATEGORÍA -->

    <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header" style="background: #f39c12; color: white">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Agregar Categoría</h4>
			</div>

			<div class="modal-body">
				<div class="box-body">

						<!-- ENTRADA PARA CATEGORIA -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingrese el nombre de la nueva categoría" required>
						</div>
					</div>
						<!-- ENTRADA PARA CATEGORIA -->

				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Categoría</button>
        <?php
          //creamos el objeto para q capture el método del controlador
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();
        ?>
			</div>
		</form>
    </div>

  </div>
</div>

  <!-- MODAL AGREGAR CATEGORIA -->

  <!-- MODAL EDITAR CATEGORÍA -->

    <!-- Modal -->
    <div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header" style="background: #f39c12; color: white">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar Categoría</h4>
			</div>

			<div class="modal-body">
				<div class="box-body">

						<!-- ENTRADA PARA CATEGORIA -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria"required>
							<input type="hidden" class="form-control input-lg" name="idCategoria" id="idCategoria" required>
						</div>
					</div>
						<!-- ENTRADA PARA CATEGORIA -->

				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Cambios en Categoría</button>
        <?php
          //creamos el objeto para q capture el método del controlador
          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();
        ?>
			</div>
		</form>
    </div>

  </div>
</div>

  <!-- MODAL EDITAR CATEGORIA -->