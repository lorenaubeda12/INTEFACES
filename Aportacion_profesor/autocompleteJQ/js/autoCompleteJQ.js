//function comboAutoCompleteJQ(nombrecombo, controlador, metodo, funcionchange, filas, ancho, parametros) 
function comboAutoCompleteJQ(nombrecombo, controlador, metodo, funcionchange, filas, ancho) {
	var dirBase='/2si_casa';
	
    var splitSeleccionado;
	var teclaVirtual=false;
	//Obtener los parametros (por separado)
	/*  ejemplo de tratar parametos
    var variables=parametros.split('&');
	var pares;
	for(var i=0; i<variables.length; i++){
		pares=variables[i].split('=');
		if(pares[0]=='tabindex') ntabindex=pares[1];
	}
	ntabindex=parseInt(ntabindex);
    */
	//Combo autocomplete de pantalla	 
        //si existe borrarlo 
	    $('#'+nombrecombo+'auto').remove();
        //crearlo
	    //$('<input>').attr({id: nombrecombo+'auto', name: nombrecombo+'auto', type:'text',  tabindex:ntabindex, autocomplete:'off'}).appendTo('#AU_'+nombrecombo);
	    $('<input>').attr({id: nombrecombo+'auto', name: nombrecombo+'auto', type:'text',  autocomplete:'off'}).appendTo('#AU_'+nombrecombo);
	    $('#'+nombrecombo+'auto').addClass('acInput');
        //color de fondo de seleccionado o no
	    $('#'+nombrecombo+'auto').addClass('acNOselected');
	    $('#'+nombrecombo+'auto').removeClass('acSelected');
	    $('#'+nombrecombo+'auto').css({width: ancho});
	

    //div desplegable
    $('<div>').attr({id: nombrecombo+'desp', name: nombrecombo+'desp', style: 'display:none;'}).appendTo('#AU_'+nombrecombo);
    $('#'+nombrecombo+'desp').addClass('acDes');

	//input de texto selecccionado
	$('#'+nombrecombo+'Nombre').remove();
	$('<input>').attr({id: nombrecombo+'Nombre', name: nombrecombo+'Nombre', type:'hidden'}).appendTo('#AU'+nombrecombo);
	
	//input de id seleccionado
	$('#'+nombrecombo).remove();
	$('<input>').attr({id: nombrecombo, name: nombrecombo,type:'hidden'}).appendTo('#AU_'+nombrecombo);

    $('#'+nombrecombo+'auto').keyup(function(pulsado){
        if(pulsado.isComposing || pulsado.keyCode===229){
            //alert('teclado virtual');
            teclaVirtual=true;
        }
        if($('#'+nombrecombo+'auto').val().length >1){

            tecla = ( ( typeof( pulsado.charCode ) == 'undefined' || pulsado.charCode === 0 ) ? pulsado.keyCode : pulsado.charCode );
			teclacc = String.fromCharCode(tecla);
  
            /* tecla de escape o tabulador */
            if (tecla == 27) {
                //alert('tecla0:'+tecla);
                if($('#'+nombrecombo+'auto').val()!=$('#'+nombrecombo+'Nombre').val() 
                    || $('#'+nombrecombo).val()==''){ //no seleccionado valor, quitar texto
                        if($('#'+nombrecombo+'auto').hasClass('acSelected')){ //deja de estar seleccionado
                            if(funcionchange!='' && eval('typeof '+funcionchange)=='function'){
                                eval(''+funcionchange+"()");
                            }
                        }
                        $('#'+nombrecombo).val('');
                        $('#'+nombrecombo+'Nombre').val('');
                        $('#'+nombrecombo+'auto').val('');
                        $('#'+nombrecombo+'auto').removeClass('acSelected');
                        $('#'+nombrecombo+'auto').addClass('acNOselected');
                }else{ //salimos con valor seleccionado
                    $('#'+nombrecombo+'auto').removeClass('acNOselected');
                    $('#'+nombrecombo+'auto').addClass('acSelected');
                }
            }

            /* tecla de return */
            if (tecla == 13) {
                if ($('#'+nombrecombo+'desp li.acLiSelected').length == 0){ //no hay elemento seleccionado
                    //$('#'+nombrecombo+'auto').val('');
                    $('#'+nombrecombo).val('');
                    $('#'+nombrecombo+'Nombre').val('');
                    $('#'+nombrecombo+'auto').removeClass('acSelected');
                    $('#'+nombrecombo+'auto').addClass('acNOselected');
                }else{ //hay elemento seleccionado
                    indice = $('#'+nombrecombo+'desp li.acLiSelected').index();
                    splitSeleccionado=$($('#'+nombrecombo+'desp li')[indice]).attr("rel").split('_');
                    $('#'+nombrecombo+'auto').val(splitSeleccionado[1]);
                    $('#'+nombrecombo).val(splitSeleccionado[0]);
                    $('#'+nombrecombo+'Nombre').val(splitSeleccionado[1]);
                    $('#'+nombrecombo+'auto').addClass('acSelected');
                    $('#'+nombrecombo+'auto').removeClass('acNOselected');
                    //ejecutar funcion al seleccionar    
                    if(funcionchange!='' && eval('typeof '+funcionchange)=='function'){
                        eval(''+funcionchange+"()");
                    }
                }
                $('#'+nombrecombo+'desp').html(''); //quitar desplegable
            }

            if ( 
                ( (teclacc.match(/[a-zA-Z0-9_\- ]/) || tecla == 8 || tecla == 46 || tecla == 192)
                    && tecla != 13 && tecla != 27 && tecla != 38 && tecla != 40
             ) || teclaVirtual ){

                if($('#'+nombrecombo+'auto').hasClass('acSelected')){ //deja de estar seleccionado
                    if(funcionchange!='' && eval('typeof '+funcionchange)=='function'){
                        eval(''+funcionchange+"()");
                    }
                }

                $('#'+nombrecombo+'auto').removeClass('acSelected');
                $('#'+nombrecombo+'auto').addClass('acNOselected');
                $('#'+nombrecombo).val('');
                $('#'+nombrecombo+'desp').html(''); //quitar desplegable
                $.ajax({
                    type: "GET",
                    url: dirBase+'/C_ajax.php',
                    data:'query='+$(this).val()+'&metodo='+metodo+'&controlador='+controlador+'&filas='+filas,
                    beforeSend: function(){
                        //$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                        $('#'+nombrecombo+'desp').show();
                        $('#'+nombrecombo+'desp').html(data);

                        $('#'+nombrecombo+'desp li').click(
                            function(){
                                splitSeleccionado=$(this).attr("rel").split('_');
                                $('#'+nombrecombo+'auto').val(splitSeleccionado[1]);
                                $('#'+nombrecombo).val(splitSeleccionado[0]);
                                $('#'+nombrecombo+'Nombre').val(splitSeleccionado[1]);
                                $('#'+nombrecombo+'auto').addClass('acSelected');
                                $('#'+nombrecombo+'auto').removeClass('acNOselected');
                                $('#'+nombrecombo+'desp').html(''); //quitar desplegable
                                //ejecutar funcion al seleccionar    
                                if(funcionchange!='' && eval('typeof '+funcionchange)=='function'){
                                    eval(''+funcionchange+"()");
                                }
                            }
                        );
                    }
                });
            }

            if (tecla == 38 || tecla == 40){ /* tecla de cursores de arriba y abajo. */
                if ($('#'+nombrecombo+'desp li.acLiSelected').length == 0) { //no esta ningun elemento seleccionado
                    if (tecla == 38) {
                        $($('#'+nombrecombo+'desp li')[$('#'+nombrecombo+'desp li').length - 1]).addClass('acLiSelected');
                    } else {
                        $($('#'+nombrecombo+'desp li')[0]).addClass('acLiSelected');
                    }
                } else { //ya hay un elemento seleccionado
                    indice = $('#'+nombrecombo+'desp li.acLiSelected').index();
                    $($('#'+nombrecombo+'desp li')[indice]).removeClass('acLiSelected');
                    if (tecla == 38){ //flecha arriba
                        indice--;
                    }else{ //flecah abajo
                        indice++;
                    }
                    $($('#'+nombrecombo+'desp li')[indice]).addClass('acLiSelected');
                }
            }
            //console.log('tecla:'+tecla);
            if (tecla == 8 || tecla == 46){ /* borrado hacia atras o del */
                $('#'+nombrecombo+'auto').addClass('acNOselected');
                $('#'+nombrecombo).val('');
                $('#'+nombrecombo+'auto').removeClass('acSelected');
            }
            
        }else{ //fin if minimo 2 caracteres
            $('#'+nombrecombo+'desp').html(''); //quitar desplegable
            $('#'+nombrecombo).val('');
        }
	});
}

