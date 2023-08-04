<?php

namespace Controllers\backend;


class SecureController extends \Framework\Controller
{

    public function CheckAuth()
    {
        return isset($_SESSION['user.email']);
    }
}
