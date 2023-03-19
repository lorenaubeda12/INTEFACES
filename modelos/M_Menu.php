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

    public function buscarDatosUsuarios()
    {

        $SQL = "SELECT * FROM usuario;";
        $usuariosEncontrados = $this->DAO->consultar($SQL);
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

    public function buscarRoles($filtros)
    {
        $fnombre = "";
        extract($filtros);
        $SQL = "SELECT id_Usuario FROM usuario WHERE 1=1 ";
        //echo $SQL;
        if ($fnombre != '') {
            $arrayTexto = array();
            $arrayTexto = explode(' ', $fnombre);
            $SQL .= " AND ( 1=2 ";
            foreach ($arrayTexto as $palabra) {
                $SQL .= "OR nombre LIKE '%$palabra%' OR mail LIKE '%$palabra%' OR login LIKE '%$palabra%' OR apellido1 LIKE '%$palabra%' OR apellido2 LIKE '%$palabra%' )";

            }
            $SQL .= ";";
//        echo $SQL;
            //Guarda el contenido del array que trae los datos de la query
            $id = $this->DAO->consultar($SQL);
            $id_User = $id[0]['id_Usuario'];
//        var_dump($id);
//        echo $id_User;
            if($id_User == null){
               return 0;
            }else{
                $SQL2 = "SELECT id_Permiso FROM permisos_usuario WHERE 1=1 AND id_Usuario='$id_User';";
                $roles = $this->DAO->consultar($SQL2);
                if($roles == null){
                    return 0;
                }else{
                    return $this->verPermisosUsuario($roles);
                }
            }


        }else{
            return 0;
        }

    }


    public function buscarPermiso($datos)
    {
        $idOpcion = '';
        extract($datos);
        json_encode($idOpcion);

        $SQL = "SELECT * FROM permisos WHERE 1=1 AND id_Opcion ='" . $idOpcion . "'ORDER BY num_Permiso;";

        $permisosEncontrados = $this->DAO->consultar($SQL);
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
        if ($permisosEncontrados <> null) {
            echo '<br>';
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
             <h4 class="alert-heading">¡Acción realizada de manera correcta!</h4>
             <hr>
            <p>Se ha procedido de manera correcta con la acción realizada.
            <!--<button class="refrescar">Refrescar</button>--></p>
            </div>';
        }
        return $permisosEncontrados;
    }

    public function crearPermiso($datos)
    {
        $fnPermiso = '';
        $fidOpcion = '';
        $fnumPermisoNuevo = '';
        extract($datos);;
        $SQL = "SELECT * FROM permisos WHERE 1=1 AND permiso='" . $fnPermiso . "'AND num_Permiso='" . $fnumPermisoNuevo . "' AND id_opcion='" . $fidOpcion . "';";
        $permisosEncontrados = $this->DAO->consultar($SQL);

        $SQL2 = "SELECT * FROM permisos WHERE 1=1 AND id_opcion='" . $fidOpcion . "'AND num_Permiso='" . $fnumPermisoNuevo . "';";
        $permisosEncontrados2 = $this->DAO->consultar($SQL2);
        if ($permisosEncontrados == null && $permisosEncontrados2 == null) {
            $SQL = "INSERT INTO permisos (id_permiso,id_opcion,num_Permiso,permiso) VALUES ('',$fidOpcion,$fnumPermisoNuevo,'$fnPermiso');";
            $this->DAO->insertar($SQL);
            return 1;
        } else {
            return 0;
        }

    }

    public function verPermisosUsuario($roles){
        $SQL = "SELECT * FROM roles WHERE 1=1 AND id_Rol IN (";
        foreach ($roles as $rol){
            $SQL .= $rol['id_Permiso'].",";
        }
        $SQL = substr($SQL, 0, -1);
        $SQL .= ");";
//       / echo $SQL;
        $permisos = $this->DAO->consultar($SQL);
        return $permisos;
    }
}

?>