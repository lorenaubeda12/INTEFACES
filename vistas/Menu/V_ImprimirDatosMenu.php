<?php
function imprimirDatos($datos,$id){
    echo '<div>';
    echo ' <h4>' . $datos . '</h4>
                              <button type="button" class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" onclick="getVistaEditar('.$id.');">EDITAR</button>
                                <div id="capa'.$id.'"></div>
                           </div>';
    echo '</div>';
}
?>
