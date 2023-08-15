<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Globals\System\FileLog;
use App\Globals\Events\ListenerAbstract;


class UserLoginFailEventResolveLogger extends ListenerAbstract
{

    public function handle()
    {
        $email = $this->event->data();

        FileLog::Error(sprintf("%s :: %s", $this->event::class, $email));
    }
}
