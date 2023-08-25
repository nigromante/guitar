<?php

namespace Domain\application\services\Instrumentos;

use Domain\infrastructure\repositories\Instrumentos\InstrumentoRepository;

class Update
{

    private InstrumentoRepository $repository;

    public function __construct(InstrumentoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, $data)
    {
        return $this->repository->Update($id, $data);
    }
}
