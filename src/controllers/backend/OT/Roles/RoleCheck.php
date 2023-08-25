<?php
namespace Controllers\backend\OT\Roles;

use App\Security\Application\UseCases\CheckUserRoleUseCase;
use Utilities\AppSession;

trait RoleCheck {

    function RoleCheck( $role ) {

        (new CheckUserRoleUseCase())->execute( AppSession::getId() , $role) ;
    }
}