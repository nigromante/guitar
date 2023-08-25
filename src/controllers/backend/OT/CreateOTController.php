<?php

namespace Controllers\backend\OT;

use Controllers\backend\OT\Roles\RoleCheck;
use Controllers\backend\OT\Roles\RoleSaleService;
use  Controllers\backend\SecureController;


class CreateOTController extends SecureController
{
    use RoleSaleService ; 
    use RoleCheck;


    public function create()
    {
        return "create .... CreateOTController " ;
    }


}
