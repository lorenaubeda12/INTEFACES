<?php
require_once 'modelos/M_Menu.php';
require_once 'V_ImprimirDatosMenu.php';
$menu = array();
echo '<div class="panel panel-default">
                        <div  class="card-header">
                            Gestión del menú
                        </div>';
foreach ($datos as $key => $menuDatos) {
    if ($menuDatos['posicionMenu'] == 0) {
        $menu[$menuDatos['idMenu']] = $menuDatos;
        //$menu[$menuDatos['idMenu']] = array();
    } else {
        $menu[$menuDatos['posicionMenu']]['hijos'][] = $menuDatos;
    }
}
 $id=0;
foreach ($menu as $key => $opcion) {
    if (!isset($opcion['hijos'])) {
        echo '<div class="panel-body" style="margin-bottom: 0.2rem; margin-left: 1.7rem">';
        imprimirDatos($opcion['nombreMenu'],$id);
        $id++;
    } else {
        echo '<div class="panel-body" style="margin-bottom: 0.2rem; margin-left: 1.7rem;margin-top: 2rem">';
        imprimirDatos($opcion['nombreMenu'],$id);
        $id++;
        foreach ($opcion['hijos'] as $desplegable1) {
            echo '<div class="panel-body" style="margin-bottom: 1rem; margin-left:6rem;margin-top: 1.5rem">';
           imprimirDatos($desplegable1['nombreMenu'],$id);
            echo '</div>';
            $id++;

        }
    }
}

?>

</div>

