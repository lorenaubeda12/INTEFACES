<?php
echo '<a href="#" class="list-group-item list-group-item-action active" style="margin-top: 2rem; margin-bottom: 1rem">Gestion</a>';
require_once 'modelos/M_Menu.php';
require_once 'V_ImprimirDatosMenu.php';
$menu = array();

foreach ($datos as $key => $menuDatos) {
    if ($menuDatos['posicionMenu'] == 0) {
        $menu[$menuDatos['idMenu']] = $menuDatos;
        //$menu[$menuDatos['idMenu']] = array();
    } else {
        $menu[$menuDatos['posicionMenu']]['hijos'][] = $menuDatos;
    }
}
echo '<div class="list-group">';
foreach ($menu as $key => $opcion) {
    imprimirDatos($opcion['nombreMenu'], $opcion['idMenu'], "principal");
    if (isset($opcion['hijos'])) {
        foreach ($opcion['hijos'] as $desplegable1) {
            imprimirDatos($desplegable1['nombreMenu'], $desplegable1['idMenu'], "hijos");
            echo '</div>';
        }
    }
}

?>

</div>

