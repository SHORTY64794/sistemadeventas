<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/listado_de_productos.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Productos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <!-- El SIGUIENTE CODIGO ES EXTRAIDO DE LA PLANTILLA ADMINLTE Sección CARD-->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Productos Registrados</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display:block">
              <div class="table table-responsive">
                <table id="listado_productos" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th><center>Nro</center></th>
                    <th><center>Código</center></th>
                    <th><center>Categoría</center></th>
                    <th><center>Imagen</center></th>   
                    <th><center>Nombre</center></th>
                    <th><center>Descripción</center></th> 
                    <th><center>Stock</center></th> 
                    <th><center>Precio Compra</center></th> 
                    <th><center>Precio Venta</center></th>
                    <th><center>Fecha Compra</center></th> 
                    <th><center>Usuario</center></th>    
                    <th><center>Acciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($productos_datos as $dato) {
                    $id_producto = $dato["id_producto"];
                    ?>
                    <tr>
                      <td>
                        <center><?php echo $contador+= 1; ?></center>
                      </td>
                      <td><?php echo $dato["codigo"]; ?></td>
                      <td><?php echo $dato["nombre_categoria"]; ?></td>
                      <td>
                        <center>
                        <img src="<?php echo $URL."/almacen/img_productos/". $dato["imagen"];?>" width="50px" alt="">
                        </center>                        
                      </td>    
                      <td><?php echo $dato["nombre"]; ?></td>
                      <td><?php echo $dato["descripcion"]; ?></td>
                      <td><?php echo $dato["stock"]; ?></td>
                      
                      <td><?php echo $dato["precio_compra"]; ?></td>
                      <td><?php echo $dato["precio_venta"]; ?></td>
                      <td><?php echo $dato["fecha_ingreso"]; ?></td>
                      <td><?php echo $dato["email"]; ?></td>                
                      <td>
                        <center>
                          <div class="btn-group">
                            <a href="show.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-eye"></i>Ver</a>
                            <a href="show_registro.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-eye"></i>Ver</a>
                            <a href="update.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-success btn-sm"><i
                                class="fa fa-pencil-alt"></i>Editar</a>
                            <a href="update_registro.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-success btn-sm"><i
                                class="fa fa-pencil-alt"></i>Editar</a>
                            <a href="delete.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                            <a href="delete_registro.php?identidad=<?php echo $id_producto; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                          </div>
                        </center>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                <th><center>Nro</center></th>
                    <th><center>Código</center></th>
                    <th><center>Categoría</center></th>
                    <th><center>Imagen</center></th>   
                    <th><center>Nombre</center></th>
                    <th><center>Descripción</center></th> 
                    <th><center>Stock</center></th> 
                    <th><center>Precio Compra</center></th> 
                    <th><center>Precio Venta</center></th>
                    <th><center>Fecha Compra</center></th> 
                    <th><center>Usuario</center></th>    
                    <th><center>Acciones</center></th>
                  </tr>
                </tfoot>                
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</div>

<!-- /.content-wrapper -->

<?php include ("../layout/mensajes.php"); ?>
<?php include ("../layout/parte2.php"); ?>

<!-- SCRIPT PEGADO DEL CÓDIGO FUENTE (public/templates/AdminLTE/pages/tables/data.html) PARA QUE SEA UNA TABLA DINAMICA  -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#listado_productos").DataTable({
      //Convierte los terminos de la tabla a español
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
        "infoEmpty": "Mostrando de 0 a 0 de un total de 0 Productos",
        "infoFiltered": "(Filtrado de _MAX_ total Productos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Productos",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      // Reduce a 2 botones y los nombres en español
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": [{
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons: [{
          text: 'Copiar',
          extend: 'copy'
        }, {
          extend: 'pdf',
        }, {
          extend: 'csv',
        }, {
          extend: 'excel',
        }, {
          text: 'Imprimir',
          extend: 'print'
        }
        ]
      },
      {
        extend: 'colvis',
        text: 'Visor de columnas',
        collectionLayout: 'fixed three-column'
      }
      ],
    }).buttons().container().appendTo('#listado_productos_wrapper .col-md-6:eq(0)');
  });
</script>

?>