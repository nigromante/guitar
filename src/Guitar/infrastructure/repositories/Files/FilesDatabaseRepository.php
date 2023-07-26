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
        $sql = "SELECT * FROM `files` " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
        /*
        $response = []; 
        foreach( $rows as $row ) {
            $response[ strtoupper($row['alias' ]) ] = [ "id" => $row["id"] , "enable" => $row["enable"] , "alias" => $row ["alias"],"nombre" => $row["name"], "descripcion" => $row["description"] ] ; 
        }

        return $response ;
        */  
    }
    
    /*
    public function Selected() {
        $sql = "SELECT `MusicalInstruments`.* FROM `MusicalInstruments` ,  `MusicalInstrumentsSelected` where enable=1 AND `MusicalInstruments`.alias = `MusicalInstrumentsSelected`.alias order by `MusicalInstruments`.alias" ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = []; 
        foreach( $rows as $row ) {
            $response[ strtoupper($row['alias' ]) ] = [ "id" => $row["id"] , "enable" => $row["enable"] , "alias" => $row ["alias"],"nombre" => $row["name"], "descripcion" => $row["description"] ] ; 
        }
        return $response ;  

    }

    public function NonSelected() {
        $sql = "SELECT `MusicalInstruments`.* FROM `MusicalInstruments` left join `MusicalInstrumentsSelected` on `MusicalInstrumentsSelected`.alias = `MusicalInstruments`.alias where enable=1 and `MusicalInstrumentsSelected`.alias is null  order by `MusicalInstruments`.alias" ;
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = []; 
        foreach( $rows as $row ) {
            $response[ strtoupper($row['alias' ]) ] = [ "id" => $row["id"] , "enable" => $row["enable"] , "alias" => $row ["alias"], "nombre" => $row["name"], "descripcion" => $row["description"] ] ; 
        }
        return $response ;  
    }



    public function FindByAlias( $alias ) {
        $sql = "SELECT * FROM `MusicalInstruments` where enable=1 and alias='{$alias}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $row = $result->fetch_assoc() ;
        
        $response = [ "id" => $row["id"] , "enable" => $row["enable"] , "alias" => $row ["alias"], "nombre" => $row["name"], "descripcion" => $row["description"] ] ; 

        return $response ;  

    }

    public function FindById( $id ) {
        $sql = "SELECT * FROM `MusicalInstruments` where enable=1 and id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $row = $result->fetch_assoc() ;
        
        $response = [ "id" => $row["id"] , "enable" => $row["enable"] , "alias" => $row ["alias"],"nombre" => $row["name"], "descripcion" => $row["description"] ] ; 

        return $response ;  

    }

    public function Borrar( $id ) {
        // $sql = "DELETE FROM `MusicalInstruments` where id='{$id}' " ; 
        $sql = "UPDATE `MusicalInstruments` set enable=0  where id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
     
        return "OK";  
    }
    public function Save() {}
    */
}
?>