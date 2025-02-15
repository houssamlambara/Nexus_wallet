<?php
class achat extends Controller {
    private $AchatModel;

    public function __construct() {
        $this->AchatModel = $this->model("AchatModel");
    }



    // Load the view with cryptos


    // Handle crypto purchase
    public function buy() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $id = $_SESSION['id'] ?? null;
            $crypto_id = $_POST['crypto_id'] ?? null;
            $amount_in_dollars = $_POST['amount'] ?? 0;

            if (!$id || !$crypto_id || $amount_in_dollars <= 0) {
                die("Invalid request.");
            }
            var_dump($amount_in_dollars);
            var_dump($crypto_id);
            // Get user balance and crypto price
            $balance = $this->AchatModel->getUserBalance($id);
            $crypto_price = $this->AchatModel->getCryptoPrice($crypto_id);
            var_dump($balance);
            if ($crypto_price <= 0) {
                die("Invalid crypto selection.");
            }

            // Calculate how much crypto the user can buy
            $crypto_amount = $amount_in_dollars / $crypto_price;

            // Check if the user has enough balance
            if ($balance < $amount_in_dollars) {
                die("Insufficient funds.");
            }

            // Deduct the spent amount from user balance
            $new_balance = $balance - $amount_in_dollars;
            $this->AchatModel->updateUserBalance($id, $new_balance);

            // Store the transaction
            $this->AchatModel->recordTransaction($id, $crypto_id, $crypto_amount, $amount_in_dollars);

            echo "Purchase successful! You bought {$crypto_amount} of crypto.";
        }
    }
    public function index(){
        session_start(); // Start the session

        // Get user ID from session
        $userId = $_SESSION['id'] ?? null;

        if (!$userId) {
            // Handle case where user is not logged in
            echo json_encode(['status' => 'error', 'message' => 'wasiir tkhra .']);
            return;
        }

        // Fetch crypto data from the database
        $cryptos = $this->AchatModel->getCryptoWatchlist($userId);

        // Debugging: Log the crypto data
        error_log("Crypto Data: " . print_r($cryptos, true));

        // Pass data to the view
        $data = [
            'cryptos' => $cryptos,
        ];


        $this->view('pages/achat', $data);
    }

}

