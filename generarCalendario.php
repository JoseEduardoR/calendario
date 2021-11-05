<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "generare el calendario";

$inicio = $_POST['inicio'];
$fin = $_POST['fin'];

$inicioExploded = explode('-', $inicio);
$finExploded = explode('-', $fin);

$fechaInicioOrdenada = $inicioExploded[1] . '-' . $inicioExploded[0] . '-' . '-' . '1';
$fechaFinOrdenada = $finExploded[1] . '-' . $finExploded[0] . '-' . '-' . '1';

$fechaInicio = strtotime($inicioExploded[1] . '-' . $inicioExploded[0] . '-' . '01');
$fechaFin = strtotime($finExploded[1] . '-' . $finExploded[0] . '-' . '01');

$anioInicio = date('Y', $fechaInicio);
$anioFin = date('Y', $fechaFin);

$mesInicio = date('m', $fechaInicio);
$mesFin = date('m', $fechaFin);

$diff = (($anioFin - $anioInicio) * 12) + ($mesFin - $mesInicio);

$tabla = '<table>';
$tabla .= '<tr><th>Calendario</th></tr>';

for($i=0; $i<$diff; $i++){

    $tabla .= '<tr><td><input type="date"></td></tr>';

}

echo $tabla;


/*echo $mesInicio;
echo '<br>';
echo $mesFin;-/




/*echo $fechaInicio . '<br>';
echo $fechaFin;

if($fechaInicio > $fechaFin){
    echo 'la fecha inicio es mayor que la fecha inicial';
}

else{
    echo 'las fechas son correctas, procedemos a generar el calendario';
}

*/

/*echo $inicio;
echo $fin;*/

