<?php

class wallet extends Controller {

    // Existing method for sending USDT
    public function sendUsdt($conn, $price, $getIdSend, $getUser)
    {
        $checkMoney = $conn->prepare("SELECT usdt_balance FROM users WHERE id = :sender");
        $checkMoney->bindParam(":sender", $getIdSend);
        if ($checkMoney->execute() && $checkMoney->fetchColumn() >= $price) {
            $getMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance - :getAmount WHERE id = :getIdSend");
            $getMoney->bindParam(":getAmount", $price);
            $getMoney->bindParam(":getIdSend", $getIdSend);

            if ($getMoney->execute()) {
                $addMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance + :getAmount WHERE email = :getUser OR nexus_id = :getUser");
                $addMoney->bindParam(":getAmount", $price);
                $addMoney->bindParam(":getUser", $getUser);

                if ($addMoney->execute()) {
                    return true;
                } else {
                    $returnMoney = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance + :getAmount WHERE id = :getIdSend");
                    $returnMoney->bindParam(":getAmount", $price);
                    $returnMoney->bindParam(":getIdSend", $getIdSend);

                    if ($returnMoney->execute()) {
                        return 'Failed to send money, try again later!';
                    } else {
                        return 'Error, try again later!';
                    }
                }
            } else {
                return 'Invalid balance!';
            }
        } else {
            return 'Insufficient balance!';
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
        $crypto = $conn->prepare( $query = "SELECT 
        c.name AS crypto_name, 
        c.symbol, 
        w.balance
    FROM wallets w
    JOIN cryptos c ON w.crypto_id = c.id::VARCHAR
    WHERE w.user_id = :user_id");

        $crypto->bindParam(":user_id", $idUser);
        $crypto->execute();
        return $crypto->fetchAll(PDO::FETCH_ASSOC);
    }







    public function sellCrypto($conn, $userId, $amount, $crypto, $cryptoPrice) {
            // Check if amount and cryptoPrice are valid
            if (empty($amount) || !is_numeric($amount)) {
                return 'Amount must be a valid number!';
            }
        
            if (empty($cryptoPrice) || !is_numeric($cryptoPrice)) {
                return 'Crypto price must be a valid number!';
            }
        
            $checkBalance = $conn->prepare("SELECT balance FROM wallets WHERE id = :getID AND crypto_id = :getCrypto AND balance >= :getAmount");
            $checkBalance->bindParam(":getID", $userId);
            $checkBalance->bindParam(":getCrypto", $crypto);
            $checkBalance->bindParam(":getAmount", $amount);
            if ($checkBalance->execute() && $checkBalance->rowCount() > 0) {
                $sellCrypto = $conn->prepare("UPDATE wallets SET balance = balance - :amount WHERE id = :getID AND crypto_id = :crypto");
                $sellCrypto->bindParam(":amount", $amount);
                $sellCrypto->bindParam(":getID", $userId);
                $sellCrypto->bindParam(":crypto", $crypto);
                if ($sellCrypto->execute()) {
                    $addCrypto = $conn->prepare("UPDATE users SET usdt_balance = usdt_balance + :amount WHERE id = :getID");
                    $addCrypto->bindParam(":amount", $cryptoPrice);
                    $addCrypto->bindParam(":getID", $userId);
                    if ($addCrypto->execute()) {
                        return true;
                    } else {
                        // Revert the sell operation if adding the crypto failed
                        $returnCrypto = $conn->prepare("UPDATE wallets SET balance = balance + :amount WHERE id = :getID AND crypto_id = :crypto");
                        $returnCrypto->bindParam(":amount", $amount);
                        $returnCrypto->bindParam(":getID", $userId);
                        $returnCrypto->bindParam(":crypto", $crypto);
                        if ($returnCrypto->execute()) {
                            return 'Failed to make the exchange, try again later!';
                        } else {
                            return 'Error, your sell is pending for now!';
                        }
                    }
                } else {
                    return 'Failed to make a sell, try again later!';
                }
            } else {
                return 'Balance not enough!';
            }
        }
        

        public function getPrice($conn,$userId,$amount,$crypto){
            $checkExict = $conn->prepare("SELECT coin_price FROM watchlist WHERE crypto_id = :crypto AND id = :getID");
            $checkExict->bindParam(":crypto",$crypto);
            $checkExict->bindParam(":getID",$userId);
            if($checkExict->execute() && $checkExict->rowCount() > 0){
                $getAmountUsdt = $checkExict->fetchColumn()*$amount;
                return $this->sellCrypto($conn,$userId,$amount,$crypto,$getAmountUsdt);
            }else{
                return "Invalid crypto!";
            }
        }

        public static function getCryptoWatchlist($conn){
            $getCrypto = $conn->prepare("SELECT * FROM watchlist");
            if($getCrypto->execute() && $getCrypto->rowCount() > 0){
                return $getCrypto;
            }else{
                return null;
            }
        }

    }
