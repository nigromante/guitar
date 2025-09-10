<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

use Domain\application\services\Files\GetAllFiles;
use Domain\application\services\Files\DeleteFile;
use Domain\application\services\Files\FindById;
use Domain\infrastructure\repositories\Files\FilesDatabaseRepository;


class FilesController extends SecureController
{


    public function listado()
    {
        $service = new GetAllFiles(new FilesDatabaseRepository());
        $files = $service->execute();
        return $this->View('listado', compact('files'));
    }

    public function borrar($id)
    {
        $service = new DeleteFile(new FilesDatabaseRepository());
        $service->execute($id);
        return "Registro Eliminado";
    }

    public function detalle($id)
    {
        $service = new FindById(new FilesDatabaseRepository());
        $file = $service->execute($id);
        return $this->View('detalle', compact('file'));
    }
}
