<?php
declare(strict_types=1);

namespace App\Auth\Domain\Entities;
use App\Auth\Domain\Events\UserLoginSuccessEvent;
use App\Auth\Domain\Events\UserLoginFailEvent;
use App\Auth\Domain\Notifies\NotifyEvent;
use App\Auth\Domain\Notifies\User\LoginsuccessNotify;
use App\Auth\Domain\ValueObjects\EmailRequired; 
use App\Auth\Domain\ValueObjects\Password;
use App\Auth\Infrastructure\System\Event;
use App\Auth\Infrastructure\System\Notifier;

final class User
{

    private EmailRequired $email;
    private Password $password;

    public function __construct(EmailRequired $email, Password $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function ValidateLogin(Password $password )
    {
        if( $this->password->equalTo($password) ) {

            Event::dispatch( new UserLoginSuccessEvent( $this->email->value() ) ) ;

            return true ;
        }

        Event::dispatch( new UserLoginFailEvent( $this->email->value() ) ) ;

        return false; 
    }
    
}
