<?php
namespace App\Auth\Infrastructure\Repositories;
use App\Auth\Domain\Contracts\UserLoginSuccessInterface;

class UserLoginSuccessRepository implements UserLoginSuccessInterface
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
            `tries` = '0'  , 
            `lastlogin` = now()  
            where `Email` = '{$email}' ";
        mysqli_query($this->db, $sql);

    }
}
