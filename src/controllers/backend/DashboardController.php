<?php

namespace Controllers\backend;

use Controllers\backend\SecureController;
use Domain\application\services\Sessions\UserList;
use Domain\infrastructure\repositories\Sessions\Database\UsersSessionRepository;

class DashboardController extends SecureController
{

    public function index()
    {
        $service = new UserList(new UsersSessionRepository());
        $usuarios = $service->execute();
        return $this->View('index', compact("usuarios") );
    }
}
