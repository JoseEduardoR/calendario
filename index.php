<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
date_default_timezone_set('America/Mexico_City');
session_start();

?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <body class="body">
        
        <h1 class="header">Calendario</h1>
        
        <form method="POST" action="generarCalendario.php" onsubmit="return validarFecha();">
            
            <div>
                <label class="label" for="inicio">Inicio</label>
            <input class="input" required type="text" pattern="(0?[1-9]|1[0-2])-(\d{4})" name="inicio" placeholder="MM-YYYY" id="inicio">
            </div>
            
            <div>
                <label class="label" for="fin">Fin</label>
            <input class="input" required type="text" pattern="(0?[1-9]|1[0-2])-(\d{4})" name="fin" placeholder="MM-YYYY" onblur="validarFecha();" id="fin">
            </div>
            <div>
                <label class="label" for="columnas">Columnas</label>    
            <select name="columnas" class="input">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
            </div>
            
            <input class="boton" type="submit" value="generar calendario"/>
            
        </form>
    </body>
    
    <script>
     
     function validarFecha(){
         
         let inicio = document.getElementById('inicio');
         let fin = document.getElementById('fin');
         
         let fechaInicio = inicio.value.split('-');
         let fechaFin = fin.value.split('-');
         
         
         let dateInicio = new Date(fechaInicio[1], fechaInicio[0], 0);
         let dateFin = new Date(fechaFin[1], fechaFin[0], 0);
         
         if(dateFin < dateInicio){
             
             alert("la fecha fin no puede ser menor que la fecha inicio");

             inicio.value = '';
             fin.value = '';
             
                return false;
  
         }
         
         else{
             console.log("procedemos a generar el calendario indicado");
         }     
         
     }
     
    </script>
    
</html>




