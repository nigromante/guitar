<?php

namespace Controllers\backend\OT;

use Controllers\backend\OT\Assignment\AssignmentController;

use Controllers\backend\OT\Roles\RoleCheck;
use Controllers\backend\OT\Roles\RoleCustomerService;


class ReaderOTController extends AssignmentController
{
    use RoleCustomerService ; 
    use RoleCheck;    

    public function list()
    {
        return "list .... ReaderOTController " ;
    }

    public function get( $resourceId )
    {
        $this->checkAssignmentResource( $resourceId ) ;
         
        return "get .... ReaderOTController " ;
    }

}
