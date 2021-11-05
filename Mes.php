<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mes
 *
 * @author jedua
 */
class Mes {
    
    public $anio;
    public $mes;
    public $primerDia;
    public $primerDiaLetras;
    public $ultimoDia;
    public $ultimoDiaLetras;
    public $ultimoDiaNumero;
    public $calendario;
    public $posicionPrimerDia;
    public $mesLetra;
            
    function __construct($anio, $mes) {
        
        $this->anio = $anio;
        $this->mes = $mes;
        $this->determinarIntervaloDeDias();
        $this->establecerPosicionPrimerDia();
        $this->establecerMesLetra();
        $this->generarCalendario();
        
    }
    
    public function determinarIntervaloDeDias(){
        
        $this->primerDia = new DateTime("$this->anio-$this->mes-01");
        $this->primerDiaLetras = $this->primerDia->format('D');
        $this->ultimoDia = new DateTime($this->primerDia->format('Y-m-t'));
        $this->ultimoDiaLetras = $this->ultimoDia->format('D');
        $this->ultimoDiaNumero = $this->ultimoDia->format('d');
        
    }
    
    public function establecerPosicionPrimerDia(){
        
        $dias = array('Sun'=>0, 'Mon'=>1, 'Tue'=>2, 'Wed'=>3, 'Thu'=>4, 'Fri'=>5, 'Sat'=>6);
        $this->posicionPrimerDia = $dias[$this->primerDiaLetras];
    
    }
    
    public function establecerMesLetra(){
        
        $meses = array(1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'novimembre', 12 => 'diciembre');  
        $this->mesLetra = $meses[$this->mes];
        
  
    }
    

    public function generarCalendario(){
        
        $this->calendario = '<table border=1>'.
                '<tr><th colspan=7>'.$this->mesLetra. ' ' . $this->anio .'</th></tr>'.
                '<tr><th>d</th><th>l</th><th>m</th><th>m</th><th>j</th><th>v</th><th>s</th></tr>';
        

        $i = 0;
        $j = 0;
        
        while ($j < $this->ultimoDiaNumero) {

            if($i == 0){
                
                    $this->calendario .= '<tr>';

            }
            
            
            if($i  == $this->posicionPrimerDia){
               
                $j=1;
                $this->calendario .= '<td>'.$j.'</td>';

            }
            
            elseif($j>=1){

                $j++;
                $this->calendario .= '<td>'.$j.'</td>';
                
                               
            }
            
            else{
                
                $this->calendario .= '<td> </td>';

            }
            
            $i++;


            if($i % 7 == 0 && $i > 1){
                
                $this->calendario .= '</tr><tr>';
                
            }
            
            
        }

        
        $this->calendario .= '</table>';
        
    }
    
}
