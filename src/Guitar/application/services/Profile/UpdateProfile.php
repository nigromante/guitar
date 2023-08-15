<?php
namespace Domain\application\services\Profile;

use Domain\domain\entities\User;
use Domain\infrastructure\repositories\Usuarios\Interfaces\UpdateProfileInterface;

class UpdateProfile {

    private UpdateProfileInterface $repository ; 

    public function __construct( UpdateProfileInterface $repository) {
        $this->repository = $repository ;
    }

    public function execute( User $user ) {

        return $this->repository->execute( $user );
    }
}
