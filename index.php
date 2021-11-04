<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="POST" action="generarCalendario.php">
            
            <div>
            <label for="inicio">Inicio</label>
            <input type="text" pattern="(0?[1-9]|1[0-2])-(\d{4})" name="inicio" placeholder="MM-YYYY" id="inicio">
            </div>
            
            <div>
            <label for="fin">Fin</label>
            <input type="text" pattern="(0?[1-9]|1[0-2])-(\d{4})" name="fin" placeholder="MM-YYYY" onblur="validarFecha();" id="fin">
            </div>
            <div>
            <select name="columnas">
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
            
            <input type="submit" value="generar calendario"/>
            
        </form>
    </body>
    
    <script>
     
     function validarFecha(){
         
         let inicio = document.getElementById('inicio');
         console.log(inicio);
         let fin = document.getElementById('fin');
         console.log(fin);
     }
     
    </script>
    
</html>




