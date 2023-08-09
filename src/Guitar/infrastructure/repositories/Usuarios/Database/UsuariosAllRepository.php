<?php

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\AllInterface;

class UsuariosAllRepository  extends DatabaseRepository implements AllInterface
{

    public function execute()
    {
        $sql = "SELECT * FROM `usuarios` ";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[] = ["id" => $row["id"], "enable" => $row["enable"], "Email" => $row["Email"], "Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"], "createdat"
            => $row["createdat"], "password" => $row["password"]];
        }

        return $response;
    }
}