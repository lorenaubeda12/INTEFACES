<?php

//Llamar
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';

class M_Usuarios extends Modelo
{
    private $DAO;

    public function __construct()
    {
        parent::__construct();
        $this->DAO = new DAO();
    }

    public function buscarUsuarios($filtros)
    {
        $ftexto = "";
        $factivo = "";

        //Coge un array y crea variables por cada valor que llega
        extract($filtros);

        $usuarios = array();
        $SQL = "SELECT * FROM usuario WHERE 1=1 ";
        //echo $SQL;
        if ($factivo != '') {
            $SQL .= " AND activo='$factivo' ";
            //$SQL='AND activo=\''.$factivo.'\'';
        }
        if ($ftexto != '') {

            $arrayTexto = array();
            $arrayTexto = explode(' ', $ftexto);
            $SQL .= " AND ( 1=2 ";
            foreach ($arrayTexto as $palabra) {
                $SQL .= "OR nombre LIKE '%$palabra%' OR mail LIKE '%$palabra%' OR login LIKE '%$palabra%' OR apellido1 LIKE '%$palabra%' OR apellido2 LIKE '%$palabra%' )";

            }

        }

        if ($factivo == "T") {
            $SQL = "SELECT * FROM usuario WHERE 1=1";
        }
        $SQL .= ";";
        //Guarda el contenido del array que trae los datos de la query
        $usuarios = $this->DAO->consultar($SQL);

        return $usuarios;
    }

    public function buscarUsuarios2($filtros = array())
    {
        $ftexto = '';

        $filas = '';//limitar la cantidad de filas a devolver
        extract($filtros);

        $SQL = "SELECT * ";
        $SQL .= "FROM usuario
                WHERE 1=1 ";
        if ($ftexto != '') {

            $arrayTexto = array();
            $arrayTexto = explode(' ', $ftexto);
            $SQL .= " AND ( 1=2 ";
            foreach ($arrayTexto as $palabra) {
                $SQL .= " OR nombre LIKE '%$palabra%' OR mail LIKE '%$palabra%' OR login LIKE '%$palabra%' OR apellido1 LIKE '%$palabra%' OR apellido2 LIKE '%$palabra%'  ";

            }
            $SQL .= " ) ";
        }

        $SQL .= " ORDER BY apellido1, apellido2, nombre, login ";

        if ($filas != '') {
            $SQL .= " LIMIT $filas ";
        }
echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);

        return $usuarios;

    }

    public function UpdateDatos($filtros)
    {
        $fidUsuario = '';
        $fnombre = '';
        $fapellido1 = '';
        $fapellido2 = '';
        $fgenero = '';
        $ffecha = '';
        $fmail = '';
        $fmovil = '';
        $loginUser = '';
        $fpassword = '';
        $festado = '';

        extract($filtros);

        $usuarios = array();
        $SQL = "UPDATE usuario SET ";
        //echo $loginUser;
        if ($fnombre != '') {
            $SQL .= "nombre='$fnombre'";
        }
        if ($fapellido1 != '') {
            $SQL .= " ,apellido1='$fapellido1'";
        }
        if ($fapellido2 != '') {
            $SQL .= " ,apellido2='$fapellido2'";
        }
        if ($ffecha != '') {
            $SQL .= " ,fecha_Alta='$ffecha'";
        }
        if ($fgenero != '') {
            $SQL .= " ,sexo='$fgenero'";
        }
        if ($fmail != '') {
            $SQL .= " ,mail='$fmail'";
        }
        if ($fmovil != '') {
            $SQL .= " ,movil='$fmovil'";
        }
        if ($loginUser != '') {
            $SQL .= " ,login='$loginUser'";
        }
        if ($fpassword != '') {
            $SQL .= " ,password='$fpassword'";
        }

        if ($festado != '') {
            $SQL .= " ,activo='$festado'";
        }
        $SQL .= " WHERE id_Usuario='$fidUsuario';";
        //echo "Esta es la SQL " . $SQL;
        $this->DAO->actualizar($SQL);

    }


    public function anadirUsuario($filtros)
    {
        $fnombre = '';
        $fapellido1 = '';
        $fapellido2 = '';
        $fsexo = '';
        $ffecha = '';
        $fmail = '';
        $fmovil = '';
        $flogin = '';
        $fpassword = '';
        $factivo = '';

        extract($filtros);
        $exists = $this->usernameCheck($flogin);
        if (!$exists) {
            $exists = $this->mailCheck($fmail);
        }
        if (!$exists) {
            $usuarios = array();
            $SQL = "INSERT INTO usuario VALUES (0,'$fnombre','$fapellido1',' $fapellido2','$fsexo','$ffecha','$fmail','$fmovil','$flogin','$fpassword','$factivo') ";
            //echo $SQL;
            $this->DAO->insertar($SQL);
        }
        return $exists;
    }

    public function buscarModificar($filtros)
    {
        $idUsuario = '';
        extract($filtros);
        $usuarios = array();
        //echo $idUsuario;
        $SQL = "SELECT * FROM usuario WHERE 1=1 ";
        // echo $idUsuario . "este usuario";
        if ($idUsuario != '') {
            $SQL .= " AND ID_USUARIO='$idUsuario' ";
        }
        //echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
        return $usuarios;
    }

    public function modificarEstado($datos)
    {
        $activoS = 'S';
        $inactivoN = 'N';
        $id_Usuario = '';
        $activo = '';

        //$usuarios = array();
        extract($datos);


        $id_Usuario = $datos[0]['id_Usuario'];
        $activo = $datos[0]['activo'];

        //echo $id_Usuario . " id y " . $activo . " ES SU ESTADO";


        $SQL = "UPDATE usuario SET ";

        if ($activo == $activoS) {
            $SQL .= "activo='" . $inactivoN . "'";
        } else {
            $SQL .= "activo='" . $activoS . "'";
        }
        $SQL .= " WHERE id_Usuario='$id_Usuario';";
        //echo $SQL;
        $usuarios = $this->DAO->actualizar($SQL);
        return $usuarios;

    }


    public function buscarUsername($buser, $bpass)
    {
        $msj = "Error, usuario equivocado";
        $usuarios = array();
        $SQL = "SELECT * FROM usuario WHERE 1=1 ";
        if ($buser != '') {
            $SQL .= " AND login='$buser' ";
        }
        if ($bpass != '') {

            $SQL .= " AND password=MD5('" . $bpass . "') ";

        }
        $SQL .= ";";
        //echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
        if (!empty($usuarios)) {
            $_SESSION['usuario'] = $buser;
            header('Location: index.php');
            return $buser;
        } else {
            return "Error!";
            $_SESSION['mensajeError'] = $msj;
        }
    }

    private function usernameCheck($flogin)
    {
        $usuarios = array();
        $SQL = "SELECT * FROM usuario WHERE  login='" . $flogin . "';";
        //echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
        if (!empty($usuarios)) {
            return true;
        } else {
            return false;
        }
    }

    private function mailCheck($fmail)
    {
        $usuarios = array();
        $SQL = "SELECT * FROM usuario WHERE  mail='" . $fmail . "';";
        //echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
        if (!empty($usuarios)) {
            return true;
        } else {
            return false;
        }
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

    public function comboUsuariosAutoCompleteJQ($datos)
    {
        //consultar BD, los usuarios
        $datos['usuarios'] = $this->modelo->buscarUsuarios(array('ftexto' => $datos['query'],

                //generar la vista de resultados
                Vista::render('vistas/Usuarios/V_Usuarios_comboAutocomplete.php', $datos)
            )
        );
    }
}

?>