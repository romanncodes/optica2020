<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class CrearVendedor
{
    public $rut;
    public $nombre;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->nombre = $_POST['nombre'];
    }

    public function crearVendedor()
    {
        session_start();
        if (isset($_SESSION['administrador'])) {
            if ($this->rut == "" || $this->nombre == "") {
                echo json_encode(['msg' => 'Complete la información']);
                return;
            }

            $data = ["rut" => $this->rut, "nombre" => $this->nombre];
            $modelo = new UsuarioModel();
            $count = $modelo->crearVendedor($data);
            if ($count == 1) {
                echo json_encode(['msg' => 'Vendedor Creado']);
            } else {
                echo json_encode(['msg' => 'Error en la BD']);
            }
        } else {
            echo json_encode(["msg" => "Acceso Denegado"]);
        }
    }
}
$obj = new CrearVendedor();
$obj->crearVendedor();
