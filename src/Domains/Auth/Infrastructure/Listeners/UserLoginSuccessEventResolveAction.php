<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Auth\Application\UseCases\UserLoginSuccessUseCase;
use App\Globals\Events\ListenerAbstract;

class UserLoginSuccessEventResolveAction extends ListenerAbstract
{

    public function handle()
    {

        $email = $this->event->data();

        (new UserLoginSuccessUseCase())->execute($email);
    }
}
