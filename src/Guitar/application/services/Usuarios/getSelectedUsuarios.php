<?php
namespace Domain\application\services\Usuarios;

use Domain\infrastructure\repositories\Instrumentos\UsuarioRepository;

class getSelectedUsuarios {

    private UsuarioRepository $repository ; 

    public function __construct( UsuarioRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute() {
        return $this->repository->Selected();
    }
}
?>