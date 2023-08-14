<?php
namespace App\Auth\Domain\Contracts;

interface UserLoginFailInterface
{

    public function execute($email);
}
