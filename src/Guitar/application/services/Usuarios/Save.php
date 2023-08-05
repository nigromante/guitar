<?php
namespace Domain\application\services\Usuarios;
use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class Save {

    private UsuarioRepository $repository ; 

    public function __construct( UsuarioRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $data ) {
        $data["password"] = \Framework\crypt\Crypt::encript( $data["password"] ) ;
        return $this->repository->Save( $data);
    }
}
