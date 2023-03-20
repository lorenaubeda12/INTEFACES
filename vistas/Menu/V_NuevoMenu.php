<script src="js/menu.js"></script>
<?php
extract($datos);
echo ' <div class="card" style="margin-left: 3rem; margin-bottom: 2rem; margin-top: 1rem"+>
  <div class="card-header">
    Editar
  </div>
  <div class="card-body">';

echo '<h5 class="card-title">Nuevo</h5> 
        <form name="formularioNuevoMenu" id="formularioNuevoMenu" readonly class="form-control-plaintext">
         <div class="row mx-auto">
                <label for="fMenuId"></label>
                <input type="hidden" name="fMenuId" id="fMenuId" class="form-control col-5">
                <div class="col-lg-3">
                    <label for="fnombreMenu" id="labelForm">Nombre</label>
                    <input type="text" name="fnombreMenu" id="fnombreMenu" class="form-control col-6" style="margin-right: 0rem">
                </div>
                <div class="col-lg-3">
                    <label for="fposicionMenu">Posición del menú</label>
                    <input type="text" name="fposicionMenu" id="fposicionMenu" class="form-control col-4">
                            </div> 
                            <div class="col-lg-2">
                    <label for="forder">Orden del menu</label>
                    <input type="text" name="forder" id="forder" class="form-control col-4">
                        </div>  
                            <div class="col-lg-2">
                    <label for="ffuncion">Funcion</label>
                    <input type="text" name="ffuncion" id="ffuncion" class="form-control col-20">
                            </div> 
                             <div class="col-lg-2">
                    <label for="facceso">Tipo de acceso</label>
                    <select id="facceso" name="facceso" class="form-control col-8">
                    <option value="P" selected>Publico</option>
                    <option value="NP">No publico</option>
                    <option value="H">Oculto</option></div>
                      </select>
   </div>
    <button type="button" onclick="guardarMenu();" class="btn btn-primary float-lg-right " style="margin-top: 2rem">Crear</button>
 <button type="button" class="btn btn-primary float-lg-right refrescar " style="margin-top: 2rem; margin-left:4rem" onclick="cerrarMenu(' . $datos['idMenu'] . ')">Cerrar</button>
   </div>
   </div>
   </div>
    </form>
    
 
 ';
