function getVistaEditar(idCapa){
    console.log("Hola estoy en editarVista");
    var parametros = '&controlador=Menu&metodo=getVistaEditarMenu&idMenu='+ idCapa;
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#capa'+ idCapa).html(vista);
            $('#resultados'+ idCapa).hide();
        }
    })
}

function actualizarMenu(idCapa) {
    var datosActualizados = '&controlador=Menu&metodo=actualizarDatosMenu';
    datosActualizados += '&' + $('#formularioModificarDatosMenu').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: datosActualizados,
        success: function (vista) {
            $('#capa'+ idCapa).html(vista);
            $('#resultados'+ idCapa).hide();
        }
    })
}
