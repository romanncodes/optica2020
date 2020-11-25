<?php

namespace models;

require_once("Conexion.php");

class UsuarioModel
{

    public function loginAdmin($rut, $clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario where rut=:A AND clave=:B AND rol='administrador' and estado = 1 ");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function loginVendedor($rut, $clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario where rut=:A AND clave=:B AND rol='vendedor' and estado = 1 ");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getVendedores()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario where  rol='vendedor'");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function crearVendedor($data)
    {
        $stm = Conexion::conector()->prepare("insert into usuario values(:A,:B,'vendedor', md5('123456'), 1)");
        $stm->bindParam(":A", $data['rut']);
        $stm->bindParam(":B", $data['nombre']);
        return $stm->execute();
    }

    public function editarVendedor($data)
    {
        $stm = Conexion::conector()->prepare("update usuario set estado=:A where rut=:B");
        $stm->bindParam(":A", $data['estado']);
        $stm->bindParam(":B", $data['rut']);
        return $stm->execute();
    }
}
