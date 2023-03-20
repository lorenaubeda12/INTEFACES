<script src="js/usuarios.js"></script>
<script type="text/javascript" src="js/autoCompleteJQ.js"></script>
<link rel="stylesheet" type="text/css" href="css/autoCompleteJQ.css" />
<?php
echo '<h1>Gestión de roles de usuario</h1>';
echo '<div id="AU_fid_Usuario"></div>';

?>
<form id="formularioBuscar" name="formularioBuscar">
    <span style="font-size:1.5em;">Mtto. Menú y permisos</span><br>
    Usuario:
    <div id="div_fid_Usuario" class="div_fid_Usuario">
        <?php
        echo '<div id="AU_fid_Usuario"></div>';
        ?>
    </div>
    <div id="div_EdicionRol" class="divEdicion"></div>

    <input type="text" style="width:1px; border:none;"><br>
    <button type="button" class="btn btn-primary" onclick="buscarRoles();">Buscar</button>
    &nbsp;&nbsp;<span id="msjError" style="color:red"></span>
</form>
<div id="capaResultadosBusqueda"></div>
<div id="capaEdicionNuevo" style="display:none;">

    <script type="text/javascript" >
        comboAutoCompleteJQ('fid_Usuario','Usuarios','comboUsuariosAutoCompleteJQ', 'seleccionadoUsuario','7','20em');
    </script>
<!--/*echo '<div class="card abs-center">
    <h5 class="card-header">Roles</h5>
    <div class="card-body">
        <h5 class="card-title">Busqueda de usuario</h5>
        <form id="formularioBuscarRoles" name="formularioBuscarRoles" class="col-lg-offset-2 abs-center">
            <label for="fnombre">Nombre del usuario</label><br>
            <input type="text" name="fnombre" id="fnombre" placeholder="Texto a buscar" value=""
                   class="form-control col-6 ">
        </form>
        <br>
        <button type="button" onclick="buscarRoles();" style="margin: 0.5rem" class="btn btn-primary ">Buscar</button>
    </div>
</div>';

echo '<div id="rolesUsuario"></div>';*/-->