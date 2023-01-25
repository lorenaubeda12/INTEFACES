function buscar() {
    var parametros = '&controlador=Usuarios&metodo=buscar';

    //Mediamter el serialize me añade todos los campos que tenga el form y su contenido
    parametros += '&' + $('#formularioBuscar').serialize();

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

//Ver formulario
function formularioUser() {
    var parametros = '&controlador=Usuarios&metodo=formularioAniadir';
    parametros += '';
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

function añadirUsuario() {
    var parametros = '&controlador=Usuarios&metodo=anadirUser';
    parametros += '&' + $('#formularioAñadir').serialize();
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

//Modificar los datos, formulario
function modificarDatos(id) {
    //alert(id +" este es el id")
    var parametros = '&controlador=Usuarios&metodo=formularioModificacion';
    //alert(id)
    parametros += '&idUsuario=' + id;
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

//Actualizar los datos en la base de datos
function actualizar() {
    var datosActualizados = '&controlador=Usuarios&metodo=actualizarDatos';
    datosActualizados += '&' + $('#formularioModificarDatos').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: datosActualizados,
        success: function (vista) {
            $('#capaResultadosBusqueda').html(vista);
            $('#capaEdicion').hide();
        }
    })
}

function modificarEstado(idUsuario) {
    var datos = '&controlador=Usuarios&metodo=cambiarEstado';
    datos += '&idUsuario=' + idUsuario;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: datos,
        success: function (vista) {
            $('#capaResultadosBusqueda').html(vista);
            $('#capaEdicion').hide();

        }
    })
}

function menu(tipoMenu){
    alert("Hola")
    var datos = '&controlador=Usuarios&metodo=obtenerMenu';
    datos += '&tipoMenu=' + tipoMenu;
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: datos,
        success: function (vista) {
           $('#').html(vista);
            $('#capaEdicion').hide();

        }
    })
}