<?php
namespace Domain\application\services\Files;

use Domain\infrastructure\repositories\Files\FilesRepository;

class GetAllFiles {

    private FilesRepository $repository ; 

    public function __construct( FilesRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute() {
        return $this->repository->All() ; 
    }
}
