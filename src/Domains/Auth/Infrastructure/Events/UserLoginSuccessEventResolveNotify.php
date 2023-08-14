<?php 
namespace App\Auth\Infrastructure\Events;
use App\Auth\Application\UseCases\UserLoginFailUseCase;


class UserLoginSuccessEventResolveNotify {

    public function __construct( private $event ) {}

    public function handle() {

        $email = $this->event->data() ;

        mail( $email, "Login Success", "se ha logueado") ;         
    }
}