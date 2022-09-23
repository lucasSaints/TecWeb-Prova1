<?php
    namespace Bootstrap;

    class Env{
        /*private $mainDir;
        public function __construct(){
            $this->mainDir = __DIR__;
        }*/
        public static function execute(){
            //echo '<br>lelele';
            $contentOfEnvFile = file_get_contents(__DIR__."\..\.env");
            $arrayEnv = explode("\n", $contentOfEnvFile);
            foreach($arrayEnv as $value){
                $keyAndValue = explode("=", $value);
                explode("=", $value);
                if(!isset($keyAndValue[1])) continue;
                $nameOfVariable = $keyAndValue[0];
                $valueOfVariable = $keyAndValue[1];
                $_ENV[$nameOfVariable] = $valueOfVariable;
                //echo '<br>lili '.$nameOfVariable.": ".$valueOfVariable;
                //dd($_ENV);
            }
        }
    }
?>