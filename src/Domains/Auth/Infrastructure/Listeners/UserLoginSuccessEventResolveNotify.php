<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Globals\Events\ListenerAbstract;

class UserLoginSuccessEventResolveNotify extends ListenerAbstract
{

    public function handle()
    {

        $email = $this->event->data();

        mail($email, "Login Success", "se ha logueado");
    }
}
