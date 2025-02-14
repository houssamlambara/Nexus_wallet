<?php


session_start();

class WalletController extends Controller
{

    private $userModel;
    private $walletModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->walletModel = $this->model('Wallet');
    }

    public function index()
    {

        $user_id = $_SESSION['user_id'];
        $userModel = $this->model('User');

        $data = [
            'userBalance' => $this->walletModel->getBalance($user_id),

            'crypto' => $this->walletModel->userWallet($user_id)  // Add this line to get crypto data
        ];

        $this->view('pages/dashboard', $data);
    }

    public function home()
    {
        // Check if user_id is set in session
        if (!isset($_SESSION['user_id'])) {
            echo "User ID is not set in session.";
            var_dump($_SESSION);
            return;
        }

        $user_id = $_SESSION['user_id'];
        $userBalance = $this->walletModel->getBalance($user_id);
//        $wallets = $this->walletModel->userWallet($user_id);
        $crypto = $this->walletModel->userWallet($user_id);

        // Check if data is fetched correctly
//        if (empty($userBalance) || empty($wallets) || empty($crypto)) {
//            echo "User balance, wallets, or crypto data is empty.";
//            return;
//        }

        // Pass separate data variables
        $this->view('pages/dashboard', [
            'userBalance' => $userBalance,

            'crypto' => $crypto
        ]);
    }

    public function depositWallet()
    {
        // Check if user_id is set in session
        if (!isset($_SESSION['user_id'])) {
            echo "User ID is not set in session.";
            return;
        }

        $user_id = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = htmlspecialchars($_POST['amount']);

            if ($amount > 0) {
                $this->userModel->updateBalance($user_id, $amount);
            }

            // Get updated balance
            $newBalance = $this->userModel->getUserBalance($user_id);

            // Check if new balance is fetched correctly
            if (empty($newBalance)) {
                echo "New balance is empty.";
                return;
            }

            // Return only the balance section (HTMX replaces this part)
            echo '<p id="balance-section" class="text-2xl font-bold text-green-600">'
                . number_format($newBalance, 2) . ' USD</p>';
            exit();
        }
    }

    public function userWalletData()
    {
        // Check if user_id is set in session
        if (!isset($_SESSION['user_id'])) {
            echo "User ID is not set in session.";
            return;
        }

        $user_id = $_SESSION['user_id'];
        $this->userModel = $this->model('wallet');
        $wallets = $this->userModel->userWallet($user_id);

        // Check if wallets data is fetched correctly
        if (empty($wallets)) {
            echo "Wallets data is empty.";
            return;
        }

        // Do something with the wallets data
    }
}