<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;

use Domain\domain\entities\User;

interface  FindByEmailInterface
{

    public function execute( $email ) : User ;
}