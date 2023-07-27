<?php
namespace Domain\application\services\Instrumentos;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoRepository;

class Save {

    private InstrumentoRepository $repository ; 

    public function __construct( InstrumentoRepository $repository ) {
        $this->repository = $repository ; 
    }

    public function execute( $data ) {
        return $this->repository->Save( $data);
    }
}
?>