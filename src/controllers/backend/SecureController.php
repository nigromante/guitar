<?php

namespace Controllers\backend;

use utilities\AppSession;

class SecureController extends \Framework\Controller
{

    public function CheckAuth()
    {
        return AppSession::UserCheck(); 
    }
}
