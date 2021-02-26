var paginator = 0;
var num_elementos = 5;

function paginador (accion) {
    var fin = (paginator*num_elementos)+num_elementos;

    $('.btn-prev').attr('disabled', false);
    $('.btn-next').attr('disabled', false);

    switch(accion){
        case 'next':  if(fin < usuarios.length){ paginator += 1; };  break;
        case 'prev':  paginator -= 1;  break;
        case 'inicio':  $('.btn-prev').attr('disabled', true);  break;
    }

    if((paginator*num_elementos)+num_elementos > usuarios.length){
        fin = usuarios.length;
    }else{
        fin = (paginator*num_elementos)+num_elementos;
    }

    if(paginator == 0){ $('.btn-prev').attr('disabled', true); };
    if(fin == usuarios.length){ $('.btn-next').attr('disabled', true); };

    $('.pagina').html(paginator+1);

    return fin;
}