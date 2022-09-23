<?php
    namespace App\FrameworkTools\Implementations\FactoryMethods;
    use App\FrameworkTools\Abstracts\FactoryMethods\AbstractFactoryMethods;
    use App\FrameworkTools\ProcessServerElements;
    use App\FrameworkTools\Implementations\FactoryMethods\BreakStringInVars;
    class FactoryProcessServerElements extends AbstractFactoryMethods{
        use BreakStringInVars;
        private $processServerElements;
        public function __construct(){
            $this->processServerElements = ProcessServerElements::start();
        }
        public function operation(){
            $this->processServerElements->setDocumentRoot($_SERVER["DOCUMENT_ROOT"]);
            $this->processServerElements->setServerName($_SERVER["SERVER_NAME"]);
            $this->processServerElements->setHttpHost($_SERVER["HTTP_HOST"]);
            $this->processServerElements->setURI($_SERVER["REQUEST_URI"]);
            $this->processServerElements->setVariables($this->breakStringInVars($_SERVER["REQUEST_URI"]));
            $this->processServerElements->setVerb($_SERVER["REQUEST_METHOD"]);
            $this->processServerElements->setRoute(explode("?", $_SERVER["REQUEST_URI"])[0]);
            //dd($_SERVER);
            //dd($this->processServerElements);
        }

    }
?>