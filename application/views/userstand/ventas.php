
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
            <div class="row my-4 pt-4">
                <div class="col-md-4 text-center pt-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Buscar venta</label><br>
                        <input class="form-control" type="text" name="buscar_ventas" placeholder="Nombre producto" onkeyup="listar_v()">
                    </div>
                </div>
                <div class="col-md-8 text-center pt-5">
                    <button type="button" class="btn btn-lg btn-warning acciones-ocultar" onclick="imprimir()">Imprimir</button><br><br>
                    <div class="btn-group ml-4" role="group" aria-label="Basic example">
                        <button class="btn btn btn-outline-dark" onclick="ver('todo')">
                            Todo
                        </button>
                        <button class="btn btn btn-outline-dark" onclick="ver('ventas')">
                            Ventas
                        </button>
                        <button class="btn btn btn-outline-dark" onclick="ver('gastos')">
                            Gastos
                        </button>
                    </div>
                </div>
            </div>
            <div id="contenido-imprimir">
                <div id="tabla-ventas">
                    <div class="dropdown-divider my-4"></div>
                    <h2 class="my-5">Ventas</h2>
                    <table class="table table-responsive-md">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Stand</th>
                                <th scope="col">Producto</th>
                                <th scope="col">precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">%Iva</th>
                                <th scope="col">Total</th>
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
                    </div>  <br><br>
                </div>
                <div id="tabla-gastos">
                    <div class="dropdown-divider my-4"></div>
                    <h2 class="my-5">Gastos</h2>
                    <table class="table table-responsive-md">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Stand</th> 
                                <th scope="col">Descripcion del Gasto</th>
                                <th scope="col">Total</th>   
                            </tr>
                        </thead>
                        <tbody class="lista-gastos">
                            <!-- LIsta de productos -->
                        </tbody>
                    </table>
                    <div class="pt-3 pr-4">
                        <div class="float-right text-center">
                            <h2 class="total-gastos">Total Gastos: $00.00</h2>
                        </div>
                    </div>  
                </div> 
                <br><br>
                <div class="dropdown-divider my-4"></div>
                <center><h1 class="mt-2 total-caja"></h1></center>
            </div>
        </div>
    </section><br><br>


	<!-- Optional JavaScript -->
    <script>
        var ventas = null;
        var gastos = null;
        var total_ventas = 0;
        var total_gastos = 0;
        var id_editar = null;
        var stands = null;
        var contenido = 'todo';

        $(document).ready(function () {
            consultar_v();
            consultar_g();
        })


        function consultar_v(){
            $.ajax({
                url: 'ventas/consultar_ventas_stand',
                type: 'GET',
                success: function(res){
                    ventas = JSON.parse(res);
                    listar_v ();
                
                }
            });
        }

        function consultar_g(){
            $.ajax({
                url: 'ventas/consultar_gastos_stand',
                type: 'GET',
                success: function(res){
                    gastos = JSON.parse(res);
                    listar_g ();
                }
            });
        }

        function listar_v (){
            var salida_d = "";
            var total_v = 0;
            var buscar_ventas = $('input[name="buscar_ventas"]').val();

            for (var i=0; i < ventas.length; i++){
                salida = '<tr>'
                salida +=     '<th scope="row">'+(i+1)+'</th>'
                salida +=     '<td>'+ventas[i].nombre+'</td>'
                salida +=     '<td>'+ventas[i].nombre_producto+'</td>'
                salida +=     '<td>$'+punticos(ventas[i].precio_producto_v)+'</td>'
                salida +=     '<td>'+ventas[i].cantidad_venta+'</td>'
                salida +=     '<td>'+ventas[i].iva+'%</td>'
                salida +=     '<td>$'+punticos(ventas[i].total)+'</td>'
                salida += '</tr>'

                if(buscar_ventas == ''){
                    salida_d += salida;
                    total_v += parseInt(ventas[i].total);
                }else{
                    if(ventas[i].nombre_producto.toLowerCase().includes(buscar_ventas.toLowerCase())){
                        salida_d += salida;
                        total_v += parseInt(ventas[i].total);
                    }
                }
            }

            if(salida_d == ''){ 
                salida_d +=  '<div class="alert alert-warning" role="alert">No tienes ninguna venta</div>'
            }

            total_ventas = total_v;

            $('.total-ventas').html('Total ventas: $'+punticos(total_ventas));
            $('.lista-ventas').html(salida_d);
        }

        function listar_g (){
            var salida_d = "";
            var total_g = 0;

            for (var i=0; i < gastos.length; i++){
                salida = '<tr>'
                salida +=     '<td>'+(i+1)+'</td>'
                salida +=     '<td>'+gastos[i].nombre+'</td>'
                salida +=     '<td>'+gastos[i].descripcion+'</td>'
                salida +=     '<td>$'+punticos(gastos[i].total)+'</td>'
                salida += '</tr>'

                salida_d += salida;
                total_g += parseInt(gastos[i].total);
            }

            total_gastos = total_g;
            $('.total-gastos').html('Total gastos: $'+punticos(total_gastos));
            $('.total-caja').html('Total caja: $'+punticos(total_ventas-total_gastos));
            $('.lista-gastos').html(salida_d);
        }

        function listar_stands (){
            var salida = '';

            for (var i=0; i < stands.length; i++){
                salida += '<option value="'+stands[i].id_stand+'">'+stands[i].nombre+'</option>'
            }

            $('.lista-stands').append(salida);
        }

        function ver (accion) {
            switch(accion){
                case 'todo': 
                    $('#tabla-gastos').show(500);
                    $('#tabla-ventas').show(500);
                    $('.total-caja').html('Total caja: $'+punticos(total_ventas-total_gastos));

                    contenido = 'todo';
                break;
                case 'ventas': 
                    $('#tabla-ventas').show(500);
                    $('#tabla-gastos').hide(500);
                    $('.total-caja').html('Total caja: $'+punticos(total_ventas));

                    contenido = 'ventas';
                break;
                case 'gastos': 
                    $('#tabla-gastos').show(500);
                    $('#tabla-ventas').hide(500);
                    $('.total-caja').html('Total caja: $'+punticos(total_gastos));

                    contenido = 'gastos';
                break;
            }
        }

        function imprimir() {
            headerfactura = '<div class="p-3 row">'
            headerfactura += '<div class="col-4">'
            headerfactura +=   '<img src="<?php echo  base_url('recursos/img/logo.png')?>" width="200" class="shadow-sm">'
            headerfactura += '</div>'
            headerfactura += '<div class="col-4 text-center">'
            headerfactura +=   '<h1><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>'
            headerfactura +=   '<p class="lead"><?php echo $this->session->userdata['feria']->lugar; ?></p>'            
            headerfactura += '</div>'
            headerfactura += '<div class="col-4">'
            headerfactura +=   '<p class="lead float-right"><?php echo $this->session->userdata['feria']->fecha; ?></p>'            
            headerfactura += '</div>'
            headerfactura += '</div><br>'
            headerfactura += '<center><h1>Stand: <?php echo $this->session->userdata['stand']->nombre; ?></h1></center>'

            var contenidoOriginal= document.body.innerHTML;

            $('.acciones-ocultar').hide();
            var contenido = document.getElementById('contenido-imprimir').innerHTML;           

            document.body.innerHTML = headerfactura+contenido;

            window.print();
            document.body.innerHTML = contenidoOriginal;
        }

        // funcion para separar miles
        function punticos (num) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            return num;
        }
    </script>
