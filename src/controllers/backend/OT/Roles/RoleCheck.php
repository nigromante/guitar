<?php
namespace Controllers\backend\OT\Roles;
use Utilities\AppSession;

use Framework\Tactician;
use Nigromante\Guitar\Security\Application\UseCases\CheckUserRoleCommand;

trait RoleCheck {

    function RoleCheck( $role ) {

        Tactician::getInstance()->handle( new CheckUserRoleCommand( AppSession::getId() , $role ) ) ;

    }
}