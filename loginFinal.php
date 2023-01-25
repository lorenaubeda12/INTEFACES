<?php session_start(); //mantener sesion (debe ser lo primero).
require_once 'modelos/M_Usuarios.php';
$buser = "";
$bpass = "";
extract($_POST); // convierte en variables el contenido de Post
$msj = "";
$modelo = new M_Usuarios();
if ($buser != "" && $bpass != "") {
    $modelo->buscarUsername($buser, $bpass);

    ?>

    <?php
}
if (isset($_SESSION['mensajeError'])) { //loguedo
    $msj = "Error";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fromulario</title>
    <link rel="stylesheet" href="librerias/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <script src="librerias/jquery-3.5.1/jquery-3.5.1.js"></script>
    <script src="librerias/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container-fluid as-full" style="background-image: url('Imagenes/backgroundLogin.jpg')">
    <div class="row as-full d-flex justify-content-center">
        <div class="col-5 align-self-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id=""><i class="bi bi-person-circle"></i> Login</h5>
                    <div class="Container-fluid">
                        <span id="smj" name="smj" style="color: red;"><?php echo $msj ?></span>
                        <form id="flogin" name="flogin" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-12" style="margin-left:0.5rem ">
                                    <b>Inicio de sesion</b>
                                </div>
                            </div>
                            <div class="row" style="margin-left:0.2rem ">
                                <div class="form-group col-lg-12 col-md-6">
                                    <label for="buser">Usuario:</label> <br>
                                    <input type="text" id="buser" name="buser" class="form-control"
                                           placeholder="Nombre usuario"
                                           value="" / >
                                </div>
                                <div class="form-group col-lg-12 col-md-8">
                                    <label for="bpass">Contraseña:</label><br>
                                    <input type="text" id="bpass" name="bpass" class="form-control"
                                           placeholder="Introduce Contraseña" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="margin-left:0.5rem ">
                                    <!--<button type="button" onclick="guardar(usuario.value(),contraseña.value());" class=" col-lg-12 btn btn-success">
                                        -->
                                    <button type="button" onclick="loginUser();" class=" col-lg-12 btn btn-success">
                                        Inicio Sesión
                                    </button>
                                    <br>
                                    <br>
                                    <a href="index.php"> <button type="button"  class=" col-lg-12 btn btn btn-danger">
                                        Volver
                                    </button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>
