<?php
echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>';
foreach ($datos as $key => $datosMenu) {
    echo ' <form name="formularioModificarDatosMenu" id="formularioModificarDatosMenu" readonly class="form-control-plaintext">
         <div class="row mx-auto">
                <label for="fMenuId"></label>
                <input type="hidden" name="fMenuId" id="fMenuId" class="form-control col-5"
                       value=' . $datosMenu['idMenu'] . '>
                <div class="col-md-4">
                    <label for="fnombreMenu" id="labelForm">Nombre</label>
                    <input type="text" name="fnombreMenu" id="fnombreMenu" class="form-control col-5"
                           value=' . $datosMenu['nombreMenu'] . '>
                </div>
                <div class="col-md-4">
                    <label for="fposicionMenu">Posición del menú</label>
                    <input type="text" name="fposicionMenu" id="fposicionMenu" class="form-control col-5"
                            value=' . $datosMenu['posicionMenu'] . '>
                            </div> 
                            <div class="col-md-4">
                    <label for="facceso">Tipo de acceso</label>
                    <select id="facceso" name="facceso" class="form-control col-5">
                            value=' . $datosMenu['acceso'] . '>';
    if ($datosMenu['acceso'] == 'P') {
        echo '
                    <option value="P" selected>Publico</option>
                    <option value="NP">No publico</option>
                    <option value="H">Oculto</option></div>';
    } else {
        echo ' <option value="NP" selected>No publico</option>
                               <option value="P">Publico</option>
                                <option value="H">Oculto</option>
                  
                    
                </div>';
    }
    echo '   </select> <button type="button" onclick="actualizarMenu('. $datosMenu['idMenu'] .');" class="btn btn-primary float-lg-right " style="margin-top: 1.5rem">Guardar</button>';
    echo '<button type="button" onclick="cerrarMenu('. $datosMenu['idMenu'] .');" class="btn btn-primary float-lg-right " style="margin-top: 1.5rem; margin-right:4rem">Cerrar</button></div></div></div></div>
    </form>
 
 ';
}