<?php
require_once 'modelos/M_Menu.php';
$menu = array();
foreach ($datos as $key => $menuDatos) {
    if ($menuDatos['posicionMenu'] == 0) {
        $menu[$menuDatos['idMenu']] = $menuDatos;
        //$menu[$menuDatos['idMenu']] = array();
    } else {
        $menu[$menuDatos['posicionMenu']]['hijos'][] = $menuDatos;
    }
}
echo ' <nav class="navbar navbar-expand-md navbar-dark bg-dark"">
        <a class="navbar-brand " href="index.php" style="color:white;">Inicio</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>';
echo ' <div class="collapse navbar-collapse" id="navbarNavDropdown">';
foreach ($menu as $key => $opcion) {
    if (!isset($opcion['hijos'])) {
        echo '<li class="nav-item" style=" list-style-type:none; color:white;">';
        echo '  <a class="nav-link " href="index.php" style=" list-style-type:none; color:white;">' . $opcion['nombreMenu'] . ' <span class="sr-only">(current)</span></a>';
        echo '</li>';
    } else {
        echo ' <li class="nav-item dropdown" style=" list-style-type:none; color:white;">';
        echo ' <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">';
        echo $opcion['nombreMenu'];
        echo '</a>';
        echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"  style="background-color: #343a40"; color:white;">';
        foreach ($opcion['hijos'] as $desplegable1) {
                echo '<li style="background-color: #343a40"><a class="dropdown-item" onclick="' . $desplegable1["Funcion"] . '" href="#" style="color:white;">' . $desplegable1["nombreMenu"] . '</a></li>';

        }
        echo '</ul>';
        echo '</li>';
    }
}

?>
</ul>
</div>

