<?php

namespace Domain\infrastructure\repositories\Sessions\Database;
use Domain\infrastructure\repositories\DatabaseRepository;
use Domain\infrastructure\repositories\Sessions\Interfaces\UsersSessionInterface;

class UsersSessionRepository  extends DatabaseRepository implements UsersSessionInterface
{
 
    public function execute()
    {
        $sql = "SELECT *, CONVERT_TZ( createdat ,'UTC', 'America/Santiago') fecha_creacion , CONVERT_TZ( Session_Create ,'UTC', 'America/Santiago') fecha_session FROM `usuarios` left join `Session` on `usuarios`.Email = `Session`.Session_User ";
        $result = mysqli_query($this->db, $sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows ; 
    }

}
