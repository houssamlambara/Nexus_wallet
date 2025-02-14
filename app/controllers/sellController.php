<?php



    session_start();
    require_once '../app/models/wallet.php';

    class sellController{

        public function sellCrypto(){
            
            if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['sellCrypto'])){
                $getUserId = $_SESSION['user_id'];
                $getCrypto = htmlspecialchars(trim($_POST['crypto']));
                $getAmount = htmlspecialchars(trim($_POST['amount']));
                
                $cryptoPrice = '';
                if(!empty($getUserId) && !empty($getCrypto) && !empty($getAmount)){
                    $createInstance = new wallet();
                    $callFunction = $createInstance->getPrice(DatabaseConnection::getInstance()->getConnection(),$getUserId,$getAmount,$getCrypto);
                    if($callFunction === true){
                        header('Location: http://localhost/Nexus_wallet/vente');
                        $_SESSION['alert'] = '<script>alert("Success sell!")</script>';
                    }else{
                        header('Location: http://localhost/Nexus_wallet/vente');
                        $_SESSION['alert'] = '<script>alert("'.$callFunction.'")</script>';
                    }
                }else{
                    header('Location: http://localhost/Nexus_wallet/vente');
                    $_SESSION['alert'] = '<script>alert("Invalid information!")</script>';
                }
            }else{
                header('Location: http://localhost/Nexus_wallet/vente');
                $_SESSION['alert'] = '<script>alert("Error try again!")</script>';
            }
            
        }
    }