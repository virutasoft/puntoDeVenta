<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
        <small>Productos y Herramientas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Productos</li>
      </ol>
    </section>




    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>
          
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped  dt-responsive tablaDeProductos" width="100%">
              <thead>

                <tr>
                  <th style="width:10px">No.</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Categoría</th>
                  <th>Stock</th>
                  <th>Precio de compra</th>
                  <th>Precio de venta</th>
                  <th>Agregado el...</th>
                  <th>Acciones</th>
                </tr>
                
              </thead>
              
            </table>
        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- MODAL AGREGAR PRODUCTO -->

    <!-- Modal -->
<div id="modalAgregarProducto" class="modal modal-primary fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<form role="form" method="post" enctype="multipart/form-data">
			<div class="modal-header" style="background: #f39c12; color: white">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Agregar Producto</h4>
			</div>

			<div class="modal-body">
				<div class="box-body">

						<!-- ENTRADA PARA CODIGO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingrese el còdigo del producto" required>
						</div>
					</div>
						<!-- ENTRADA PARA CODIGO -->

						<!-- ENTRADA PARA DESCRIPCIÒN -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-align-justify"></i></span>
							<input type="text" class="form-control input-lg"name="nuevaDescripcion" placeholder="Ingresar descripciòn" required>
						</div>
					</div>
						<!-- ENTRADA PARA DESCRIPCIÒN -->


						<!-- ENTRADA PARA SELECCIONAR CATEGORÌA -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<select name="nuevaCategoria"  class="form-control input-lg">
								<option value="">Seleccionar categorìa</option>
								<option value="taladros">Taladros</option>
								<option value="andamios">Andamios</option>
								<option value="equipos para construcciòn">Equipos para construcciòn</option>
							</select>
						</div>
					</div>
						<!-- ENTRADA PARA SELECCIONAR CATEGORÌA -->

            <!-- ENTRADA PARA STOCK -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-check"></i></span>
							<input type="number" class="form-control input-lg" name="nuevoStock" min= "0" placeholder="Ingrese el stock de producto que recibe" required>
						</div>
					</div>
						<!-- ENTRADA PARA STOCK -->

            <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
					<div class="form-group row">
            <div class= "col-xs-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min= "0" placeholder="Precio de compra" required>
              </div>
            </div>
              <!-- ENTRADA PARA EL PRECIO DE COMPRA -->

              <!-- ENTRADA PARA EL PRECIO DE VENTA -->
            
            <div class= "col-xs-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" min= "0" placeholder="Precio de venta" required>
              </div>
              <br>
              <!-- CHECKBOX PARA PORCENTAJE -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" name="" id="" class="minimal-red porcentaje" checked>
                    Utilizar porcentaje
                  </label>
                </div>
              </div>
              <!-- ENTRADA PARA PORCENTAJE -->
              <div class="col-xs-6" style="padding:0">
                <div class="input-group">
                  <input type="number" name="" id="" min="0" value="40" class="form-control input-lg nuevoPorcentaje" required>
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                </div>
              </div>
            </div>
					</div>
						<!-- ENTRADA PARA EL PRECIO DE VENTA -->

						<!-- ENTRADA PARA SUBIR FOTO -->
					<div class="form-group text-center">
						<div class="panel text-center" style="background: orange; color: white">SUBIR IMÀGEN DEL PRODUCTO /  HERRAMIENTA</div>
						<input class="text-center" type="file" name="nuevaImagen" id="nuevaImagen">
						<p class="help-block" style="color: white;">Peso máximo de la imàgen: 2Mb</p>
						<img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail text-center" width="100px">
					</div>
						<!-- ENTRADA PARA SUBIR FOTO -->


				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Producto</button>

			</div>
		</form>
    </div>

  </div>
</div>

  <!-- MODAL AGREGAR PRODUCTO -->