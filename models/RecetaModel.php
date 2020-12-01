<?php

namespace models;

require_once("Conexion.php");;

class RecetaModel
{

    public function insertarReceta($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO receta VALUES(NULL,:tipolente,:esferaoiz,:esferaode,:cilindrooiz,:cilindroode,:ejeoiz,:ejeode,:prisma,:base,

        :armazon,:materialcristal,:tipocristal,

        :distanciapupilar,:valorlente,:fechaentrega,:fecharetiro,:observacion,:rutcliente,:fechavimed,:rutmedico,:nombremedico,:rutusuario,1)");

        $stm->bindParam(":tipolente", $data['tipolente']);
        $stm->bindParam(":esferaoiz", $data['esferaoiz']);
        $stm->bindParam(":esferaode", $data['esferaode']);
        $stm->bindParam(":cilindrooiz", $data['cilindrooiz']);
        $stm->bindParam(":cilindroode", $data['cilindroode']);
        $stm->bindParam(":ejeoiz", $data['ejeoiz']);
        $stm->bindParam(":ejeode", $data['ejeode']);
        $stm->bindParam(":prisma", $data['prisma']);
        $stm->bindParam(":base", $data['base']);
        $stm->bindParam(":armazon", $data['armazon']);
        $stm->bindParam(":materialcristal", $data['materialcristal']);
        $stm->bindParam(":tipocristal", $data['tipocristal']);
        $stm->bindParam(":distanciapupilar", $data['distanciapupilar']);
        $stm->bindParam(":valorlente", $data['valorlente']);
        $stm->bindParam(":fechaentrega", $data['fechaentrega']);
        $stm->bindParam(":fecharetiro", $data['fecharetiro']);
        $stm->bindParam(":observacion", $data['observacion']);
        $stm->bindParam(":rutcliente", $data['rutcliente']);
        $stm->bindParam(":fechavimed", $data['fechavimed']);
        $stm->bindParam(":rutmedico", $data['rutmedico']);
        $stm->bindParam(":nombremedico", $data['nombremedico']);
        $stm->bindParam(":rutusuario", $data['rutusuario']);
        return $stm->execute();
    }

    public function recetasXRut($rut)
    {
        $sql = ' select id_receta "id", tipo_lente, esfera_oi, esfera_od, ';
        $sql .= ' cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base, ';
        $sql .= ' ar.nombre_armazon "armazon", mt.material_cristal, ';
        $sql .= ' tc.tipo_cristal, distancia_pupilar, valor_lente "precio", ';
    }

    public function recetasXFechas($fecha)
    {
    }


    public function getMaterialCristal()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM material_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getArmazones()
    {
    }
    public function getTiposCristal()
    {
    }

    /*
        Mision para el viernes
        1. tener la interfaz ingreso receta con 
            buscar cliente
            el formulario con los combobox cargados desde la base de datos con Vue
        2. terminar la funcion recetas por rut y recetas por fecha en el modelo
        3. crear los controladores para consultar por rut y por fecha    

    */
}
