
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
            <div class="row my-4">
                <div class="col-md-4 text-center pt-4">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Buscar stand</label>
                        <select class="form-control lista-stands" name="buscar_gasto" value="0" onchange="listar()">
                            <!-- lista stands -->
                            <option value="0">Todos</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="pt-5" id="tabla-ventas">
                <table class="table table-responsive-md">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Feria</th>
                            <th scope="col">Stand</th>
                            <th scope="col">Descripcion del Gasto</th>
                            <th scope="col">Total del Gasto</th>   
                        </tr>
                    </thead>
                    <tbody class="lista-gastos">
                        <!-- LIsta de productos -->
                    </tbody>
                </table>
                <div class="pt-3 pr-4">
                    <div class="float-right text-center">
                        <h2 class="total-gastos">Total Gastos: $00.00</h2>
                        <button type="button" class="btn btn-lg btn-warning acciones-ocultar" onclick="imprimir_gasto()">Imprimir</button>
                    </div>
                </div>  
            </div>
        </div>
    </section><br><br>


	<!-- Optional JavaScript -->
    <script>
        var ventas = null;
        var id_editar = null;
        var stands = null;

        $(document).ready(function () {
            consultar_stads();
            consultar();
        })


        function consultar(){
            $.ajax({
                url: 'gastos/consultar_feria',
                type: 'GET',
                success: function(res){
                    gastos = JSON.parse(res);
                    listar ();
                
                }
            });
        }

        function consultar_stads(){
            $.ajax({
                url: 'stands/obtener_stands',
                type: 'GET',
                success: function(res){
                    stands = JSON.parse(res);
                    listar_stands ();
                
                }
            });
        }

        function listar (){
            var salida_d = "";
            var total_gasto = 0;
            var buscar_gasto = $('select[name="buscar_gasto"]').val();

            for (var i=0; i < gastos.length; i++){
                salida = '<tr>'
                salida +=     '<th scope="row">'+(i+1)+'</th>'
                salida +=     '<td>'+gastos[i].nombre_feria+'</td>'
                salida +=     '<td>'+gastos[i].nombre+'</td>'
                salida +=     '<td>'+gastos[i].descripcion+'</td>'
                salida +=     '<td>$'+punticos(gastos[i].total)+'</td>'
                salida += '</tr>'

                if(buscar_gasto == '0'){
                    salida_d += salida;
                    total_gasto += parseInt(gastos[i].total);
                }else{
                    if(gastos[i].stand == buscar_gasto){
                        salida_d += salida;
                        total_gasto += parseInt(gastos[i].total);
                    }
                }
            }
            $('.total-gastos').html('Total gastos: $'+punticos(total_gasto));
            $('.lista-gastos').html(salida_d);
        }

        function listar_stands (){
            var salida = '';

            for (var i=0; i < stands.length; i++){
                salida += '<option value="'+stands[i].id_stand+'">'+stands[i].nombre+'</option>'
            }

            $('.lista-stands').append(salida);
        }

        function imprimir_gasto() {
            headerfactura = '<div class="p-3 row">'
            headerfactura += '<div class="col-4">'
            headerfactura +=   '<img src="<?php echo  base_url('recursos/img/logo.png')?>" width="200" class="shadow-sm">'
            headerfactura += '</div>'
            headerfactura += '<div class="col-4 text-center">'
            headerfactura +=   '<h1><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>'
            headerfactura +=   '<p class="lead"><?php echo $this->session->userdata['feria']->lugar; ?></p>'            
            headerfactura += '</div>'
            headerfactura += '<div class="col-4">'
            headerfactura +=   '<p class="lead float-right"><?php $datestring = '%d/%m/%Y'; echo mdate($datestring) ?></p>'            
            headerfactura += '</div>'
            headerfactura += '</div><br>'
            headerfactura +=   '<h1>Informe de gastos</h1>'

            var contenidoOriginal= document.body.innerHTML;

            $('.acciones-ocultar').hide();
            var contenido= document.getElementById('tabla-ventas').innerHTML;
            

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
