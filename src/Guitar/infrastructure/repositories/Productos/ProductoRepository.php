<?php

namespace Domain\infrastructure\repositories\Productos;


interface  ProductoRepository
{

    public function All();
    public function Selected();
    public function NonSelected();
    public function FindByAlias($alias);
    public function FindById($id);
    public function Borrar($id);

    public function Save($data);
    public function Update($id, $data);
}
