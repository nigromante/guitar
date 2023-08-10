<?php
namespace Domain\application\services\Auth;


class ValidateLoginCommand {
    public function __construct( public string $email, public string $password ) {}
}

