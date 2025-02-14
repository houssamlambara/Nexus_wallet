<?php

class wallet extends Controller {

    // Existing method for sending USDT
    public function sendUsdt($conn, $price, $getIdSend, $getUser) {
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

        public function sellCrypto($conn,$userId,$amount,$crypto,$cryptoPrice){

            $checkBalance = $conn->prepare("SELECT balance FROM wallets WHERE user_id = :getID AND crypto_id = :getCrypto AND balance >= :getAmount");
            $checkBalance->bindParam(":getID",$userId);
            $checkBalance->bindParam(":getCrypto",$crypto);
            $checkBalance->bindParam(":getAmount",$amount);
            if($checkBalance->execute() && $checkBalance->rowCount() > 0){
                $sellCrypto = $conn->prepare("UPDATE wallets SET balance = balance - :amount WHERE user_id = :getID AND crypto_id = :crypto");
                $sellCrypto->bindParam(":amount",$amount);
                $sellCrypto->bindParam(":getID",$userId);
                $sellCrypto->bindParam(":crypto",$crypto);
                if($sellCrypto->execute()){
                    
                }else{
                    $returnCrypto = $conn->prepare("UPDATE wallets SET balance = balance + :amount WHERE user_id = :getID AND crypto_id = :crypto");
                    $returnCrypto->bindParam(":amount",$amount);
                    $returnCrypto->bindParam(":getID",$userId);
                    $returnCrypto->bindParam(":crypto",$crypto);
                    if($returnCrypto->execute()){
                        return 'Faild to make the exchange, try again later!';
                    }else{
                        return 'Error, your sell is pending for now!';
                    }
                }
            }else{
                return 'Balance not enough!';
            }
        }
    }
    
