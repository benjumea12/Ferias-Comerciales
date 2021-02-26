
    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h1>Usuarios</h1>
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
    <section class="white">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-5 offset-md-1 text-center p-3 px-5">
                    <label>Buscar Usuario</label>
                    <input class="form-control buscar-usuario" type="text" placeholder="Nombre usuario" onkeyup="listar()">
                </div>
                <div class="col-md-5 text-center">
                    <button type="button" class="btn btn-lg btn-primary mt-3" data-toggle="modal" data-target="#modal-agregar" onclick="limpiar('#form-agregar')">
                        Nuevo usuario
                    </button><br>
                    <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                        <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                </div>
            </div>
            <div>
                <div class="dropdown-divider my-5"></div>
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="lista-usuarios table-responsive-md">

                    </tbody>
                </table>
                <!--================ Pagination ============-->
                <nav class="blog-pagination justify-content-center d-flex">
                    <h4 class="mt-2">Pagina: <span class="pagina"></span></h4>
                    <div class="btn-group ml-4" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary btn-prev" onclick="listar('prev')">
                            <span aria-hidden="true">
                                <span class="lnr lnr-chevron-left"><</span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-next" onclick="listar('next')">
                            <span aria-hidden="true">
                                <span class="lnr lnr-chevron-right">></span>
                            </span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    
    <!-- Modales -->

    <!-- Modal eliminar -->
    <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="my-4">¿Esta seguro que desea eliminar este usuario?</h3>
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
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre usuario" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control email-a" placeholder="Email usuario" name="email" required>
                        </div>  
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control email-a" placeholder="Telefono usuario" name="telefono" required>
                        </div>  
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input type="password" class="form-control confirmar" placeholder="Confirmar contraseña" required>
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
                        <h5 class="modal-title">Editar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre usuario" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control email-e" placeholder="Email usuario" name="email" required>
                        </div>   
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control email-a" placeholder="Telefono usuario" name="telefono" required>
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


    <script src="<?php echo base_url('recursos/js/paginator.js') ?>"></script>


	<!-- Optional JavaScript -->
    <script>
        var usuarios = null;
        var id_editar = null;
        var email_old = null;

        $(document).ready(function () {
            spiner(false);
            consultar();
        });

        function limpiar (form) {
            $('#form-agregar')[0].reset();
        }

        // Eliminar
        function eliminar (index){
            $('#modal-eliminar').modal(open);

            $('#aceptar-eliminar').off('click').on('click', function (){
                spiner(true);

                $.ajax({
                    url: 'usuarios/eliminar/'+usuarios[index].id_usuario,
                    type: 'GET'
                }).done(function() {
                    consultar();
                    spiner(false);
                    $("#modal-eliminar").modal('hide');
                    swal("Usuario Eliminado :)", "¡Tu usuario se ha eliminado exitosamente!", "success");
                }).fail(function() {
                    spiner(false);
                    $("#modal-eliminar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu feria no se ha eliminado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            });
        }

        // Consultar
        function consultar(){
            spiner(true);

            $.ajax({
                url: 'usuarios/consultar',
                type: 'GET',
                success: function(res){
                    usuarios = JSON.parse(res);
                    listar ('inicio'); 
                }
            }).fail(function() {
                spiner(false);
                swal({ title: "Lo sentimos :(", text: "¡No no encontramos tus usuarios, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        function listar (accion){
            var salida = "";
            var buscar_usuario = $('.buscar-usuario').val();
            
            var fin = paginador (accion);

            if (buscar_usuario == ''){
                for (var i= (paginator*num_elementos); i < fin; i++){
                    salida += '<tr>'
                    salida +=   '<th scope="row">'+(i+1)+'</th>'
                    salida +=       '<td>'+usuarios[i].nombre_usuario+'</td>'
                    salida +=       '<td>'+usuarios[i].email+'</td>'
                    salida +=       '<td>'+usuarios[i].telefono+'</td>'
                    salida +=    '<th>'
                    salida +=    '<div class="btn-group float-right" role="group" aria-label="Basic example">'
                    salida +=        '<a class="btn btn-outline-info" onclick="inputs_editar('+i+')">'
                    salida +=           '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                    salida +=        '</a>'
                    salida +=        ' <a class="btn btn-outline-danger" onclick="eliminar('+i+')">'
                    salida +=             '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25">'
                    salida +=        '</a>'
                    salida +=     '</div>'
                    salida +=   '</th>'
                    salida +='</tr>';
                }
            }else{
                for (var i= 0; i < usuarios.length; i++){
                    if(usuarios[i].nombre_usuario.toLowerCase().includes(buscar_usuario.toLowerCase())){
                        salida += '<tr>'
                        salida +=   '<th scope="row">'+(i+1)+'</th>'
                        salida +=       '<td>'+usuarios[i].nombre_usuario+'</td>'
                        salida +=       '<td>'+usuarios[i].email+'</td>'
                        salida +=       '<td>'+usuarios[i].telefono+'</td>'
                        salida +=       '<td>'+usuarios[i].estado+'</td>'
                        salida +=    '<th>'
                        salida +=    '<div class="btn-group float-right" role="group" aria-label="Basic example">'
                        salida +=        '<a class="btn btn-outline-info" onclick="inputs_editar('+i+')">'
                        salida +=           '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                        salida +=        '</a>'
                        salida +=        ' <a class="btn btn-outline-danger" onclick="eliminar('+i+')">'
                        salida +=             '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25">'
                        salida +=        '</a>'
                        salida +=     '</div>'
                        salida +=   '</th>'
                        salida +='</tr>';
                    }
                }
            } 

            if(salida == ''){ 
                salida +=  '<div class="alert alert-warning" role="alert">No tienes ninguna usuario</div>'
            }

            $('.lista-usuarios').html(salida);
            spiner(false);
        }

        
        // Agregar
        function agregar () {
            $.ajax({
                url: 'usuarios/agregar',
                type: 'POST',
                data: $('#form-agregar').serialize()
            }).done(function() {
                consultar();
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal("Usuario Creado :)", "¡Tu usuario se ha creado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide'); 
                swal({ title: "Lo sentimos :(", text: "¡Tu usuario no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        $('#form-agregar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            var pass = $("input[name='password']").val(); 
            var confirm = $(".confirmar").val(); 

            if(pass != confirm){
                spiner(false);
                swal("las contraseñas no coinciden!", "Escriba de nuevo su contraseña!");
            }else{
                var email = $('.email-a').val();

                $.ajax({
                    url: 'usuarios/verificar',
                    type: 'POST',
                    data: {email:email},
                    success: function(res){
                        if(res == 'false'){ 
                            agregar();
                        }else{
                            spiner(false);
                            swal("Usuario existente en el sistema!", "Por favor ingresa otro Email!");
                        }
                    }
                }).fail(function() {
                    spiner(false);
                    $("#modal-agregar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu usuario no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            }
        });


        // Editar
        function inputs_editar (index){
            $("input[name='nombre']").val(usuarios[index].nombre_usuario); 
            $("input[name='email']").val(usuarios[index].email); 
            $("input[name='telefono']").val(usuarios[index].telefono); 
            $("select[name='estado']").val(usuarios[index].estado);
            $('#modal-editar').modal('show');
            
            email_old = usuarios[index].email;
            id_editar = usuarios[index].id_usuario;
        }

        function editar () {
            $.ajax({
                url: 'usuarios/editar/'+id_editar,
                type: 'POST',
                data: $('#form-editar').serialize()
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-editar").modal('hide'); 
                swal("Usuario Editado :)", "¡Tu usuario se ha editado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar").modal('hide'); 
                swal({ title: "Lo sentimos :(", text: "¡Tu usuario no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        $('#form-editar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            var email_e = $('.email-e').val();

            if(email_e == email_old){
                editar();
            }else{               
                $.ajax({
                    url: 'usuarios/verificar',
                    type: 'POST',
                    data: {email:email_e},
                    success: function(res){
                        if(res == 'false'){ 
                            editar();
                        }else{
                            spiner(false);
                            swal("Usuario existente en el sistema!", "Por favor ingresa otro Email!");
                        }
                    }
                }).fail(function() {
                    spiner(false);
                    $("#modal-agregar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu usuario no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            }             
        });

        function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
		}
    </script>