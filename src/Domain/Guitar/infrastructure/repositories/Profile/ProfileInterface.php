<?php
namespace Domain\infrastructure\repositories\Profile;
use Domain\domain\entities\User;

interface ProfileInterface {

    public function findUserByEmail($email) : ?User ;

    public function setThemeAndAvatar( User $user , $newTheme , $newAvatar ) ;

   // public function setAvatar( User $user , $newAvatar ) ;

} 

