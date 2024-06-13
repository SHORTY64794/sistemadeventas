<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/categorias/listado_de_categorias.php");

?>

<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorías</h1>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
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
                                        $nombre_categoria = $dato1["nombre_categoria"];
                                        ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador += 1; ?></center>
                                            </td>
                                            <td><?php echo $dato1["nombre_categoria"]; ?></td>
                                            <td>
                                                <center>
                                                    <a href="update.php?id=<?php echo $id_categoria; ?>" type="button"
                                                        class="btn  btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
                                                    <a href="delete.php?id=<?php echo $id_categoria; ?>" type="button"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
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
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- /.content -->

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






?>