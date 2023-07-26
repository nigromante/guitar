<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;

use Domain\application\services\Files\getAllFiles;
use Domain\infrastructure\repositories\Files\FilesDatabaseRepository;


class FilesController extends Controller {


    public function listado() {
        $service = new getAllFiles( new FilesDatabaseRepository() ) ; 
        $files = $service->execute( ) ; 
        return $this->View( 'listado' , compact('files') ) ;

    }
}