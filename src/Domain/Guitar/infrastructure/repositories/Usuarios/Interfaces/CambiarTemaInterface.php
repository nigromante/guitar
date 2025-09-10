<?php

namespace Domain\infrastructure\repositories\Usuarios\Interfaces;


interface  CambiarTemaInterface
{

    public function execute( $mail, $tema);
}