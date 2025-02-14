<?php
class Watchlist
{
    private $user_id;
    private $crypto_id;
    private $crypto_name;

    public function addcrypto()
    {
        $pdo = DatabaseConnection::getInstance()->getConnection();

        $query = 'INSERT INTO watchlist (:user_id ,:crypto_name ,:crypto_name) Values (? , ? , ?)';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }
}
