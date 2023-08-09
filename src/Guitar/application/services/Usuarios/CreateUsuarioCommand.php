<?php
namespace Domain\application\services\Usuarios;

class CreateUsuarioCommand {

    public function __construct( 
            public string $nombre, 
            public string $apellido,
            public string $email,
            public string $password  
        ) {}
}