<?php

namespace Controllers\frontend;

use Domain\application\services\Instrumentos\getSelectedInstrumentos;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoDatabaseRepository;


class Controller extends \Framework\Controller
{

    protected $instrumentos;

    public function __construct()
    {
        parent::addGlobals("instrumentos", $this->AllInstrumentos());
    }

    private function AllInstrumentos()
    {
        $serviceAll = new getSelectedInstrumentos(new InstrumentoDatabaseRepository());
        return  $serviceAll->execute();
    }
}
