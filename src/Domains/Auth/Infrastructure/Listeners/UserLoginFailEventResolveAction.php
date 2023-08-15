<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Auth\Application\UseCases\UserLoginFailUseCase;
use App\Globals\Events\ListenerAbstract;


class UserLoginFailEventResolveAction extends ListenerAbstract
{

    public function handle()
    {

        $email = $this->event->data();

        (new UserLoginFailUseCase())->execute($email);
    }
}
