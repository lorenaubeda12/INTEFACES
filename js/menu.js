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
    var parametros = '&controlador=Menu&metodo=getVistaNuevoMenu&idMenu=' + idCapa;
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

function getVistaPermisos(idCapa) {
    console.log(idCapa);
    console.log("Hola estoy en Permisos");
    var parametros = '&controlador=Menu&metodo=getVistaPermisos&idMenu=' + idCapa;
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

function modificarPermiso(idPermiso, idOpcion) {
    var datosActualizados = '&controlador=Menu&metodo=modificarPermiso';
    datosActualizados += '&' + $('#formularioModificarDatosPermisosMenu').serialize();
    console.log(datosActualizados);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: datosActualizados,
        success: function (vista) {
            $('#editarPermiso' + idPermiso).html(vista);
            // location.reload();

        }
    })
}

function cerrarMenu(idMenu) {
    $('#capa' + idMenu).html('');
}

function cerrarPermiso(idPermiso) {
    $('#editarPermiso' + idPermiso).html('');
}

function guardarMenu() {
    var parametros = '&controlador=Menu&metodo=aniadirNuevoMenu';
    parametros += '&' + $('#formularioNuevoMenu').serialize();
    console.log(parametros);
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

function borrarPermisos($datos) {
    $idOpcion = '';
    $idPermiso = '';
    $tipoPermiso = '';
    extract($datos);

    parametros += '&' + $('#formularioNuevoMenu').serialize();
    console.log(parametros);
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

function cambiarPermiso(idPermiso, idMenu) {
    var parametros = '&controlador=Menu&metodo=cambiarPermiso';
    console.log(parametros);
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

function vistaEditarPermisos(id, idPermiso) {
    // alert("Estoy en edita Permiso")
    let parametros = '&controlador=Menu&metodo=verCapaEditarPermisos&idOpcion=' + id;
    parametros += '&idPermiso=' + idPermiso;
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#editarPermiso' + idPermiso).html(vista);
        }
    })
}

function vistaCrearPermisos(idOpcion,idPermiso) {
     // alert("Estoy en crear Permiso")
    let parametros = '&controlador=Menu&metodo=verCapaCrearPermiso&idOpcion=' + idOpcion;
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#capa' + idOpcion).html(vista);
        }
    })
}

//Terminar de hacer el metodo de borrar permisos
function borrarPermisos(id, idPermiso,tipoPermiso) {
    //alert("Estoy en borrar Permiso")
    let parametros = '&controlador=Menu&metodo=borrarPermiso&idOpcion=' + id;
    parametros += '&idPermiso=' + idPermiso;
    parametros += '&tipoPermiso=' + tipoPermiso;
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#editarPermiso' + idPermiso).html(vista);

        }
    })
}
function crearPermiso() {
    var datosActualizados = '&controlador=Menu&metodo=crearPermisoMenu';
    datosActualizados += '&' + $('#formularioCrearPermiso').serialize();
    console.log(parametros);
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#editarPermiso' + idPermiso).html(vista);

        }
    })
}







