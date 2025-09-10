<?php

namespace Domain\infrastructure\repositories\Profile;
use Domain\domain\entities\User;
use Domain\infrastructure\repositories\DatabaseRepository;

class ProfileRepository extends DatabaseRepository implements ProfileInterface{

    public function findUserByEmail($email) : ?User {
      
        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if( ! $row ) return null;

        return new User( $row["id"] , $row["Nombre"], $row["Apellido"] , $row["Email"], $row["enable"], $row["createdat"] , "",  $row["Theme"] , $row["Avatar"]) ;
    }

    
    public function setThemeAndAvatar( User $user , $newTheme , $newAvatar) {
        $sql = "UPDATE `usuarios`  set Theme='{$newTheme}' , Avatar='{$newAvatar}' WHERE `Email`='{$user->getEmail()}' ";
        mysqli_query($this->db, $sql);

    }

}