<script src="js/usuarios.js"></script>
<script type="text/javascript" src="js/autoCompleteJQ.js"></script>
<link rel="stylesheet" type="text/css" href="css/autoCompleteJQ.css"/>
<?php

echo '<h1>Gestión de roles de usuario</h1>';
echo '<div class="card">
    <div class="card-body">';
echo '
<form id="formularioBuscar" name="formularioBuscar">
    <label for="fid_Rol">Rol</label>
    <select id="fid_Rol" class="form-control col-lg-3">
        <option value="">Selecciona</option>
        <option value="2" >Usuario básico</option>
        <option value="1">Administrador</option>
        <option value="3">Gestor</option>
        <option value="4">Editor</option>
    </select>
    <br>
   <p>Usuario: </p>
 <div id="AU_fid_Usuario"></div>
    <div id="div_fid_Usuario" class="div_fid_Usuario">
       <div id="AU_fid_Usuario"></div>
       </div>
   ';
?>
</form>
<?php
echo '
<br>
<button type="button" class="btn btn-primary" onclick="buscarRoles();">Buscar</button>
<img src="imagenes/add_roles.png" style="width: 2rem; margin-left: 3rem; background: transparent" onclick="vistaNuevosRoles()">
<img src="imagenes/delete_roles.png" style="width: 2rem; margin-left: 3rem; background: transparent"  onclick="borrarRoles()">
<img src="imagenes/edit_roles.png" style="width: 2rem; margin-left: 3rem; background: transparent" onclick="vistaEditarRoles()"><br></p>';

?>
</div></div>
<br>

<div id="capaResultadosBusqueda"></div>

<script type="text/javascript">
    comboAutoCompleteJQ('fid_Usuario', 'Usuarios', 'comboUsuariosAutoCompleteJQ', 'seleccionadoUsuario', '7', '20em');
</script>
