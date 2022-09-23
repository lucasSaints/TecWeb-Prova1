<?php
    namespace App\FrameworkTools;
    class ProcessServerElements{
        private static $instance;
        private $documentRoot, $serverName;
        private $httpHost, $uri, $variables, $verb, $route;
        private function __construct(){
            //throw new \Exception("Essa classe não pôde ser startada por novo Process, apenas pela função start");
        }
        public static function start(){
            if(!ProcessServerElements::$instance){
                ProcessServerElements::$instance = new ProcessServerElements();
            }
            return ProcessServerElements::$instance;
        }
        public function setDocumentRoot($docRoot){
            $this->documentRoot = $docRoot;
        }
        public function getDocumentRoot(){
            return $this->documentRoot;
        }
        public function setServerName($servName){
            $this->serverName = $servName;
        }
        public function getServerName(){
            return $this->serverName;
        }
        public function setHttpHost($httpHost){
            $this->httpHost = $httpHost;
        }
        public function getHttpHost(){
            return $this->httpHost;
        }
        public function setURI($uri){
            $this->uri = $uri;
        }
        public function getURI(){
            return $this->uri;
        }
        public function setVariables($variables){
            $this->variables = $variables;
        }
        public function getVariables(){
            return $this->variables;
        }
        public function setVerb($verb){
            $this->verb = $verb;
        }
        public function getVerb(){
            return $this->verb;
        }
        public function setRoute($route){
            $this->route = $route;
        }
        public function getRoute(){
            return $this->route;
        }
    }
?>