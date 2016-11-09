<?php

require_once("clases/numeros.php");

$num1 = $_POST["num1"];

$num2 = $_POST["num2"];

preg_match('/[0-9]/', $num1, $respNum1, PREG_OFFSET_CAPTURE);

preg_match('/[0-9]/', $num2, $respNum2, PREG_OFFSET_CAPTURE);

if(empty($respNum1) && empty($respNum2)){
    
    $numeros = new numeros();
    
    $numero1 = $numeros->traducir($num1);
    
    $numero2 = $numeros->traducir($num2);
    
    if($numero1 == "zero" || $numero2 == "zero"){
        
        print("zero");
        
    }else{
       
        $respuesta = $numero1 + $numero2;
    
        print($numeros->traducir($respuesta));
        
    } 
    
}else{
    
    print("zero");
    
}

?>