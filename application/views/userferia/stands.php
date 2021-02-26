
    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h1 class="mb-2"><?php echo $this->session->userdata['feria']->nombre_feria; ?></h1>
                    <h3 class="text-secondary"><?php echo $this->session->userdata['feria']->fecha; ?></h3>
                    <a class="btn btn-lg btn btn-success text-white mb-4 mt-3" href="<?php echo base_url('index.php/userferia/ventas') ?>">
                        Informes
                    </a>
                    <div class="page_link">
                        <a href="<?php echo base_url('index.php/userferia/ferias') ?>">Ferias</a>
                        <a>Stands</a>
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
                <div class="col-md-4 text-center">
                    <h1 class="text-secondary">Stands</h1>
                    <?php 
                        if($this->session->userdata['feria']->estado != 'finalizada'){
                            echo    '<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modal-agregar" onclick="limpiar()">
                                        Nuevo Stand
                                    </button>';
                        }
                    ?>
                    
                </div>
                <div class="col text-center pt-5 px-3">
                    <label>Buscar Stand</label>
                    <input class="form-control col-md-6 offset-md-3 nombre-buscar" type="text" placeholder="Nombre stand" onkeyup="listar()">
                </div>
            </div>
            <div class="dropdown-divider my-4"></div>
            <div class="row pt-4 lista-stands px-3">
               <!-- Lista satnds -->
            </div>
        </div>
    </section><br><br><br>




    <!-- Modales -->

    <!-- Modal eliminar -->
    <div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="my-4">¿Seguro de eliminar esta stand?</h3>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar stand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Stand" name="nombre" required>
                        </div>   
                        <div class="dropdown-divider my-3"></div>
                        <h6 class="mb-3">Usuario encargado del stand</h6>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="email" class="form-control email-buscar" placeholder="Email encargado" name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-success btn-buscar float-right mt-2" onclick="buscar_usuario('.email-buscar')">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="email-buscar-datos">
                            <!-- Inputs usuario stand -->
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn-spiner" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        <button type="submit" class="btn btn-primary btn-agregar btn-aceptar">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- Modal editar stand -->
    <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-editar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Stand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-5">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Stand" name="nombre" required>
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


    <!-- Modal editar usuario stand -->
    <div class="modal fade" id="modal-editar-usuario-stand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-editar-usuario">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Uusario de stand</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-5">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="email" class="form-control email-buscar-editar" placeholder="Email encargado" name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="mt-2 btn btn-success btn-buscar float-right" onclick="buscar_usuario('.email-buscar-editar')">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="email-buscar-editar-datos">
                            <!-- Inputs usuario stand -->
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn-spiner" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        <button type="submit" class="btn btn-primary btn-agregar btn-aceptar">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Optional JavaScript -->
	<!-- Optional JavaScript -->
    <script>
        var stands = null;
        var id_editar = null;
        var usuario_encontrado = false;

        $(document).ready(function () {
            consultar();
        })

        function limpiar () {
            $("#form-agregar")[0].reset();
            $("#form-editar-usuario")[0].reset();
            $('.email-buscar-datos').html('');
            $('.email-buscar-editar-datos').html('');

            $('.btn-agregar').attr('disabled', true);
            $('.btn-buscar').attr('disabled', false);

            $('.email-buscar').attr('readonly', false);
            $('.email-buscar-editar').attr('readonly', false);

            usuario_encontrado = false;
        }

        // Consultar
        function consultar(){
            spiner(true);

            $.ajax({
                url: '/ferias/index.php/userferia/stands/obtener_stands',
                type: 'GET',
                success: function(res){
                    stands = JSON.parse(res);
                    listar ();
                }
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡No no encontramos tus ferias, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        function listar (){
            var salida_d = "";
            var buscar = $('.nombre-buscar').val();

            for (var i=0; i < stands.length; i++){
                salida = '<div class="col-lg-3 col-md-4 col-sm-6 p-1">'
                salida +=     '<div class="card">'
                salida +=         '<div class="card-body">'  
                salida +=             '<h3 class="card-title">'+stands[i].nombre+'</h3>'
                salida +=             '<div class="dropdown-divider my-2"></div>'
                salida +=             '<h4 class="card-text">'+stands[i].nombre_usuario+'</h4>'
                salida +=             '<h4 class="text-muted">'+stands[i].email+'</h4>'
                salida +=             '<div class="dropdown-divider my-3"></div>'
                salida +=             '<div class="btn-group float-right" role="group" aria-label="Basic example">'

                if('<?php echo $this->session->userdata['feria']->estado ?>' != 'finalizada'){
                    salida +=                 '<a class="btn btn-outline-success" onclick="editar('+i+')">'
                    salida +=                     '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                    salida +=                 '</a>'
                    salida +=                 '<a class="btn btn-outline-info" onclick="editar_usuario('+i+')">'
                    salida +=                     '<img src="<?php echo base_url('recursos/icons/user.png') ?>" width="25">'
                    salida +=                 '</a>'
                }
                
                salida +=                 '<a class="btn btn-outline-danger" data-toggle="modal" onclick="eliminar('+i+')">'
                salida +=                     '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="25">'
                salida +=                 '</a>'
                salida +=             '</div>'
                salida +=         '</div>'
                salida +=     '</div>'
                salida += '</div>'

                if(buscar == ''){
                    salida_d += salida;
                }else{
                    if(stands[i].nombre.toLowerCase().includes(buscar.toLowerCase())){
                        salida_d += salida;
                    }
                }
            }

            if(salida_d == ''){ 
                salida_d +=  '<div class="alert alert-warning" role="alert">No tienes ningun stand</div>'
            }

            $('.lista-stands').html(salida_d);
            spiner(false);
        }


        // ELiminar
        function eliminar (index){
            $('#modal-eliminar').modal(open);

            $('#aceptar-eliminar').off('click').on('click', function (){ 
                spiner(true);
                $.ajax({
                    url: '/ferias/index.php/userferia/stands/eliminar/'+stands[index].id_stand,
                    type: 'GET'
                }).done(function() {
                    spiner(false);
                    consultar();
                    $("#modal-eliminar").modal('hide');
                    swal("Stand Eliminado :)", "¡Tu stand se ha eliminado exitosamente!", "success");
                }).fail(function() {
                    spiner(false);
                    $("#modal-eliminar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu stand no se ha eliminado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            });
        }

        // Editar usuario
        function editar_usuario (index) {
            limpiar();
            id_editar = stands[index].id_stand;
            $('#modal-editar-usuario-stand').modal('show');
        }

        $('#form-editar-usuario').submit(function (ev) {
            ev.preventDefault();
            spiner(true);
    
            if (usuario_encontrado){
                editar_u ();
            }else{ 
                var pass = $("input[name='password']").val(); 
                var confirm = $(".confirmar").val();

                if(pass != confirm){
                    spiner(false);
                    swal("las contraseñas no coinciden!", "Escriba de nuevo su contraseña!");
                }else{
                    editar_u ();
                }
            }
        });

        function editar_u () {
            $.ajax({
                url: '/ferias/index.php/userferia/stands/editar_u'+id_editar,
                type: 'POST',
                data: $('#form-editar-usuario').serialize(),
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-editar-usuario-stand").modal('hide');
                swal("Stand Creado :)", "¡Tu stand se ha creado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar-usuario").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu stand no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        // Buscar usuario
        function buscar_usuario (clase) {
            spiner(true);
            var email_buscar = $(clase).val();
            var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            
            if(email_buscar == ''){
                spiner(false);
                swal("Ingresa un email!");
            }else{
                if (email_buscar.search(patron)==0){
                    $.ajax({
                        url: '/ferias/index.php/userferia/stands/verificar',
                        type: 'POST',
                        data: {email:email_buscar},
                        success: function(res){
                            spiner(false);
                            user = JSON.parse(res);

                            switch (user.estado){
                                case 'nulo':
                                    swal("El usuario no existe, Por favor registrelo!");
                                    salida = '';

                                    salida +=     '<div class="form-group">'
                                    salida +=      '<label>Nombre</label>'
                                    salida +=       '<input type="text" class="form-control" placeholder="Nombre usuario" name="nombre_usuario" required>'
                                    salida +=     '</div> '
                                    salida +=     '<div class="form-group">'
                                    salida +=       '<label>Contraseña</label>'
                                    salida +=       '<input type="password" class="form-control" placeholder="Contraseña" name="password" required>'
                                    salida +=     '</div>'   
                                    salida +=     '<div class="form-group">'
                                    salida +=        '<label>Confirmar contraseña</label>'
                                    salida +=        '<input type="password" class="form-control confirmar" placeholder="Confirmar contraseña" required>'
                                    salida +=     '</div>'

                                    $(clase).attr('readonly', true);
                                    $('.btn-buscar').attr('disabled', true);
                                    $('.btn-agregar').attr('disabled', false);

                                    $(clase+'-datos').html(salida);
                                break;
                                case 'invalido':
                                    swal("El usuario no se puede utilizar, Por favor ingrese otro email!");
                                break;
                                case 'valido':
                                    swal("Usuario encontrado :)!");

                                    salida = '';
                                    usuario_encontrado = true;

                                    salida +=     '<div class="form-group">'
                                    salida +=      '<label>Nombre</label>'
                                    salida +=       '<input type="text" readonly class="form-control" name="nombre_usuario" value="'+user.infouser.nombre_usuario+'">'
                                    salida +=       '<input type="text" class="form-control d-sm-none" name="id_usuario" value="'+user.infouser.id_usuario+'">'
                                    salida +=     '</div> '  

                                    $(clase).attr('readonly', true);
                                    $('.btn-buscar').attr('disabled', true);
                                    $('.btn-agregar').attr('disabled', false);
                                    $(clase+'-datos').html(salida);
                                break;
                            }
                        }
                    })
                } else {
                    spiner(false);
                    swal("Email invalido!","El email debe tener @!");
                }

                
            }
        }

        // Agregar
        $('#form-agregar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            if (usuario_encontrado){
                agregar_u ();
            }else{
                var pass = $("input[name='password']").val(); 
                var confirm = $(".confirmar").val();

                if(pass != confirm){
                    spiner(false);
                    swal("las contraseñas no coinciden!", "Escriba de nuevo su contraseña!");
                }else{
                    agregar_u ();
                }
            }
        });

        function agregar_u () {
            console.log($('#form-agregar').serialize());
            $.ajax({
                url: '/ferias/index.php/userferia/stands/agregar_u',
                type: 'POST',
                data: $('#form-agregar').serialize(),
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-agregar").modal('hide');
                swal("Stand Creada :)", "¡Tu Stand se ha creado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu Stand no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }


        // Editar
        function editar (index){
            $("input[name='nombre']").val(stands[index].nombre); 
            $('#modal-editar').modal('show');

            id_editar = stands[index].id_stand;
        }

        $('#form-editar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            $.ajax({
                url: 'editar_stands/'+id_editar,
                type: 'POST',
                data: $(this).serialize()
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-editar").modal('hide');
                swal("Stand editado :)", "¡Tu stand se ha editado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu stand no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });

        function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
		}
    </script>
