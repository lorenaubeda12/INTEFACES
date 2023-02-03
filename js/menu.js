function getVistaEditar(idCapa) {
    console.log("Hola estoy en editarVista");
    var parametros = '&controlador=Menu&metodo=getVistaEditarMenu&idMenu=' + idCapa;
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('.menu').html('');
            $('#capa' + idCapa).html(vista);

        }
    })
}

function getVistaNuevo(idCapa) {
    console.log("Hola estoy en editarVista");
    var parametros = '&controlador=Menu&metodo=getVistaNuevoMenu';
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('.menu').html('');
            $('#capa' + idCapa).html(vista);

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
            $('#capa' + idCapa).html(vista);

        }
    })
}

function cerrarMenu(idMenu) {
    $('#capa' + idMenu).html('');
}

function guardarMenu() {
    var parametros = '&controlador=Menu&metodo=aniadirMenu';
    parametros += '&' + $('#formularioNuevoMenu').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#capaResultadosBusqueda').html(vista);
            $('#capaEdicion').hide();
        }
    })
}

