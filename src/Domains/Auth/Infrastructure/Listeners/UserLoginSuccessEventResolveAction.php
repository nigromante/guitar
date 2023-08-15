<?php 
namespace App\Auth\Infrastructure\Listeners;
use App\Auth\Application\UseCases\UserLoginSuccessUseCase;

class UserLoginSuccessEventResolveAction {

    public function __construct( private $event ) {}

    public function handle() {

        $email = $this->event->data() ;

        (new UserLoginSuccessUseCase())->execute( $email );
    }
}