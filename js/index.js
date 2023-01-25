function guardar() {
    $('.inputRed').removeClass('inputRed');
    $('.inputGreen').removeClass('inputGreen');
    $('#msj').html('');
    changeColor('#usuario');
    changeColor('#contraseña');

    if ($('.inputRed').length > 0) {
        $('#msj').html('Revisa los campos en rojo');
    } else {
        // todo bien
        $('#flogin').submit();
    }

}

function changeColor(id) {
    if ($(id).val() == '') {
        $(id).addClass('inputRed');
    } else {
        $(id).addClass('inputGreen');
    }
}

function loginUser(){
    $('.inputRed').removeClass('inputRed');
    $('.inputGreen').removeClass('inputGreen');
    $('#msj').html('');
    changeColor('#buser');
    changeColor('#bpass');


    if ($('.inputRed').length > 0) {
        $('#msj').html('Revisa los campos en rojo');
    } else {
        // todo bien
        $('#flogin').submit();






    }
    /*var parametros = '&controlador=Usuarios&metodo=loginUser';
    parametros +='&'+$('#flogin').serialize();
    $.ajax({
        url: 'C_Ajax.php',
        type: 'post',
        data: parametros,
        success: function(usuario){

        }
    })*/
}
/*function guardar(){
  $('#nombre').removeClass('inputRed');
  $('.inputGreen').removeClass('inputGreen');
  if ($('#nombre').val()=='' ){
    $('#nombre').addClass('inputRed');
  }else{
    $('#nombre').addClass('inputGreen');
  }

  if ($('#apellido_1').val()=='' ){
    $('#apellido_1').addClass('inputRed');
  }else{
    $('#apellido_1').addClass('inputGreen');
  }

  if ($('#apellido_2').val()=='' ){
    $('#apellido_2').addClass('inputRed');
  }else{
    $('#apellido_2').addClass('inputGreen');
  }
   
   if ($('.inputRed').length>0){
      alert('error');
   }else{
     // todo bien
   }


 }*/
