<?php

namespace Controllers\backend;

use Controllers\backend\Controller;
use Utilities\AppSession;

use Nigromante\Guitar\Auth\Application\UseCases\UserValidateLoginUseCase;
use Nigromante\Guitar\Auth\Application\UseCases\UserValidateLoginCommand;

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

        try {

            (new UserValidateLoginUseCase())->execute(new UserValidateLoginCommand($data['email'], $data['password']));

            AppSession::UserEmailSet($data['email']);

            return $this->redirect("/backend/dashboard");
        } catch (\Exception $e) {

            return $this->View('login', ['message' => $e->getMessage()], 'acceso');
        }
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
