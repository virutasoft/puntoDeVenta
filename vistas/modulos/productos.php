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
						<!-- ENTRADA PARA SELECCIONAR CATEGORÌA -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<select  id="nuevaCategoria"  name="nuevaCategoria" class="form-control text-uppercase input-lg" required>

								<option value="">Seleccionar categorìa</option>
                <?php
                  $item = null;
                  $valor = null;
                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                ?>
								
							</select>
						</div>
					</div>
						<!-- ENTRADA PARA SELECCIONAR CATEGORÌA -->

						<!-- ENTRADA PARA CODIGO -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
							<input type="text" class="form-control input-lg" name="nuevoCodigo" id= "nuevoCodigo" placeholder="Còdigo del producto" readonly required>
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



            <!-- ENTRADA PARA STOCK -->
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
							<input type="number" class="form-control input-lg" name="nuevoStock" min= "0" placeholder="Ingrese el stock de producto que recibe" required>
						</div>
					</div>
						<!-- ENTRADA PARA STOCK -->

            <!-- ENTRADA PARA EL PRECIO DE COMPRA -->
					<div class="form-group row">
            <div class= "col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step= "any" min= "0" placeholder="Precio de compra" required>
              </div>
            </div>
              <!-- ENTRADA PARA EL PRECIO DE COMPRA -->

              <!-- ENTRADA PARA EL PRECIO DE VENTA -->
            
            <div class= "col-xs-12 col-sm-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step= "any" min= "0" placeholder="Precio de venta" required>
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
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                </div>
              </div>
            </div>
					</div>
						<!-- ENTRADA PARA EL PRECIO DE VENTA -->

						<!-- ENTRADA PARA SUBIR FOTO -->
					<div class="form-group text-center">
						<div class="panel text-center" style="background: orange; color: white">SUBIR IMÀGEN DEL PRODUCTO /  HERRAMIENTA</div>
						<input class="nuevaImagen text-center" type="file" name="nuevaImagen">
						<p class="help-block" style="color: white;">Peso máximo de la imàgen: 2Mb</p>
						<img class="img-thumbnail previsualizarimg" src="vistas/img/productos/default/anonymous.png"  width="100px">
					</div>
						<!-- ENTRADA PARA SUBIR FOTO -->


				
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

				<button type="submit" class="btn btn-success">Guardar Producto</button>

			</div>
		</form>

                <?php
                  $crearProducto = new ControladorProductos();
                  $crearProducto -> ctrCrearProducto();
                ?>

    </div>

  </div>
</div>

  <!-- MODAL AGREGAR PRODUCTO -->