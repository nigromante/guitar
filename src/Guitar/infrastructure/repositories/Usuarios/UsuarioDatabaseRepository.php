<?php

namespace Domain\infrastructure\repositories\Usuarios;
use Domain\infrastructure\repositories\DatabaseRepository;


class UsuarioDatabaseRepository  extends DatabaseRepository implements UsuarioRepository
{


    public function Selected()
    {
        $sql = "SELECT `usuarios`.* FROM `usuarios` ,  `usuariosSelected` where enable=1 AND `usuarios`.alias = `usuarios`.alias order by `usuarios`.alias";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[strtoupper($row['Email'])] = ["id" => $row["id"], "enable" => $row["enable"], "Email" => $row["Email"], "Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"], "createdat"
            => $row["createdat"], "password" => $row["password"]];
        }
        return $response;
    }

    public function NonSelected()
    {
        $sql = "SELECT `usuarios`.* FROM `usuarios` left join `usuariosSelected` on `usuariosSelected`.alias = `usuarios`.alias where enable=1 and `usuariosSelected`.alias is null  order by `usuarios`.alias";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = [];
        foreach ($rows as $row) {
            $response[strtoupper($row['Email'])] = ["id" => $row["id"], "enable" => $row["enable"], "Email" => $row["Email"], "Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"], "createdat"
            => $row["createdat"], "password" => $row["password"]];
        }
        return $response;
    }


    public function Borrar($id)
    {
        // $sql = "DELETE FROM `usuarios` where id='{$id}' " ; 
        $sql = "UPDATE `usuarios` set enable=0  where id='{$id}' ";
        $result = mysqli_query($this->db, $sql);

        return "OK";
    }

    public function Update($id, $data)
    {
        $sql = "UPDATE `usuarios` set  
            `Nombre` = '{$data["Nombre"]}'  , 
            `Apellido` = '{$data["Apellido"]}' , 
            `Email` = '{$data["Email"]}',
            `password` = '{$data["password"]}'  
            where id='{$id}' ";
        $result = mysqli_query($this->db, $sql);

        return "OK";
    }

    public function UserCheckLogin($email, $password)
    {
        $sql = "SELECT * FROM `usuarios` where enable=1 and `Email`='{$email}' and  `password`='{$password}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();
        return ($row != null);
    }
    public function UserLoginSuccess($email)
    {
        $sql = "UPDATE `usuarios` set  
            `tries` = '0'  , 
            `lastlogin` = now()  
            where `Email` = '{$email}' ";
        $result = mysqli_query($this->db, $sql);
    }

    public function UserLoginError($email)
    {
        $sql = "UPDATE `usuarios` set  
        `tries` = `tries` + 1  , 
        `enable` =  case when tries >= 3 then 0 else `enable` end 
        where `Email` = '{$email}' ";
        $result = mysqli_query($this->db, $sql);
    }

    public function UserSession()
    {
        $sql = "SELECT *, CONVERT_TZ( createdat ,'UTC', 'America/Santiago') fecha_creacion , CONVERT_TZ( Session_Create ,'UTC', 'America/Santiago') fecha_session FROM `usuarios` left join `Session` on `usuarios`.Email = `Session`.Session_User ";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows ; 
    }



}
