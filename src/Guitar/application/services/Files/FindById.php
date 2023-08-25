<?php
namespace Domain\application\services\Files;

use Domain\infrastructure\repositories\Files\FilesRepository;

class FindById {

    private FilesRepository $repository ; 

    public function __construct( FilesRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $id ) {
        return $this->repository->FindById( $id );
    }
}
