<?php
namespace Domain\infrastructure\repositories\Files;


interface  FilesRepository {

    public function All() ;
    public function FindById($id) ;
    public function Borrar($id) ;
}
?>