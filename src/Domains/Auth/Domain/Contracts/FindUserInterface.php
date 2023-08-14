<?php
namespace App\Auth\Domain\Contracts;

use App\Auth\Domain\Entities\User;

interface FindUserInterface {

    public function execute( $email) :?User ;
}