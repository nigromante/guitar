<?php

namespace Domain\application\services\Instrumentos;

use Domain\infrastructure\repositories\Instrumentos\InstrumentoRepository;

class FindByAlias
{

    private InstrumentoRepository $repository;

    public function __construct(InstrumentoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($alias)
    {
        return $this->repository->FindByAlias($alias);
    }
}
