<?php
namespace Domain\application\services\Profile;

use Domain\infrastructure\repositories\Profile\ProfileInterface;
use Domain\infrastructure\repositories\Profile\ProfileRepository;

class UpdateProfile {

    private ProfileInterface $repository ; 

    public function __construct( ) {
        $this->repository = new ProfileRepository() ;
    }

    public function ChangeUserThemeAndAvatar( $email, $newTheme , $newAvatar ) {

        $user = $this->repository->findUserByEmail( $email ) ;

        $this->repository->setThemeAndAvatar( $user, $newTheme, $newAvatar ) ;        

    }

    // public function ChangeUserAvatar( $email, $newAvatar ) {

    //     $user = $this->repository->findUserByEmail( $email ) ;

    //     $this->repository->setAvatar( $user, $newAvatar ) ;        

    // }
}
