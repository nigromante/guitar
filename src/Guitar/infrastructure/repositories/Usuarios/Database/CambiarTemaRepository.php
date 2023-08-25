<?php 
namespace Domain\infrastructure\repositories\Usuarios\Database;

use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Interfaces\CambiarTemaInterface;


class CambiarTemaRepository extends DatabaseRepository implements CambiarTemaInterface {
    
    public function execute( $mail, $tema )  {
        
        $sql = "UPDATE `usuarios` set Theme='{$tema}'  WHERE Email='{$mail}' " ;
        mysqli_query($this->db, $sql);



    }

}


