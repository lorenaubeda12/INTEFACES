<script src="js/menu.js"></script>


<?php
echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem"+>
  <div class="card-header">
    Editar
  </div>
  <div class="card-body">';
foreach ($datos as $key => $datosPermisoElegido) {
    echo '<h5 class="card-title">' . $datosPermisoElegido["permiso"] . '</h5> 
        <form name="formularioModificarDatosMenu" id="formularioModificarDatosMenu" readonly class="form-control-plaintext">
         <div class="row mx-auto">

                <div class="col-lg-4">
                    <label for="fnombrePermiso" id="labelForm">Nombre del permiso</label>
                    <input type="text" name="fnombrePermiso" id="fnombrePermiso" class="form-control col-6""
                           value=' . $datosPermisoElegido['permiso'] . '>
                </div>
                <div class="col-lg-4">
                    <label for="fidPermisoOpcion">ID del menu asignado</label>
                    <input type="text" name="fidPermisoOpcion" id="fidPermisoOpcion" class="form-control col-4"
                            value=' . $datosPermisoElegido['id_opcion'] . '>
                            </div> 
                             <div class="col-lg-4">
                    <label for="fnumPermiso">Numero de permiso</label>
                    <input type="text" name="fnumPermiso" id="fnumPermiso" class="form-control col-4"
                            value=' . $datosPermisoElegido['num_Permiso'] . '>
                            </div>
                            ';
    echo '   </select>
   </div>
    <button type="button" onclick="actualizarMenu(' . $datosPermisoElegido['id_permiso'] . ');" class="btn btn-primary float-lg-right " style="margin-top: 2rem">Guardar</button>
   <button type="button" class="btn btn-primary float-lg-right refrescar " style="margin-top: 2rem; margin-left:4rem" onclick="cerrarPermiso(' . $datosPermisoElegido['id_opcion'] . ')">Cerrar</button>
   </div>
   </div>
   </div>
    </form>
    
 
 ';
}