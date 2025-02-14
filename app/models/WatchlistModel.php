<?php
class WatchlistModel
{
    private $db;

    public function __construct()
    {
        // Get the database connection instance
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    // Add cryptocurrency to the watchlist
    public function addToWatchlist($data)
    {
        $query = 'INSERT INTO watchlist (user_id, crypto_id, crypto_name, coin_symbol, coin_price, coin_image) 
                  VALUES (:user_id, :crypto_id, :crypto_name, :coin_symbol, :coin_price, :coin_image)';

        $stmt = $this->db->prepare($query);

        // Bind values
        $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':crypto_id', $data['crypto_id'], PDO::PARAM_STR);
        $stmt->bindValue(':crypto_name', $data['crypto_name'], PDO::PARAM_STR);
        $stmt->bindValue(':coin_symbol', $data['coin_symbol'], PDO::PARAM_STR);
        $stmt->bindValue(':coin_price', $data['coin_price'], PDO::PARAM_STR); // Use PARAM_STR for decimal values
        $stmt->bindValue(':coin_image', $data['coin_image'], PDO::PARAM_STR);

        // Execute the query
        return $stmt->execute();
    }

    // Get watchlist by user ID
    public function getWatchlistByUserId($userId)
    {
        $query = 'SELECT * FROM watchlist WHERE user_id = :user_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function removefromwatchlist($crypto_id)
    {
        $query = 'DELETE FROM watchlist WHERE crypto_id = :crypto_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':crypto_id', $crypto_id, PDO::PARAM_STR);
        $stmt->execute();

    }
}
