<?php

namespace App\Auth\Infrastructure\Configure;

use App\Globals\System\EventManager;

use App\Auth\Domain\Events\UserLoginFailEvent;
use App\Auth\Domain\Events\UserLoginSuccessEvent;

use App\Auth\Infrastructure\Listeners\UserLoginFailEventResolveLogger;
use App\Auth\Infrastructure\Listeners\UserLoginFailEventResolveAction;
use App\Auth\Infrastructure\Listeners\UserLoginFailEventResolveNotify;
use App\Auth\Infrastructure\Listeners\UserLoginSuccessEventResolveAction;
use App\Auth\Infrastructure\Listeners\UserLoginSuccessEventResolveNotify;


class DomainEvents
{

    public static function setup()
    {
        EventManager::Listeners(
            [
                UserLoginSuccessEvent::class => [
                    UserLoginSuccessEventResolveAction::class , 
                    UserLoginSuccessEventResolveNotify::class
                ],
                UserLoginFailEvent::class => [
                    UserLoginFailEventResolveAction::class,
                    UserLoginFailEventResolveLogger::class,
                    UserLoginFailEventResolveNotify::class
                ]
            ]
        );
    }
}
