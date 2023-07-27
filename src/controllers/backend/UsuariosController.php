<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;



class UsuariosController extends Controller {


    public function index() {

        return $this->View( 'prueba' , [] ) ;

    }
}