<?php
namespace Sebastian\Guitar\instrumentos\application\services;

use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoRepository;

class getNonSelectedInstruments {

    private InstrumentoRepository $repository ; 

    public function __construct( InstrumentoRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute() {
        return $this->repository->NonSelected();
    }
}
?>