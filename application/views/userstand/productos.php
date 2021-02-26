
    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h1 class="mb-2"><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>
                    <h3 class="text-secondary"><?php echo $this->session->userdata['feria']->fecha; ?></h3>
                    <h4><?php echo $this->session->userdata['feria']->nombre_usuario; ?> - <?php echo $this->session->userdata['feria']->email; ?></h4>
                    <p class="lead text-danger">Feria <?php echo $this->session->userdata['feria']->estado; ?></p>
                    <div class="page_link">
                        <a href="<?php echo base_url('index.php/userstand/stands') ?>">Stands</a>
                        <a>Productos</a>
                    </div>
                </div>
            </div>
            <div class="shape shape1"></div>
            <div class="shape shape2"></div>
            <div class="shape shape3"></div>
            <div class="shape shape4"></div>
            <div class="shape shape5"></div>
            <div class="shape shape6"></div>
            <div class="shape shape7"></div>
        </div>
    </section>
    <!--================End Banner Area =================-->
        

    <!--================ Section Ferias =================-->
    <section class="white mb-5 pb-5">
        <div class="container">
            <div class="row my-5">
                <div class="col text-center">
                    <h1 class=""><?php echo $this->session->userdata['stand']->nombre; ?></h1><br><br>
                    <div>
                        <?php 
                            if($this->session->userdata['feria']->estado == 'en curso'){
                                echo '<a href="'.base_url('index.php/userstand/facturacion').'" class="btn btn-danger">Facturacion</a>';
                            }
                        ?>
                        
                        <div class="btn-group ml-4" role="group" aria-label="Basic example">
                            <a class="btn btn btn-success text-white" href="<?php echo base_url('index.php/userstand/ventas') ?>">
                                Informe
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown-divider my-4"></div>
            <div class="row my-5">
                <div class="col-md-4 text-center">
                    <h2 class="text-secondary">Productos</h2>

                    <?php 
                        if($this->session->userdata['feria']->estado != 'finalizada'){
                            echo    '<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal-agregar" onclick="limpiar()">
                                        Nuevo Producto
                                    </button>';
                        } 
                    ?>

                    <br>
                    <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                        <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                </div>
                <div class="col text-center pt-5 px-3">
                    <label>Buscar Producto</label>
                    <input class="form-control col-md-6 offset-md-3" type="text" name="buscar_producto" placeholder="Nombre producto" onkeyup="listar()">
                </div>
            </div>
            <div class="pt-5">
                <table class="table table-responsive-md">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio sin IVA</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Precio de venta</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Descuento</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="lista-productos">
                        <!-- LIsta de productos -->
                    </tbody>
                </table>
                <div class="alert alert-warning" role="alert">
                    No tienes productos!
                </div>
            </div>
        </div>
    </section><br><br><br>
    
    <!-- Modales -->

    <!-- Modal eliminar -->
    <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="my-4">¿Seguro de eliminar este producto?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary btn-spiner" type="button">
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                    <button type="button" class="btn btn-primary btn-aceptar" id="aceptar-eliminar">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal agregar -->
    <div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-agregar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Precio sin IVA</label>
                            <input type="number" class="form-control" placeholder="Precio producto" min="0" name="precio" required>
                        </div>  
                        <div class="form-group">
                            <label>Porcentaje IVA %</label>
                            <input type="number" class="form-control" placeholder="IVA producto" min="0"  value="0" name="iva" required>
                        </div> 
                        <div class="form-group">
                            <label>Porcentaje de descuento %</label>
                            <input type="number" class="form-control" placeholder="IVA producto" min="0" value="0" name="descuento" required>
                        </div> 
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" class="form-control" placeholder="Stock de productos" min="0" name="cantidad" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagen de producto</label>
                            <input type="file" name="campo_archivo"  class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn-spiner" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        <button type="submit" class="btn btn-primary btn-aceptar">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cambiar imagen -->
    <div class="modal fade" id="modal-imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-editar-img">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagen de producto</label>
                            <input type="file" class="form-control-file" name="campo_archivo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn-spiner" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        <button type="submit" class="btn btn-primary btn-aceptar">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- Modal editar -->
     <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-editar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Producto </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" class="form-control" placeholder="Precio prodcutos" name="precio" required>
                        </div>   
                        <div class="form-group">
                            <label>Porcentaje IVA</label>
                            <input type="number" class="form-control" placeholder="IVA producto" min="0" name="iva" required>
                        </div> 
                        <div class="form-group">
                            <label>Porcentaje de descuento %</label>
                            <input type="number" class="form-control" placeholder="IVA producto" min="0" value="0" name="descuento" required>
                        </div> 
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" class="form-control" placeholder="Cantidad de productos" name="cantidad" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn-spiner" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        <button type="submit" class="btn btn-primary btn-aceptar">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


	<!-- Optional JavaScript -->
    <script>
        var productos = null;
        var id_editar = null;

        function limpiar () {
            $("#form-agregar")[0].reset();
        }

        $(document).ready(function () {
            spiner(false);
            consultar();
        })

        $('#form-agregar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);
            var imagenProducto = new FormData($("#form-agregar")[0]);

            $.ajax({
                url: 'agregar',
                type : 'POST',
                data : imagenProducto,
                datatype: 'json',
                contentType : false,
                processData : false,
            }).done(function(res) {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal("Producto creado :)", "¡Tu producto se ha creado exitosamente!", "success");
                consultar();
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });

        function consultar(){
            spiner(true);
            $.ajax({
                url: 'consultar',
                type: 'GET',
                success: function(res){
                    productos = JSON.parse(res);
                    listar ();
                }
            });
        }

        function listar (){
            var salida_d = "";
            var buscar = $('input[name="buscar_producto"]').val();
            $('.alert-warning').hide();

            for (var i=0; i < productos.length; i++){
                salida = '<tr>'
                salida +=     '<th scope="row">'+(i+1)+'</th>'
                salida +=     '<td><img src="<?php echo base_url('recursos/img/productos/') ?>'+productos[i].img+'" width="70" class="img-thumbnail rounded"></td>'
                salida +=     '<td>'+productos[i].nombre_producto+'</td>'
                salida +=     '<td>$'+punticos(productos[i].precio)+'</td>'
                salida +=     '<td>'+productos[i].iva+'%</td>'
                salida +=     '<td>$'+punticos(productos[i].precio_total)+'</td>'
                salida +=     '<td>'+productos[i].cantidad+'</td>'
                salida +=     '<td>'+productos[i].descuento+'%</td>'

                salida +=     ' <th>'
                salida +=         '<div class="btn-group float-right" role="group" aria-label="Basic example">'

                if('<?php echo $this->session->userdata['feria']->estado ?>' != 'finalizada'){
                    salida +=             '<a class="btn btn-outline-info">'
                    salida +=                 '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25" onclick="editar('+i+')">'
                    salida +=             '</a>'
                    salida +=             '<a class="btn btn-outline-success" data-toggle="modal" data-target="#modal-imagen" onclick="cambiar_img('+i+')">'
                    salida +=                 '<img src="<?php echo base_url('recursos/icons/imagen.png') ?>" width="25">'
                    salida +=             '</a>'
                }

                salida +=             '<a class="btn btn-outline-danger">'
                salida +=                 '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25" onclick="eliminar('+i+')">'
                salida +=             '</a>'
                salida +=         '</div>'
                salida +=     '</th>'
                salida += '</tr>'

                // Varificar busqueda de producto
                if(buscar == ''){
                    salida_d += salida;
                }else{
                    if(productos[i].nombre_producto.toLowerCase().includes(buscar.toLowerCase())){
                        salida_d += salida;
                    }
                }
            }

            if(salida_d == ''){ $('.alert-warning').show(); }

            $('.lista-productos').html(salida_d);
            spiner(false);
        }

        function cambiar_img (index) {
            id_editar = productos[index].id_producto;
        }

        $('#form-editar-img').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            var imagenProducto = new FormData($("#form-editar-img")[0]);

            $.ajax({
                url: 'cambiar_img/'+id_editar,
                type : 'POST',
                data : imagenProducto,
                datatype: 'json',
                contentType : false,
                processData : false,
            }).done(function(res) {
                spiner(false);
                $("#modal-imagen").modal('hide');
                swal("Imagen cambiada :)", "¡Tu imagne se ha cambiado exitosamente!", "success");
                consultar();
            }).fail(function() {
                spiner(false);
                $("#modal-imagen").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu imagen no se ha cambiado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });

        function editar (index){
            $("input[name='nombre']").val(productos[index].nombre_producto); 
            $("input[name='cantidad']").val(productos[index].cantidad); 
            $("input[name='iva']").val(productos[index].iva); 
            $("input[name='precio']").val(productos[index].precio_total); 
            $("input[name='descuento']").val(productos[index].descuento); 
            $('#modal-editar').modal('show');

            id_editar = productos[index].id_producto;
        }

        $('#form-editar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            $.ajax({
                url: 'editar/'+id_editar,
                type: 'POST',
                data: $(this).serialize(),
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-editar").modal('hide');
                swal("Producto editado :)", "¡Tu producto se ha editado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });

        function eliminar (index){
            $('#modal-eliminar').modal(open);

            $('#aceptar-eliminar').off('click').on('click', function (){
                spiner(true);

                $.ajax({
                    url: 'eliminar/'+productos[index].id_producto,
                    type: 'GET',
                }).done(function() {
                    spiner(false);
                    consultar();
                    $("#modal-eliminar").modal('hide');
                    swal("Producto Eliminado :)", "¡Tu producto se ha eliminado exitosamente!", "success");
                }).fail(function() {
                    spiner(false);
                    $("#modal-eliminar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha eliminado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            });
        }

        // funcion para separar miles
        function punticos (num) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            return num;
        }

        function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
		}
    </script>
