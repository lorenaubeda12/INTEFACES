<?php 
//echo json_encode($_SESSION['permisos']); 
//$datos['roles];
//$datos['usuarios'];
require 'V_Menu_Mtto_Funciones.php';  //contiene las funciones que pintas las opciones y permisos
?>
<script src="js/menus.js"></script> 
<script type="text/javascript" src="js/autoCompleteJQ.js"></script>
<link rel="stylesheet" type="text/css" href="css/autoCompleteJQ.css" />

<form id="formularioBuscar" name="formularioBuscar">
    <span style="font-size:1.5em;">Mtto. Menú y permisos</span><br>
	Usuario:
	<div id="div_fid_Usuario" class="div_fid_Usuario">
		<?php
		/*  //combo usuarios con select
		echo '<label for="fid_Usuario">Usuario:<br>
		</label>
		<select id="fid_Usuario" name="fid_Usuario" class="form-control"
		style="width:25em !important" onchange="seleccionadoUsuario()">
		<option value="">- seleccionar usuario -</option>';
		foreach($datos['usuarios'] as $usuario){
			echo '<option value="'.$usuario['id_Usuario'].'">';
			echo $usuario['apellido_1'].' '.$usuario['apellido_2'].', ';
			echo $usuario['nombre'].'</option>';
		}
		echo '</select>';
		*/
		echo '<div id="AU_fid_Usuario"></div>';
		?>
	</div>
	<?php 
		echo pintaFiltroRoles(array('roles'=>$datos['roles'])); 
	?>
	<div id="div_EdicionRol" class="divEdicion"></div>

	<input type="text" style="width:1px; border:none;"><br>
	<button type="button" class="btn btn-primary" onclick="buscar();">Buscar</button>
	&nbsp;&nbsp;<span id="msjError" style="color:red"></span>
</form>
<div id="capaResultadosBusqueda"></div>
<div id="capaEdicionNuevo" style="display:none;">

<script type="text/javascript" >
	comboAutoCompleteJQ('fid_Usuario','Usuarios','comboUsuariosAutoCompleteJQ', 'seleccionadoUsuario','7','20em'); 
</script>