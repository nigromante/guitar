<?php

namespace Controllers\backend;

use Utilities\AppSession;

class SecureController extends Controller
{

    public function CheckAuth()
    {
        return AppSession::UserCheck(); 
    }
}
