<?php
class Watchlist
{
    private $user_id;
    private $crypto_id;
    private $db;

    public function __construct($user_id, $crypto_id)
    {
        $this->user_id = $user_id;
        $this->crypto_id = $crypto_id;
    }
    public function addcryptotchlist()
    {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        $query = 'INSERT INTO watchlist (user_id ,crypto_id) VALUES (:user_id :ctypto_id)';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $stmt->$pdo->bindParam(':crypto_id', $this->crypto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function showctyptowatchlist(){
        $pdo = DatabaseConnection::getInstance()->getConnection();
        $query ='SELECT * FROM watchlist';
        $stmt
    }
}
