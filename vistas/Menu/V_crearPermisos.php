<script src="js/menu.js"></script>

<?php
$idOpcion='';
extract($datos);
echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem"+>
  <div class="card-header">
   Crear un nuevo permiso
  </div>
  <div class="card-body">';
    echo '<h5 class="card-title"> Datos del permiso:</h5> 
        <form name="formularioCrearPermiso" id="formularioCrearPermiso" readonly class="form-control-plaintext">
         <div class="row mx-auto">
                <div class="col-lg-4">
                    <label for="fnPermiso" id="labelForm">Nombre del permiso</label>
                    <input type="text" name="fnPermiso" id="fnPermiso" class="form-control col-6">
                </div>
                <div class="col-lg-3">
                    <label for="fidOpcion">ID menu al que asignarlo</label>
                    <input type="text" name="fidOpcion" id="fidOpcion" class="form-control col-4" value="'.$idOpcion.'" readonly>
                            </div> 
                             <div class="col-lg-3">
                    <label for="fnumPermisoNuevo">Numero de permiso</label>
                    <input type="text" name="fnumPermisoNuevo" id="fnumPermisoNuevo" class="form-control col-4" required>
                            </div>
                  
</div>
                            ';
    echo '     <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 3rem">
  <strong>¡Recuerda! </strong> Los tipos de permiso son: 1-Editar, 2-Consultar, 3-Crear, 4-Modificar, 5-Cambiar Estado.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  
   <div id="alertaUsuario'.$idOpcion.'" style="margin-top: 1rem;margin-bottom: 1rem"></div> 
   <div id="alertaUsuario2'.$idOpcion.'" style="margin-top: 1rem;margin-bottom: 1rem"></div> 
  
  
    <button type="button" onclick="crearPermiso(' . $idOpcion. ')" class="btn btn-primary float-lg-right " style="margin-top: 2rem">Crear</button>
   <button type="button" class="btn btn-primary float-lg-right refrescar " style="margin-top: 2rem; margin-left:4rem; margin-right: 2rem" onclick="cerrarMenu(' . $idOpcion. ')">Cerrar</button>
   </div>
   </div>
   </div>
    </form>
  
 
 ';

