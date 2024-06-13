<?php

include("app/controllers/config.php");
include("layout/sesion.php");
include("layout/parte1.php"); 
include("app/controllers/usuarios/listado_de_usuarios.php");
include("app/controllers/roles/listado_de_roles.php");
include("app/controllers/categorias/listado_de_categorias.php");
include("app/controllers/proveedores/listado_de_proveedores.php");
include("app/controllers/almacen/listado_de_productos.php");


?>

 <!-- Content Wrapper. Contains page content--> 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ha llegado a un SISTEMA de VENTAS - <?php echo $rol_sesion ;?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          Contenido del Sistema
          <br><br>
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                    <?php 
                    $contador_de_usuario=0;
                    foreach ($usuarios_datos as $datos){
                      $contador_de_usuario+=1;
                    }
                    ?>
                    <h3><?php echo $contador_de_usuario;?></h3>
                    <p>Usuarios Registrados</p>
                </div>
                <a href="<?php echo $URL;?>/usuarios/create.php">
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                </a>
                <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                    <?php 
                    $contador_de_roles=0;
                    foreach ($roles_datos as $datos){
                      $contador_de_roles+=1;
                    }
                    ?>
                    <h3><?php echo $contador_de_roles;?></h3>
                    <p>Roles Registrados</p>
                </div>
                <a href="<?php echo $URL;?>/roles/create.php">
                  <div class="icon">
                    <i class="fas fa-address-card"></i>
                  </div>
                </a>
                <a href="<?php echo $URL;?>/roles" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                    <?php 
                    $contador_de_categorias=0;
                    foreach ($categorias_datos as $datos){
                      $contador_de_categorias+=1;
                    }
                    ?>
                    <h3><?php echo $contador_de_categorias;?></h3>
                    <p>Categorías Registradas</p>
                </div>
                <a href="<?php echo $URL;?>/categorias/create.php">
                  <div class="icon">
                    <i class="fas fa-tags"></i>
                  </div>
                </a>
                <a href="<?php echo $URL;?>/categorias" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                    <?php 
                    $contador_de_proveedores=0;
                    foreach ($proveedores_datos as $datos){
                      $contador_de_proveedores+=1;
                    }
                    ?>
                    <h3><?php echo $contador_de_proveedores;?></h3>
                    <p>Proveedores Registrados</p>
                </div>
                <a href="<?php echo $URL;?>/proveedores/">
                  <div class="icon">
                    <i class="fas fa-car"></i>
                  </div>
                </a>
                <a href="<?php echo $URL;?>/proveedores" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div><!-- /.container-fluid -->
          <div class="row">
          <div class="col-lg-3 col-6">
              <div class="small-box bg-dark">
                <div class="inner">
                    <?php 
                    $contador_de_productos=0;
                    foreach ($productos_datos as $datos){
                      $contador_de_productos+=1;
                    }
                    ?>
                    <h3><?php echo $contador_de_productos;?></h3>
                    <p>Productos Registrados</p>
                </div>
                <a href="<?php echo $URL;?>/almacen/create.php">
                  <div class="icon">
                    <i class="fas fa-list"></i>
                  </div>
                </a>
                <a href="<?php echo $URL;?>/almacen" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

          </div>
      </div>
    <!-- /.content -->
    </div>
  </div>

  <!-- /.content-wrapper --> 

<?php include("layout/parte2.php"); ?>



 
  
 
