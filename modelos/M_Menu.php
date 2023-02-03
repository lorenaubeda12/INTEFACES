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

        $SQL = "SELECT * FROM menu ;";
        $menuEncontrado = $this->DAO->consultar($SQL);
        return $menuEncontrado;
    }


    public function buscarDatosEditar($idMenu)
    {
        // echo $idMenu['idMenu'];
        $SQL = "SELECT * FROM menu WHERE 1=1 AND idMenu='" . $idMenu["idMenu"] . "';";
        // echo $SQL;
        $menuEncontrado = $this->DAO->consultar($SQL);
        return $menuEncontrado;
    }

    public function actualizarDatosMenu($datosMenu)
    {
        $fMenuId = '';
        $ffuncion = '';
        $fnombreMenu = '';
        $fposicionMenu = '';
        $facceso = '';
        extract($datosMenu);

        $datos = array();
        $SQL = "UPDATE menu SET ";
        //echo $loginUser;
        if ($fnombreMenu != '') {
            $SQL .= "nombreMenu='$fnombreMenu'";
        }

        if ($fposicionMenu != '') {
            $SQL .= " ,posicionMenu='$fposicionMenu'";
        }
        if ($facceso != '') {
            $SQL .= " ,acceso='$facceso'";
        }
        if ($ffuncion != '') {
            $SQL .= " ,Funcion='$ffuncion'";
        }

        $SQL .= " WHERE idMenu='$fMenuId';";
//echo "Esta es la SQL " . $SQL;
        $this->DAO->actualizar($SQL);
        $ActualizarDespuesDe = 5;
        echo '<br>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Datos actulizados!</h4>
             <hr>
            <p>Los datos referentes a  ' . $fnombreMenu . ', han sido actualizados correctamente.
            <!--<button class="refrescar">Refrescar</button>--></p>
            </div>';
        //return $datos;
    }


    public function aniadirMenu($datosNuevo)
    {
        $fMenuId = '';
        $ffuncion = '';
        $fnombreMenu = '';
        $fposicionMenu = '';
        $facceso = '';
        extract($datosNuevo);

        $datos = array();
        $SQL = "INSERT INTO menu (nombreMenu,posicionMenu,acceso,Funcion) VALUES ('$fnombreMenu','$fposicionMenu','$facceso','$ffuncion');";
        //echo "Esta es la SQL " . $SQL;
        $this->DAO->actualizar($SQL);
        return $datos;
    }
}

?>