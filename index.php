<?php session_start(); //mantener sesion (debe ser lo primero)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="manifest" href="manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color">
    <title>Formulario Básico</title>
    <script src="librerias/jquery-3.5.1/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="librerias/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <script src="librerias/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/usuarios.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/1.0.1/pure-min.css">
</head>

<body>
<div class="container-fluid" id="capaPagina">
    <div class="container-fluid" id="capaEncabezadoPagina">
        <div class="row">
            <div class="col-lg-2 col-md-2 d-none d-md-block">
                <img src="Imagenes/logo.png" style="height: 5em;">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-10 d-sx-block" style="text-align:center">
                <h1>Lorena Blasco</h1>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 d-none d-sm-block text-right">
                <!--  <?php
                if (isset($_SESSION['usuario'])) { //loguedo
                    echo '<b>' . $_SESSION['usuario'] . '</b><br>';
                    echo '<a href="logout.php" title="Cerrar sesión"><img class="mt-1 mr-1" src="Imagenes/logout.png" style="height:2em;"></img>  </a>';
                } else {
                    echo '<a href="loginFinal.php" title="Iniciar sesión"><img class="mt-2" src="Imagenes/login.png" style="height:3em;"></img>  </a>';
                }
                ?>-->
            </div>
        </div>
    </div>
    <div class="container-fluid" id="capaMenu">
        <?php if (isset($_SESSION['usuario'])) { //abro if en php (si logueado) //es.cooltext.com?>
            <!--  <nav class="navbar navbar-expand-md navbar-dark bg-dark"">
            <a class="navbar-brand " href="index.php">Inicio</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
            <?php
            require_once 'controladores/C_Usuarios.php';
            $Controlador = new C_Usuarios();
            $Controlador->obtenerMenu("NP");

            ?>

            <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark"">
             <a class="navbar-brand" href="index.php">Inicio</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                     aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNavDropdown">
                 <ul class="navbar-nav">
                     <li class="nav-item active ">
                         <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php">Features</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php">Pricing</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Mantenimiento
                         </a>
                         <div class="dropdown-menu desplegable " aria-labelledby="navbarDropdownMenuLink">
                             <a class="dropdown-item" onclick="getVista('Usuarios','vistaFiltrosUsuarios');" href="#" style="color:white;">Usuarios</a>
                             <a class="dropdown-item" href="#" style="color:white;">Another action</a>
                             <a class="dropdown-item" href="#" style="color:white; ">Something else here</a>
                         </div>
                     </li>

                 </ul>

             </div>-->
            <div class="d-flex align-items-center">
                <?php
                if (isset($_SESSION['usuario'])) { //loguedo
                    echo '<b style="color: white">' . $_SESSION['usuario'] . '&nbsp&nbsp</b>';
                    echo ' <a href="logout.php" title="Cerrar sesión"> <button type="button" class="btn btn-primary me-3">Cerrar Sesión</button></a>';

                } else {
                    echo '<a href="loginFinal.php" title="Iniciar sesión"><button type="button" class="btn btn-primary me-3">Iniciar Sesión</button></a>';
                }
                ?>
            </div>
            </nav>
        <?php } else if (!isset($_SESSION['usuario'])) {//cierro if y abro else en php (si no logueado)?>
            <?php
            require_once 'controladores/C_Usuarios.php';
            $Controlador = new C_Usuarios();
            $Controlador->obtenerMenu("P");

            ?>
            <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark"">
             <a class="navbar-brand " href="index.php">Inicio</a>
             <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                     aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNavDropdown">
                 <ul class="navbar-nav ">
                     <li class="nav-item active ">
                         <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php">Features</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php">Pricing</a>
                     </li>
                     <li>

                     </li>
                 </ul>
             </div>-->
            <div class="d-flex align-items-center">
                <?php
                if (isset($_SESSION['usuario'])) { //loguedo
                    echo '<b>' . $_SESSION['usuario'] . '</b><br>';
                    echo ' <a href="logout.php" title="Cerrar sesión"><button type="button" class="btn btn-primary me-3">Cerrar Sesión</button></a>';

                } else {
                    echo ' <a href="loginFinal.php" title="Cerrar sesión"><button type="button" class="btn btn-primary me-3">Iniciar Sesión</button></a>';
                }
                ?>
            </div>
            </nav>
            <?php /*fin sino logueado*/
        } ?>
    </div>
    <div class="container-fluid" id="capaContenido">

    </div>
</div>

<!--no espera a que cargue todoynotenemos que esperar -->
<script src="pwa.js" async></script>
</body>
</html>