<?php
namespace Domain\infrastructure\repositories\Files;
use Domain\infrastructure\repositories\DatabaseRepository;


class FilesDatabaseRepository extends DatabaseRepository  implements  FilesRepository {


    public function All() {
        $sql = "SELECT * FROM `files` " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }


    public function ActiveFilesOnly() {
        $sql = "SELECT * FROM `files` where state=1 " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
    
    public function DeletedFilesOnly() {
        $sql = "SELECT * FROM `files` where state=0 " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    public function FindById( $id ) {
        $sql = "SELECT * FROM `files` where id='{$id}' and state=1 " ; 
        $result = mysqli_query(  $this->db, $sql  );
        return  $result->fetch_assoc() ;
    }


    public function RemoveFileById( $id ) {
        $sql = "UPDATE `files` set state=0  where id='{$id}' and state=1" ; 
        $result = mysqli_query(  $this->db, $sql  );
        return "OK";  
    }

    public function RecoverFileById( $id ) {
        $sql = "UPDATE `files` set state=1  where id='{$id}' and state=0" ; 
        $result = mysqli_query(  $this->db, $sql  );
        return "OK";  
    }

}
