<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/compras/listado_de_compras.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Compras</h1>
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
              <h3 class="card-title">Compras Registradas</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display:block">
              <div class="table table-responsive">
                <table id="listado_compras" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>
                      <center>Ítem</center>
                    </th>
                    <th>
                      <center>Nro Compra</center>
                    </th>
                    <th>
                      <center>Producto</center>
                    </th>
                    <th>
                      <center>Fecha Compra</center>
                    </th>
                    <th>
                      <center>Proveedor</center>
                    </th>   
                    <th>
                      <center>Comprobante</center>
                    </th>
                    <th>
                      <center>Usuario</center>
                    </th> 
                    <th>
                      <center>Precio Compra</center>
                    </th> 
                    <th>
                      <center>Cantidad</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($compras_datos as $dato) {
                    $id_compra = $dato["id_compra"];
                    ?>
                    <tr>
                      <td>
                        <center><?php echo $contador+= 1; ?></center>
                      </td>
                      <td><?php echo $dato["id_compra"]; ?></td>
                      <td>
                        <!--Botón xa abrir el modal para visualizar productos -->
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#modal-producto<?php echo $id_compra; ?>">
                            <?php echo $dato["nombre_producto"]; ?>
                        </button>
                        <!-- Modal para visualizar la información de los productos -->
                        <div class="modal fade" id="modal-producto<?php echo $id_compra; ?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #07b0d6; color: white">
                                <h4 class="modal-title">Información del artículo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-9">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Código</label>
                                          <input type="text" value="<?php echo $dato['codigo'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Categoría</label>
                                          <input type="text" value="<?php echo $dato['nombre_categoria'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Registró</label>
                                          <input type="text" value="<?php echo $dato['nombre_usuario'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Nombre Producto</label>
                                          <input type="text" value="<?php echo $dato['nombre_producto'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Descripción</label>
                                            <input type="text" value="<?php echo $dato['descripcion'];?>" class="form-control" disabled>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Stock</label>
                                          <input type="text" value="<?php echo $dato['stock'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Stock Mínimo</label>
                                          <input type="text" value="<?php echo $dato['stock_minimo'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Stock Máximo</label>
                                          <input type="text" value="<?php echo $dato['stock_maximo'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Prec. Compra</label>
                                          <input type="text" value="<?php echo $dato['precio_compra_producto'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Prec. Venta</label>
                                          <input type="text" value="<?php echo $dato['precio_venta'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="">Fecha Ingreso</label>
                                          <input type="text" value="<?php echo $dato['fecha_ingreso'];?>" class="form-control" disabled>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="">Imagen del Producto</label>
                                    <img src="<?php echo $URL."/almacen/img_productos/". $dato["imagen"];?>" width="100%" alt="">
                                  </div>
                                </div>
                              </div>
                            </div>
                                <!-- /.modal-content -->
                          </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                      </td>
                      <td><?php echo $dato["fecha_compra"]; ?></td>
                      <td>
                         <!--Botón xa abrir el modal para visualizar proveedores -->
                         <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#modal-proveedor<?php echo $id_compra; ?>">
                            <?php echo $dato["nombre_proveedor"]; ?>
                        </button>
                        <!-- Modal para visualizar la información de los proveedores -->
                        <div class="modal fade" id="modal-proveedor<?php echo $id_compra; ?>">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #f7af63; color: white">
                                <h4 class="modal-title">Información del proveedor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="">Nombre Proveedor</label>
                                      <input type="text" value="<?php echo $dato['nombre_proveedor'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Celular</label>  
                                        <a href="https://wa.me/57<?php echo $dato['celular_proveedor'] ;?>" target="blank" class="btn btn-dark">
                                        <i class="fa fa-phone"></i>
                                        <?php echo $dato['celular_proveedor']; ?></a>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="">Teléfono</label>
                                      <input type="text" value="<?php echo $dato['telefono_proveedor'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="">Email Proveedor</label>
                                      <input type="text" value="<?php echo $dato['email_proveedor'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label for="">Nombre Empresa</label>
                                      <input type="text" value="<?php echo $dato['empresa'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label for="">Dirección</label>
                                      <input type="text" value="<?php echo $dato['direccion'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                        <!-- /.modal -->
                      </td>
                      <td><?php echo $dato["comprobante"]; ?></td>
                      <td>
                         <!--Botón xa abrir el modal para visualizar usuarios -->
                         <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target="#modal-usuario<?php echo $id_compra; ?>">
                            <?php echo $dato["nombres"]; ?>
                        </button>
                        <!-- Modal para visualizar la información de los usuarios -->
                        <div class="modal fade" id="modal-usuario<?php echo $id_compra; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #ff7876; color: white">
                                <h4 class="modal-title">Información del usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Nombre Usuario</label>
                                      <input type="text" value="<?php echo $dato['nombres'];?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" value="<?php echo $dato['email'];?>" class="form-control" disabled>
                                      </div>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                            <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          </div>
                        </div>
                      </td>
                      <td><?php echo $dato["precio_total"]; ?></td>
                      <td><?php echo $dato["cantidad"]; ?></td>                              
                      <td>
                        <center>
                          <div class="btn-group">
                            <a href="show.php?identidad=<?php echo $id_compra; ?>" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-eye"></i>Ver</a>
                            <a href="update.php?identidad=<?php echo $id_compra; ?>" type="button" class="btn btn-success btn-sm"><i
                                class="fa fa-pencil-alt"></i>Editar</a>
                            <a href="delete.php?identidad=<?php echo $id_compra; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
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
                        <center>Ítem</center>
                      </th>
                      <th>
                        <center>Nro Compra</center>
                      </th>
                      <th>
                        <center>Producto</center>
                      </th>
                      <th>
                        <center>Fecha Compra</center>
                      </th>
                      <th>
                        <center>Proveedor</center>
                      </th>   
                      <th>
                        <center>Comprobante</center>
                      </th>
                      <th>
                        <center>Usuario</center>
                      </th> 
                      <th>
                        <center>Precio Compra</center>
                      </th> 
                      <th>
                        <center>Cantidad</center>
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
    $("#listado_compras").DataTable({
      //Convierte los terminos de la tabla a español
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
        "infoEmpty": "Mostrando de 0 a 0 de un total de 0 Compras",
        "infoFiltered": "(Filtrado de _MAX_ total Compras)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Compras",
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
    }).buttons().container().appendTo('#listado_compras_wrapper .col-md-6:eq(0)');
  });
</script>

?>