<?php

namespace Controllers\backend;

use Utilities\AppSession;

class SecureController extends \Framework\Controller
{

    public function CheckAuth()
    {
        return AppSession::UserCheck(); 
    }
}
