<?php

namespace models;

require_once("Conexion.php");

class ClienteModel
{

    public function insertarCliente($data)
    {
    }

    public function buscarClienteRut($rut)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM cliente where rut_cliente=:A");
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
