<?php

namespace Controllers\backend\OT\Roles;

trait RoleCustomerService {


    public function __construct() {
        parent::__construct();

        try {
            $this->RoleCheck( "RoleCustomerService" );
        }catch(\Exception $e ) {
            $this->redirect("/backend/no-autorizado/" . $e->getMessage() );
        }
    }

}
