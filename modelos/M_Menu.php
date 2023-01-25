<?php

//Llamar
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';

class M_Menu extends Modelo
{
    private $DAO;

    public function __construct()
    {
        parent::__construct();
        $this->DAO = new DAO();
    }


    public function buscarMenu($tipoMenu)
    {
        $accesso = '';
        $usuarios = array();
        $menuEncontrado = '';
        // echo @$tipoMenu;
        if ($tipoMenu == 'P') {
            $SQL = "SELECT * FROM menu WHERE  acceso='" . $tipoMenu . "';";
            $menuEncontrado = $this->DAO->consultar($SQL);
        } else if ($tipoMenu == 'NP') {
            //echo $tipoMenu;
            $SQL1 = "SELECT * FROM menu WHERE 1=1 ;";
            $menuEncontrado = $this->DAO->consultar($SQL1);
        }
        return $menuEncontrado;
    }

    public function buscarDatos()
    {
        $accesso = '';
        $usuarios = array();
        $menuEncontrado = '';
        // echo @$tipoMenu;

        $SQL = "SELECT * FROM menu ;";
        $menuEncontrado = $this->DAO->consultar($SQL);
        return $menuEncontrado;
    }

}

?>