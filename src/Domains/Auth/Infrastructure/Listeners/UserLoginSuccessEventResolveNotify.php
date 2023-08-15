<?php 
namespace App\Auth\Infrastructure\Listeners;

class UserLoginSuccessEventResolveNotify {

    public function __construct( private readonly $event ) {}

    public function handle() {

        $email = $this->event->data() ;

        mail( $email, "Login Success", "se ha logueado") ;         
    }
}
