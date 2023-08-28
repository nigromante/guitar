<?php
namespace Controllers\backend\OT\Assignment;

use Nigromante\Guitar\Security\Application\Command\CheckAssignmentResourceCommand;
use Utilities\AppSession;
use Utilities\CommandHandler;


class AssignmentController extends \Controllers\backend\SecureController
{
    public function checkAssignmentResource( $resourceId ) {

        $userId = AppSession::getId( );


        try {

            CommandHandler::getInstance()->handle( new CheckAssignmentResourceCommand ( AppSession::getId() , $resourceId ) ) ;

        }catch(\Exception $e ) {
            
            $this->redirect("/backend/recurso-no-autorizado/" . $e->getMessage() );
        }
         
    }

}
