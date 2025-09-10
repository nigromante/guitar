<?php

namespace Domain\application\services\Files;

use Domain\infrastructure\repositories\Files\FilesRepository;

class DeleteFile
{

    private FilesRepository $repository;

    public function __construct(FilesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        return $this->repository->RemoveFileById($id);
    }
}
