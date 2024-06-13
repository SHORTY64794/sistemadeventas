<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/usuarios/listado_de_usuarios.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de usuarios</h1>
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
        <div class="col-md-10">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Usuarios Registrados</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display:block">
              <table id="listado_usuarios" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>Nombres</center>
                    </th>
                    <th>
                      <center>Email</center>
                    </th>
                    <th>
                      <center>Rol del usuario</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($usuarios_datos as $dato) {
                    $id_usuario = $dato["id_usuario"];
                    ?>
                    <tr>
                      <td>
                        <center><?php echo $contador+= 1; ?></center>
                      </td>
                      <td><?php echo $dato["nombres"]; ?></td>
                      <td><?php echo $dato["email"]; ?></td>
                      <td><center>
                      <?php echo $dato["rol"]; ?>
                      </center> </td>
                      <td>
                        <center>
                          <div class="btn-group">
                            <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn  btn-info"><i
                                class="fa fa-eye"></i>Ver</a>
                            <a href="update.php?id=<?php echo $id_usuario; ?>" type="button" class="btn  btn-success"><i
                                class="fa fa-pencil-alt"></i>Editar</a>
                            <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
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
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>Nombres</center>
                    </th>
                    <th>
                      <center>Email</center>
                    </th>
                    <th>
                      <center>Rol del usuario</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </tfoot>
              </table>
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
    $("#listado_usuarios").DataTable({
      //Convierte los terminos de la tabla a español
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
        "infoEmpty": "Mostrando de 0 a 0 de un total de 0 Usuarios",
        "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Usuarios",
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
      ]
    }).buttons().container().appendTo('#listado_usuarios_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

?>