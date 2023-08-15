<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Globals\Events\ListenerAbstract;

class UserLoginFailEventResolveNotify extends ListenerAbstract
{

    public function handle()
    {

        $email = $this->event->data();

        mail($email, "Login Fail", "usuario bloqueado");
    }
}
