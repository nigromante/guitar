<?php

namespace Domain\application\services\Productos;

use Domain\infrastructure\repositories\Productos\ProductoRepository;

class Listado
{

    private ProductoRepository $repository;

    public function __construct(ProductoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->All();
    }
}