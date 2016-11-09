<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script>
    
        jQuery(document).ready(function(){
            
            jQuery("form").submit(sumar);
            
        })
        
        function sumar(){
            
            jQuery.ajax({
                    type: "POST",
                    url: "sumar.php",
                    data: "num1="+jQuery(".numero1").val()+"&num2="+jQuery(".numero2").val(),
                    success: function(datos){
                   jQuery(".respuesta").html(datos);
                  }
            });
            
            return false;
            
        }
        
    </script>
    
    <style>
    

        @font-face {
               font-family: 'tisa';
               src = url("a_little_pot/alittlepot.ttf");

        }
        
        div#contenedor {
            width: 600px;
            margin: auto;
            display: block;
            background: url(fondo.jpg) no-repeat;
            background-size: 100%;
            height: 420px;
            font-family:tisa; 
            position: relative;
        }
        
        input[type="text"], .respuesta {
            font-family: tisa;
            background: transparent;
            border: 0px;
            position: absolute;
            border-bottom: 2px solid #fff;
            color: #fff;
            width: 50%;
        }
        
        .numero1{
            
            top:15%;
            right: 15%;
            
        }
        
        .numero2{
            top:25%;
            right: 15%;
            
        }
        
        .respuesta{
            top:50%;
            right: 15%;
            min-height: 20px;
            
        }
        
        span.signo {
            position: absolute;
            font-family: tisa;
            font-size: 45px;
            color: #fff;
            font-weight: bold;
            top: 20%;
            left: 25%;
        }
        
        .signo2 {
            top: 50%;
            position: absolute;
            font-family: tisa;
            font-size: 45px;
            color: #fff;
            font-weight: bold;
            left: 25%;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div id="contenedor">
        
        <form method="post">
            
            <input type="text" name="numero1" class="numero1">
        
           <span class="signo">+</span>
            
            <input type="text" name="numero2" class="numero2">

             <input type="submit" class="signo2" value="=">
           
            <span class="respuesta"></span>
            
        </form>    
        
        
    </div>
</body>
</html>