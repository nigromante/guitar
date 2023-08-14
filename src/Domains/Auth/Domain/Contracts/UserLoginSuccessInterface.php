<?php
namespace App\Auth\Domain\Contracts;

interface UserLoginSuccessInterface
{

    public function execute($email);
}
