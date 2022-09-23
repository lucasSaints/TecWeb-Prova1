<?php
    namespace App\FrameworkTools\Implementations\FactoryMethods;
    trait BreakStringInVars{
        public function breakStringInVars($stringOfVars){
            $url = explode("?", $stringOfVars);
            if(!isset($url[1])) return null;
            return array_map(function($e){ 
                $vars = explode("=", $e);
            return [/*$vars[0] => $vars[1]*/ "name" => $vars[0], "value" => $vars[1]]; 
            }, explode("&", $url[1]) );
        }
    }
?>