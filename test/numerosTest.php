<?php
require_once("clases/numeros.php");

class numerosTest extends \PHPUnit_Framework_TestCase
{
    public function testRespuestaNoVacia(){
        
        $numeros = new numeros();
        
        $num1 = $numeros->traducir("one million");
        
        $this->assertNotNull($num1);
        
    } 
}
?>