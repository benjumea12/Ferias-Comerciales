

<!--================ Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h1>Tus Stands</h1>
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
        <div class="row p-4">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label>Ver ferias</label>
                <div class="form-group">
                    <select class="form-control select-ver-ferias">
                        <option value="todas">Todas</option>
                        <option value="lista-curso">En curso</option>
                        <option value="lista-creadas">Proximas</option>
                        <option value="lista-terminadas">Finalizadas</option>
                    </select>
                </div>
                <br>
                <button class="btn btn-light btn-lg btn-spiner mt-5" type="button">
                    <span class="spinner-grow spinner-grow-lg" role="status" aria-hidden="true"></span>
                    Cargando...
                </button>
            </div>
        </div>

        <div class="lista lista-curso">
            <div class="dropdown-divider my-4"></div>
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
</section><br><br><br>



 <!-- Modal editar -->
 <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-editar">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Producto </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre Stand" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="taxt" class="form-control" placeholder="Slogan stand" name="slogan" required>
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
                <h3 class="ver-estado"></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>


<script>
    var stands = null;
    var id_editar = null;

    $(document).ready(function () {
        //$('.lista').hide();
        //$('.lista-creadas').show(200);
        $('.select-ver-ferias').val('lista-creadas');
        consultar();
    })

    // Consultar
    function consultar(){
        spiner(true);
        $.ajax({
            url: 'stands/obtener_stands',
            type: 'GET',
            success: function(res){
                stands = JSON.parse(res);
                listar ();
            }
        }).fail(function() {
            spiner(false);
            $("#modal-agregar").modal('hide');
            swal({ title: "Lo sentimos :(", text: "¡No encontramos tus ferias, intentalo mas tarde!", icon: "warning", dangerMode: true, });
        });
    }

    function listar (){
        var ferias_curso = '';
        var ferias_creadas = '';
        var ferias_terminadas = "";

        for (var i=0; i < stands.length; i++){
            var salida = "";

            salida += '<div class="col-lg-3 col-md-4 col-sm-6 p-1">'
            salida +=     '<div class="card">'
            salida +=         '<div class="card-body">'
            salida +=             '<h4 class="card-title">'+stands[i].nombre_feria+'</h4>'
            salida +=             '<h4 class="card-subtitle mb-2 text-muted">'+stands[i].fecha+'</h4>'
            salida +=             '<div class="dropdown-divider"></div>'
            salida +=             '<h4 class="card-title">Stand: </h5>'
            salida +=             '<h3 class="card-subtitle mb-2 text-muted">'+stands[i].nombre+'</h3>'
            salida +=             '<div class="dropdown-divider my-3"></div>'
            salida +=             '<div class="btn-group float-right" role="group" aria-label="Basic example">'
            salida +=                 '<a class="card-lin btn float-left btn-outline-primary" onclick="ver('+i+')">'
            salida +=                     '<img src="<?php echo base_url('recursos/icons/ver2.png') ?>" width="25">'
            salida +=                 '</a>'

            if(stands[i].estado != 'finalizada'){
                salida +=                 '<a class="btn btn-outline-success" onclick="editar('+i+')">'
                salida +=                   '<img src="<?php echo base_url('recursos/icons/editar.png') ?>" width="25">'
                salida +=                 '</a>'
            }

            salida +=                 '<a class="card-lin btn float-left btn-info" href="<?php echo base_url('index.php/userstand/productos/inicio?id_stand=') ?>'+stands[i].id_stand+'">'
            salida +=                     '<img src="<?php echo base_url('recursos/icons/flecha.png') ?>" width="25">'
            salida +=                 '</a>'
            salida +=             '</div>'
            salida +=         '</div>'
            salida +=     '</div>'
            salida += '</div>';

            //console.log(stands[i].estado_stand);
            switch (stands[i].estado){
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

    function editar(index) {
        $("input[name='nombre']").val(stands[index].nombre); 
        $("input[name='slogan']").val(stands[index].slogan); 
        $('#modal-editar').modal('show');

        id_editar = stands[index].id_stand;
    }

    $('#form-editar').submit(function (ev) {
        ev.preventDefault();
        spiner(true);

        $.ajax({
            url: 'stands/editar_stand/'+id_editar,
            type: 'POST',
            data: $(this).serialize(),
            success: function (res){
                consultar();
                $('#modal-editar').modal('hide');
            }
        });
        
    });

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
        $('.ver-nombre').html('<strong>Nombre:</strong> '+stands[index].nombre_feria);
        $('.ver-fecha').html('<strong>Fecha:</strong> '+stands[index].fecha);
        $('.ver-descripcion').html('<strong>Descripcion:</strong> '+stands[index].descripcion);
        $('.ver-lugar').html('<strong>Lugar:</strong> '+stands[index].lugar);
        $('.ver-estado').html('<strong>Estado:</strong> '+stands[index].estado);
        $("#modal-ver").modal('show');
    }

    function spiner (accion) {
			if(accion){
				$('.btn-spiner').show(); $('.btn-aceptar').hide();
			}else{
                $('.btn-spiner').hide(); $('.btn-aceptar').show();
            }
		}
</script>

