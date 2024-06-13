<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/listado_de_productos.php");
include ("../app/controllers/proveedores/listado_de_proveedores.php");
include ("../app/controllers/compras/listado_de_compras.php");
//include ("../app/controllers/usuarios/listado_de_usuarios.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registro de una nueva compra</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content-- -->
  <div class="content">
    <div class="container-fluid">

      <!--AGREGAMOS UNA CARD DESDE LA PAG. OFICIAL DE ADMINLTE-->
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detalles del Artículo y del Proveedor</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div style="display:flex">
                    <h5>Datos del Artículo</h5>
                    <div style="width: 10px;"></div>
                      <!--MODAL PARA BUSCAR PRODUCTOS-->
                      <!--Botón xa abrir el modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal"
                      data-target="#modal-buscar_producto">
                      <i class="fa fa-search"></i>Buscar Producto
                      </button>
                      <!--Contenido del modal-->
                      <div class="modal fade" id="modal-buscar_producto">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #1c31a5; color: white">
                              <h4 class="modal-title">Buscando Producto</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="table table-responsive">
                                <table id="listado_productos" class="table table-bordered table-striped table-sm">
                                  <thead>
                                    <tr>
                                      <th><center>Nro</center></th>
                                      <th><center>Seleccionar</center></th>
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
                                        <td>
                                          <button class="btn btn-dark" id="btn_seleccionar_producto<?php echo $id_producto;?>">Seleccionar</button>
                                          <script>
                                            $("#btn_seleccionar_producto<?php echo $id_producto;?>").click(function() { 

                                              // RECIBIENDO LOS DATOS DIRECTA/ DE LA tb_almacen, xa visualizarlos en los inputs ubicados más abajo
                                              
                                              var id_producto="<?php echo $dato['id_producto'];?>";
                                              $("#id_producto").val(id_producto);

                                              var codigo="<?php echo $dato['codigo'];?>";
                                              $("#codigo").val(codigo);

                                              var categoria="<?php echo $dato['nombre_categoria'];?>";
                                              $("#categoria").val(categoria);

                                              var nombre="<?php echo $dato['nombre'];?>"; 
                                              $("#nombre_producto").val(nombre);

                                              var usuario="<?php echo $dato['email'];?>"; 
                                              $("#usuario_producto").val(usuario);

                                              var descripcion="<?php echo $dato['descripcion'];?>";
                                              $("#descripcion_producto").val(descripcion);

                                              var stock="<?php echo $dato['stock'];?>";
                                              $("#stock").val(stock);
                                              $("#stock_actual").val(stock);

                                              var stock_minimo="<?php echo $dato['stock_minimo'];?>";
                                              $("#stock_minimo").val(stock_minimo);

                                              var stock_maximo="<?php echo $dato['stock_maximo'];?>";
                                              $("#stock_maximo").val(stock_maximo);

                                              var precio_compra="<?php echo $dato['precio_compra'];?>";
                                              $("#precio_compra").val(precio_compra);

                                              var precio_venta="<?php echo $dato['precio_venta'];?>";
                                              $("#precio_venta").val(precio_venta);

                                              var fecha_ingreso="<?php echo $dato['fecha_ingreso'];?>";
                                              $("#fecha_ingreso").val(fecha_ingreso);

                                              var imagen="<?php echo $URL.'/almacen/img_productos/'.$dato['imagen']; ?>";
                                              $('#img_producto').attr({src:imagen});

                                              $('#modal-buscar_producto').modal('toggle');

                                              //alert(categoria);
                                            });
                                          </script>
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
                                      </tr>
                                    <?php
                                    }
                                    ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th><center>Nro</center></th>
                                      <th><center>Seleccionar</center></th>
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
                                    </tr>
                                  </tfoot>                
                                </table>
                              </div>
                            </div>
                          </div>
                                <!-- /.modal-content -->
                        </div>
                            <!-- /.modal-dialog -->
                      </div>
                        <!-- /.modal -->
                  </div>
                  <hr>
                  <!--INPUTS XA VISUALIZAR LOS DATOS DEL PRODUCTO SELECCIONADO-->
                  <div class="row" style="font-size:13px">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <input type="text" id="id_producto" hidden>
                              <label for="">Código</label>
                              <input type="text" class="form-control" 
                              id="codigo" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría</label>
                              <div style="display:flex">
                               <input type="text" class="form-control" 
                               id="categoria" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre del Producto</label>
                              <input type="text" name= "nombre" class="form-control" id="nombre_producto" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text"  class="form-control" id="usuario_producto" disabled>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="descripcion" id="descripcion_producto" cols="30" rows="2" class="form-control" disabled></textarea>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock</label>
                              <input type="number"
                              name="stock" class="form-control" id="stock" style="background-color: #fcae11" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Mínimo</label>
                              <input type="number" name="stock_minimo" class="form-control" id="stock_minimo" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Máximo</label>
                              <input type="number" name="stock_maximo" class="form-control"
                              id="stock_maximo" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Compra</label>
                              <input type="number" name="precio_compra" 
                              class="form-control" id="precio_compra" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Venta</label>
                              <input type="number" name="precio_venta" class="form-control" 
                              id="precio_venta" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha de ingreso</label>
                              <input type="date" name="fecha_ingreso" class="form-control" id="fecha_ingreso" disabled>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imágen</label>
                          <center>
                            <img src="<?php echo $URL."/almacen/img_productos/".$imagen; ?>" id="img_producto" width="50%" alt="">
                          </center>
                        </div>
                      </div>
                      
                  </div>
                  <hr>
               
                  <div style="display:flex">
                    <h5>Datos del Proveedor</h5>
                    <div style="width: 10px;"></div>
                      <!--MODAL PARA BUSCAR PROVEEDORES-->
                      <!--Botón xa abrir el modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal"
                      data-target="#modal-buscar_proveedor">
                        <i class="fa fa-search"></i>Buscar Proveedor
                      </button>
                    <!--Contenido del modal-->
                    <div class="modal fade" id="modal-buscar_proveedor">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #1c31a5; color: white">
                            <h4 class="modal-title">Buscando Proveedor</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="table table-responsive">
                              <div class="card-body" style="display: block;">
                                <table id="listado_proveedores" class="table table-bordered table-striped table-sm">
                                  <thead>
                                    <tr>
                                      <th><center>Nro</center></th>
                                      <th><center>Seleccionar</center></th>
                                      <th><center>Nombre del proveedor</center></th>
                                      <th><center>Celular</center></th>
                                      <th><center>Teléfono</center></th>
                                      <th><center>Empresa</center></th>
                                      <th><center>Email</center></th>
                                      <th><center>Dirección</center></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($proveedores_datos as $dato){
                                      $id_proveedor = $dato['id_proveedor'];
                                      $nombre_proveedor = $dato['nombre_proveedor']; ?>
                                      <tr>
                                          <td><center><?php echo $contador = $contador + 1;?></center></td>
                                          <td>
                                            <button class="btn btn-dark" id="btn_seleccionar_proveedor<?php echo $id_proveedor;?>">Seleccionar</button>
                                            <script>
                                            $("#btn_seleccionar_proveedor<?php echo $id_proveedor;?>").click(function() { 
                                              //alert('<?php echo $nombre_proveedor;?>')
                                              
                                              // RECIBIENDO LOS DATOS DIRECTA/ DE LA tb_proveedores,a través del botón Seleccionar en los inputs xa visualizarlos
                                              var id_proveedor="<?php echo $dato['id_proveedor'];?>";
                                              $("#id_proveedor").val(id_proveedor);

                                              var nombre_proveedor="<?php echo $dato['nombre_proveedor'];?>";
                                              $("#nombre_proveedor").val(nombre_proveedor);

                                              var celular="<?php echo $dato['celular'];?>";
                                              $("#celular").val(celular);

                                              var telefono="<?php echo $dato['telefono'];?>"; 
                                              $("#telefono").val(telefono);

                                              var empresa="<?php echo $dato['empresa'];?>"; 
                                              $("#empresa").val(empresa);

                                              var email="<?php echo $dato['email'];?>";
                                              $("#email").val(email);
                                              
                                              var direccion_proveedor="<?php echo $dato['nombre_proveedor'];?>";
                                              $("#direccion_proveedor").val(direccion_proveedor);

                                              //alert(direccion_proveedor); //

                                              $('#modal-buscar_proveedor').modal('toggle');

                                              //alert(categoria);
                                            });
                                          </script>

                                          </td>
                                          <td><?php echo $dato['nombre_proveedor'];?></td>
                                          <td>
                                              <a href="https://wa.me/57<?php echo $dato['celular'];?>" target="_blank" class="btn btn-success">
                                                  <i class="fa fa-phone"></i>
                                                  <?php echo $dato['celular'];?>
                                              </a>
                                          </td>
                                          <td><?php echo $dato['telefono'];?></td>
                                          <td><?php echo $dato['empresa'];?></td>
                                          <td><?php echo $dato['email'];?></td>
                                          <td><?php echo $dato['direccion'];?></td>
                                      </tr>
                                    <?php
                                    }
                                    ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th><center>Nro</center></th>
                                      <th><center>Seleccionar</center></th>
                                      <th><center>Nombre del proveedor</center></th>
                                      <th><center>Celular</center></th>
                                      <th><center>Teléfono</center></th>
                                      <th><center>Empresa</center></th>
                                      <th><center>Email</center></th>
                                      <th><center>Dirección</center></th>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            
                            </div>
                          </div>
                        </div>
                                <!-- /.modal-content -->
                      </div>
                            <!-- /.modal-dialog -->
                    </div>
                  </div>
                  <hr>
                  <!--INPUTS XA VISUALIZAR LOS DATOS DEL PROVEEDOR SELECCIONADO-->
                  <div class="container-fluid" style="font-size:13px">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="id_proveedor" hidden>
                            <label for="">Nombre del proveedor</label>
                            <input type="text" id="nombre_proveedor" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Celular</label>
                            <input type="text" id="celular" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="text" id="telefono" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Empresa</label>
                            <input type="text" id="empresa" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" id="email" class="form-control" disabled>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="">Dirección</label>
                              <textarea name="" id="direccion_proveedor" cols="30" rows="3" class="form-control" disabled></textarea>
                          </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.card-body-->
              </div>
            </div>
          </div>
        </div>        
        <div class="col-md-3">
          <!--ANEXAMOS UNA CARD-->
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Complete los detalles</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool"    data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>            
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <?php 
                      $contador_de_compras=1;
                      foreach ($compras_datos as $dato) {
                        $contador_de_compras+=1;
                      }
                      ?>
                      <label for="">Número de la compra</label>
                      <input type="text" value="<?php echo $contador_de_compras;?>" style="text-align:center" class="form-control" disabled>
                      <input type="text" id="nro_compra" value="<?php echo $contador_de_compras;?>" hidden>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Fecha de la compra</label>
                      <input type="date" class="form-control" id="fecha_compra">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Cantidad de productos</label>
                      <input type="number" id="cantidad" style="text-align:center" class="form-control">
                      <script>
                        $('#cantidad').keyup(function() {
                          //alert('Aquí estoy yo')
                          var stock_actual=$('#stock_actual').val();
                          var cantidad=$('#cantidad').val();
                          var total=parseInt(stock_actual)+parseInt(cantidad);
                          //alert(total);
                          $('#stock_total').val(total);
                        })
                      </script>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Precio de la compra</label>
                      <input type="text" style="text-align:center" class="form-control" id="precio_total">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Comprobante de la compra</label>
                      <input type="text" class="form-control" id="comprobante">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Stock actual</label>
                      <input type="number"  style="background-color: #fcae11; text-align:center" id="stock_actual" class="form-control" disabledid>
                    </div>
                  </div>                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Stock total</label>
                      <input type="number"  style="text-align:center" id="stock_total" class="form-control" disabledid>
                    </div>
                  </div>   
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Usuario</label>
                      <input type="text" value="<?php echo $email_sesion;?>" class="form-control" disabled>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-md-12"></div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" id="btn_enviar_compra">Enviar compra</button>                   
                    <a href="../compras/create.php" class="btn btn-dark">Cancelar</a>
                  </div>
                  <div id="respuesta"></div>
                </div>

                <script>
                  // EJECUCIÓN DE LA ACCIÓN DEL BOTÓN 'ENVIAR COMPRA' 
                  
                  $('#btn_enviar_compra').click(function() {
                    //alert('Enviando datos');
                   
                    var id_producto = $('#id_producto').val();
                    var nro_compra = $('#nro_compra').val();
                    var fecha_compra = $('#fecha_compra').val();
                    var id_proveedor= $('#id_proveedor').val();
                    var comprobante=$('#comprobante').val();
                    //var id_usuario = $('#id_usuario').val();
                    var id_usuario="<?php echo $id_usuario;?>";
                    //alert(id_usuario);
                    var precio_total=$('#precio_total').val();
                    var cantidad=$('#cantidad').val();

                    var stock1=$('#stock_total').val();
                    //alert(stock1);

                    // VALIDANDO LOS CAMPOS XA Q NO ESTEN VACÍOS
                    if(id_producto==""){
                      $('#id_producto').focus();                       
                       alert('No puede haber ningún campo vacío...');
                    }
                    else if(fecha_compra==""){
                        $('#fecha_compra').focus();
                        alert('No puede haber ningún campo vacío...');
                    }
                    else if(id_proveedor==""){
                        $('#id_proveedor').focus();
                        alert('No puede haber ningún campo vacío...');
                    }             
                    else if(comprobante==""){
                        $('#comprobante').focus();
                        alert('No puede haber ningún campo vacío...');
                    }
                    else if(precio_total==""){
                        $('#precio_total').focus();
                        alert('No puede haber ningún campo vacío...');
                    }
                    else if(cantidad==""){
                        $('#cantidad').focus();
                        alert('No puede haber ningún campo vacío...');
                    }
                    else{
                      //alert('Todo Ok...');                       
                      var url = "../app/controllers/compras/create.php";
                        $.get(url,{id_producto:id_producto,nro_compra:nro_compra,fecha_compra:fecha_compra,id_proveedor:id_proveedor,comprobante:comprobante,id_usuario:id_usuario,precio_total:precio_total,cantidad:cantidad,stockio:stock1},function (datos) {
                            $('#respuesta').html(datos);
                        });
                    } 
                  });
                  
                </script>
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
     
    }).buttons().container().appendTo('#listado_productos_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
  $(function () {
    $("#listado_proveedores").DataTable({
      //Convierte los terminos de la tabla a español
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
        "infoEmpty": "Mostrando de 0 a 0 de un total de 0 Proveedores",
        "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Proveedores",
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
     
    }).buttons().container().appendTo('#listado_proveedores_wrapper .col-md-6:eq(0)');
  });
</script>

