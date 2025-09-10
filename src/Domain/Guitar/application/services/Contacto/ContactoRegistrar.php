<?php

namespace Domain\application\services\Contacto;
use Domain\infrastructure\repositories\Contacto\ContactoInterface ;
class ContactoRegistrar {

    private ContactoInterface $repository;

    public function __construct(ContactoInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute($post_data)
    {
        return $this->repository->execute($post_data);
    }


}