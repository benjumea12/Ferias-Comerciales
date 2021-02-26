<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: #81d4fa;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">
			<img src="<?php echo base_url('recursos/bootstrap-solid.svg') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
			Feria Empresarial
		</a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">12/07/2019</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<h3 class="mr-5">Total Caja: <span class="text-secondary">$37.300</span></h3>
				<a class="btn btn-danger my-2 my-sm-0 text-white ml-3">SALIR</a>
			</form>
		</div>
	</nav>

	<div class="p-3">
		<div class="row">
			<div class="col-md-6">
				<div class="container pt-4">
					<h2 class="ml-5">Productos</h2>

					<div class="dropdown-divider my-4 mx-5"></div>

					<div class="pt-3">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
								<div class="media position-relative mt-3">
									<img src="<?php echo base_url('recursos/pan.jpg') ?>" width="90" class="rounded m-2 mr-3">
									<div class="media-body row">
										<div class="col">
											<h5>Nombre Producto</h5>
											<p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										</div>
										<div class="col text-right">
											<h3>$6.500</h3>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar-compra">Comprar</button>
										</div>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media position-relative mt-3">
									<img src="<?php echo base_url('recursos/pan.jpg') ?>" width="90" class="rounded m-2 mr-3">
									<div class="media-body row">
										<div class="col">
											<h5>Nombre Producto</h5>
											<p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										</div>
										<div class="col text-right">
											<h3>$6.500</h3>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar-compra">Comprar</button>
										</div>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media position-relative mt-3">
									<img src="<?php echo base_url('recursos/pan.jpg') ?>" width="90" class="rounded m-2 mr-3">
									<div class="media-body row">
										<div class="col">
											<h5>Nombre Producto</h5>
											<p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										</div>
										<div class="col text-right">
											<h3>$6.500</h3>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar-compra">Comprar</button>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="container pt-4">
					<h2 class="ml-5 thead-light">Factura</h2>

					<div class="dropdown-divider my-4 mx-5"></div>
					
					<table class="table mt-5">
						<thead class="thead-light">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Producto</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Total</th>
								<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Producto</td>
								<td>Cantidad</td>
								<td>Total</td>
								<td class="text-right">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editar-compra">Left</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-eliminar-compra">Right</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="dropdown-divider my-4 mx-5"></div>

					<div class="row">
						<div class="col">
							<h2>Total: $12.500</h2>
							<p class="text-secondary ml-2">4 Productos</p>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#modal-finalizar-compra">Terminar Compra</button>
						</div>
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
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Compra</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Cantidad</label>
					<input type="number" class="form-control" placeholder="Cantidad">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Aceptar</button>
			</div>
			</div>
		</div>
	</div>

	<!-- Modal editar -->
	<div class="modal fade" id="modal-editar-compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Compra</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nueva cantidad</label>
					<input type="number" class="form-control" placeholder="Nueva cantidad">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Aceptar</button>
			</div>
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
					<button type="button" class="btn btn-primary">Aceptar</button>
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
					<input type="number" class="form-control" placeholder="Dinero recibido">
				</div>
				<button type="button" class="btn btn-success float-right">Calcular Cambio</button><br>

				<div class="dropdown-divider my-4 mt-4 mx-2"></div>

				<div class="alert alert-primary" role="alert">
					<h3>Cambio: <span class="float-right">$00.00</span></h3>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary">Terminar Compra</button>
			</div>
			</div>
		</div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>