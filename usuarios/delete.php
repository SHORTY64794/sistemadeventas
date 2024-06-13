<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/usuarios/show_usuario.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Datos del Usuario a Eliminar</h1>
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
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">!!!...Está MUY SEGURO querer ELIMINAR a este Usuario...???</h3>
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
                  <form action="../app/controllers/usuarios/delete.php" method="post">
                    <input type="text" name="id_usuario" value="<?php echo $id_usuario_get ;?>" hidden>
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email"class="form-control" value="<?php echo $email; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Rol</label>
                      <input type="text" name="rol" class="form-control" value="<?php echo $rol; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Fecha y Hora de Creación</label>
                      <input type="datetime" name="fyh_creacion" class="form-control" value="<?php echo $fyh_creacion; ?>" disabled>
                    </div>                    
                    <div class="form-group">
                      <label for="">Fecha y Hora de última Actualización</label>
                      <input type="datetime" name="fyh_actualizacion" class="form-control" value="<?php echo $fyh_actualizacion; ?>" disabled>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                      <button class="btn btn-danger" >Eliminar</button>
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

<?php include ("../layout/parte2.php"); ?>

