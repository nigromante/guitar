<?php

namespace Controllers\backend\OT\Roles;


trait RoleSaleService {

    public function __construct() {
        parent::__construct();

        try {
            $this->RoleCheck( "RoleSaleService" );
        }catch(\Exception $e ) {
            $this->redirect("/backend/no-autorizado/" . $e->getMessage() );
        }

   }
}