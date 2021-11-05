
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Calendario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body class="body">
        
<?php

date_default_timezone_set('America/Mexico_City');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

require_once 'Mes.php';

$log = array();


$fechaVisita = new DateTime();

$log['fecha'] = $fechaVisita->format('y-m-d') . '-*-';
$log['hora'] = $fechaVisita->format('H:i:s') . '-*-';
$log['ip'] = $_SERVER['REMOTE_ADDR'] . "\r\n";

//print_r($_SESSION);

$log['fechaInicio'];
$log['fechaFin'];

file_put_contents('access_log', $log, FILE_APPEND | LOCK_EX);



$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$columnas = $_POST['columnas'];


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

$meses = array();
$objetosCalendario = array();

$mesCorriente = $mesInicio;
$anioCorriente = $anioInicio;


while($anioCorriente <= $anioFin){
    
    $mesFinal = $anioCorriente == $anioFin ? $mesFin : 12;
    
    for($i = $mesCorriente; $i <= $mesFinal; $i++){

        if(!is_array($meses[$anioCorriente])){
           
            $meses[$anioCorriente] = array();
            array_push($meses[$anioCorriente], $i);
            //$meses[$anioCorriente] = $anioCorriente . '-' . $i;
        }
        
        else{
            //$meses[$anioCorriente] = $anioCorriente . '-' . $i;
            array_push($meses[$anioCorriente], $i);

        }
        
        
    }
     
    $mesCorriente = 1;
    $anioCorriente++;
        
    
    
}

foreach ($meses as $anio => $meses) {

    foreach ($meses as $mes) {

        $mesC = new Mes($anio, $mes);
        array_push($objetosCalendario, $mesC);
    }
}


    $tablaCalendario = '<div><table class="table_calendar"><tr>';


    for($i = 0; $i < count($objetosCalendario); $i++){
        
               
        if($i % $columnas == 0){
            
            $tablaCalendario .= '</tr><tr>';
            
        }
        
        if($i == $columnas){
            
            $tablaCalendario .= '</tr>';
            
        }
        
        $tablaCalendario.= '<td>' . $objetosCalendario[$i]->calendario . '</td>';


    }
    
    $tablaCalendario .= '</table></div>';   

    
    echo '</body></html>';
        
          
    
    echo $tablaCalendario;

    





