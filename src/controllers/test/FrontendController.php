<?php
namespace Controllers\test;

use Nigromante\Framework\Controller as FrameworkController;

class FrontendController extends FrameworkController {


    public function index() {

        return $this->Data( json_encode($this->Globals()) ) ;
    }
    public function error() {

        throw new \Exception( "error de pruebas" );
    }


}