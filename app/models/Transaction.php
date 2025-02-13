<?php
class transaction
{
    public function GetUserTransaction()
    {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        if (!$pdo) {
            echo "Database connection error!";
            return [];
        }

        $query = 'SELECT * FROM transaction';
        $stmt = $pdo->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            return $result;
        } else {

            echo "Error executing the query!";
            return [];
        }
    }
}
