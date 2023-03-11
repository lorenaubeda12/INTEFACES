<script src="js/menu.js"></script>


<?php

echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem"+>
  <div class="card-header">
    Permisos
  </div>
  <div class="card-body">';
echo '<h5 class="card-title">Permisos </h5> 
        <form name="formularioModificarDatosMenu" id="formularioModificarDatosMenu" readonly class="form-control-plaintext">
         <div class="row mx-auto">
         <div class="col-lg-10">';
foreach ($datos as $key => $datosMenu) {
    if ($datosMenu["num_Permiso"] <> null) {
        echo '<div>';
        echo '<p>' . $datosMenu["permiso"] . '
<img src="imagenes/edicion.png" style="width: 3rem; margin-left: 3rem; background: transparent" onclick="vistaEditarPermisos(' . $datosMenu["id_opcion"] . ',' . $datosMenu["id_permiso"] . ')"> 
<img src="imagenes/borrar.png" style="width: 3rem; margin-left: 3rem; background: transparent"  onclick="borrarPermisos(' . $datosMenu["id_opcion"] . ',' . $datosMenu["id_permiso"] . ',\'' . $datosMenu["permiso"] . '\')"><br></p>';
        echo '<div id="editarPermiso' . $datosMenu["id_permiso"] . '"></div>';
    }
    echo '</div>';
}
echo '</div></div>';
echo '   <button type="button" onclick="vistaCrearPermisos(' . $datosMenu['id_opcion'].');" class="btn btn-primary float-lg-right " style=" margin-left:4rem" >Crear Permisos</button>
<button type="button" class="btn btn-secondary float-lg-right refrescar " style="margin-left:4rem" onclick="cerrarMenu(' . $datosMenu['id_opcion'] . ')">Cerrar</button>';
echo ' </div>';


