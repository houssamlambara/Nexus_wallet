<?php

    require_once '../app/models/wallet.php';
    session_start();

    class envoiController extends Controller{


        public function sendUsdt(){
            if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['send']) && isset($_SESSION['user_id'])){
                $getDirection = htmlspecialchars(trim($_POST['recipient']));
                $typeCrypto = htmlspecialchars(trim($_POST['crypto']));
                $getAmount = htmlspecialchars(trim($_POST['amount']));
                if(!empty($getDirection) && !empty($typeCrypto) && !empty($getAmount)){

                    $createInstance = new wallet();
                    
                    if($typeCrypto === "USDT"){
                        $reponse = $createInstance->sendUsdt(DatabaseConnection::getInstance()->getConnection(),$getAmount,$_SESSION['user_id'],$getDirection);
                        if($reponse === true){
                            $_SESSION['alert'] = '<script>alert("USDT sended successfuly!")</script>';
                            header("Location: http://localhost/Nexus_wallet/envoi");
                        }else{
                            $_SESSION['alert'] = '<script>'.$reponse.'</script>';
                            header("Location: http://localhost/Nexus_wallet/envoi");
                        }
                    }
                }

            }
        }
    }