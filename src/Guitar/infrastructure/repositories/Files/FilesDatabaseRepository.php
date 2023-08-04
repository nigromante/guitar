<?php
namespace Domain\infrastructure\repositories\Files;


class FilesDatabaseRepository  implements  FilesRepository {

    private $db ;
    public function __construct()
    {
        $server = 'mysql' ;
        $user = 'user' ; 
        $password = 'test' ; 
        $dbName = 'myDb' ; 


        $this->db = mysqli_connect( $server , $user, $password , $dbName);
    }


    public function All() {
        $sql = "SELECT * FROM `files` where state=1 " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
    

    public function FindById( $id ) {
        $sql = "SELECT * FROM `files` where id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        return  $result->fetch_assoc() ;
    }



    public function Borrar( $id ) {
        $sql = "UPDATE `files` set state=0  where id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        return "OK";  
    }


}
