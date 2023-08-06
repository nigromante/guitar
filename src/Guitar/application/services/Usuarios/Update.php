<?php
namespace Domain\application\services\Usuarios;
use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;;
use Framework\crypt\CryptInterface;

class Update {

    private UsuarioRepository $repository ; 
    private CryptInterface $crypt;

    public function __construct( UsuarioRepository $repository , CryptInterface $crypt) {
        $this->repository = $repository ;
        $this->crypt = $crypt;

    }

    public function execute( $id, $data ) {
        $data["password"] = $this->crypt->encript( $data["password"] ) ;

        return $this->repository->Update( $id , $data);
    }
}
