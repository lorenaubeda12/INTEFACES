function getVista(controlador,metodo,otros){
     var parametros = '&controlador='+controlador+'&metodo='+metodo; 
     if(otros!= undefined && otros!=''){
         parametros+='&'+otros;
     }
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(vista){
            $('#capaContenido').html(vista);
        }
     })
}