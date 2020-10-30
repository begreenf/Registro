<?php 

$carrera = [1 => "Redes de Informacion", 2 => "Mecatronica", 3 => "Manufactura Automatizada", 4 => "Multimedia", 5 => "Desarrollo de Software"];

function getLastElement($list) {
    $countList = count($list);
    $lastElement = $list[$countList - 1];
    return $lastElement;
};

function getCarrera($carreraid){
    return $GLOBALS['carrera'][$carreraid];
}

function searchProperty($list,$property,$value){

    $filter =[];

    foreach($list as $item){

        if($item[$property] == $value){
            array_push($filter, $item);
        }
    }

    return $filter;


}

function getIndexElement($list,$property,$value){

    $index = 0;

    foreach($list as $key => $item){

        if($item[$property] == $value){
            $index = $key;
        }
    }

    return $index;


}
