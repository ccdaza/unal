<?php

class numeros{
    
    public $arr_num = "";
    
    public function traducir($cadena){
        
        $respuesta = "";
        
        $this->arr_num = json_decode(file_get_contents("numeros.json"), 1);
        
        if(gettype($cadena) == "integer"){
            
            $numeros = numeros::separar_numeros($cadena);
            
            $texto = [];
                           
            foreach($numeros as $numero){
            
                if($numero == 100){
                    
                    $texto[] = "and";
                    
                }
                
                $texto[] = $this->numeros_letras($numero);
                
            }
                      
            
            $respuesta = implode(" ", array_reverse($texto));
            
        }elseif(gettype($cadena) == "string"){
            
            $cadena = strtolower($cadena);
            
            $explotarCadena = explode(" ", $cadena);
            
            $numeros = array_map(array($this, "letras_numeros"), $explotarCadena);
            
            $numero = 0;
            
            $cont = 0;
            
            $misNumeros = [];
            
            foreach($numeros as $n => $parte){
                
                if($parte == "#"){
                    
                    return "zero";
                    
                }
               
                if($parte == 100 || $parte == 1000 || $parte == 1000000){
                    
                    $total = 0;
                    
                    foreach($misNumeros[$cont] as $num){
                        
                       $total += $num; 
                        
                    }
                    
                    $ant = $cont-1;
                    
                    if(isset($misNumeros[$ant]) && $misNumeros[$ant] < $parte){
                        
                        $misNumeros[$ant] = ($misNumeros[$ant] * $parte) + ($total * $parte);
                        
                        unset($misNumeros[$cont]);
                        
                    }else{
                       
                        $misNumeros[$cont] = $total * $parte;
                        
                        $cont += 1;
                        
                    }
                    
                    continue;
                    
                }
                
                $misNumeros[$cont][] = $parte;
                
            }
            
            
            
            $respuesta = $this->sumar($misNumeros);
            
        }
        
        return $respuesta;
        
    }
    
    private function numeros_letras($numero){
        
        return isset($this->arr_num["NUM"]["{$numero}"]) ? $this->arr_num["NUM"]["{$numero}"] : "";
        
    }    
    
    private function letras_numeros($texto){
        
       return isset($this->arr_num["LETRAS"]["{$texto}"]) ? $this->arr_num["LETRAS"]["{$texto}"] : "#";
        
    }
    
    
    static function separar_numeros($numero){
        
        $numero = array_reverse(str_split($numero));
        
        $numeros = [];
        
        foreach($numero as $cifra => $num){
            
                $nuevoNumero = $num*pow(10, $cifra);
                            
                if($nuevoNumero >= 1000000){
                    
                    $nuevoNumero = intval($nuevoNumero/1000000);
                    
                    $numeros[9] = 1000000;
                    
                    if($nuevoNumero == 10){
                        
                        $ant = end($numeros);
                        
                        if($ant >= 10){
                            
                            $numeros[] = $nuevoNumero;
                            
                        }else{
                            
                            $k = key($numeros);
                        
                            unset($numeros[$k]);

                            $numeros[] = $nuevoNumero + $ant;
                            
                        }
                        

                    }else{
                        
                        $numeros[] = $nuevoNumero;
                        
                    } 
                    
                    
                    
                }elseif($nuevoNumero >= 1000){
                    
                    $nuevoNumero = intval($nuevoNumero/1000);
                    
                    $numeros[5] = 1000;
                    
                    if($nuevoNumero == 10){
                        
                        $ant = end($numeros);
                        
                        if($ant >= 10){
                            
                            $numeros[] = $nuevoNumero;
                            
                        }else{
                            
                            $k = key($numeros);
                        
                            unset($numeros[$k]);

                            $numeros[] = $nuevoNumero + $ant;
                            
                        }
                        

                    }else{
                        if($nuevoNumero >= 100){
                            
                            $numeros = array_merge($numeros, numeros::centena($nuevoNumero));
                            
                        }else{
                            
                            $numeros[] = $nuevoNumero;
                            
                        }
                        
                        
                    }                        
                    
                }elseif($nuevoNumero >= 100){
                    
                    $numeros = array_merge($numeros, numeros::centena($nuevoNumero));
                    
                    
                }else{
                    
                    if($nuevoNumero == 10){
                        
                        $ant = end($numeros);
                        
                        if($ant >= 10){
                            
                            $numeros[] = $nuevoNumero;
                            
                        }else{
                            
                            $k = key($numeros);
                        
                            unset($numeros[$k]);

                            $numeros[] = $nuevoNumero + $ant;
                            
                        }
                        

                    }else{
                        
                        $numeros[] = $nuevoNumero;
                        
                    }                      
                                        
                }  
            
                
        }
        
        return $numeros;
        
    }
    

    static function centena($numero){
        
        $array = [];
        
        $nuevoNumero = intval($numero/100);
                    
        $array[] = 100;
                    
        $array[] = $nuevoNumero;
        
        return $array;
        
    }
    
    static function vacios($numero){
        
        return($numero != 0);
        
    }
    
    public function sumar($numeros){
        
        $total = 0;
        
        foreach($numeros as $num){
            
            if(is_array($num)){
                
                $total += $this->sumar($num);
                
            }else{
                
                $total += $num;
                
            }           
            
        }
        
        return $total;
        
        
    }
    
    
    
}

?>