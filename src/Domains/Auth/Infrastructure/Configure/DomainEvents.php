<?php

namespace App\Auth\Infrastructure\Configure;

use App\Globals\System\EventManager;

use App\Auth\Domain\Events\UserLoginFailEvent;
use App\Auth\Domain\Events\UserLoginSuccessEvent;

use App\Auth\Infrastructure\Events\UserLoginFailEventResolveLogger;
use App\Auth\Infrastructure\Events\UserLoginFailEventResolveAction;
use App\Auth\Infrastructure\Events\UserLoginSuccessEventResolveAction;
use App\Auth\Infrastructure\Events\UserLoginSuccessEventResolveNotify;


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
                    UserLoginFailEventResolveLogger::class,
                    UserLoginFailEventResolveAction::class
                ]
            ]
        );
    }
}
