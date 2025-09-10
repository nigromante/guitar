<?php

namespace Domain\infrastructure\repositories;


abstract class  DatabaseRepository
{
    protected $db;
    
    public function __construct()
    {
        global $config ; 
        extract ($config['database']) ; 
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }


}

