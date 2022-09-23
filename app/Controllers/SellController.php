<?php
    namespace App\Controllers;
    use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
    use App\FrameworkTools\Database\DatabaseConnection;
    class SellController extends AbstractControllers{

        public function select($query){
            $databaseConnection = DatabaseConnection::start()->getPDO();
            $sellers = $databaseConnection
                    ->query("SELECT car.id_car, car.car_model, car.motorization, car.name, car.year
                            FROM sells 
                            INNER JOIN car ON car.id_car = sells.id_car
                            INNER JOIN {$query}")
                    ->fetchAll();
            return $sellers;
        }

        public function getAll(){
            viewAsJson($this->select(""));
        }
        public function getCarBySeller(){
            $reqVars = $this->processServerElements->getVariables();
            $name = null;
            $name = getFromVariables($reqVars, "idSellerr");
            $sellers = $this->select("seller ON sells.id_seller = seller.id_seller ".
                ($name ? "WHERE seller.nameSeller LIKE '%{$name}%' OR seller.last_name LIKE '%{$name}%'" : ""));
            viewAsJson($sellers);
        }
        public function getCarByBuyer(){
            $reqVars = $this->processServerElements->getVariables();
            $name = null;
            $name = getFromVariables($reqVars, "nameBuyer");
            $sellers = $this->select("buyer ON sells.id_buyer = buyer.id_buyer ".
                ($name ? "WHERE buyer.name LIKE '%{$name}%' OR buyer.last_name LIKE '%{$name}%'" : "")); 
            viewAsJson($sellers);
        }
    }
?>