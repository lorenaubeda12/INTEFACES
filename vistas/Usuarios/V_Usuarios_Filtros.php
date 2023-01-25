<script src="js/usuarios.js"></script>


<br>
<!-- <form id="formularioBuscar" name="formularioBuscar" class="col-lg-offset-2 abs-center">-->

<div class="card abs-center">
    <h5 class="card-header">Filtros</h5>
    <div class="card-body">
        <h5 class="card-title">Busqueda de usuarios</h5>
        <form id="formularioBuscar" name="formularioBuscar" class="col-lg-offset-2 abs-center">
            <label for="ftexto">Filtro por texto</label><br>
            <input type="text" name="ftexto" id="ftexto" placeholder="Texto a buscar" value=""
                   class="form-control col-6 ">
            <label for="factivo">Filtro por actividad</label><br>
            <select id="factivo" name="factivo" class="form-control col-6">
                <option value="T">Todos los usuarios</option>
                <option value="S" selected>Usuarios activos</option>
                <option value="N">Usuarios inactivos</option>
            </select>
        </form>
        <br>
        <button type="button" onclick="buscar();" style="margin: 0.5rem" class="btn btn-primary ">Buscar</button>
        <button type="button" onclick="formularioUser();" style="margin: 0.5rem" class="btn btn-primary ">Añadir
            Usuario
        </button>
    </div>
</div>


<!--<label for="ftexto">Filtro por texto</label><br>
<input type="text" name="ftexto" id="ftexto" placeholder="Texto a buscar" value="" class="form-control col-6 ">
<label for="factivo">Filtro por actividad</label><br>
<select id="factivo" name="factivo" class="form-control col-6">
    <option value="T" >Todos los usuarios</option>
    <option value="S" selected>Usuarios activos</option>
    <option value="N">Usuarios inactivos</option>
</select>
</form>-->

<!--
<button type="button" onclick="buscar();" style="margin: 0.5rem"class="btn btn-primary ">Buscar</button>
<button type="button" onclick="formularioUser();" style="margin: 0.5rem"class="btn btn-primary ">Añadir Usuario</button>-->
<div id="capaResultadosBusqueda" class="container-fluid table"></div>
<div id="capaEdicion" class="container-fluid"></div>


