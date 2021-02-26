    <section class="home_banner relative">
		<div class="container-fluid pl-0">
			<div class="row justify-content-center align-items-center full_height">
				<div class="col-lg-6 p-0">
					<div class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="banner_left d-flex justify-content-center flex-column z-index">
									<form class="text-center" method="POST" id="form-signin">
										<img src="<?php echo base_url('recursos/img/imgindex.png') ?>" width="250">
										<h3 class="h3 mb-4 mt-4 font-weight-normal">¡Ingresa tus datos!</h3>

										<label class="sr-only">Email</label>
										<input type="text" class="form-control" placeholder="Email" name="email"  maxlength="40" required autofocus>

										<label class="sr-only">Contraseña</label>
										<input type="password" class="form-control" placeholder="Contraseña" name="password" required>

										<button class="btn main_btn btn-block text-light btn-spiner" type="button">
											<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
											Verificando...
										</button>

										<button type="submit" class="btn main_btn btn-block btn-aceptar" href="#">Ingresar</button><br><br>

										<a class="mt-5 mb-3" href="#" onclick="recuperar()">¡Olvide mi contraseña!</a>
									</form>
								</div>
							</div>
							<div class="carousel-item">
								<div class="banner_left d-flex justify-content-center flex-column z-index pt-5">
									<form class="text-center" id="recuperar-pass">
										<h3 class="h3 mb-5 font-weight-normal">¡Recuperar mi contraseña!</h3>

										<label>1- Ingresa tu Email.</label>
										<input type="text" class="form-control" placeholder="Email" name="email" required autofocus>

										<p class="mb-2 mt-4">2- Te enviaremos una contraseña temporal a tu correo.</p>
										<p class="my-2">3- Ingresa a TiendaVegana con esta contraseña.</p>
										<p class="my-2">4- No olvides cambiar la contraseña por la que tu desees.</p>

										<button class="btn main_btn btn-block text-light btn-spiner" type="button">
											<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
											Verificando...
										</button>

										<button class="btn main_btn btn-block btn-aceptar" href="#">Enviar</button><br><br>

										<a class="mt-5 mb-3" href="#" onclick="login()">¡Iniciar sesion!</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="banner_right d-flex justify-content-center align-items-center">
						<div class="round-planet planet">
							<div class="round-planet planet2">
								<div class="round-planet planet3">
									<div class="shape shape1"></div>
									<div class="shape shape2"></div>
									<div class="shape shape3"></div>
									<div class="shape shape4"></div>
									<div class="shape shape5"></div>
									<div class="shape shape6"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Optional JavaScript -->
	<script src="<?php echo base_url('recursos/servicios/login.js') ?>"></script>
	<script>

		$(document).ready(function (){
			$('.btn-spiner').hide();
		});

		$('#form-signin').submit(function (ev) {
			ev.preventDefault();
			$('.btn-spiner').show(); $('.btn-aceptar').hide();
		
			$.ajax({
				url: 'index.php/login/validar',
				type: 'POST',
				data: $(this).serialize(),
				success: function(res){
					location.href = res;
				},
				statusCode: {
					401: function (xhr) {
						swal({ title: "Usuario Incorrecto :(", text: "Revisa tu email y contraseña de ingreso", icon: "warning", dangerMode: true, });
						$('.btn-spiner').hide(); $('.btn-aceptar').show();
					},
					403: function (xhr) {
						swal({ title: "Usurio Inactivo :(", text: "¡No puedes ingresar al sistema, te encuentras inactivo!", icon: "warning", dangerMode: true, });
						$('.btn-spiner').hide(); $('.btn-aceptar').show();
					},
				}
			});
		});

		$('#recuperar-pass').submit(function (ev) {
			ev.preventDefault();
			$('.btn-spiner').show(); $('.btn-aceptar').hide();

			$.ajax({
				url: 'index.php/login/cambiar_pass',
				type: 'POST',
				data: $(this).serialize()
			}).done(function(res) {
				$('.btn-spiner').hide(); $('.btn-aceptar').show();
                if(res == '!existe'){
					swal({ title: "Usuario no encontrado :(", text: "¡Ingresa un correo corectamento!", icon: "warning", dangerMode: true, });
				}else{
					swal("Codigo enviado :)", "Debes ingresar a Ferias del sena con este codigo provicional, recuerda cambiar la contraseña por la que desees depues de ingresar")
				.then((value) => {
				    $("#recuperar-pass")[0].reset();
					login();
				});
				}
            }).fail(function(res) {
				$('.btn-spiner').hide(); $('.btn-aceptar').show(); 
				$("#modal-editar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Ha ocurrido un error, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
		});
	</script>
