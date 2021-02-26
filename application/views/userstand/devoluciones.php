
    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h1 class="mb-2"><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>
                    <h3 class="text-secondary"><?php echo $this->session->userdata['feria']->fecha; ?></h3>
                    <p class="lead text-danger">Feria <?php echo $this->session->userdata['feria']->estado; ?></p>
                    <div class="page_link">
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
                    <h1>Devoluciones</h1>
                </div>
                <div class="col-md-5 text-center pt-4">
                    <label>Buscar devolucion</label>
                    <div>
                        <input class="form-control" type="text" name="buscar" placeholder="Nombre producto"  onkeyup="listar()">
                    </div>
                    <br>
                    <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                        <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                </div>
            </div>
            <div class="pt-5" id="tabla-ventas">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="lista-ventas">
                        <!-- LIsta de productos -->
                    </tbody>
                </table>
                <div class="pt-3 pr-4">
                    <div class="float-right text-center">
                        <h2 class="total-ventas">Total ventas: $00.00</h2>
                    </div>
                </div>  
            </div>
        </div>
    </section><br><br><br>
   
   
    <!-- Modal devolucion -->
    <div class="modal fade" id="modal-devolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-devoluciones">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Devolucion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <p class="lead text-center">Cuando devuelves un producto, este no se agrega de nuevo al stock.</p>
                        <div class="dropdown-divider my-4"></div>
                        <div class="form-group">
                            <label>Cantidad para devolver</label>
                            <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" min="1" value="1" required>
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



    <script>
        var devolver = null;
        var ventas = null;
        var cantidad_v = 0;

        $(document).ready(function () {
            spiner(false);
            consultar();
        })

        function consultar(){
            spiner(true);

            $.ajax({
                url: 'ventas/consultar_ventas_stand',
                type: 'GET',
                success: function(res){
                    ventas = JSON.parse(res);
                    listar ();
                }
            });
        }

        function listar (){
            var salida_d = "";
            var buscar = $('input[name="buscar"]').val();
            var total_ventas = 0;

            for (var i=0; i < ventas.length; i++){
                salida  = '<tr>'
                salida +=     '<th scope="row">'+(i+1)+'</th>'
                salida +=     '<td>'+ventas[i].nombre_producto+'</td>'
                salida +=     '<td>$'+punticos(ventas[i].precio_producto_v)+'</td>'
                salida +=     '<td>'+ventas[i].cantidad_venta+'</td>'
                salida +=     '<td>$'+punticos(ventas[i].total)+'</td>'
                salida +=     '<td>'
                salida +=        '<button class="btn btn-outline-warning" onclick="devolvolucion('+i+')" data-toggle="modal" data-target="#modal-agregar-compra">'
                salida +=           '<img src="<?php echo base_url('recursos/icons/devolver2.png') ?>" width="25">'
                salida +=        '</button></td>'
                salida +=     '</td>'
                salida += '</tr>'

                total_ventas += parseInt(ventas[i].total);

                // Varificar busqueda de producto
                if(buscar == ''){
                    salida_d += salida;
                }else{
                    if(ventas[i].nombre_producto.toLowerCase().includes(buscar.toLowerCase())){
                        salida_d += salida;
                    }
                }
            }

            if(salida_d == ''){ 
                salida_d +=  '<div class="alert alert-warning" role="alert">No tienes ninguna venta</div>'
            }

            $('.total-ventas').html('Total ventas: $'+punticos(total_ventas));
            $('.lista-ventas').html(salida_d);
            spiner(false);
        }

        function devolvolucion (index) {
            devolver = ventas[index].id_venta;
            cantidad_v = ventas[index].cantidad_venta;
            $('#modal-devolucion').modal('show');
        }

        $('#form-devoluciones').submit(function (ev) {
            ev.preventDefault();
            var datos = $(this).serialize();
            var cantidad_input = $('input[name="cantidad"]').val();

            if(cantidad_input > cantidad_v ){
                swal({ title: "Cantidad invalida", text: "¡No puedes devolver mas productos de los que compraste!", icon: "warning", dangerMode: true, });
            }else{
                spiner(true);

                $.ajax({
                    url: 'devoluciones/devolver/'+devolver,
                    type: 'POST',
                    data: datos,
                }).done(function(res) {
                    spiner(false);
                    consultar();
                    $("#modal-devolucion").modal('hide');
                    swal("Devolucion completa :)", "¡Tu producto se ha devuelto exitosamente!", "success");
                }).fail(function() {
                    spiner(false);
                    $("#modal-devolucion").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha devuelto, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            }  
        });

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