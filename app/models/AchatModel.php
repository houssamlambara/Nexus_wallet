<?php

class AchatModel extends controller {

    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getcryptoid($crypto_id) {
        $query = 'SELECT crypto_id FROM watchlist WHERE crypto_id = :crypto_id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':crypto_id', $crypto_id, PDO::PARAM_STR);
    }

}
