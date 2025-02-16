<?php

class WatchlistController extends Controller
{
    private $watchlistModel;

    public function __construct()
    {
        // Load the WatchlistModel
        $this->watchlistModel = $this->model('WatchlistModel');
    }

    // Add cryptocurrency to the watchlist
    public function addcrypto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start(); // Ensure session is started
            error_log("Session Data in addcrypto: " . print_r($_SESSION, true)); // Debug session data

            // Get user ID from session
            $userId = $_SESSION['id'] ?? null;
            error_log("User ID in addcrypto: " . $userId); // Debug user ID

            if (!$userId) {
                error_log("User not logged in. Session id is not set."); // Debug
                echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
                return;
            }

            // Debug POST data
            error_log("POST Data in addcrypto: " . print_r($_POST, true));

            // Sanitize input data
            $data = [
                'user_id' => $userId,
                'crypto_id' => trim($_POST['crypto_id'] ?? ''),
                'crypto_name' => trim($_POST['crypto_name'] ?? ''),
                'coin_symbol' => trim($_POST['coin_symbol'] ?? ''),
                'coin_price' => trim($_POST['coin_price'] ?? ''),
                'coin_image' => trim($_POST['coin_image'] ?? ''),
            ];

            // Debug sanitized data
            error_log("Sanitized Data in addcrypto: " . print_r($data, true));

            try {
                // Add to database
                if ($this->watchlistModel->addToWatchlist($data)) {
                    // Return success response
                    header('Location:http://localhost/NEXUS_WALLET/public/watchlistcontroller/index');
                    exit();
                } else {
                    // Return error response
                    echo json_encode(['status' => 'error', 'message' => 'Failed to add cryptocurrency to watchlist.']);
                }
            } catch (Exception $e) {
                // Handle exception
                error_log("Exception in addcrypto: " . $e->getMessage()); // Log the exception
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function removeFromWatchlist()
    {
        session_start();
        $userId = $_SESSION['id'] ?? null;

        if (!$userId) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        if (isset($_POST['crypto_id']) && !empty($_POST['crypto_id'])) {
            $cryptoId = $_POST['crypto_id'];
            $result = $this->watchlistModel->removeFromWatchlist($userId, $cryptoId);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'The cryptocurrency has been removed from your watchlist.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'There was an issue removing the cryptocurrency from your watchlist.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No cryptocurrency ID provided.']);
        }
    }

    // Display the user's watchlist
    public function index()
    {
        session_start();


        // Get user ID from session
        $userId = $_SESSION['id'] ?? null;


        if (!$userId) {
            // Handle case where user is not logged in
            echo json_encode(['status' => 'error', 'message' => 'wasiir tkhra .']);
            return;
        }

        // Fetch watchlist data from the database
        $watchlist = $this->watchlistModel->getCryptoWatchlist($userId);

        // Debugging: Log the watchlist data
        error_log(print_r($watchlist, true));

        // Pass data to the view
        $data = [
            'watchlist' => $watchlist, // <-- Fixed: Removed the extra comma
        ];

        $this->view('pages/watchlist', $data);
    }
}
