<?php
namespace Controllers\backend\OT\Roles;

use Framework\Tactician;
use Nigromante\Guitar\Security\Application\UseCases\CheckUserRoleCommand;
use Nigromante\Guitar\Security\Application\UseCases\CheckUserRoleUseCase;
use Utilities\AppSession;

trait RoleCheck {

    function RoleCheck( $role ) {

        $ret = Tactician::getInstance()->handle( new CheckUserRoleCommand( AppSession::getId() , $role . 'X' ) ) ;

        //  (new CheckUserRoleUseCase())->execute( AppSession::getId() , $role) ;
    }
}