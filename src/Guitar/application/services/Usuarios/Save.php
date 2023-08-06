<?php
namespace Domain\application\services\Usuarios;
use Domain\infrastructure\repositories\Usuarios\UsuarioRepository;
use Framework\crypt\CryptInterface;

class Save {

    private UsuarioRepository $repository ; 
    private CryptInterface $crypt;

    public function __construct( UsuarioRepository $repository , CryptInterface $crypt) {
        $this->repository = $repository ;
        $this->crypt = $crypt;
    }

    public function execute( $data ) {
        $data["password"] = $this->crypt->encript( $data["password"] ) ;
        return $this->repository->Save( $data);
    }
}
