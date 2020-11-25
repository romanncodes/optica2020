<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class EditarVendedor
{
    public $rut;
    public $estado;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->estado = $_POST['estado'];
    }

    public function editarVendedor()
    {
        session_start();
        if (isset($_SESSION['administrador'])) {
            if ($this->rut == "" || $this->estado == "") {
                echo json_encode(['msg' => 'Complete la información']);
                return;
            }

            $data = ["rut" => $this->rut, "estado" => $this->estado];
            $modelo = new UsuarioModel();
            $count = $modelo->editarVendedor($data);
            if ($count == 1) {
                $state = $this->estado == 0 ? 'Bloqueado' : 'Habilitado';
                echo json_encode(['msg' => "Vendedor $state"]);
            } else {
                echo json_encode(['msg' => 'Error en la BD']);
            }
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}
$obj = new EditarVendedor();
$obj->editarVendedor();
