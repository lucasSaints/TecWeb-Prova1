<?php
    namespace App\Controllers;
    use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
    use App\FrameworkTools\Database\DatabaseConnection;
    class BuyerController extends AbstractControllers{

        public function select($query){
            $databaseConnection = DatabaseConnection::start()->getPDO();
            $sellers = $databaseConnection
                    ->query("SELECT * FROM buyer {$query};")
                    ->fetchAll();
            return $sellers;
        }

        public function getAll(){
            viewAsJson($this->select(""));
        }
        public function getById(){
            $reqVars = $this->processServerElements->getVariables();
            $id = null;
            $id = getFromVariables($reqVars, "idBuyer");
            $sellers = $this->select($id ? "WHERE buyer.id_buyer = {$id}" : "");
            viewAsJson($sellers);
        }
        public function getByName(){
            $reqVars = $this->processServerElements->getVariables();
            $name = null;
            $name = getFromVariables($reqVars, "nameBuyer");
            $sellers = $this->select("WHERE buyer.name LIKE '%{$name}%'"); //todos os vendedores com o nome nameSeller
            viewAsJson($sellers);
        }
    }
?>