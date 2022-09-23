<?php
    namespace App\FrameworkTools\Implementations\Route;
    use App\FrameworkTools\ProcessServerElements;
    use App\Controllers\CarController;
    use App\Controllers\SellerController;
    use App\Controllers\BuyerController;
    use App\Controllers\SellController;
    class RouteProcess{
        public static function execute(){
            $processServerElements = ProcessServerElements::start();
            switch($processServerElements->getVerb()){
                case "GET":
                    switch($processServerElements->getRoute()){

                        case "/car":
                            return (new CarController)->getAll();
                        case "/car/id-by-car":
                            return (new CarController)->getById();
                        case "/car/name-by-car":
                            return (new CarController)->getByName();

                        case "/seller":
                            return (new SellerController)->getAll();
                        case "/seller/id-by-seller":
                            return (new SellerController)->getById();
                        case "/seller/name-by-seller":
                            return (new SellerController)->getByName();

                        case "/buyer":
                            return (new BuyerController)->getAll();
                        case "/buyer/id-by-buyer":
                            return (new BuyerController)->getById();
                        case "/buyer/name-by-buyer":
                            return (new BuyerController)->getByName();

                        case "/seller/get-all-car-by-seller":
                            return (new SellController)->getCarBySeller();
                        case "/buyer/get-all-cars":
                            return (new SellController)->getCarByBuyer();
                    }
                    break;
                case "POST":
                    break;
                case "PUT":
                    break;
                case "DELETE":
                    break;
            }
        }
    }
?>