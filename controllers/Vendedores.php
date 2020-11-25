<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class Vendedores
{

    public function getVendedores()
    {
        $modelo = new UsuarioModel();
        echo json_encode($modelo->getVendedores());
    }
}

$obj = new Vendedores();
$obj->getVendedores();
