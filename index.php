<?php
    $mainPosition = __DIR__;
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    require_once("{$mainPosition}\helper\helper.php"); //importa pro processamento inteiro
    require_once("{$mainPosition}\\vendor\\autoload.php");
    use Bootstrap\Env; //importa apenas dentro deste arquivo
    use App\FrameworkTools\ProcessServerElements;
    use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElements;
    use App\FrameworkTools\Implementations\Route\RouteProcess;
    Env::execute();
    $factoryProcessServerElements = new FactoryProcessServerElements();
    $factoryProcessServerElements->operation();
    RouteProcess::execute();
?>