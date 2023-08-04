<?php

namespace Controllers\frontend;

use  Controllers\frontend\Controller;


class HomeController extends Controller
{

    public function index()
    {

        return $this->View('index', [], "home");
    }
}
