<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/roles/listado_de_roles.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registro de un nuevo usuario</h1>
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
                  <form action="../app/controllers/usuarios/create.php" method="post">
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" class="form-control"
                        placeholder="Introduzca el nombre del nuevo usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" class="form-control"
                        placeholder="Introduzca el email del nuevo usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="">Rol</label>
                      <div style="display:flex">
                        <select name="rol" id="" class="form-control">
                          <?php
                          foreach ($roles_datos as $dato) { ?>
                            <option value="<?php echo $dato['id_rol']; ?>">
                              <?php echo $dato['rol']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                        <a href="<?php echo $URL; ?>/roles/create.php" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" name="password_user" class="form-control"
                        placeholder="Introduzca la contraseña del nuevo usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="">Repita el Password</label>
                      <input type="text" name="password_repeat" class="form-control"
                        placeholder="Repita nuevamente la contraseña" required>
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