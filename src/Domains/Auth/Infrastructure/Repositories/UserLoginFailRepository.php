<?php
namespace App\Auth\Infrastructure\Repositories;
use App\Auth\Domain\Contracts\UserLoginFailInterface;

class UserLoginFailRepository implements UserLoginFailInterface
{

    protected $db;

    public function __construct()
    {
        global $config;
        extract($config['database']);
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    public function execute($email){

        $sql = "UPDATE `usuarios` set  
        `tries` = `tries` + 1  , 
        `enable` =  case when tries >= 3 then 0 else `enable` end 
        where `Email` = '{$email}' ";
        mysqli_query($this->db, $sql);

    }
}
