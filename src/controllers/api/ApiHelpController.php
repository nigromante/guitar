<?php
namespace Controllers\api;

use  Controllers\api\Controller;



class ApiHelpController extends Controller {


    public function index() {

        return $this->View( 'index' , [] ) ;

    }
}