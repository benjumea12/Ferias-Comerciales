		
	<nav class="navbar navbar-expand-lg shadow navegacion w-100" style="background: #222222;">
		<button class="d-lg-none btn btn-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<img src="<?php echo base_url('recursos/icons/opciones.png') ?>" width="16">
		</button>
		<a class="navbar-brand pl-5" href="<?php echo base_url('index.php') ?>">
			<img src="<?php echo base_url('recursos/img/logo.png') ?>" width="120" class="align-top" alt="">
		</a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			</ul>
			<div class="form-inline my-2 my-lg-0 pr-5">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 menu_nav">
					<?php 
						if(isset($this->session->userdata['info_usuario'])){
							switch ($this->session->userdata['info_usuario']->tipo_usuario) {
								case 'admin': // Cliente encontrado
									echo '<li class="nav-item"><a class="nav-link navegacion-item" href="'.base_url('index.php/admin/ferias').'">Ferias</a></li>';
									echo '<li class="nav-item"><a class="nav-link navegacion-item" href="'.base_url('index.php/admin/usuarios').'">Usuarios</a></li>';
								break;
								case 'userferia': // Cliente no encontrado
									echo '<li class="nav-item"><a class="nav-link navegacion-item" href="'.base_url('index.php/userferia/ferias').'">Ferias</a></li>';
								break;
								case 'userstand': // Cliente inactivo
									echo '<li class="nav-item"><a class="nav-link navegacion-item" href="'.base_url('index.php/userstand/stands').'">Stands</a></li>';
								break;
							}

							echo '<li class="nav-item"><a class="nav-link" href="#">|</a></li>';
							echo '<li class="nav-item"><a class="nav-link navegacion-item" href="#" id="sidebarCollapse">Mi Cuenta</a></li>';
						} 
					?>
				</ul>
			</div>
		</div>
	</nav><br><br><br>
			

	<div class="wrapper">
		<nav id="sidebar">
            <div id="dismiss">
				<button type="button" class="btn btn-light text-green">X</button>
            </div>

            <div class="sidebar-header" style="background: #222222;">
				<h2 class="text-light">Mi Cuenta</h2>
            </div>

            <ul class="list-unstyled components p-2 pt-5">
				<h3 class="ml-2"><?php echo $this->session->userdata['info_usuario']->nombre_usuario ?></h3>
				<p class="text-dark"><?php echo $this->session->userdata['info_usuario']->email ?><br>Usuario: <?php echo $this->session->userdata['info_usuario']->tipo_usuario ?> </p>

				<div class="btn-group float-right mt-3 mr-4" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-editar-usuario"><img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25"></button>
					<button type="button" class="btn btn-outline-warning"data-toggle="modal" data-target="#modal-password-editar" onclick="limpiar_form_password()"><img src="<?php echo base_url('recursos/icons/pass.png') ?>" width="25"></button>
				</div><br><br><br><br><br><br><br><br>
			</ul>
			
			<div class="dropdown-divider mx-4"></div>

            <ul class="list-unstyled CTAs">
				<a class="btn btn-danger btn-block" href="<?php echo base_url('index.php/login/logout') ?>">Salir</a>
            </ul>
		</nav>
	</div>

	<div class="overlay position-fixed"></div>


	 <!-- Modal editar -->
	<div class="modal fade" id="modal-editar-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form id="form-editar-myusuario">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cambiar mis datos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body pb-3">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="my_nombre" required value="<?php echo $this->session->userdata['info_usuario']->nombre_usuario ?>">
						</div>
						<div class="form-group">
							<label>email</label>
							<input type="email" class="form-control" name="my_email" required value="<?php echo $this->session->userdata['info_usuario']->email ?>">
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
	<div class="modal fade" id="modal-password-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form id="form-password-editar">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cambiar mis datos</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body pb-3">
						<div class="form-group div-validar-password">
							<label>Contraseña actual</label>
							<input type="password" class="form-control" placeholder="Contraseña actual" name="old_password" id="old_password" required>
							<button type="button" class="btn btn-success mt-3 float-right" onclick="validar_old_password()">Continuar</button><br><br>
						</div> 
						
						<div class="div-cambiar-password">
							<div class="form-group">
								<label>Nueva contraseña</label>
								<input type="password" class="form-control" placeholder="Nueva Contraseña " name="password_user" id="password_user" required>
							</div> 
							<div class="form-group">
								<label>Confirmar contraseña</label>
								<input type="password" class="form-control" placeholder="Confirmar Contraseña" name="confirm_password_user" id="confirm_password_user" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary btn-spiner" type="button">
							<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
							Cargando...
						</button>
						<button type="submit" id="submit_btn" class="btn btn-primary aceptar-cambiar-password btn-aceptar">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
        $(document).ready(function () {
			$('.div-cambiar-password').hide();
			$('.aceptar-cambiar-password').attr('disabled', true);

            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

		function limpiar_form_password () {
			$('#old_password').val('');
			$('.div-cambiar-password').hide();
			$('.div-validar-password').show();
			$('.aceptar-cambiar-password').attr('disabled', true);
		}

		function validar_old_password () {
			var old_password = $('#old_password').val();
			spiner(true);
			$.ajax({
				url: '/ferias/index.php/myusuario/validar_password',
				type: 'POST',
				data: {password: old_password},
				datatype: 'text',
			}).done(function(res) {
				spiner(false);

				if(res == 'false'){
					swal({ title: "Contreseña invalida :(", text: "¡Ingresa tu contraseña actual!", icon: "warning", dangerMode: true, });
				}else{
					$('.div-cambiar-password').show();
					$('.div-validar-password').hide();
					$('.aceptar-cambiar-password').attr('disabled', false);
				}
			}).fail(function() {
				spiner(false);
				$("#modal-agregar").modal('hide');
				swal({ title: "Ha ocurrido un error :(", text: "¡Vuelve mas tarde!", icon: "warning", dangerMode: true, });
			});
		} 

		$('#form-password-editar').submit(function (ev) {
			ev.preventDefault();
			var password = $('#password_user').val();
			var confirmar = $('#confirm_password_user').val();

			if(password != confirmar){
				swal({ title: "La contraseña no coincide :(", icon: "warning", dangerMode: true, });
			}else{
				spiner(true);

				$.ajax({
					url: '/ferias/index.php/myusuario/editar_pass',
					type: 'POST',
					data: {password: password},
				}).done(function() {
					spiner(false);
					$("#modal-password-editar").modal('hide');
					swal("Tu informacion se ha actualizado exitosamente!");
				}).fail(function() {
					spiner(false);
					$("#modal-password-editar").modal('hide');
					swal({ title: "Lo sentimos :(", text: "¡Tu cantraseña no se ha actualizado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
				});
			}
		});

		$('#form-editar-myusuario').submit(function (ev) {
			ev.preventDefault();
			spiner(true);

			var new_email = $("input[name='my_email']").val();

			if(new_email == '<?php echo $this->session->userdata['info_usuario']->email ?>'){
				editar_datos ();
			}else{
				$.ajax({
					url: '/ferias/index.php/myusuario/validar_email',
					type: 'POST',
					data: {email: new_email},
					datatype: 'text'
				}).done(function(res) {
					if(res == 'true'){
						spiner(false);
						swal({ title: "Usuario existente :(", text: "¡Por favor, ingresa otro email!", icon: "warning", dangerMode: true, });
					}else{
						editar_datos ();
					}
				}).fail(function() {
					spiner(false);
					$("#modal-password-editar").modal('hide');
					swal({ title: "Ha ocurrido un error :(", text: "¡intentalo mas tarde!", icon: "warning", dangerMode: true, });
				});
			}
		});

		function editar_datos () {
			$.ajax({
				url: '/ferias/index.php/myusuario/editar_datos',
				type: 'POST',
				data: $('#form-editar-myusuario').serialize()
			}).done(function(res) {
				spiner(false);
				$("#modal-password-editar").modal('hide');
				swal("Tu informacion se ha actualizado exitosamente!")
				.then((value) => {
					location.reload();
				});
			}).fail(function() {
				spiner(false);
				$("#modal-password-editar").modal('hide');
				swal({ title: "Lo sentimos :(", text: "¡Tu informacion no se ha actualizado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
			});
		}
    </script>