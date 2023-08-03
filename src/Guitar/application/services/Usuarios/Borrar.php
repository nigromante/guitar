<?php
namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;

class Borrar {

    private UsuarioRepository $repository ; 

    public function __construct( UsuarioRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $id ) {
        return $this->repository->Borrar( $id );
    }
}
?>