<?php
namespace Domain\application\services\Profile;

use Domain\infrastructure\repositories\Profile\ProfileInterface;
use Domain\infrastructure\repositories\Profile\ProfileRepository;

class UpdateProfile {

    private ProfileInterface $repository ; 

    public function __construct( ) {
        $this->repository = new ProfileRepository() ;
    }

    public function ChangeUserTheme( $email, $newTheme ) {

        $user = $this->repository->findUserByEmail( $email ) ;

        $this->repository->setTheme( $user, $newTheme ) ;        

    }
}
