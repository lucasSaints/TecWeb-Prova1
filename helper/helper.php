<?php 
    function dd($input){
        var_dump($input);
        die();
    }
    function env($nameOfVariable){
        return $_ENV[$nameOfVariable];
    }
    function viewAsJson($var){
        echo json_encode($var);
    }
    function getFromVariables($array, $param){
        foreach($array as $value){
            if($value["name"] == $param) return $value["value"];
        }
    }
?>