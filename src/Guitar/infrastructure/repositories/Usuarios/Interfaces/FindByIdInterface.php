<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;

use Domain\domain\entities\User;

interface  FindByIdInterface
{

    public function execute( $id ) : User ;
}