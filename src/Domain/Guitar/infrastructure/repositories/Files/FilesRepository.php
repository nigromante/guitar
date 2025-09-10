<?php

namespace Domain\infrastructure\repositories\Files;


interface  FilesRepository
{

    public function All();
    public function ActiveFilesOnly();
    public function DeletedFilesOnly();
    public function FindById($id);
    public function RemoveFileById($id);
    public function RecoverFileById($id);
}
