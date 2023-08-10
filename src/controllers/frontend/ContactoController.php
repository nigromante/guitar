<?php

namespace Controllers\frontend;

use  Controllers\frontend\Controller;
use Domain\application\services\Contacto\ContactoRegistrar;
use Domain\infrastructure\repositories\Contacto\ContactoRepository;

class ContactoController extends Controller
{

    public function form()
    {
        return $this->View('form');
    }

    public function formPost()
    {
        $post_data = $this->Post();
        $service = new ContactoRegistrar(new ContactoRepository()) ;
        $service -> execute($post_data) ;
      
        return $this->View('form');
    }

   
}
