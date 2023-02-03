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

    public function getVistaEditarMenu($idMenu)
    {
        $prueba = $this->modelo->buscarDatosEditar($idMenu);
        //echo json_encode($prueba);
        Vista::render('vistas/Menu/V_EditarMenu.php', $prueba);

    }

    public function actualizarDatosMenu($datos)
    {
        $prueba = $this->modelo->actualizarDatosMenu($datos);
        Vista::render('vistas/Menu/V_ImprimirDatosMenu.php');

    }

    public function getVistaNuevoMenu()
    {
        Vista::render('vistas/Menu/V_NuevoMenu.php');

    }
}

?>