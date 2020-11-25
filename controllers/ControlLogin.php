<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");


class ControlLogin
{
    public $rut;
    public $clave;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }

    public function login()
    {
        session_start();
        if ($this->rut == "" || $this->clave == "") {
            echo json_encode(['error' => 'Complete la información']);
            return;
        }

        $modelo = new UsuarioModel();
        $arr1 = $modelo->loginAdmin($this->rut, $this->clave);
        $arr2 = $modelo->loginVendedor($this->rut, $this->clave);

        if (count($arr1) == 1) {
            $_SESSION['administrador'] = $arr1[0];
            echo json_encode(['ruta' => 'views/admin/index.php']);
        } else if (count($arr2) == 1) {
            $_SESSION['vendedor'] = $arr2[0];
            echo json_encode(['ruta' => 'views/vendedor/index.php']);
        } else {
            echo json_encode(['error' => 'Usuario no encontrado']);
        }
    }
}

$obj = new ControlLogin();
$obj->login();
