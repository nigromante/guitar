<?php

namespace Controllers\backend;

use Framework\crypt\CryptMD5;
use Framework\Logger;

use Controllers\backend\Controller;
use Domain\application\services\Usuarios\UserCheckLogin;
use Domain\application\services\Usuarios\FindByEmail;
use Domain\application\services\Usuarios\UserLoginError;
use Domain\application\services\Usuarios\UserLoginSuccess;
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;

class AccesoController extends Controller
{

    public function login()
    {
        if (isset($_SESSION['user.email'])) {
            $this->redirect("/backend/dashboard");
            return;
        }
        return $this->View('login', [], 'acceso');
    }

    
    public function login_validar()
    {
        $data = $this->Post();

        $userRepository = new UsuarioDatabaseRepository();

        $service = new UserCheckLogin($userRepository, new CryptMD5());
        $isValidUser = $service->execute($data["email"], $data["password"]);

        if (!$isValidUser) {

            $serviceError = new UserLoginError($userRepository);
            $serviceError->execute($data["email"]);

            Logger::Alert($data["email"], "Alert: Invalid Password");

            return $this->View('login', [], 'acceso');
        }

        $serviceSuccess = new UserLoginSuccess($userRepository);
        $serviceSuccess->execute($data["email"]);

        $service = new FindByEmail($userRepository);
        $usuario = $service->execute($data["email"]);

        $_SESSION['user.email'] = $data["email"];
        $_SESSION['user.nombre'] = $usuario["Nombre"] . " " . $usuario["Apellido"];

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
