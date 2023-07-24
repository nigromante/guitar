<?php
namespace Domain\application\services\Instrumentos;

use Domain\infrastructure\repositories\Instrumentos\InstrumentoRepository;

class FindById {

    private InstrumentoRepository $repository ; 

    public function __construct( InstrumentoRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $id ) {
        return $this->repository->FindById( $id );
    }
}
?>