<?php
namespace App\Auth\Application\UseCases;

class UserValidateLoginCommand {
    public function __construct( public string $email, public string $password ) {}
}

