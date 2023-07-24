<?php
namespace Sebastian\Guitar\backend\shared\application\controllers;

use Sebastian\Guitar\backend\instrumentos\application\services\getSelectedInstrumentos;
use Sebastian\Guitar\backend\instrumentos\infrastructure\repositories\InstrumentoDatabaseRepository;


class Controller extends \Framework\Controller {

    protected $instrumentos ;

    public function __construct(  )
    {
        parent::addGlobals( "instrumentos", $this->AllInstrumentos() ) ;
    }

    private function AllInstrumentos() {
        $serviceAll = new getSelectedInstrumentos( new InstrumentoDatabaseRepository() ) ; 
        return  $serviceAll->execute() ; 

    }

}