<?php

namespace Controllers\backend;

use App\Users\Application\UseCases\UserPreferencesUseCase;
use Controllers\backend\SecureController;
use Domain\application\services\Sessions\UserList;
use Domain\infrastructure\repositories\Sessions\Database\UsersSessionRepository;
use Utilities\AppSession;

class DashboardController extends SecureController
{

    public function index()
    {
        $this->ReadUserSessionData();

        $service = new UserList(new UsersSessionRepository());
        $usuarios = $service->execute();
        return $this->View('index', compact("usuarios"));
    }

    private function ReadUserSessionData()
    {

        if (empty(AppSession::UserNameGet())) {

            $email = AppSession::UserEmailGet();

            $user = (new UserPreferencesUseCase())->execute($email);

            AppSession::UserNameSet($user->getFullName());
            AppSession::UserThemeSet($user->getTheme());
        }
    }
}
