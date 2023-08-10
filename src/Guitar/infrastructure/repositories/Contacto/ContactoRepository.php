<?php

namespace Domain\infrastructure\repositories\Contacto;

class ContactoRepository implements ContactoInterface{

    public function execute ($post_data) {
        if ($this->ValidarContactForm($post_data)) {
                $this->SaveContactForm($post_data);
             }
    }
    
    private function ValidarContactForm($post_data)
    {
        if (count($post_data) > 0) {
            extract($post_data);  //  Extrae datos de POST como variables 
            if ($email != ""  && $mensaje != "") {
                return true;
            }
        }
        return false;
    }

    private function SaveContactForm($post_data)
    {
        extract($post_data);  //  Extrae datos de POST como variables 
        var_dump($email, "Email");
        var_dump($mensaje, "Mensaje");
    }
}