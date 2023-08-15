<?php
declare(strict_types=1);

namespace App\Auth\Domain\Entities;
use App\Auth\Domain\Events\UserBlockedTryToLoginEvent;
use App\Auth\Domain\Events\UserLoginSuccessEvent;
use App\Auth\Domain\Events\UserLoginFailEvent;
use App\Auth\Domain\Exceptions\UserBlockedException;
use App\Auth\Domain\Exceptions\UserInvalidPasswordException;
use App\Auth\Domain\ValueObjects\EmailRequired; 
use App\Auth\Domain\ValueObjects\Password;
use App\Auth\Infrastructure\System\Event;

final class User
{
    private EmailRequired $email;
    private Password $password;
    private $estado ; 

    public function __construct(EmailRequired $email, Password $password, $estado)
    {
        $this->email = $email;
        $this->password = $password;
        $this->estado = $estado;

        if( $this->estado == 0 ) { 
            Event::dispatch( new UserBlockedTryToLoginEvent( $this->email->value() ) ) ;
            throw UserBlockedException::Send( $this->email->value() ) ;
        }
    }

    public function ValidateLogin(Password $password )
    {
        if( $this->password->equalTo($password) ) {

            Event::dispatch( new UserLoginSuccessEvent( $this->email->value() ) ) ;

            return true ;
        }

        Event::dispatch( new UserLoginFailEvent( $this->email->value() ) ) ;

        throw UserInvalidPasswordException::Send( $this->email->value() ) ; 
    }

    public function getEmail() {
        return $this->email ; 
    }

    
}
