<?php

namespace Domain\application\services\Instrumentos;

use Domain\infrastructure\repositories\Instrumentos\InstrumentoRepository;

class getSelectedInstrumentos
{

    private InstrumentoRepository $repository;

    public function __construct(InstrumentoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->Selected();
    }
}
