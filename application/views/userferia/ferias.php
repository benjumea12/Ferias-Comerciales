
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



<!-- Modales -->

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
            url: 'ferias/obtener_ferias',
            type: 'GET',
            success: function(res){
                ferias = JSON.parse(res);
                listar ();
            }
        }).fail(function() {
            $("#modal-agregar").modal('hide');
            swal({ title: "Lo sentimos :(", text: "¡No encontramos tus ferias, intentalo mas tarde!", icon: "warning", dangerMode: true, });
        });
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

    function listar (){
        var ferias_curso = '';
        var ferias_creadas = '';
        var ferias_terminadas = "";

        for (var i=0; i < ferias.length; i++){
            var salida = "";

            salida += '<div class="col-lg-3 col-md-4 col-sm-6 p-1">'
            salida +=     '<div class="card">'
            salida +=         '<div class="card-body">'
            salida +=             '<h3 class="card-title">'+ferias[i].nombre_feria+'</h3>'
            salida +=             '<h4 class="card-subtitle mb-2 text-muted">'+ferias[i].fecha+'</h4>'
            salida +=             '<h3 class="mb-2 text-muted">'+ferias[i].lugar+'</h3>'
            salida +=             '<div class="dropdown-divider my-3"></div>'

    
            salida +=            '<div class="row">'
            salida +=                '<div class="col-sm-6">'

            if(ferias[i].estado == "creada"){
                var dias = calcular_dias(ferias[i].fecha);
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
            }
            salida +=               '</div>'
            salida +=               '<div class="col-sm-6 pt-3">'
            salida +=                   '<div class="btn-group float-right" role="group" aria-label="Basic example">'
            salida +=                         '<a class="card-lin btn float-left btn-outline-primary" onclick="ver('+i+')">'
            salida +=                           '<img src="<?php echo base_url('recursos/icons/ver2.png') ?>" width="25">'
            salida +=                        '</a>'
            salida +=                         '<a class="card-lin btn float-left btn-info" href="<?php echo base_url('index.php/userferia/stands/inicio?id_feria=') ?>'+ferias[i].id_feria+'">'
            salida +=                             '<img src="<?php echo base_url('recursos/icons/flecha.png') ?>" width="25">'
            salida +=                        '</a>'
            salida +=                    '</div>'
            salida +=               '</div>'
            salida +=            '</div>'
            salida +=         '</div>'
            salida +=     '</div>'
            salida += '</div>';

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
        $('.ver-estado').html('<strong>Estado:</strong> '+ferias[index].estado);
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

