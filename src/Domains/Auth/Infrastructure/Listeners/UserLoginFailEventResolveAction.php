<?php 
namespace App\Auth\Infrastructure\Listeners;
use App\Auth\Application\UseCases\UserLoginFailUseCase;


class UserLoginFailEventResolveAction {

    public function __construct( private $event ) {}

    public function handle() {

        $email = $this->event->data() ;

        (new UserLoginFailUseCase())->execute( $email );
    }
}