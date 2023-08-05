<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;
use Domain\application\services\Usuarios\UserSession;
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;

class DashboardController extends SecureController
{

    public function index()
    {
        $service = new UserSession(new UsuarioDatabaseRepository());
        $usuarios = $service->execute();
        return $this->View('index', compact("usuarios") );
    }
}
