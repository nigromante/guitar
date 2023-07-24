<?php
namespace Controllers\frontend;

use  Controllers\frontend\Controller;


class TestController extends Controller {


    public function index() {

        return $this->Data( json_encode($this->Globals()) ) ;
    }
}