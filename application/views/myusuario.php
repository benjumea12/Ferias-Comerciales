<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner  align-items-center">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
        <div class="shape shape4"></div>
        <div class="shape shape5"></div>
        <div class="shape shape6"></div>
        <div class="shape shape7"></div>
    </div>
</section>


<section class="white">
    <div class="container">
        <h1><?php echo $this->session->userdata['info_usuario']->nombre_usuario; ?></h1>
        <p class="lead"><?php echo $this->session->userdata['info_usuario']->email; ?></p>
        <p class="lead">Tipo de usuario: <?php echo $this->session->userdata['info_usuario']->tipo_usuario; ?></p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar">Editar datos</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-password">Cambiar contraseña</button>
        </div>
    </div>
</section>

 <!-- Modal editar -->
 <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar mis datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-3">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" placeholder="email" name="slogan" required>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar mis datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-3">
                    <div class="form-group">
                        <label>Contraseña actual</label>
                        <input type="password" class="form-control" placeholder="Contraseña actual" name="nombre" required>
                    </div> 
                    <div class="form-group">
                        <label>Nueva contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña actual" name="nombre" required>
                    </div> 
                    <div class="form-group">
                        <label>Confirmar contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña actual" name="nombre" required>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>