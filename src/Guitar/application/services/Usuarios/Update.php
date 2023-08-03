<?php
namespace Domain\application\services\Usuarios;
use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;;

class Update {

    private UsuarioRepository $repository ; 

    public function __construct( UsuarioRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $id, $data ) {
        return $this->repository->Update( $id , $data);
    }
}
?>