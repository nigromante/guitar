<?php
namespace Domain\infrastructure\repositories\Usuarios;


class UsuarioDatabaseRepository  implements  UsuarioRepository {

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
        $sql = "SELECT * FROM `usuarios` where enable=1 " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = []; 
        foreach( $rows as $row ) {
            $response[] = [ "id" => $row["id"] , "enable" => $row["enable"] , "Email" => $row ["Email"],"Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"] , "createdat"
            => $row["createdat"] , "password" => $row["password"]] ; 
        }

        return $response ;  
    }
    
    public function Selected() {
        $sql = "SELECT `usuarios`.* FROM `usuarios` ,  `usuariosSelected` where enable=1 AND `usuarios`.alias = `usuarios`.alias order by `usuarios`.alias" ; 
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = []; 
        foreach( $rows as $row ) {
            $response[ strtoupper($row['Email' ]) ] = [ "id" => $row["id"] , "enable" => $row["enable"] , "Email" => $row ["Email"],"Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"] , "createdat"
            => $row["createdat"] , "password" => $row["password"]] ;  
        }
        return $response ;  

    }

    public function NonSelected() {
        $sql = "SELECT `usuarios`.* FROM `usuarios` left join `usuariosSelected` on `usuariosSelected`.alias = `usuarios`.alias where enable=1 and `usuariosSelected`.alias is null  order by `usuarios`.alias" ;
        $result = mysqli_query(  $this->db, $sql  );
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $response = []; 
        foreach( $rows as $row ) {
            $response[ strtoupper($row['Email' ]) ] = [ "id" => $row["id"] , "enable" => $row["enable"] , "Email" => $row ["Email"],"Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"] , "createdat"
            => $row["createdat"] , "password" => $row["password"]] ;  
        }
        return $response ;  
    }



    public function FindByEmail( $email ) {
        $sql = "SELECT * FROM `usuarios` where enable=1 and Email='{$email}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $row = $result->fetch_assoc() ;
        
        $response = [ "id" => $row["id"] , "enable" => $row["enable"] , "Email" => $row ["Email"],"Nombre" => $row["Nombre"], "Apellido" => $row["Apellido"] , "createdat"
            => $row["createdat"] , "password" => $row["password"]] ;  

        return $response ;  

    }

    public function FindById( $id ) {
        $sql = "SELECT * FROM `usuarios` where enable=1 and id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $row = $result->fetch_assoc() ;
        
        $response = [ 
            "id" => $row["id"] , 
            "enable" => $row["enable"] , 
            "Email" => $row ["Email"],
            "Nombre" => $row["Nombre"], 
            "Apellido" => $row["Apellido"] , 
            "createdat"  => $row["createdat"] , 
            "password" => $row["password"]
            ] ;  

        return $response ;  

    }

    public function Borrar( $id ) {
        // $sql = "DELETE FROM `usuarios` where id='{$id}' " ; 
        $sql = "UPDATE `usuarios` set enable=0  where id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
     
        return "OK";  
    }
    
    public function Save($data) {
        $sql="INSERT INTO `usuarios` 
            ( `Nombre`, `Apellido`, `Email`, `password`, `createdat` , `enable` ) VALUES 
            (
                '{$data["Nombre"]}', 
                '{$data["Apellido"]}', 
                '{$data["Email"]}', 
                '{$data["password"]}' , 
                now(), 
                1 
            )" ; 
        $result = mysqli_query(  $this->db, $sql  );
     
        return "OK";  
    }

    public function Update( $id , $data) {
       // $sql="INSERT INTO `usuarios` ( `Nombre`, `Apellido`, `Email`, `createdat` , `enable` , 'password') VALUES ( '{$data["Nombre"]}', '{$data["Apellido"]}', '{$data["Email"]}', '{$data["password"]}  now(),  '1')" ; 
        $sql = "UPDATE `usuarios` set  
            `Nombre` = '{$data["Nombre"]}'  , 
            `Apellido` = '{$data["Apellido"]}' , 
            `Email` = '{$data["Email"]}',
            `password` = '{$data["password"]}'  
            where id='{$id}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
     
        return "OK";  
    }

    public function CheckLogin ( $email, $password) {
        $sql = "SELECT * FROM `usuarios` where enable=1 and `Email`='{$email}' and  `password`='{$password}' " ; 
        $result = mysqli_query(  $this->db, $sql  );
        $row = $result->fetch_assoc() ;
        
        return ($row != null) ;  


        
    }

}