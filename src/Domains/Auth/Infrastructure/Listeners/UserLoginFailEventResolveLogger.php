<?php

namespace App\Auth\Infrastructure\Listeners;

use App\Auth\Infrastructure\System\FileLog;


class UserLoginFailEventResolveLogger
{

    public function __construct(private $event)
    {
    }

    public function handle()
    {

        $email = $this->event->data();

        FileLog::Error(sprintf("%s :: %s", $this->event::class, $email ));
    }
}
