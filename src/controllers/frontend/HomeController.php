<?php

namespace Controllers\frontend;

use  Controllers\frontend\Controller;
use Domain\application\services\Productos\Listado;
use Domain\infrastructure\repositories\Productos\ProductoDatabaseRepository;

class HomeController extends Controller
{

    public function index()
    {
        $service = new Listado(new ProductoDatabaseRepository());
        $Productos = $service->execute();
    
        return $this->View('index', compact("Productos"), "home");
    }
}
