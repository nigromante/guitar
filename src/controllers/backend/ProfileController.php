<?php

namespace Controllers\backend ;

use Controllers\backend\SecureController;
use Domain\application\services\Profile\CambiarTema;
use Domain\application\services\Usuarios\FindByEmail;
use Domain\infrastructure\repositories\Usuarios\Database\CambiarTemaRepository;
use Domain\infrastructure\repositories\Usuarios\Database\FindByEmailRepository;
use Utilities\AppSession;

class ProfileController extends SecureController
{

    public function cambiartema()
    {
        $tema = AppSession::UserThemeGet() ; 
        return $this->View('cambiartema', compact( 'tema' ) );
    }

    public function cambiartema_grabar()
    {
        $data = $this->Post();

        $tema = $data["Tema"] ;
        
        AppSession::UserThemeSet( $tema ) ;

        $service = new CambiarTema( new CambiarTemaRepository());
        $usuario = $service->execute( AppSession::UserEmail(), $tema );

        return $this->View('cambiartema', compact( 'tema' ) );
        

    }
}




