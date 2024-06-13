<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/roles/update_roles.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Actualización del rol</h1>
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
          <div class="card card-success">
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
                  <form action="../app/controllers/roles/update.php" method="post">
                    <input type="" name="id_rol" value="<?php echo $id_rol_get; ?>" hidden>
                    <div class="form-group">
                      <label for="">Nombre del rol</label>
                      <input type="text" name="rol" class="form-control" placeholder="Introduzca el nombre del nuevo rol" value="<?php echo $rol; ?>" required>
                    </div>
                    <!--
                    <div class="form-group">
                      <label for="">Fecha y hora de creación</label>
                      <input type="text" name="fyh_creacion" class="form-control" placeholder="Introduzca la fyh de creación del rol" value="<?php echo $fyh_creacion; ?>" required>
                    </div>
                    -->
                    <hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Actualizar</button>                      
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

