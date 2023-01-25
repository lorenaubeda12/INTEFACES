function getVistaEditar(idCapa){
    var parametros = '&controlador=Menu&metodo=getVistaEditarMenu';
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function (vista) {
            $('#capa'+ idCapa).html(vista);
        }
    })
}
