<?php
    namespace App\FrameworkTools\Abstracts\Controllers;
    use App\FrameworkTools\ProcessServerElements;
    abstract class AbstractControllers{
        protected $processServerElements;
        public function __construct(){
            header('Content-Type: application/'.env('TYPE_API'));
            $this->processServerElements = ProcessServerElements::start();

        }
    }
?>