<?php
class AchatModel extends Controller {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    // Get user balance
    public function getUserBalance($id) {
        $query = 'SELECT usdt_balance FROM users WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['usdt_balance'] ?? 0;
    }

    // Get crypto price
    public function getCryptoPrice($crypto_id) {
        $query = 'SELECT coin_price FROM watchlist WHERE crypto_id = :crypto_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':crypto_id', $crypto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['coin_price'] ;
    }

    // Update user balance
    public function updateUserBalance($id, $new_balance) {
        $query = 'UPDATE users SET usdt_balance = :balance WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':balance', $new_balance, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Record transaction
    public function recordTransaction($user_id, $crypto_id, $amount, $cost) {
        $query = 'INSERT INTO transactions (user_id, crypto_id, amount, cost) 
                  VALUES (:id, :crypto_id, :amount, :cost)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':crypto_id', $crypto_id, PDO::PARAM_INT);
        $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindValue(':cost', $cost, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Fetch all cryptos with only ID and name
    public function getCryptoWatchlist() {
        $query = 'SELECT * FROM watchlist';
        $stmt = $this->db->prepare($query);
        if ($stmt->execute()){
            echo 'ggggggggg';
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
