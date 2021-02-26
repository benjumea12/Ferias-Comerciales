
    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h1 class="mb-2"><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>
                    <h3 class="text-secondary"><?php echo $this->session->userdata['feria']->fecha; ?></h3>
                    <p class="lead text-danger">Feria <?php echo $this->session->userdata['feria']->estado; ?></p>
                    <div class="page_link">
                        <a href="<?php echo base_url('index.php/userstand/stands') ?>">Stands</a>
                        <a href="<?php echo base_url('index.php/userstand/productos/inicio?id_stand=').$this->session->userdata['stand']->id_stand ?>"><?php echo $this->session->userdata['stand']->nombre ?></a>
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
                <div class="col-md-5 text-center">
                    <h1 class="">Gastos</h1>
                    <?php 
                        if($this->session->userdata['feria']->estado == 'en curso'){
                            echo    '<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal-agregar" onclick="limpiar()">
                                        Nuevo Gasto
                                    </button>';
                        } 
                    ?>
                    <?php 
                        if($this->session->userdata['feria']->estado == 'en curso'){
                            echo '<a href="'.base_url('index.php/userstand/facturacion').'" class="btn btn-danger mt-3">Facturacion</a>';
                        }
                    ?>
                    <br>
                    <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                        <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                </div>
                <div class="col-md-5 text-center pt-5">
                    <label>Buscar gasto</label>
                    <div>
                        <input class="form-control" type="text" name="buscar_producto" placeholder="Descripcion de gasto" onkeyup="listar()">
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <table class="table table-responsive-md">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="lista-gasto">
                        <!-- LIsta de productos -->
                    </tbody>
                </table>
            </div>
            <div class="pt-3 pr-4">
                <h2 class="total-gastos float-right">Total gastos: $00.00</h2>
            </div>
        </div>
    </section><br><br>

    
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
                        <h5 class="modal-title" id="exampleModalLabel">Gasto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>descripcion del Gasto</label>
                            <input type="text" class="form-control" placeholder="Descripcion gasto" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="number" class="form-control" placeholder="Valor del gasto" name="valor" required>
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
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cambiar imagen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Imagen de producto</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
                            <label>descripcion del Gasto</label>
                            <input type="text" class="form-control" placeholder="Nombre Producto" name="descripcion1" required>
                        </div>
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="number" class="form-control" placeholder="Precio prodcutos" name="valor1" required>
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
        var gasto = null;
        var id_editar = null;

        function limpiar () {
            $("#form-agregar")[0].reset();
        }

        $(document).ready(function () {
            spiner(false);
            consultar();
        })

        $('#form-agregar').submit(function (ev) {
            spiner(true);
            ev.preventDefault();
            var datos = $(this).serialize();

            $.ajax({
            url: 'gastos/agregar',
            type: 'POST',
            data: datos,
            success: function (res){
                spiner(false);
                $("#modal-agregar").modal('hide');
                consultar();
            }
            });
        });

        function consultar(){
            spiner(true);
            $.ajax({
                url: 'gastos/consultar',
                type: 'GET',
                success: function(res){
                    gasto = JSON.parse(res);
                    listar ();
                }
            });
        }

        function listar (){
            var salida_d = "";
            var buscar = $('input[name="buscar_producto"]').val();
            var total_gastos = 0;

            for (var i=0; i < gasto.length; i++){
                salida = '<tr>'
                salida +=     '<th scope="row">'+(i+1)+'</th>'
                salida +=     '<td>'+gasto[i].descripcion+'</td>'
                salida +=     '<td>$'+punticos(gasto[i].total)+'</td>'

                if('<?php echo $this->session->userdata['feria']->estado ?>' == 'en curso'){
                    salida +=     ' <th>'
                    salida +=         '<div class="btn-group float-right" role="group" aria-label="Basic example">'
                    salida +=             '<a class="btn btn-outline-info" onclick="editar('+i+')">'
                    salida +=                 '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                    salida +=             '</a>'
                    salida +=             '<a class="btn btn-outline-danger" onclick="eliminar('+i+')">'
                    salida +=                 '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25">'
                    salida +=             '</a>'
                    salida +=         '</div>'
                    salida +=     '</th>'
                }
                
                salida += '</tr>'

                total_gastos += parseInt(gasto[i].total);

                // Varificar busqueda de producto
                if(buscar == ''){
                    salida_d += salida;
                }else{
                    if(gasto[i].descripcion.toLowerCase().includes(buscar.toLowerCase())){
                        salida_d += salida;
                    }
                }
            }

            if(salida_d == ''){ 
                salida_d +=  '<div class="alert alert-warning" role="alert">No tienes ningun gasto</div>'
            }

            $('.lista-gasto').html(salida_d);
            $('.total-gastos').html('Total gastos: $'+punticos(total_gastos));
            spiner(false);
        }

        function editar (index){
            $("input[name='descripcion1']").val(gasto[index].descripcion); 
            $("input[name='valor1']").val(gasto[index].total); 
         
            $('#modal-editar').modal('show');
            $id = gasto[index].id_gasto;
        }

        $('#form-editar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            $.ajax({
                url: 'Gastos/editar/'+$id,
                type: 'POST',
                data: $(this).serialize(),
                success: function (res){
                    spiner(false);
                    consultar();
                    $('#modal-editar').modal('hide');
                }
            });
        });

        function eliminar (index){
            $('#modal-eliminar').modal('show');

            $('#aceptar-eliminar').off('click').on('click', function (){
                spiner(true);
                $.ajax({
                    url: 'gastos/eliminar/'+gasto[index].id_gasto,
                    type: 'GET',
                    success: function (res){
                        spiner(false);
                        $('#modal-eliminar').modal('hide');
                        consultar();   
                    }
                });
            });
        }

        function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
        }
        
        // funcion para separar miles
        function punticos (num) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            return num;
        }
    </script>

