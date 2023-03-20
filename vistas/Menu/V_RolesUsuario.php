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
         <div class="col-lg-10">
         <div id="nombreUsuarioElegido"></div>';
foreach ($datos as $key => $datosMenu) {
        echo '<div>';
        echo '<p>' . $datosMenu["id_Rol"] . ' : ' . $datosMenu["rol"] . '</p>';

}



