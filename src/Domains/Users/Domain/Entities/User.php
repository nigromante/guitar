<?php
declare(strict_types=1);

namespace App\Users\Domain\Entities;

final class User
{
    private $email;
    private $nombre ; 
    private $apellido;
    private $theme ; 

    public function __construct( $email, $nombre, $apellido, $theme )
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->theme = $theme;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNombre() {
        return $this->nombre ; 
    }

    public function getApellido() {
        return $this->apellido ; 
    }

    public function getFullName() {
        return trim($this->nombre . " " . $this->apellido) ; 
    }

    public function getTheme() {
        return $this->theme ; 
    }
    
}
