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
                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECÁNICOS</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECÁNICOS</td> 
                  <td>
                    <div class="btn-group">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>

                    </div>
                  </td>
                </tr>

                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECÁNICOS</td> 
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

			</div>
		</form>
    </div>

  </div>
</div>

  <!-- MODAL AGREGAR USUARIO -->