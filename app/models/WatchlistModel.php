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
        try {
            // Check if the cryptocurrency is already in the user's watchlist
            $checkQuery = 'SELECT COUNT(*) FROM watchlist WHERE user_id = :user_id AND crypto_id = :crypto_id';
            $checkStmt = $this->db->prepare($checkQuery);
            $checkStmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
            $checkStmt->bindValue(':crypto_id', $data['crypto_id'], PDO::PARAM_STR);
            $checkStmt->execute();

            if ($checkStmt->fetchColumn() > 0) {
                throw new Exception("Cryptocurrency is already in the watchlist.");
            }

            // Proceed with the insert
            $query = 'INSERT INTO watchlist (user_id, crypto_id, crypto_name, coin_symbol, coin_price, coin_image) 
                  VALUES (:user_id, :crypto_id, :crypto_name, :coin_symbol, :coin_price, :coin_image)';
            $stmt = $this->db->prepare($query);

            // Bind values
            $stmt->bindValue(':user_id', $data['user_id'], PDO::PARAM_INT);
            $stmt->bindValue(':crypto_id', $data['crypto_id'], PDO::PARAM_STR);
            $stmt->bindValue(':crypto_name', $data['crypto_name'], PDO::PARAM_STR);
            $stmt->bindValue(':coin_symbol', $data['coin_symbol'], PDO::PARAM_STR);
            $stmt->bindValue(':coin_price', $data['coin_price'], PDO::PARAM_STR);
            $stmt->bindValue(':coin_image', $data['coin_image'], PDO::PARAM_STR);

            // Execute the query
            if ($stmt->execute()) {
                error_log("Cryptocurrency added to watchlist successfully."); // Debug success
                return true;
            } else {
                error_log("Failed to execute query."); // Debug failure
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error adding to watchlist: " . $e->getMessage()); // Log the error
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Get watchlist by user ID
    public function getWatchlistByUserId($userId)
    {
        try {
            $query = 'SELECT * FROM watchlist WHERE user_id = :user_id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error fetching watchlist: " . $e->getMessage());
            return [];
        }
    }

    // Remove cryptocurrency from the watchlist
    public function removeFromWatchlist($userId, $crypto_id)
    {
        try {
            $query = 'DELETE FROM watchlist WHERE user_id = :user_id AND crypto_id = :crypto_id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindValue(':crypto_id', $crypto_id, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error removing from watchlist: " . $e->getMessage());
            return false;
        }
    }

    // Get all watchlist entries (optionally filtered by user ID)
    public function getCryptoWatchlist($userId = null)
    {
        try {
            if ($userId) {
                $query = 'SELECT * FROM watchlist WHERE user_id = :user_id';
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            } else {
                $query = 'SELECT * FROM watchlist';
                $stmt = $this->db->prepare($query);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error fetching watchlist: " . $e->getMessage());
            return [];
        }
    }
}