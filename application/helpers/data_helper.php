<?php
if ( !defined('BASEPATH') )
    exit('No direct script access allowed');
function converterBR( $data )
{
    list($a , $m , $d) = explode("-" , $data);
    return "$d/$m/$a";
}

function converterUS( $data )
{
    list($d , $m , $a) = explode("/" , $data);
    return "$a-$m-$d";
}
/*
function data( $parametro )
{
    $retorno = date($parametro);

    $resultado[ 'l' ] = array("Monday" => "Segunda-Feira" , "Tuesday" => "Ter�a-Feira" , "Wednesday" => "Quarta-Feira" ,
            "Thursday" => "Quinta-Feira" , "Friday" => "Sexta-Feira" , "Saturday" => "Sabado" , "Sunday" => "Domingo");
    $resultado[ 'D' ] = array("Mon" => "Seg" , "Tue" => "Ter" , "Wed" => "Qua" , "Thu" => "Qui" , "Fri" => "Sext" , "Sat" => "Sab" , "Sun" => "Dom");
    $resultado[ 'F' ] = array("January" => "Janeiro" , "February" => "Fevereiro" ,
            "March" => "Março" , "April" => "Abril" ,
            "May" => "Maio" , "June" => "Junho" , "July" => "Julho" ,
            "August" => "Agosto" , "September" => "Setembro" , "October" => "Outubro" ,
            "November" => "Novembro" , "December" => "Dezembro");


    if ( isset($resultado[ $parametro ]) ) {
        return $resultado[ $parametro ][ $retorno ];
    } else {
        return $retorno;
    }
}

function adicionarDias( $data , $dias )
{
    list($a , $m , $d) = explode("-" , $data);
    return date("Y-m-d" , mktime(0 , 0 , 0 , $m , ($d + $dias) , $a));
}

function adicionarMeses( $data , $meses )
{
    list($a , $m , $d) = explode("-" , $data);
    return date("Y-m-d" , mktime(0 , 0 , 0 , ($m + $meses) , $d , $a));
}

function adicionarMesesFixo( $data , $meses )
{
    list($a , $m , $d) = explode("-" , $data);

    $ano = $a + (floor($meses / 12));
    $mes = $m + ($meses - (floor($meses / 12) * 12));
    if ( $mes > 12 ) {
        $ano++;
        $mes = ($mes - 12);
    }

    $ultimo_dia_atual = date("t" , mktime(0 , 0 , 0 , $m , $d , $a));

    if ( $ultimo_dia_atual == $d ) {
        $dia = date("t" , mktime(0 , 0 , 0 , $mes , 1 , $ano));
    } else {
        if ( checkdate($mes , $d , $ano) ) {
            $dia = $d;
        } else {
            $dia = date("t" , mktime(0 , 0 , 0 , $mes , 1 , $ano));
        }
    }
    return "$ano-$mes-$dia";
}

function adicionarAnos( $data , $anos )
{
    list($a , $m , $d) = explode("-" , $data);
    return date("Y-m-d" , mktime(0 , 0 , 0 , $m , $d , ($a + $anos)));
}

function diasEntreDatas( $data1 , $data2 )
{
    list($a1 , $m1 , $d1) = explode('-' , $data1);
    list($a2 , $m2 , $d2) = explode('-' , $data2);

    if ( $data1 > $data2 ) {
        $dias = floor(((mktime(0 , 0 , 0 , $m1 , $d1 , $a1) - mktime(0 , 0 , 0 , $m2 , $d2 , $a2)) / 86400));
    } else {
        $dias = floor(((mktime(0 , 0 , 0 , $m2 , $d2 , $a2) - mktime(0 , 0 , 0 , $m1 , $d1 , $a1)) / 86400));
    }
    return $dias;
}

function mesesEntreDatas( $data1 , $data2 )
{
    list($a1 , $mm , $d1) = explode('-' , $data1);
    list($a2 , $m2 , $d2) = explode('-' , $data2);

    if ( $data1 > $data2 ) {
        $meses = floor(((mktime(0 , 0 , 0 , $m1 , $d1 , $a1) - mktime(0 , 0 , 0 , $m2 , $d2 , $a2)) / 2592000));
    } else {
        $meses = floor(((mktime(0 , 0 , 0 , $m2 , $d2 , $a2) - mktime(0 , 0 , 0 , $m1 , $d1 , $a1)) / 2592000));
    }
    return $meses;
}

function anosEntreDatas( $data1 , $data2 )
{
    list($a1 , $m1 , $d1) = explode('-' , $data1);
    list($a2 , $m2 , $d2) = explode('-' , $data2);

    if ( $data1 > $data2 ) {
        $anos = floor(((mktime(0 , 0 , 0 , $m1 , $d1 , $a1) - mktime(0 , 0 , 0 , $m2 , $d2 , $a2)) / 31536000));
    } else {
        $anos = floor(((mktime(0 , 0 , 0 , $m2 , $d2 , $a2) - mktime(0 , 0 , 0 , $m1 , $d1 , $a1)) / 31536000));
    }
    return $anos;
}

function ultimoDiaMes( $data , $formato_data = false )
{
    list($a , $m , $d) = explode('-' , $data);
    $ultimo = date("t" , mktime(0 , 0 , 0 , $m , $d , $a));
    if ( $formato_data ) {
        $retorno = date('Y-m-d' , mktime(0 , 0 , 0 , ($m + 1) , ($d - 1) , $a));
    } else {
        $retorno = $ultimo;
    }
    return $retorno;
}
*/

function validaDataUS( $data )
{
    list($a , $m , $d) = explode('-' , $data);
    return checkdate($m , $d , $a);
}

function validaDataBR( $data )
{
    list($d , $m , $a) = explode('/' , $data);
    return checkdate($m , $d , $a);
}

function mes( $data )
{
    list($a , $m , $d) = explode('-' , $data);
    return $m;
}

function ano( $data )
{
    list($a , $m , $d) = explode("-"  , $data);
    return $a;
}

function dia( $data )
{
    list($x , $y , $z) = explode("-" , $data);
        return  $z;
}

function limparFormatacao( $data )
{
    return str_replace(array("/" , "-") , "" , $data);
}
/**
 * Function Name
 *
 * Function description
 *
 * @access    public
 * @param    type    name
 * @return    type    
 */
 
if (! function_exists('dia_semana'))
{
    function dia_semana( $data )
    {
        // 0=DOMINGO  /  6=SABADO
        list($a , $m , $d) = explode('-' , $data);
        return date("w" , mktime(0 , 0 , 0 , $m , $d , $a));
    }
    
}
/**
 * Function Name
 *
 * Function description
 *
 * @access    public
 * @param    type    name
 * @return    type    
 */
 
if (! function_exists('dia_semana_extenso'))
{
    function dia_semana_extenso($dia)
    {
        $dias = array(
                '0' => 'Domingo',
                '1' => 'Segunda-Feira',
                '2' => 'Terça-Feira',
                '3' => 'Quarta-Feira',
                '4' => 'Quinta-Feira',
                '5' => 'Sexta-Feira',
                '6' => 'Sábado'
                );
        return $dias[$dia];
    }
}
/**
 * Hora
 *
 * Retorna a hora atual
 *
 * @access    public
 * @return    String   
 */
 
if (! function_exists('hora'))
{
    function hora()
    {
        return date('H:i:s');
    }
}
/**
 * Data Extenso
 *
 * Retorna a data atual em extenso
 *
 * @access    public 
 * @return    String date    
 */
 
if (! function_exists('data_extenso'))
{
    function data_extenso($mes_abreviado = FALSE)
    {
         $meses = array(
                1 => 'janeiro',
                2 => 'fevereiro',
                3 => 'março',
                4 => 'abril',
                5 => 'maio',
                6 => 'junho',
                7 => 'julho',
                8 => 'agosto',
                9 => 'setembro',
                10 => 'outubro',
                11 => 'novembro',
                12 => 'dezembro'
                );
        if ($mes_abreviado) {
            $meses = array(
                1 => 'jan',
                2 => 'fev',
                3 => 'mar',
                4 => 'abr',
                5 => 'mai',
                6 => 'jun',
                7 => 'jul',
                8 => 'ago',
                9 => 'set',
                10 => 'out',
                11 => 'nov',
                12 => 'dez'
                );
        }
        $data = date("Y-n-d");
        $dia = dia($data);
        $mes = mes($data);
        $ano = ano($data);
        return $dia .' de '.$meses[$mes] .' de '.$ano;
    }
}
function periodoEntreDatas( $Data1 , $Data2 )
{

    $d1 = self::converterUS($Data1);
    $d2 = self::converterUS($Data2);

    $dias = self::diasEntreDatas($d1 , $d2);
    $anos = floor($dias / 365);
    $dias -= $anos * 365;
    $meses = floor($dias / 30);
    $dias -= $meses * 30;
    $dados = array('dias' => $dias , 'meses' => $meses , 'anos' => $anos , 'periodo' => "$anos anos, $meses meses, $dias dias.");
    return $dados;
}

function mesesPor30( $Dias , $cheio = true )
{
    $meses = $Dias / 30;
    if ( $cheio ) {
        $resto = $Dias % 30;
        if ( $resto ) {
            $meses++;
        }
    }
    return $meses;
}

function identificarData( $data , $padrao = false )
{
    $dt = str_replace(array("-" , "/" , " ") , "" , $data);
    $tam = strlen($dt);
    if ( $tam == 8 ) {
        $v = substr($dt , 4 , 2);
        if ( $v > 12 ) { /* 28041990 */
            $dia = substr($dt , 0 , 2);
            $mes = substr($dt , 2 , 2);
            $ano = substr($dt , 4 , 4);
        } else { /* 19900428 */
            $dia = substr($dt , 6 , 2);
            $mes = substr($dt , 4 , 2);
            $ano = substr($dt , 0 , 4);
        }
        if ( $ano < 1900 || $mes > 12 ) {
            $r = NULL;
        } else {
            if ( !checkdate($mes , $dia , $ano) ) {
                $r = NULL;
            } else {
                $r = "$ano-$mes-$dia";
            }
        }
    } else {
        $r = NULL;
    }
    if ( $r == NULL && $padrao ) {
        $r = $padrao;
    }
    return $r;
}

function verificarDataMaiorQueDiaCorrente( $data )
{
    return ($data >= Date('Y-m-d')) ? true : false;
}

/* End of file util_helper.php */
/* Location: ./application/helpers/data_helper.php */