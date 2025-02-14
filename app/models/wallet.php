
<?php





    class wallet extends Controller {

        public function sendUsdt($conn, $price, $getIdSend, $getUser) {

            $checkMoney = $conn->prepare("SELECT usdt_balance FROM users WHERE id = :sender");
            $checkMoney->bindParam(":sender",$getIdSend);
            if($checkMoney->execute() && $checkMoney->fetchColumn() >= $price){
                $getMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance - :getAmount WHERE id = :getIdSend");
                $getMoney->bindParam(":getAmount", $price);
                $getMoney->bindParam(":getIdSend", $getIdSend);            

                if($getMoney->execute()) {
                    $addMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance + :getAmount WHERE email = :getUser OR nexus_id = :getUser");
                    $addMoney->bindParam(":getAmount", $price);
                    $addMoney->bindParam(":getUser", $getUser);
                    
                    if($addMoney->execute()) {
                        return true;
                    } else {
                        $returnMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance + :getAmount WHERE id = :getIdSend");
                        $returnMoney->bindParam(":getAmount", $price);
                        $returnMoney->bindParam(":getIdSend", $getIdSend);  
                        
                        if($returnMoney->execute()) {
                            return 'Faild to send money, try again later!';
                        } else {
                            return 'Error try again later!';
                        }
                    }
                } else {
                    return 'Invalid balance!';
                }
            }else{
                
            }

            

        }
        public function getBalance($userId) {
            $conn = DatabaseConnection::getInstance()->getConnection();
            $balance = $conn->prepare("SELECT usdt_balance FROM users WHERE id = :userId");
            $balance->bindParam(":userId", $userId);
            $balance->execute();
            return $balance->fetchColumn();
        }

        public function userWallet($idUser) {
            $conn = DatabaseConnection::getInstance()->getConnection();
            $crypto = $conn->prepare("
            SELECT 
                c.name AS crypto_name, 
                c.symbol, 
                w.balance
            FROM wallets w
            JOIN cryptos c ON w.crypto_id = c.id
            WHERE w.user_id = :user_id;
        ");
            $crypto->bindParam(":user_id", $idUser);
            $crypto->execute();
            return $crypto->fetchAll(PDO::FETCH_ASSOC);
        }




    }
