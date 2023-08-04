<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

class DashboardController extends SecureController
{

    public function index()
    {

        return $this->View('index', []);
    }
}
