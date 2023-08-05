<?php
use PHPUnit\Framework\TestCase;

use \Framework\Dump ; 


final class DumpTest extends TestCase
{

    public function testVoid()
    {
        $data = Dump::getInstance()->getData("default")  ;

        $this->assertTrue( is_array( $data ) &&  count( $data ) == 0 );
    }

    public function testDumpDefault()
    {
        Dump::getInstance()->set("Julian", "nombre")  ;
        $data = Dump::getInstance()->getData("default")  ;

        $this->assertTrue( is_array( $data ) &&  count( $data ) == 1 );
    }


    public function testDumpDOS()
    {
        Dump::getInstance()->set("Julian", "nombre")  ;


        Dump::getInstance()->setGroup( "DOS", "DOS" ) ; 

        Dump::getInstance()->set("Vidal", "apellido")  ;
        $data = Dump::getInstance()->getData("DOS")  ;

        $data2 = Dump::getInstance()->getAll()  ;

        $this->assertTrue( is_array( $data ) &&  count( $data ) == 1 );
    }

}