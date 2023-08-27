<?php
namespace Controllers\backend\OT\Assignment;

use Utilities\AppSession;
use Framework\Tactician;
use Nigromante\Guitar\Security\Application\UseCases\CheckUserRoleCommand;


class AssignmentController extends \Controllers\backend\SecureController
{
    public function checkAssignmentResource( $resourceId ) {

        $userId = AppSession::getId( );

        Tactician::getInstance()->handle( new CheckUserRoleCommand( AppSession::getId() , $resourceId ) ) ;
         
    }

}
