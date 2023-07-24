<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;



class DashboardController extends Controller {


    public function index() {

        return $this->View( 'index' , [] ) ;

    }
}