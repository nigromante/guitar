<?php

namespace Domain\infrastructure\repositories\Productos;
use Domain\infrastructure\repositories\DatabaseRepository;


class ProductoDatabaseRepository extends DatabaseRepository implements ProductoRepository
{

    public function All()
    {
        $sql = "SELECT * FROM `Productos` where enable=1 ";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[strtoupper($row['sku'])] = ["id" => $row["id"], "enable" => $row["enable"], "nombre" => $row["nombre"], "descripcion" => $row["descripcion"], "stock" => $row["stock"], "precio" => $row["precio"], "tipo" => $row["tipo"],"imagen" => $row["imagen"]];
        }

        return $response;
    }

    public function Selected()
    {
        $sql = "SELECT `MusicalInstruments`.* FROM `MusicalInstruments` ,  `MusicalInstrumentsSelected` where enable=1 AND `MusicalInstruments`.alias = `MusicalInstrumentsSelected`.alias order by `MusicalInstruments`.alias";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[strtoupper($row['alias'])] = ["id" => $row["id"], "enable" => $row["enable"], "alias" => $row["alias"], "nombre" => $row["name"], "descripcion" => $row["description"]];
        }
        return $response;
    }

    public function NonSelected()
    {
        $sql = "SELECT `MusicalInstruments`.* FROM `MusicalInstruments` left join `MusicalInstrumentsSelected` on `MusicalInstrumentsSelected`.alias = `MusicalInstruments`.alias where enable=1 and `MusicalInstrumentsSelected`.alias is null  order by `MusicalInstruments`.alias";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[strtoupper($row['alias'])] = ["id" => $row["id"], "enable" => $row["enable"], "alias" => $row["alias"], "nombre" => $row["name"], "descripcion" => $row["description"]];
        }
        return $response;
    }



    public function FindByAlias($alias)
    {
        $sql = "SELECT * FROM `MusicalInstruments` where enable=1 and alias='{$alias}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        $response = ["id" => $row["id"], "enable" => $row["enable"], "alias" => $row["alias"], "nombre" => $row["name"], "descripcion" => $row["description"]];

        return $response;
    }

    public function FindById($id)
    {
        $sql = "SELECT * FROM `MusicalInstruments` where enable=1 and id='{$id}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        $response = ["id" => $row["id"], "enable" => $row["enable"], "alias" => $row["alias"], "nombre" => $row["name"], "descripcion" => $row["description"]];

        return $response;
    }

    public function Borrar($id)
    {
        // $sql = "DELETE FROM `MusicalInstruments` where id='{$id}' " ; 
        $sql = "UPDATE `MusicalInstruments` set enable=0  where id='{$id}' ";
        $result = mysqli_query($this->db, $sql);

        return "OK";
    }

    public function Save($data)
    {
        $sql = "INSERT INTO `MusicalInstruments` ( `alias`, `name`, `description`, `createdat` , `enable`) VALUES ( '{$data["alias"]}', '{$data["nombre"]}', '{$data["descripcion"]}',  now(),  '1')";
        $result = mysqli_query($this->db, $sql);

        return "OK";
    }

    public function Update($id, $data)
    {
        $sql = "INSERT INTO `MusicalInstruments` ( `alias`, `name`, `description`, `createdat` , `enable`) VALUES ( '{$data["alias"]}', '{$data["nombre"]}', '{$data["descripcion"]}',  now(),  '1')";
        $sql = "UPDATE `MusicalInstruments` set  `alias` = '{$data["alias"]}'  , `name` = '{$data["nombre"]}' , `description` = '{$data["descripcion"]}'   where id='{$id}' ";
        $result = mysqli_query($this->db, $sql);

        return "OK";
    }
}
