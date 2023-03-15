<script src="js/usuarios.js"></script>
<?php
echo '<h1>Gestión de roles de usuario</h1>';
echo '<div class="card abs-center">
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

echo '<div id="rolesUsuario"></div>';









?>