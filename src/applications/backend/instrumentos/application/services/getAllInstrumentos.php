<?php
namespace Sebastian\Guitar\backend\instrumentos\application\services;

use Sebastian\Guitar\backend\instrumentos\infrastructure\repositories\InstrumentoRepository;

class getAllInstrumentos {

    private InstrumentoRepository $repository ; 

    public function __construct( InstrumentoRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute() {
        return $this->repository->All();
    }
}
?>