<script src="js/menu.js"></script>


<?php
echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem"+>

  <div class="card-body">';
foreach ($datos as $key => $datosMenu) {
    echo '<h5 class="card-title">' . $datosMenu["permiso"] . '</h5> 
        <form name="formularioModificarDatosMenu" id="formularioModificarDatosMenu" readonly class="form-control-plaintext">
         <div class="row mx-auto">
         <div class="col-lg-1">
                <label for="fMenuId">ID</label>
                <input name="fMenuId" id="fMenuId" class="form-control col-5" readonly
                       value=' . $datosMenu['idMenu'] . '>
                       </div>
                <div class="col-lg-2">
                    <label for="fnombreMenu" id="labelForm">Nombre</label>
                    <input type="text" name="fnombreMenu" id="fnombreMenu" class="form-control col-6""
                           value=' . $datosMenu['nombreMenu'] . '>
                </div>
                <div class="col-lg-2">
                    <label for="fposicionMenu">Posición del menú</label>
                    <input type="text" name="fposicionMenu" id="fposicionMenu" class="form-control col-4"
                            value=' . $datosMenu['posicionMenu'] . '>
                            </div> 
                            <div class="col-lg-3">
                    <label for="ffuncion">Funcion</label>
                    <input type="text" name="ffuncion" id="ffuncion" class="form-control col-20"
                            value=' . $datosMenu['Funcion'] . '>
                            </div> 
                                  <div class="col-lg-2">
                    <label for="forder">Orden del menú</label>
                    <input type="text" name="forder" id="forder" class="form-control col-4"
                            value=' . $datosMenu['orden'] . '>
                            </div> 
 
                            <div class="col-lg-2">
                    <label for="facceso">Tipo de acceso</label>
                    <select id="facceso" name="facceso" class="form-control col-8">
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
    echo '   </select>
   </div>
    <button type="button" onclick="actualizarMenu(' . $datosMenu['idMenu'] . ');" class="btn btn-primary float-lg-right " style="margin-top: 2rem">Guardar</button>
   <button type="button" class="btn btn-primary float-lg-right refrescar " style="margin-top: 2rem; margin-left:4rem" onclick="cerrarMenu(' . $datosMenu['idMenu'] . ')">Cerrar</button>
   </div>
   </div>
   </div>
    </form>
    
 
 ';
}