<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: #81d4fa;">
    <button class="d-lg-none btn btn-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <img src="<?php echo base_url('recursos/icons/opciones.png') ?>" width="16">
    </button>

    <a class="navbar-brand" href="<?php echo base_url('index.php/userstand/productos/inicio?id_stand=').$this->session->userdata['stand']->id_stand ?>">
        <img src="<?php echo base_url('recursos/img/favicon.png') ?>" width="50" class="d-inline-block align-top mr-3 d-inline" alt="">
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <li class="nav-item text-center w-100">
                    <h3><?php echo $this->session->userdata['feria']->nombre_feria; ?></h3>
                </li>
                <li class="nav-item text-center w-100">
                <?php 
                    date_default_timezone_set('America/Bogota');
                ?>
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><?php $datestring = '%d/%m/%Y'; echo mdate($datestring) ?></a>
                </li>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 menu_nav  w-100">
                <li class="nav-item text-center w-100">
                    <h2>Total Caja: <span class="text-secondary total-caja">$37.300</span></h2>
                </li>
                <li class="nav-item text-center"><a class="nav-link mx-5" href="#">|</a></li>
                <li class="nav-item text-center">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url('index.php/userstand/gastos') ?>">Gastos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('index.php/userstand/devoluciones') ?>">Devoluciones</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url('index.php/userstand/productos/inicio?id_stand=').$this->session->userdata['stand']->id_stand ?>">Volver</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="width: 99%;">
    <div class="py-2 row">
        <div class="col-md-12 col-lg-6">
            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="ml-5">Productos</h2>
                    </div>
                    <div class="col-md-7">
                        <div class="mt-3 mx-3">
                            <label>Buscar producto</label>
                            <input class="form-control nombre-buscar" type="text" placeholder="Nombre producto" onkeyup="listar()">
                        </div>
                    </div>
                </div>

                <div class="dropdown-divider my-3 mx-5"></div>

                <div class="pt-3 overflow-auto" id="producto" style="max-height: 60vh;">
                    
                </div>
            </div>
        </div>

        <div class="dropdown-divider my-3 mx-5 d-lg-none d-md-none"></div>

        <div class="col-md-12 col-lg-6">
            <div class="container pt-4" id="tabla-factura">
                <h2 class="ml-5 thead-light">Factura</h2>

                <div class="dropdown-divider my-4 mx-5 acciones-carrito"></div>

                <div class="alerta-carrito">
                </div>
                
                <table class="table-responsive-md table mt-2">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Total</th>
                            <th scope="col" class="acciones-carrito">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="tabla_carrito overflow-auto" style="height: 50px;">
                    <!-- Productos de factura -->
                    </tbody>
                </table>

                <div class="dropdown-divider my-4 mx-5"></div>

                <div class="row" id="valor">
                    
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modales -->

<!-- Modal agregar -->
<div class="modal fade" id="modal-agregar-compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-agregar-compra">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" placeholder="Cantidad" name="agregar_cantidad" value="1" min="1" required>
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
<div class="modal fade" id="modal-editar-compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar-compra">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" placeholder="Cantidad" name="editcantidad" value="1" min="1" required>
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

<!-- Modal eliminar -->
<div class="modal fade" id="modal-eliminar-compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="my-4">¿Seguro de eliminar esta compra?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-spiner" type="button">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Cargando...
                </button>
                <button type="button" class="btn btn-primary eliminar btn-aceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal finalizar -->
<div class="modal fade" id="modal-finalizar-compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Dinero recibido</label>
                <input type="number" class="form-control" placeholder="Dinero recibido" name="dinero">
            </div>
            <h3 class="d-inline mt-2 ml-3 total-finalizar"></h3>
            <button type="button" class="btn btn-success float-right d-inline" onclick="calcular()">Calcular Cambio</button><br>

            <div class="dropdown-divider my-4 mt-4 mx-2"></div>

            <div class="alert alert-primary" role="alert">
                <h3>Cambio: <span class="float-right cambio">$00.00</span></h3>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary btn-spiner" type="button">
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                Cargando...
            </button>
            <button type="button" class="btn btn-primary terminar btn-aceptar" onclick="terminar()">Terminar Compra</button>
        </div>
        </div>
    </div>
</div>

 <script>
    // Variables goblales
    var producto = null;
    var id_producto = null;
    var id_carrito = null;
    var descuento = null;
    var stock = 0;
    var carrito = null;
    var precio_producto = null;

    $(document).ready(function () {
        consultar();
        consultar1();
    })

    // Agregar compra a la factura
    function agregar(index){
        stock = parseInt(producto[index].cantidad);  
        id_producto = producto[index].id_producto;
        $("input[name='agregar_cantidad']").val(1);
    }

    $('#form-agregar-compra').submit(function (ev) {
        ev.preventDefault();
        spiner(true);
        var input = parseInt($("input[name='agregar_cantidad']").val()); 

        // Validar stock
        if(input > stock){ 
            spiner(false);
            swal({ title: "Stock insuficiente :(", text: "No hay suficientes productos para comprar", icon: "warning", dangerMode: true, });
        }else{ 
            // Consulta agregar producto
            $.ajax({
                url: 'facturacion/agregar/'+id_producto,
                type: 'POST',
                data: {cantidad: input}
            }).done(function(res) {
                // Respuesta 'done' del servidor
                spiner(false);
                if(res == 'false'){
                    swal({ title: "Feria Terminada :(", text: "¡Ya no puedes realizar mas ventas!", icon: "warning", dangerMode: true, })
                    .then((value) => {
                        window.location.href = "<?php echo base_url('index.php/userstand/productos/inicio?id_stand=') ?><?php echo $this->session->userdata['stand']->id_stand ?>";
                    });
                }else{
                    consultar();  consultar1();
                    $("#modal-agregar-compra").modal('hide');
                    swal("Producto agregado :)", "¡Tu producto se ha agregado exitosamente!", "success");
                }
            }).fail(function() {
                // Respuesta fail del servidor
                spiner(false);
                $("#modal-agregar-compra").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha agregado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }
    });   

    // Consultar productos del stand
    function consultar(){
        spiner(true);
        $.ajax({
            url: 'facturacion/productos',
            type: 'GET',
            success: function(res){
                producto = JSON.parse(res);
                listar ();
            }
        });
    }


    // Consultar caja
    function consultar_caja(){
        spiner(true);
        $.ajax({
            url: 'facturacion/total_caja',
            type: 'GET',
            success: function(res){
                $('.total-caja').html('$'+punticos(res));
            }
        });
    }


    // Listar productos del stand
    function listar (){
        listar_producto_d = '';
        var buscar = $('.nombre-buscar').val();

        for (var i=0; i < producto.length; i++){
            listar_producto = '<ul class="list-group list-group-flush">'
            listar_producto +=         '<li class="list-group-item">'
            listar_producto +=             '<div class="media position-relative mt-3">'
            listar_producto +=                 '<img src="<?php echo base_url('recursos/img/productos/')?>'+producto[i].img+'"'
            listar_producto +=                   'width="90" class="rounded m-2 mr-3">'
            listar_producto +=                     '<div class="media-body row">'
            listar_producto +=                         '<div class="col">'
            listar_producto +=                           ' <h3>'+producto[i].nombre_producto+'</h3>'

            if(parseInt(producto[i].cantidad) > 0) {
                listar_producto +=                          '<h3 class="text-secondary">Stock : '+producto[i].cantidad+'</h3>'
            }else{
                listar_producto +=                          '<h3 class="text-danger">Producto Agotado</h3>'
            }

            listar_producto +=                       ' </div>'
            listar_producto +=                       ' <div class="col text-right">'

            if(parseInt(producto[i].cantidad) > 0) {
                listar_producto +=                          '<button class="btn btn-outline-primary text-white"onclick="agregar('+i+')" data-toggle="modal" data-target="#modal-agregar-compra">'
                listar_producto +=                            '<img src="<?php echo base_url('recursos/icons/comprar2.png') ?>" width="25">'
                listar_producto +=                          ' </button>'
            }else{
                listar_producto +=                          '<button class="btn btn-outline-primary text-white" disabled onclick="agregar('+i+')" data-toggle="modal" data-target="#modal-agregar-compra">'
                listar_producto +=                            '<img src="<?php echo base_url('recursos/icons/comprar2.png') ?>" width="25">'
                listar_producto +=                          ' </button>'
            }

            if(parseInt(producto[i].descuento) == 0) {
                listar_producto +=                          ' <h3 class="mt-2">$ '+punticos(producto[i].precio_total)+'</h3>'
            }else{
                listar_producto +=                          ' <h3 class="mt-2">$'+punticos(producto[i].precio_total)+'</h3>'
                listar_producto +=                          ' <h4 class="mt-2">Descuento '+producto[i].descuento+'%</h4>'
            }
            
            

            
            listar_producto +=                      '  </div>'
            listar_producto +=                   ' </div>'
            listar_producto +=               ' </div>'
            listar_producto +=            '</li>'
            listar_producto +=      ' </ul>'

            // Varificar busqueda de producto
            if(buscar == ''){
                listar_producto_d += listar_producto;
            }else{
                if(producto[i].nombre_producto.toLowerCase().includes(buscar.toLowerCase())){
                    listar_producto_d += listar_producto;
                }
            }
        }
        
        if(listar_producto_d == ''){ 
            listar_producto_d +=  '<div class="alert alert-warning" role="alert">No tienes ningun producto</div>'
        }
        
        $('#producto').html(listar_producto_d);
        spiner(false);
    }

    // funcion para separar miles
    function punticos (num) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        return num;
    }

    // Consultar productos de la factura
    function consultar1(){
        spiner(true);
        $.ajax({
                url: 'facturacion/consultar',
                type: 'GET',
            success: function(res){
                carrito = JSON.parse(res);
                consultar_caja();
                listar1 ();
            }
        });
    }

    // Listar productos del la factura
    function listar1 (){
        $('.alerta-carrito').html('');
        lista_carrito = '';
        lista_valor = '';
        $sum = 0;
        num_productos = 0;
            
        // Verificar si existen productos agragados a la factura
        if(carrito.length > 0){
            for (var i=0; i < carrito.length; i++){
                $suma = parseInt(carrito[i].total);
                $sum += $suma;
    
                lista_carrito += '<tr>'
                lista_carrito += '<td class="serial">'+(i+1)+'.</td>'
                lista_carrito +=    '<td>'+carrito[i].nombre_producto+' </td>'
                lista_carrito +=    '<td> <span class="product">'+carrito[i].cantidad_carrito+'</span> </td>'
                lista_carrito +=    '<td> <span class="product">%'+carrito[i].iva+'</span> </td>'
                lista_carrito +=    '<td><span >$ '+punticos(carrito[i].total)+'</span></td>'
                lista_carrito +=    '<td class="acciones-carrito">'
                lista_carrito +=     ' <div class="btn-group float-right" role="group" aria-label="Basic example">'
                lista_carrito +=         ' <a class="btn btn-outline-info" onclick="editar('+i+')" data-toggle="modal" data-target="#modal-editar-compra">'
                lista_carrito +=         ' <img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                lista_carrito +=         ' </a>'
                lista_carrito +=         ' <a class="btn btn-outline-danger" onclick="eliminar('+i+')" data-toggle="modal" data-target="#modal-eliminar-compra">'
                lista_carrito +=         ' <img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25">'
                lista_carrito +=         ' </a>'
                lista_carrito +=       '</div>'
                lista_carrito +=  '</td>'
                lista_carrito +='</tr>'

                num_productos += parseInt(carrito[i].cantidad_carrito);
            }
        }else{
            var alert ='<div class="alert alert-warning" role="alert">No hay producto agregados al carrito</div>'
            $('.alerta-carrito').html(alert);
        }
            
        lista_valor +=   '<div class="col">'

        // Verificar si el total es mayor a 0
        if($sum > 0){
            lista_valor +=  '<h2>Total: $'+punticos($sum)+'</h2>'
        }else{
            lista_valor +=  '<h2>Total: $00.00</h2>'
        }
        
        lista_valor +=       '<p class="text-secondary ml-2">'+num_productos+' Productos</p>'
        lista_valor +=   '</div>'
        lista_valor +=   '<div class="col">'  

        // Boton terminar compra activo o inactivo          
        if($sum > 0){
            lista_valor +=       ' <button type="button" class="btn btn-success float-right acciones-carrito" data-toggle="modal" data-target="#modal-finalizar-compra">Terminar Compra</button>'
        }else{
            lista_valor +=       ' <button type="button" class="btn btn-success float-right acciones-carrito" disabled data-toggle="modal" data-target="#modal-finalizar-compra">Terminar Compra</button>'
        }
        lista_valor +=  '   </div> '
           
        $('.tabla_carrito').html(lista_carrito);
        $('#valor').html(lista_valor);
        $('.total-finalizar').html('Total: $'+punticos($sum));
        spiner(false);
    }

    function editar (index){  
        id_producto = carrito[index].id_producto;
        precio_producto = carrito[index].precio_total;
        id_carrito = carrito[index].id_carrito;
        descuento = carrito[index].descuento;
        $("input[name='editcantidad']").val(carrito[index].cantidad_carrito);
        stock = parseInt(carrito[index].cantidad)+parseInt(carrito[index].cantidad_carrito);
        console.log(stock);
    }
            
    $('#form-editar-compra').submit(function (ev) {
        ev.preventDefault();
        spiner(true);
        var input = parseInt($("input[name='editcantidad']").val()); 
        var datos = 'cantidad='+input+'&precio='+precio_producto+'&descuento='+descuento;

        if(input > stock){ 
            spiner(false);
            swal({ title: "Stock insuficiente :(", text: "No hay suficientes productos para comprar", icon: "warning", dangerMode: true, });
        }else{ 
            $.ajax({
                url: 'facturacion/editar/'+id_carrito,
                type: 'POST',
                data: datos
            }).done(function() {
                spiner(false);
                consultar(); consultar1();
                $('#modal-editar-compra').modal('hide');
                swal("Producto editado :)", "¡Tu producto se ha editado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }
    });   

    function eliminar (index){
        
        $('#modal-eliminar-compra').modal('show');

        $('.eliminar').off('click').on('click', function (){
            spiner(true);
            $.ajax({
                url: 'facturacion/eliminar/'+carrito[index].id_carrito+'/'+carrito[index].id_producto+'/'+carrito[index].cantidad_carrito,
                type: 'GET'
            }).done(function() {
                spiner(false);
                consultar();  consultar1();
                $('#modal-eliminar-compra').modal('hide');
                swal("Producto eliminado :)", "¡Tu producto se ha eliminado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-eliminar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu producto no se ha eliminado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });    
    } 

    function calcular(){
        cambio = 0;
        dinero =$("input[name='dinero']").val(); 

        cambio = dinero-$sum;

        if(dinero<$sum){
            swal({ title: "Saldo insufciente :(", icon: "warning", dangerMode: true, });
        }else{
            $('.cambio').html('$'+punticos(cambio));
        }
    }

    function terminar(){
        spiner(true);
        $.ajax({
            url: 'facturacion/terminar_compra',
            type: 'GET'
        }).done(function() {
            spiner(false);
            $("#modal-finalizar-compra").modal('hide');
            swal({ title: "¿Deseas imprimir la factura?", buttons: true, dangerMode: true, })
                .then((willDelete) => {
                if (willDelete) {
                    imprimir_fac();
                    consultar1();
                } else {
                    swal("Compra Finalizada :)", "¡Tu compra se ha realizado exitosamente!", "success");
                    consultar1();
                }
            });
        }).fail(function() {
            spiner(false);
            $("#modal-finalizar-compra").modal('hide');
            swal({ title: "Lo sentimos :(", text: "¡Tu compra no se ha finalizado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
        });
    }

    function imprimir_fac() {
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
        headerfactura += '<center><h1>Stand: <?php echo $this->session->userdata['stand']->nombre; ?></h1></center>'

        var contenidoOriginal= document.body.innerHTML;

        $('.acciones-carrito').hide();
        var contenido= document.getElementById('tabla-factura').innerHTML;
        

        document.body.innerHTML = headerfactura+contenido;

        window.print();
        window.location.href = "<?php echo base_url('index.php/userstand/facturacion') ?>";
    }

    function spiner (accion) {
        if(accion){
            $('.btn-spiner').show(); $('.btn-aceptar').hide();
        }else{
            $('.btn-spiner').hide(); $('.btn-aceptar').show();
        }
    }
    </script>