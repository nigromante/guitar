<?php

namespace Controllers\backend;

use Framework\crypt\CryptMD5 as CRYPT ;
use Framework\Logger;

use Controllers\backend\Controller;

// services
use Domain\application\services\Usuarios\FindByEmail;
use Domain\application\services\Auth\ValidateLogin;
use Domain\application\services\Auth\ValidateLoginCommand;

// repositories
use Domain\infrastructure\repositories\Usuarios\Database\FindByEmailRepository;
use Domain\infrastructure\repositories\Auth\Database\ValidateLoginRepository;
use Utilities\AppSession;

class AccesoController extends Controller
{

    public function login()
    {
        if ( AppSession::UserCheck()) {
            $this->redirect("/backend/dashboard");
            return;
        }
        return $this->View('login', [], 'acceso');
    }

    
    public function login_validar()
    {
        $data = $this->Post();

        $validateService = new ValidateLogin( new ValidateLoginRepository() ) ; 
        if( ! $validateService->execute( new ValidateLoginCommand( $data['email'] , CRYPT::encript($data['password'])) ) ) {
            Logger::Alert($data["email"], "Alert: Invalid Password");

            return $this->View('login', [], 'acceso');
        }

        $service = new FindByEmail( new FindByEmailRepository());
        $usuario = $service->execute( $data["email"] );

        AppSession::UserSet( $usuario->getEmail() , $usuario->getFullName() ) ;
        AppSession::UserThemeSet( $usuario->getTheme() ) ;

        return $this->redirect("/backend/dashboard");
    }


    public function logout()
    {
        session_destroy();
        return $this->redirect("/backend/acceso/login");
    }


    public function forgot_password()
    {
        return $this->View('forgot_password', [], 'acceso');
    }


    public function forgot_password_procesar()
    {
        $data = $this->Post();
        return $this->View('forgot_password_procesar', compact("data"), 'acceso');
    }


    public function no_access()
    {
        return $this->View('no_access', [], 'acceso');
    }
}
