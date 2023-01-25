<?php  session_start();
//Recoge los datos de la peticion ajax
$getPost = array_merge($_POST, $_GET, $_FILES);

if (isset($getPost['controlador'])) {
    $controlador=$getPost['controlador'];
    $metodo=$getPost['metodo'];
    $nombreControlador = 'C_'.$controlador;

    if(file_exists('./controladores/'.$nombreControlador.'.php')){
        require_once './controladores/'.$nombreControlador.'.php';

        //Se esta generando un objecto nuevo con C_x
        $objControlador = new $nombreControlador();
           if(!method_exists($objControlador, $metodo)){
               echo 'No hay nada que ejecutar';

            }else{
                //llamar el metodo C_usuario
                $objControlador->$metodo($getPost);
            }

    }else{
        echo 'No lo he encontrado.';
    }


} else {
    echo 'NO se ha podido realizar.';
}

?>
