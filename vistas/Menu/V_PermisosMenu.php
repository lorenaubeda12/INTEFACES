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
    if($datosMenu["num_Permiso"] <> null){
        echo '<div>';
        echo '<label><input disabled="disabled" type="checkbox" id="cbox1" value='.$datosMenu["num_Permiso"].' checked>'.$datosMenu["permiso"].'
<button type="button" style="border: transparent" class="editar"><img src="imagenes/edicion.png" style="width: 3rem; margin-left: 3rem; background: transparent"  onclick=""></td></tr>
        <button type="button" style="border: transparent" class="borrar"><img src="imagenes/borrar.png" style="width: 3rem; margin-left: 3rem; background: transparent"  onclick=""></td></tr></label>';
    }
    else{

        echo '<div>';
        echo '<label><input disabled="disabled" type="checkbox" id="cbox1" value='.$datosMenu["num_Permiso"].' checked>'.$datosMenu["permiso"].'</label>
<button type="button" style="border: transparent" class="editar"><img src="imagenes/edicion.png" style="width: 3rem; margin-left: 3rem; background: transparent"  onclick=""></td></tr>
        <button type="button" style="border: transparent" class="borrar"><img src="imagenes/borrar.png" style="width: 3rem; margin-left: 3rem; background: transparent"  onclick=""></td></tr><br>';


    }
    echo '</div>';
}


echo '   <button type="button" onclick="actualizarMenu(' . $datosMenu['id_opcion'] . ');" class="btn btn-primary float-lg-right " style=" margin-left:4rem" >Crear Permisos</button>
<button type="button" class="btn btn-primary float-lg-right refrescar " style="margin-top: 2rem; margin-left:4rem" onclick="cerrarMenu(' . $datosMenu['id_opcion'] . ')">Cerrar</button>';
echo ' </div>';