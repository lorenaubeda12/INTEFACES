<?php
//Carga la vista de C_Usuarios filtros
require_once 'controladores/Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Menu.php';


class C_Menu extends Controlador
{
    private $modelo;

    public function __construct()
    {
        parent::__construct();//ejecutar constructor "padre"
        $this->modelo = new M_Menu();
    }

    public function obtenerMenu($tipoMenu)
    {
        $prueba = $this->modelo->buscarMenu($tipoMenu);
        Vista::render('vistas/Menu/V_MenuIndex.php', $prueba);


    }

    public function obtenerVista()
    {
        Vista::render('vistas/Menu/V_FiltradoMenu.php');

    }

    public function obtenerVistaEditar()
    {
        $prueba = $this->modelo->buscarDatos();
        //echo json_encode($prueba);
        Vista::render('vistas/Menu/V_MantenimientoMenu.php', $prueba);

    }

    public function obtenerVistaUsuarios()
    {
        $prueba = $this->modelo->buscarDatos();
        //echo json_encode($prueba);
        Vista::render('vistas/Menu/V_UsuariosMenu.php', $prueba);

    }

    public function getVistaEditarMenu($idMenu)
    {
        //echo "Estoy en getVistaEditarMenu";
        $prueba = $this->modelo->buscarDatosEditar($idMenu);
        //echo json_encode($prueba);
        Vista::render('vistas/Menu/V_EditarMenu.php', $prueba);

    }

    public function getVistaPermisos($idMenu)
    {
        //echo "Estoy en getVistaEditarMenu";
        $prueba = $this->modelo->buscarDatosPermisos($idMenu);
        //echo json_encode($prueba);
        Vista::render('vistas/Menu/V_PermisosMenu.php', $prueba);

    }

    public function actualizarDatosMenu($datos)
    {
        $prueba = $this->modelo->actualizarDatosMenu($datos);
        Vista::render('vistas/Menu/V_ImprimirDatosMenu.php');

    }

    public function modificarPermiso($datos)
    {
        $prueba = $this->modelo->modificarPermisos($datos);
        Vista::render('vistas/sucess.php');

    }

    public function getVistaNuevoMenu($idMenu)
    {
        Vista::render('vistas/Menu/V_NuevoMenu.php', $idMenu);

    }

    public function aniadirNuevoMenu($datosNuevos)
    {

        $this->modelo->aniadirMenu($datosNuevos);
        Vista::render('vistas/Menu/V_ImprimirDatosMenu.php');


    }


    public function verCapaEditarPermisos($datos)
    {


        $datosPermiso = $this->modelo->buscarPermisos($datos);
        Vista::render('vistas/Menu/V_EditarPermiso.php', $datosPermiso);

    }

    public function borrarPermiso($datos)
    {

        $datosPermiso = $this->modelo->borrarPermisos($datos);
        Vista::render('vistas/sucess.php');

    }

    public function verCapaCrearPermiso($datos)
    {

        Vista::render('vistas/Menu/V_crearPermisos.php',$datos);

    }
    public function crearPermisoMenu($datos)
    {

        $datosPermiso = $this->modelo->crearPermiso($datos);
        if ($datosPermiso ==1) {
            Vista::render('vistas/sucess.php');
        } else {
            Vista::render('vistas/error.php');
        }

    }


    public function buscarPermiso($datos)
    {

        $datosPermiso = $this->modelo->buscarPermiso($datos);
        Vista::render('vistas/Menu/V_PermisosMenu.php',$datosPermiso);

    }

    public function buscarRoles($datos)
    {

        $datosPermiso = $this->modelo->buscarRoles($datos);

        if($datosPermiso == 0)
        {
            Vista::render('vistas/error2.php');
        }
        else
        {
         Vista::render('vistas/Menu/V_RolesUsuario.php',$datosPermiso);


        }


    }
}

?>