<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;



class AccesoController extends Controller {


    public function login() {

        return $this->View( 'login' , [] , 'simple') ;

    }

    public function login_validar() {
        $data = $this->Post() ; 
        var_dump( $data ) ;

        return $this->View( 'login_validar' , [] , 'simple') ;

    }
}