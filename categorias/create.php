<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registro de una nueva categoría</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content-- -->
  <div class="content">
    <div class="container-fluid">

      <!--AGREGAMOS UNA CARD DESDE LA PAG. OFICIAL DE ADMINLTE-->
      <div class="row">
        <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos correctamente...</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="../app/controllers/categorias/create.php" method="post">
                    <div class="form-group">
                      <label for="">Nombre de la categoría</label>
                      <input type="text" name="nombre_categoria" class="form-control"
                        placeholder="Introduzca el nombre de la nueva categoría" >
                    </div>
                    <hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include ("../layout/mensajes.php"); ?>
<?php include ("../layout/parte2.php"); ?>