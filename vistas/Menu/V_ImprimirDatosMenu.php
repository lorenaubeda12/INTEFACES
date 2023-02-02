<script src="js/menu.js"></script>
<link rel="stylesheet" href="css/Menu.css"></link>

<?php

function imprimirDatos($datos, $id, $tipo)
{
    echo '<div class="list-group ">';
    if ($tipo == "principal") {
        echo '<p href="#" class="list-group-item list-group-item-action list-group-item-primary">' . $datos;
        echo '<button  type="button" style="margin-left: 2rem"  class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample1"  role="button" aria-expanded="false" onclick="getVistaEditar(' . $id . ') ;">EDITAR</button>
        <button  type="button" style="margin-left: 1rem"  class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample1"  role="button" aria-expanded="false" onclick="">NUEVO</button>
        </p>';
    }
    if ($tipo == "hijos") {

        echo '    <p class="list-group-item list-group-item-action list-group-item-info hijos">' . $datos;
        echo '<button  type="button" style="margin-left: 2rem"  class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample1"  role="button" aria-expanded="false" onclick="getVistaEditar(' . $id . ') ;">EDITAR</button>
            <button  type="button" style="margin-left: 1rem"  class="btn btn-secondary" data-toggle="collapse" href="#multiCollapseExample1"  role="button" aria-expanded="false" onclick="getVistaNuevo(' . $id . ')">NUEVO</button>
            </p>';
    }
    echo '</div>';
    echo '  <div id="resultados' . $id . '" class="menus"></div>';
    echo '  <div id="capa' . $id . '" class="menu"></div>';


}

?>
