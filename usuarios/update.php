<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/usuarios/show_usuario.php");
include ("../app/controllers/roles/listado_de_roles.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Actualizar Datos de Usuario</h1>
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
              <h3 class="card-title">Editar información del usuario...</h3>
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
                  <form action="../app/controllers/usuarios/update.php" method="post">
                    <input type="" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="">Rol</label>
                        <select name="rol" id="" class="form-control">
                          <?php
                          foreach ($roles_datos as $dato) {
                            $rol_tabla = $dato['rol'];
                            $id_rol = $dato['id_rol'] ?>
                            <option value="<?php echo $id_rol; ?>"<?php
                              if ($rol_tabla == $rol) { ?> selected="selected"
                              <?php } ?>>
                              <?php echo $rol_tabla; ?>
                            </option>
                          <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" name="password_user" class="form-control"
                        placeholder="Introduzca una nueva contraseña...">
                    </div>
                    <div class="form-group">
                      <label for="">Repita el Password</label>
                      <input type="text" name="password_repeat" class="form-control"
                        placeholder="Repita nuevamente esa contraseña ">
                    </div>
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