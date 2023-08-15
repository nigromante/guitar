<?php
namespace App\Auth\Infrastructure\Repositories;

use App\Auth\Domain\Contracts\AuthRepositoryInterface;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Exceptions\UserNotFoundException;
use App\Auth\Domain\ValueObjects\EmailRequired;
use App\Auth\Domain\ValueObjects\Password;

class AuthDatabaseRepository implements AuthRepositoryInterface {


    protected $db;

    public function __construct()
    {
        global $config;
        extract($config['database']);
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    public function findByEmailOrFail( EmailRequired $email ) :User {

        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email->value()}'";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            throw UserNotFoundException::Send($email->value());
        }

        return new User(
            $email,
            Password::set($row["password"]), 
            $row[ 'enable']
        );

    }

    public function userSuccessLogin( User $user ){
        $sql = "UPDATE `usuarios` set  
            `tries` = '0'  , 
            `lastlogin` = now()  
            where `Email` = '{$user->getEmail()->value()}' ";
        mysqli_query($this->db, $sql);

    }
    
    public function userErrorLogin( User $user ){
        $sql = "UPDATE `usuarios` set  
        `tries` = `tries` + 1  , 
        `enable` =  case when tries >= 3 then 0 else `enable` end 
        where `Email` = '{$user->getEmail()->value()}' ";
        mysqli_query($this->db, $sql);        
    }

}