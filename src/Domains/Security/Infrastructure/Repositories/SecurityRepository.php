<?php
namespace App\Security\Infrastructure\Repositories;

use App\Security\Domain\Contracts\SecurityRepositoryInterface;
use App\Security\Domain\Entities\UserRoles;

class SecurityRepository implements SecurityRepositoryInterface {


    protected $db;

    public function __construct()
    {
        global $config;
        extract($config['database']);
        $this->db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    public function findByIdOrFail( string $userId ) :UserRoles {
    
        /*
        $sql = "SELECT * FROM `usuarios` WHERE `Email`='{$email->value()}'";
        $result = mysqli_query($this->db, $sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            throw UserNotFoundException::Send($email->value());
        }

        return new User( $email->value(), $row["Nombre"], $row["Apellido"] , $row["Theme"]) ; 
        */
        return new UserRoles( '123' , 'Julian' , ["RoleSaleService", "RoleCustomerService"] ) ;
    }
}