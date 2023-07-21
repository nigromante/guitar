<?php
namespace Sebastian\Guitar\instrumentos\application\services;

use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoRepository;

class FindByAlias {

    private InstrumentoRepository $repository ; 

    public function __construct( InstrumentoRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $alias ) {
        return $this->repository->FindByAlias( $alias );
    }
}
?>