<?php
namespace Domain\infrastructure\repositories\Profile;
use Domain\domain\entities\User;

interface ProfileInterface {

    public function findUserByEmail($email) : ?User ;

    public function setTheme( User $user , $newTheme ) ;

} 

