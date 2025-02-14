<?php
class Transactiontype extends transaction
{

    private $transgender;

    public function buytransaction()
    {
        $pdo = DatabaseConnection::getInstance()->getConnection();

        $query = 'INSERT INTO ';
        $stmt = $pdo->prepare($query);
    }
}
