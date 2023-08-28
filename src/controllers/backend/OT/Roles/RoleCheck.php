<?php
namespace Controllers\backend\OT\Roles;
use Utilities\AppSession;

use Controller\CommandHandler;
use Nigromante\Guitar\Security\Application\Command\CheckUserRoleCommand;

trait RoleCheck {

    function RoleCheck( $role ) {

        CommandHandler::getInstance()->handle( new CheckUserRoleCommand( AppSession::getId() , $role ) ) ;

    }
}