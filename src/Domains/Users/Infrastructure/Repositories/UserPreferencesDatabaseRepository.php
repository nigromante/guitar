<?php
namespace App\Users\Infrastructure\Repositories;

use App\Users\Domain\Contracts\UserPreferencesRepositoryInterface;
use App\Users\Domain\Entities\User;
use App\Users\Domain\Exceptions\UserNotFoundException;
use App\Users\Domain\ValueObjects\EmailRequired;

class UserPreferencesDatabaseRepository implements UserPreferencesRepositoryInterface {


    protected $db;

    public function __construct()
    {
        global $config;
        extract($config['database']);
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    public function findByEmailOrFail( EmailRequired $email) :User {
    
        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email->value()}'";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            throw UserNotFoundException::Send($email->value());
        }


        return new User( $email->value(), $row["Nombre"], $row["Apellido"] , $row["Theme"]) ; 
    }
}