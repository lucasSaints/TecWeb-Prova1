<?php
    namespace App\Controllers;
    use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
    use App\FrameworkTools\Database\DatabaseConnection;
    class CarController extends AbstractControllers{

        public function select($query){
            $databaseConnection = DatabaseConnection::start()->getPDO();
            /*mysql_connect("localhost:776","root","") or die('Não foi possivel conectar: '.mysql_error());
            $selecao = mysql_select_db("car");*/
            $cars = $databaseConnection
                    ->query("SELECT * FROM car {$query};")
                    ->fetchAll();
            return $cars;
        }

        public function getAll(){
            viewAsJson($this->select(""));
        }
        public function getById(){
            $reqVars = $this->processServerElements->getVariables();
            $id = null;
            $id = getFromVariables($reqVars, "idCar");
            $cars = $this->select($id ? "WHERE car.id_car = {$id}" : "");
            viewAsJson($cars);
        }
        public function getByName(){
            $reqVars = $this->processServerElements->getVariables();
            $name = null;
            $name = getFromVariables($reqVars, "nameCar"); //todos os carros com determinado nameCar 
            $cars = $this->select("WHERE car.name = '{$name}'");
            viewAsJson($cars);
        }
    }
?>