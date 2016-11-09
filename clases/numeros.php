<?php

class numeros{
    
    public function traducir($cadena){
        
        $respuesta = "";
        
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
        
        switch($numero){
                
            case 1:
                
                return "one";
                
            break;
                
            case 2:
                
                return "two";
                
            break;
            
            case 3:
                
                return "three";
                
            break;
                
            case 4:
                
                return "four";
                
            break;
                
            case 5:
                
                return "five";
                
            break;
                
            case 6:
                
                return "six";
                
            break;
                
            case 7:
                
                return "seven";
                
            break;
                
            case 8:
                
                return "eight";
                
            break;
                
            case 9:
                
                return "nine";
                
            break;
                
            case 10:
                
                return "ten";
                
            break;
                
            case 11:
                
                return "eleven";
                
            break;
                
            case 12:
                
                return "twelve";
                
            break;
                
            case 13:
                
                return "thirteen";
                
            break;
                
            case 14:
                
                return "fourteen";
                
            break;
                
            case 15:
                
                return "fifteen";
                
            break;
                
            case 16:
                
                return "sixteen";
                
            break;
                
            case 17:
                
                return "seventeen";
                
            break;
                
            case 18:
                
                return "eighteen";
                
            break;
                
            case 19:
                
                return "nineteen";
                
            break;
                
            case 20:
                
                return "twenty";
                
            break;
                
            case 30:
                
                return "thirty";
                
            break;
                
            case 40:
                
                return "forty";
                
            break;
                
            case 50:
                
                return "fifty";
                
            break;
                
            case 60:
                
                return "sixty";
                
            break;
                
            case 70:
                
                return "seventy";
                
            break;
                
            case 80:
                
                return "eighty";
                
            break;
                
            case 90:
                
                return "ninety";
                
            break;
                
            case 100:
                
                return "hundred";
                
            break;
                
            case 1000:
                
                return "thousand";
                
            break;
                
            case 1000000:
                
                return "million";
                
            break;
                
            default:
            
                return "";
                
            break;
                
        }
        
    }    
    
    private function letras_numeros($texto){
        
        switch($texto){
                
            case "and":
                
                return 0;
                
            case "one":
                
                return 1;
                
            break;
                
            case "a":
                
                return 1;
                
            break;
                
            case "two":
                
                return 2;
                
            break;
            
            case "three":
                
                return 3;
                
            break;
                
            case "four":
                
                return 4;
                
            break;
                
            case "five":
                
                return 5;
                
            break;
                
            case "six":
                
                return 6;
                
            break;
                
            case "seven":
                
                return 7;
                
            break;
                
            case "eight":
                
                return 8;
                
            break;
                
            case "nine":
                
                return 9;
                
            break;
                
            case "ten":
                
                return 10;
                
            break;
                
            case "eleven":
                
                return 11;
                
            break;
                
            case "twelve":
                
                return 12;
                
            break;
                
            case "thirteen":
                
                return 13;
                
            break;
                
            case "fourteen":
                
                return 14;
                
            break;
                
            case "fifteen":
                
                return 15;
                
            break;
                
            case "sixteen":
                
                return 16;
                
            break;
                
            case "seventeen":
                
                return 17;
                
            break;
                
            case "eighteen":
                
                return 18;
                
            break;
                
            case "nineteen":
                
                return 19;
                
            break;
                
            case "twenty":
                
                return 20;
                
            break;
                
            case "thirty":
                
                return 30;
                
            break;
                
            case "forty":
                
                return 40;
                
            break;
                
            case "fifty":
                
                return 50;
                
            break;
                
            case "sixty":
                
                return 60;
                
            break;
                
            case "seventy":
                
                return 70;
                
            break;
                
            case "eighty":
                
                return 80;
                
            break;
                
            case "ninety":
                
                return 90;
                
            break;
                
            case "hundred":
                
                return 100;
                
            break;
                
            case "thousand":
                
                return 1000;
                
            break;
                
            case "million":
                
                return 1000000;
                
            break;
                
            default:
            
                return "#";
                
            break;
                
        }
        
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