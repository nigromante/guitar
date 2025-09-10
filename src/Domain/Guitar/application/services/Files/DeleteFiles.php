<?php

namespace Domain\application\services\Files;

use Domain\infrastructure\repositories\Files\FilesRepository;

class DeleteFiles
{

    private FilesRepository $repository;

    public function __construct(FilesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        return $this->repository->Borrar($id);
    }
}
