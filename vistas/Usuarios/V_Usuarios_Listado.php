<br>
<?php

$id = 1;
//echo json_encode($datos);
echo '<h5 class="card-header">Listado de usuarios</h5>';
echo '<table class="table table-hover "><thead class="thead-dark"><tr><th scope="col">#</th> 
<th scope="col">Nombre</th> 
<th scope="col">Apellido</th>
<th scope="col">Email</th>
<th scope="col">Username</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
<th scope="col">Cambiar estado</th></thead>';

foreach ($datos as $key => $usuario) {
    echo '<tbody class="bg-light"><tr id="' . $id++ . '">';
    echo '<th scope="row" class="bg-secondary">' . $usuario["id_Usuario"] . '</th><td>' . $usuario["nombre"] . '</td><td>' . $usuario["apellido1"] . '</td><td>' . $usuario["mail"] .
        '</td><td>' . $usuario["login"] . '</td><td>';
    if($usuario["activo"] =="S"){
        echo '<img src="imagenes/activo.png" style="width: 2rem" ></td><td>';

    }else{
        echo '<img src="imagenes/inactivo.png" style="width: 2rem"></td><td>';

    }
    echo'
    <button type="button" style="border: transparent" class="editar"><img src="imagenes/edit.png" style="width: 2rem" onclick="modificarDatos(' . $usuario['id_Usuario'] . ')"></td><td>';

    if($usuario["activo"] =="S"){
        echo '<button type="button" style="border: transparent" class="editar"><img src="imagenes/desactivarPalabra.png" style="width: 7rem" onclick="modificarEstado(' . $usuario['id_Usuario'] . ')"></td></tr>';

    }else{
         echo '<button type="button" style="border: transparent" class="editar"><img src="imagenes/activoPalabra.png" style="width: 6rem" onclick="modificarEstado(' . $usuario['id_Usuario'] . ')"></td></tr>';

    }

}
echo '</table>';

?>