<?php
    namespace App\Controllers;
    use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
    use App\FrameworkTools\Database\DatabaseConnection;
    class SellerController extends AbstractControllers{

        public function select($query){
            $databaseConnection = DatabaseConnection::start()->getPDO();
            $sellers = $databaseConnection
                    ->query("SELECT * FROM seller {$query};")
                    ->fetchAll();
            return $sellers;
        }

        public function getAll(){
            viewAsJson($this->select(""));
        }
        public function getById(){
            $reqVars = $this->processServerElements->getVariables();
            $id = null;
            $id = getFromVariables($reqVars, "idSellerr");
            $sellers = $this->select($id ? "WHERE seller.id_seller = {$id}" : "");
            viewAsJson($sellers);
        }
        public function getByName(){
            $reqVars = $this->processServerElements->getVariables();
            $name = null;
            $name = getFromVariables($reqVars, "nameSeller");
            $sellers = $this->select("WHERE seller.name LIKE '%{$name}%'"); //todos os vendedores com o nome nameSeller
            viewAsJson($sellers);
        }
    }
?>