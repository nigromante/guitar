<?php

namespace Domain\infrastructure\repositories\Usuarios\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\AllInterface;
use Domain\domain\entities\User;

class GetAllUsersRepository  extends DatabaseRepository implements AllInterface
{

    public function execute()
    {
        $sql = "SELECT * FROM `usuarios` ";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[] = new User( $row["id"] , $row["Nombre"] , $row["Apellido"] , $row["Email"] , $row["enable"], $row["createdat"] ) ; 
        }

        return $response;
    }
}