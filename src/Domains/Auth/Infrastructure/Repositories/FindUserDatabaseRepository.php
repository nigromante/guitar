<?php

namespace App\Auth\Infrastructure\Repositories;

use App\Auth\Domain\Contracts\FindUserInterface;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\ValueObjects\EmailRequired;
use App\Auth\Domain\ValueObjects\Password;

class FindUserDatabaseRepository implements FindUserInterface
{

    protected $db;

    public function __construct()
    {
        global $config;
        extract($config['database']);
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }



    public function execute($email): ?User
    {

        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email}' ";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if (!$row) return null;

        return new User(
            EmailRequired::init($row["Email"]),
            Password::set($row["password"])
        );
    }
}
