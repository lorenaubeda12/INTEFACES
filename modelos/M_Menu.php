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
            $SQL = "SELECT * FROM menu WHERE  acceso='" . $tipoMenu . "'GROUP BY orden ORDER BY orden;";
            $menuEncontrado = $this->DAO->consultar($SQL);
        } else if ($tipoMenu == 'NP') {
            //echo $tipoMenu;
            $SQL1 = "SELECT * from menu WHERE 1=1 GROUP BY orden ORDER BY orden;";
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


    public function buscarDatosEditar($menu)
    {
        $idMenu = '';
        extract($menu);
        // echo $idMenu['idMenu'];
        $SQL = "SELECT * FROM menu WHERE 1=1 AND idMenu='" . $idMenu . "';";
        // echo $SQL;
        $menuEncontrado = $this->DAO->consultar($SQL);
        return $menuEncontrado;
    }

    public function buscarDatosPermisos($idOpcion)
    {
//        echo json_encode($idOpcion);
//        echo $idOpcion['idMenu'];
        // echo $idMenu['idMenu'];
        $SQL = "SELECT * FROM permisos WHERE 1=1 AND id_opcion='" . $idOpcion['idMenu'] . "'ORDER BY num_Permiso;;";
        //echo $SQL;
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
        $forder = '';
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
        if ($forder != '') {
            $SQL .= " ,orden='$forder'";
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
             <h4 class="alert-heading">¡Datos actualizados!</h4>
             <hr>
            <p>Los datos referentes a  ' . $fnombreMenu . ', han sido actualizados correctamente.
            <!--<button class="refrescar">Refrescar</button>--></p>
            </div>';
        //return $datos;
    }

    public function modificarPermisos($datosPermisos)
    {
        $fPermisoID = '';
        $fnombrePermiso = '';
        $fidPermisoOpcion = '';
        $fnumPermiso = '';


        extract($datosPermisos);

        $datos = array();
        $SQL = "UPDATE permisos SET ";
        //echo $loginUser;
        if ($fnombrePermiso != '') {
            $SQL .= "permiso='$fnombrePermiso'";
        }
        if ($fidPermisoOpcion != '') {
            $SQL .= " ,id_opcion='$fidPermisoOpcion'";
        }
        if ($fnumPermiso != '') {
            $SQL .= " ,num_permiso='$fnumPermiso'";
        }

        $SQL .= " WHERE id_permiso='$fPermisoID';";
//echo "Esta es la SQL " . $SQL;
        $this->DAO->actualizar($SQL);
        $ActualizarDespuesDe = 5;
        //return $datos;
    }


    public function aniadirMenu($datosNuevo)
    {
        $fMenuId = '';
        $ffuncion = '';
        $fnombreMenu = '';
        $fposicionMenu = '';
        $faccess = '';
        $forder = '';
        extract($datosNuevo);
        $SQL = "INSERT INTO menu (nombreMenu,posicionMenu,acceso,Funcion,orden) VALUES ('$fnombreMenu','$fposicionMenu','$faccess','$ffuncion','$forder');";
        $idMenus = $this->DAO->insertar($SQL);
        //$SQL= "UPDATE menu SET orden=(orden+1) WHERE orden>$forder;";
        // $this->DAO->actualizar($SQL);

        $SQL1 = "INSERT INTO permisos (id_permiso,id_opcion,num_Permiso,permiso) VALUES ('',$idMenus,1,'Editar')
                                                                     ,('',$idMenus,2,'Consultar')
                                                                     ,('',$idMenus,3,'Crear')
                                                                     ,('',$idMenus,4,'Modificar')
                                                                    ,('',$idMenus,5,'Cambiar Estado');";
        $this->DAO->insertar($SQL1);
        echo '<br>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Datos actualizados!</h4>
             <hr>
            <p>Los datos referentes a  ' . $fnombreMenu . ', han sido actualizados correctamente.
            <!--<button class="refrescar">Refrescar</button>--></p>
            </div>';

    }

    public function buscarPermisos($datos)
    {
        $idOpcion = '';
        $idPermiso = '';
        extract($datos);
        json_encode($idOpcion);
        json_encode($idPermiso);
        $SQL = "SELECT * FROM permisos WHERE 1=1 AND id_opcion='" . $idOpcion . "'AND id_permiso='" . $idPermiso . "';";
        $permisosEncontrados = $this->DAO->consultar($SQL);
        $permisos = array();
//        $permisos['id_opcion'] = $idOpcion;
//        $permisos['nombre_opcion'] = $nombreOpcion;
        return $permisosEncontrados;
    }
    public function buscarPermiso($datos)
    {
        $idOpcion = '';
        extract($datos);
        json_encode($idOpcion);

        $SQL = "SELECT * FROM permisos WHERE 1=1 AND id_opcion='" . $idOpcion . "';";
        $permisosEncontrados = $this->DAO->consultar($SQL);
        $permisos = array();
//        $permisos['id_opcion'] = $idOpcion;
//        $permisos['nombre_opcion'] = $nombreOpcion;
        return $permisosEncontrados;
    }

    public function borrarPermisos($datos)
    {
        $idOpcion = '';
        $idPermiso = '';
        $tipoPermiso = '';
        extract($datos);
        json_encode($idOpcion);
        json_encode($idPermiso);
        json_encode($tipoPermiso);
        $SQL = "DELETE FROM permisos WHERE 1=1 AND id_opcion='" . $idOpcion . "'AND id_permiso='" . $idPermiso . "' AND permiso='" . $tipoPermiso . "';";
        $permisosEncontrados = $this->DAO->borrar($SQL);
        $permisos = array();
//        $permisos['id_opcion'] = $idOpcion;
//        $permisos['nombre_opcion'] = $nombreOpcion;
        return $permisosEncontrados;
    }
}

?>