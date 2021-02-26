
<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h1>Tus Ferias</h1>
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
<section class="white mb-5 pb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1 col-sm-12">
                <div class="form-group px-5">
                    <label>Ver ferias</label>
                    <select class="form-control select-ver-ferias">
                        <option value="todas">Todas</option>
                        <option value="lista-curso">En curso</option>
                        <option value="lista-creadas">Proximas</option>
                        <option value="lista-terminadas">Finalizadas</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 pt-4">
                <center>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-agregar" onclick="limpiar()">
                        Nueva Feria
                    </button><br>
                    <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                        <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                        Cargando...
                    </button>
                </center>
            </div>
        </div>

        <div class="lista lista-curso">
            <div class="dropdown-divider my-5"></div>
            <h3 class="text-secondary">- Ferias en Curso 
                <div class="spinner-grow text-danger ml-3" role="status">
                    <span class="sr-only"> Loading...</span>
                </div>
            </h3>
            <div class="row pt-4 lista-ferias-curso px-3">
                <!--====== Lista de ferias =======-->
            </div>
        </div>
        
        <div class="lista lista-creadas">
            <div class="dropdown-divider my-4"></div>        
            <h3 class="text-secondary">- Proximas Ferias</h3>
            <div class="row pt-4 lista-ferias-creadas px-3">
                <!--====== Lista de ferias =======-->
            </div>
        </div>

        <div class="lista lista-terminadas">
            <div class="dropdown-divider my-4"></div>
            <h3 class="text-secondary">- Ferias Finalizadas</h3>
            <div class="row pt-4 lista-ferias-terminadas px-3">
                <!--====== Lista de ferias =======-->
            </div>
        </div>
    </div>
</section><br><br>


<!-- Modales -->

<!-- Modal eliminar -->
<div class="modal fade" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="my-4">¿Seguro de eliminar esta feria?</h3>
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

<!-- Modal eliminar -->
<div class="modal fade" id="modal-estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="my-4 titulo-iniciar">¿Seguro que desea Iniciar esta feria?</h3>
                <h3 class="my-4 titulo-finalizar">¿Seguro que desea Finalizar esta feria?</h3>
                <p>Recuerda:</p>
                <p class="lead texto-iniciar">- Al <strong>iniciar</strong> la feria vas a permitir que los usuarios encargados de los Stands puedan empezar a realizar ventas y registrarlas en el sistema</p>
                <p class="lead texto-finalizar">- Al <strong>finalizar</strong> la feria los usuarios encargados de los Stands ya no podran realizar ventas y registrarlas en el sistema.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-spiner" type="button">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Cargando...
                </button>
                <button type="button" class="btn btn-primary btn-aceptar" id="aceptar-estado">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title ver-titulo">Ver feria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="ver-nombre"></h2>
        <p class="ver-fecha"></p>
        <p class="ver-descripcion" style="margin-top: -20px;"></p>
        <p class="ver-lugar" style="margin-top: -20px;"></p>
        <div class="dropdown-divider"></div>
        <h3 class="ver-usuario"></h3>
        <div class="dropdown-divider"></div>
        <h3 class="ver-estado"></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-confirmar-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group pt-3">
            <label>Confirma tu contraseña</label>
            <input type="password" class="form-control" name="password_estado" placeholder="Contraseña" required name="nombre">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary btn-spiner" type="button">
            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
            Cargando...
        </button>
        <button type="button" class="btn btn-primary continuar-verificar btn-aceptar">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal agregar feria -->
<div class="modal fade" id="modal-agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-agregar">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Feria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre feria" required name="nombre">
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control"  required name="fecha" min='<?php $datestring = '%Y-%m-%d'; echo mdate($datestring) ?>'>
                    </div>    
                    <div class="form-group">
                        <label>Lugar</label>
                        <input type="text" class="form-control" placeholder="Lugar feria" required name="lugar">
                    </div>
                    <div class="form-group">
                        <label>descripcion</label>
                        <input type="text" class="form-control" placeholder="Descripcion feria" required name="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Encargado de feria</label>
                        <select class="form-control select-usuarios" name="usuario_enc" required>
                            <!-- Usuarios -->
                        </select>
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

<!-- Modal editar feria -->
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-editar">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Feria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre feria" required name="nombre">
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control"  required name="fecha">
                    </div>   
                    <div class="form-group">
                        <label>Lugar</label>
                        <input type="text" class="form-control" placeholder="Lugar feria" required name="lugar">
                    </div>
                    <div class="form-group">
                        <label>descripcion</label>
                        <input type="text" class="form-control" placeholder="Descripcion feria" required name="descripcion">
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Encargado de feria</label>
                        <select class="form-control select-usuarios" name="encargado">
                            <!-- Usuarios -->
                        </select>
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

	<!-- Optional JavaScript -->
    <script>
        var ferias = null;
        var id_editar = null;

        $(document).ready(function () {
            $('.select-ver-ferias').val('lista-creadas');
            spiner(false);
            consultar();
            consultar_usuarios();
        })

        function limpiar () {
            $("#form-agregar")[0].reset();
        }

        function calcular_dias (fecha_feria) {
            var fecha_feria = new Date(Date.parse(fecha_feria));
            var fecha_actual = new Date();

            if(fecha_feria > fecha_actual){
                let resta = fecha_feria.getTime() - fecha_actual.getTime()
                dias = Math.round(resta/ (1000*60*60*24));
                return dias+1;
            }
        }

        // Consultar
        function consultar(){
            spiner(true);
            $.ajax({
                url: 'ferias/obtener_ferias',
                type: 'GET',
                success: function(res){
                    ferias = JSON.parse(res);
                    listar ();
                }
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡No no encontramos tus ferias, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }


        function listar (){
            var ferias_curso = '';
            var ferias_creadas = '';
            var ferias_terminadas = "";

            for (var i=0; i < ferias.length; i++){
                var salida = "";

                salida += '<div class="col-lg-3 col-md-4 col-sm-6 p-1">'
                salida +=     '<div class="card">'
                salida +=         '<div class="card-body"> ' 
                salida +=             '<h4 class="card-title">'+ferias[i].nombre_feria+'</h4>'
                salida +=             '<h5 class="card-subtitle mb-2 text-muted">'+ferias[i].fecha+'</h5>'
                salida +=             '<hr>'
                salida +=             '<div class="row">'
                salida +=               '<div class="col">'

                var dias = calcular_dias(ferias[i].fecha);

                switch (ferias[i].estado){
                    case 'creada':
                        if(!dias){
                            salida +=  '<h4 class="card-title">Preparate:</h4>'
                            salida +=  '<h2 class="card-subtitle mb-2 text-muted">Hoy</h2>'
                        }else{
                            if(dias == 1){
                                salida +=  '<h4 class="card-title">Preparate:</h4>'
                                salida +=  '<h2 class="card-subtitle mb-2 text-muted">Mañana</h2>'
                            }else{
                                salida +=  '<h4 class="card-title">Faltan:</h4>'
                                salida +=  '<h3 class="card-subtitle mb-2 text-muted">'+dias+' Días</h3>'
                            }
                        }
                    break;
                    default:
                        salida +=  '<h4 class="card-subtitle mb-2 text-muted">'+ferias[i].lugar+'</h4>'
                        salida +=  '<h4 class="card-subtitle mb-2 text-muted">'+ferias[i].nombre_usuario+'</h4>'
                    break;
                }
                
                salida +=               '</div>'
                salida +=               '<div class="col">'

                switch (ferias[i].estado){
                    case 'creada':
                        salida +=                 '<button type="button" class="btn float-right btn-success" onclick="estado_feria('+i+',1)">Iniciar</button>' 
                    break;
                    case 'en curso':
                        salida +=                     '<a class="btn float-right btn-info"  data-toggle="modal" onclick="ver('+i+')">'
                        salida +=                         '<img src="<?php echo base_url('recursos/icons/ver2.png') ?>" width="25">'
                        salida +=                     '</a>'

                    break;
                    case 'finalizada':
                        salida +=                     '<a class="btn float-right btn-info"  data-toggle="modal" onclick="ver('+i+')">'
                        salida +=                         '<img src="<?php echo base_url('recursos/icons/ver2.png') ?>" width="25">'
                        salida +=                     '</a>'
                    break;
                }

                salida +=               '</div>'
                salida +=             '</div>'

                switch (ferias[i].estado){
                    case 'creada':
                        salida +=             '<hr>'
                        salida +=             '<div class="row">'
                        salida +=                 '<div class="col btn-group float-right" role="group" aria-label="Basic example">'
                        salida +=                     '<a class="btn btn-outline-warning btn-sm"  onclick="ver('+i+')">'
                        salida +=                         '<img src="<?php echo base_url('recursos/icons/ver2.png') ?>" width="22">'
                        salida +=                     '</a>'
                        salida +=                     '<a class="btn btn-outline-info btn-sm" onclick="editar('+i+')">'
                        salida +=                         '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="22">'
                        salida +=                     '</a>'
                        salida +=                     '<a class="btn btn-outline-danger btn-sm" onclick="eliminar('+i+')">'
                        salida +=                         '<img src="<?php echo base_url('recursos/icons/eliminar.png') ?>" width="22">'
                        salida +=                     '</a>'
                        salida +=                 '</div>'
                        salida +=             '</div>'
                    break;
                    case 'en curso':
                        salida +=     '<hr>'
                        salida +=     '<button type="button" class="btn btn-warning btn-block" onclick="estado_feria('+i+',2)">Finalizar</button>' 
                    break;
                }
                
                salida +=          '</div>'
                salida +=     '</div>'
                salida += '</div>'

                switch (ferias[i].estado){
                    case 'creada':
                        ferias_creadas += salida;
                    break;
                    case 'en curso':
                        ferias_curso += salida;
                    break;
                    case 'finalizada':
                        ferias_terminadas += salida;
                    break;
                }               
            }

            if(ferias_curso == ''){ 
                ferias_curso +=  '<div class="alert alert-warning" role="alert">No tienes ninguna feria en curso</div>'
            }
            if(ferias_creadas == ''){ 
                ferias_creadas +=  '<div class="alert alert-warning" role="alert">No tienes ninguna feria creada</div>'
            }
            if(ferias_terminadas == ''){ 
                ferias_terminadas +=  '<div class="alert alert-warning" role="alert">No tienes ninguna feria finalizada</div>'
            }

            $('.lista-ferias-curso').html(ferias_curso);
            $('.lista-ferias-creadas').html(ferias_creadas);
            $('.lista-ferias-terminadas').html(ferias_terminadas);
            spiner(false);
        }

        // ver 
        $('select').on('change', function() {
            ver_ferias(this.value);
        });

        function ver_ferias (value) {
            if(value == 'todas'){
                $('.lista').show(500);
            }else{
                $('.lista').hide(500);
                $('.'+value).show(400);
            }
        }
        
        function ver (index) {
            $('.ver-nombre').html('<strong>Nombre:</strong> '+ferias[index].nombre_feria);
            $('.ver-fecha').html('<strong>Fecha:</strong> '+ferias[index].fecha);
            $('.ver-descripcion').html('<strong>Descripcion:</strong> '+ferias[index].descripcion);
            $('.ver-lugar').html('<strong>Lugar:</strong> '+ferias[index].lugar);
            $('.ver-usuario').html('<strong>Usuario:</strong> '+ferias[index].email+' - '+ferias[index].nombre_usuario);
            $('.ver-estado').html('<strong>Estado:</strong> '+ferias[index].estado);
            $("#modal-ver").modal('show');
        }

        function estado_feria (index,accion) {
            var old_password = $("input[name='password_estado']").val('');
            var estado = null;
            var msj = null;

            if(accion == 1){
                $(".titulo-iniciar").show(); $(".titulo-finalizar").hide(); $(".texto-iniciar").show();  $(".texto-finalizar").hide();

                estado = 'en curso';
                msj = ['Feria Iniciada :)','¡Los encargados de los estands ya podran relizar ventas!','Iniciado'];
            }else{
                $(".titulo-iniciar").hide(); $(".titulo-finalizar").show(); $(".texto-iniciar").hide(); $(".texto-finalizar").show();

                estado = 'finalizada';
                msj = ['Feria Finalizada :)','¡Los encargados de los estands ya no podran relizar ventas!','Finallizado'];
            }

            $('#modal-confirmar-password').modal('show');
            
            $('.continuar-verificar').off('click').on('click', function (){
                var old_password = $("input[name='password_estado']").val();
                spiner(true);

                $.ajax({
                    url: '/ferias/index.php/myusuario/validar_password',
                    type: 'POST',
                    data: {password: old_password},
                    datatype: 'text',
                }).done(function(res) {
                    spiner(false);

                    if(res == 'false'){
                        swal({ title: "Contreseña invalida :(", text: "¡Confirma contraseña actual!", icon: "warning", dangerMode: true, });
                    }else{
                        $('#modal-confirmar-password').modal('hide');
                        $("#modal-estado").modal('show');

                        $('#aceptar-estado').off('click').on('click', function (){
                            spiner(true);

                            $.ajax({
                                url: 'ferias/editar_estado/'+ferias[index].id_feria,
                                type: 'POST',
                                data: {estado:estado}
                            }).done(function() {
                                spiner(false);
                                consultar();
                                $("#modal-estado").modal('hide');
                                swal(msj[0], msj[1], "success");
                            }).fail(function() {
                                spiner(false);
                                $("#modal-estado").modal('hide');
                                swal({ title: "Lo sentimos :(", text: "¡Tu feria no se ha "+msj[2]+", intentalo mas tarde!", icon: "warning", dangerMode: true, });
                            });
                        });
                    }
                }).fail(function() {
                    spiner(false);
                    swal({ title: "Ha ocurrido un error :(", text: "¡Vuelve mas tarde!", icon: "warning", dangerMode: true, });
                });
            });
        }


        // ELiminar
        function eliminar (index){
            $('#modal-eliminar').modal(open);

            $('#aceptar-eliminar').off('click').on('click', function (){
                spiner(true);

                $.ajax({
                    url: 'ferias/eliminar_ferias/'+ferias[index].id_feria,
                    type: 'GET'
                }).done(function() {
                    spiner(false);
                    consultar();
                    $("#modal-eliminar").modal('hide');
                    swal("Feria Eliminada :)", "¡Tu feria se ha eliminado exitosamente!", "success");
                }).fail(function() {
                    spiner(false);
                    $("#modal-eliminar").modal('hide');
                    swal({ title: "Lo sentimos :(", text: "¡Tu feria no se ha eliminado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
                });
            });
        }

        // Agregar
        $('#form-agregar').submit(function (ev) {
            ev.preventDefault();
            var datos = $(this).serialize();
            spiner(true);

            $.ajax({
                url: 'ferias/agregar_ferias',
                type: 'POST',
                data: datos,
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-agregar").modal('hide');
                swal("Feria Creada :)", "¡Tu feria se ha creado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-agregar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu feria no se ha creado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });


        // Editar
        function editar (index){
            $("input[name='nombre']").val(ferias[index].nombre_feria); 
            $("input[name='fecha']").val(ferias[index].fecha); 
            $("input[name='lugar']").val(ferias[index].lugar); 
            $("input[name='descripcion']").val(ferias[index].descripcion); 
            $("select[name='encargado']").val(ferias[index].id_usuario);
            $('#modal-editar').modal('show');

            id_editar = ferias[index].id_feria;
        }

        $('#form-editar').submit(function (ev) {
            ev.preventDefault();
            spiner(true);

            $.ajax({
                url: 'ferias/editar_ferias/'+id_editar,
                type: 'POST',
                data: $(this).serialize()
            }).done(function() {
                spiner(false);
                consultar();
                $("#modal-editar").modal('hide');
                swal("Feria Editada :)", "¡Tu feria se ha editado exitosamente!", "success");
            }).fail(function() {
                spiner(false);
                $("#modal-editar").modal('hide');
                swal({ title: "Lo sentimos :(", text: "¡Tu feria no se ha editado, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        });

        // Consultar usuarios
        function consultar_usuarios (){
            spiner(true);

            $.ajax({
                url: 'usuarios/consultar',
                type: 'GET',
                success: function(res){
                    spiner(false);
                    var usuarios = JSON.parse(res);
                    var salida = null;

                    for (var i=0; i < usuarios.length; i++){
                        salida += '<option value="'+usuarios[i].id_usuario+'">'+usuarios[i].nombre_usuario+' - '+usuarios[i].email+'</option>';
                    }

                    $('.select-usuarios').html(salida);
                }
            }).fail(function() {
                spiner(false);
                swal({ title: "Lo sentimos :(", text: "¡No encontramos tus usuarios, intentalo mas tarde!", icon: "warning", dangerMode: true, });
            });
        }

        function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
		}
    </script>