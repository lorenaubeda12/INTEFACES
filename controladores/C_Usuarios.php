<?php
//Carga la vista de C_Usuarios filtros
require_once 'controladores/Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Usuarios.php';

class C_Usuarios extends Controlador
{
    private $modelo;

    public function __construct()
    {
        parent::__construct();//ejecutar constructor "padre"
        $this->modelo = new M_Usuarios();
    }

    public function vistaFiltrosUsuarios($parametros)
    {
        // $vis = new Vista();
        // $vis->render('vistas/Usuarios/V_Usuarios_Filtros.php');
        Vista::render('vistas/Usuarios/V_Usuarios_Filtros.php');
    }

    public function buscar($filtros)
    {

        //buscar usuarios filtrados
        $usuarios = $this->modelo->buscarUsuarios($filtros);
        //mostrar listado de usuarios
        Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', $usuarios);

    }


    public function formularioAniadir($parametros)
    {

        Vista::render('vistas/Usuarios/V_Añadir_Usuario.php');
    }

    //Funcion para añadir un user a la db
    public function anadirUser($datos)
    {
        $userDatos = $this->modelo->anadirUsuario($datos);
        if ($userDatos === false) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 2rem">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Correcto!</h4>
             <hr>
            <p>El usuario ha sido añadido de manera correcta</p>
           
            </div>';
            $paginaPrincipal = $this->modelo->buscarUsuarios($datos);
            //echo "Estoy en zona okey";
            Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', $paginaPrincipal);
        } else {
            //echo '<br>No se ha añadido el usuario';
            // $paginaPrincipal = $this->modelo->buscarUsuarios($datos);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 2rem">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Ha habido un error!</h4>
             <hr>
             <p>Usuario ya existente</p>
            <p>El usuario no se ha podido añadir.</p>
          
            </div>';
            Vista::render('vistas/Usuarios/V_Añadir_Usuario.php',);
        }
    }

    //Funcion para mostrar formulario Modificar
    public function formularioModificacion($idUsuario)
    {
        $datosUser = $this->modelo->buscarModificar($idUsuario);
        Vista::render('vistas/Usuarios/V_Usuarios_Editar.php', $datosUser);
    }

    public function actualizarDatos($datos)
    {
        $this->modelo->UpdateDatos($datos);
        echo '<br>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 2rem">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Usuario editado!</h4>
             <hr>
            <p>El usuario llamado ' . $datos['fnombre'] . ', con username: ' . $datos['loginUser'] .
            ' ha sido guardado de manera correcta después de la edicion.</p>
          
            </div>';
        $paginaPrincipal = $this->modelo->buscarUsuarios($datos);
        Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', $paginaPrincipal);
    }

    public function cambiarEstado($id_Usuario)
    {
        $datos = $this->modelo->buscarModificar($id_Usuario);
        $this->modelo->modificarEstado($datos);
        $paginaPrincipal = $this->modelo->buscarUsuarios($datos);
        echo '<br><div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 2rem">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Estado cambiado!</h4>
             <hr>
            <p>El estado del usuario ha sido cambiado</p></div>';
        Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', $paginaPrincipal);
    }

    //login user

    public function loginUser($loginData)
    {
        $datosBase = $this->modelo->buscarUsername($loginData);


    }
    public function obtenerMenu($tipoMenu){
        $prueba = $this->modelo->buscarMenu($tipoMenu);
        Vista::render('vistas/Usuarios/V_MenuIndex.php', $prueba);


    }
}

?>