<?php

namespace Controllers\backend;

use Controllers\backend\Controller;
use Utilities\AppSession;

// services
use App\Auth\Application\UseCases\UserValidateLoginUseCase;
use App\Auth\Application\UseCases\UserValidateLoginCommand;

use Domain\application\services\Usuarios\FindByEmail;
use Domain\infrastructure\repositories\Usuarios\Database\FindByEmailRepository;

class AccesoController extends Controller
{

    public function login()
    {
        if (AppSession::UserCheck()) {
            $this->redirect("/backend/dashboard");
            return;
        }
        return $this->View('login', [], 'acceso');
    }


    public function login_validar()
    {
        $data = $this->Post();

        if (!(new UserValidateLoginUseCase())->execute( new UserValidateLoginCommand( $data['email'], $data['password']) )) {
            return $this->View('login', [], 'acceso');
        }
        AppSession::UserEmailSet( $data['email'] );

        $service = new FindByEmail(new FindByEmailRepository());
        $usuario = $service->execute($data["email"]);
        
        AppSession::UserNameSet($usuario->getFullName() );
        AppSession::UserThemeSet($usuario->getTheme());
        

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
