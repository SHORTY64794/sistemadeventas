<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/categorias/listado_de_categorias.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Categorías
             <!--BOTON XA EL MODAL -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
              <i class="fa fa-plus"></i>
              Agregar otra categoría
            </button>
          </h1>
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
        <div class="col-md-8">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Categorías Registradas</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display:block">
              <table id="listado_categorias" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      <center>Nro</center>
                    </th>
                    <th>
                      <center>Nombre de la categoría</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($categorias_datos as $dato1) {
                    $id_categoria = $dato1["id_categoria"];
                    $nombre_categoria = $dato1["name_categoria"];                   
                    ?>
                    <tr>
                      <td>
                        <center><?php echo $contador += 1; ?></center>
                      </td>
                      <td><?php echo $dato1["name_categoria"]; ?></td>
                      <td>
                        <center>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                              data-target="#modal-update-<?php echo $id_categoria ;?>">
                              <i class="fa fa-pencil-alt"></i>
                              Editar
                            </button>
                           <!--MODAL XA ACTUALIZAR CATEGORIAS-->
                            <div class="modal fade" id="modal-update-<?php echo $id_categoria ;?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: #116f4a; color:white ">
                                    <h4 class="modal-title">Actualización de una categoría</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="">Nombre de la categoría</label>
                                          <input type="text" id="name_categoria" value="<?php echo $nombre_categoria ;?>"
                                            class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success" id="btn_update">Actualizar
                                      categoría</button>
                                    <!--<div id="respuesta"></div>-->
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <script>
                              $('#btn_update, <?php echo $id_categoria ;?>').click(function(){
                                //alert('Hola, holaaaa')
                                alert(<?php echo $id_categoria ;?>);
                                
                              });
                              </script>
                              <div id="respuesta_update<?php echo $id_categoria ;?>"></div>
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
                      <center>Nombre de la categoría</center>
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
    $("#listado_categorias").DataTable({
      //Convierte los terminos de la tabla a español
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorias",
        "infoEmpty": "Mostrando de 0 a 0 de un total de 0 Categorias",
        "infoFiltered": "(Filtrado de _MAX_ total Categorias)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Categorias",
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
    }).buttons().container().appendTo('#listado_categorias_wrapper .col-md-6:eq(0)');
  });
</script>

<!--MODAL XA REGISTRAR CATEGORIAS-->
<div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Creación de una nueva categoría</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nombre de la categoría</label>
                    <input type="text" id="name-categoria" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btn-create" >Registrar categoría</button>
            </div>            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div id="respuesta"></div>
    <script>
      $('#btn-create').click(function(){
        alert('Fonquitaun');
        var name-categoria = $('#name-categoria').val();
        alert(name-categoria);
        //var url="../app/controllers/categorias/listado_de_categorias.php";
        //$.get(url,{nombre__categoria:nombre__categoria},function(datos){
          //alert('Respuesta del controlador');
        //  $.get('#respuesta').html(datos);
        //#116f4a});
      });
    </script>
    
    

 


?>