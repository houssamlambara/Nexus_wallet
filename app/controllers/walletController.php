<?php




class WalletController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index(){
        $data = $this->showWallet();
        $this->view('pages/wallet' , $data);


    }
    public function showWallet()
    {
        $user_id = 2;
        $userBalance = $this->userModel->getUserBalance($user_id);
        $wallets = $this->userModel->getUserWallets($user_id);

        // Static cryptocurrencies data
        $staticCryptos = [
            ["name" => "Bitcoin", "symbol" => "BTC", "price" => 43456.78],
            ["name" => "Ethereum", "symbol" => "ETH", "price" => 3023.45],
            ["name" => "Ripple", "symbol" => "XRP", "price" => 0.75]
        ];

        // Pass separate data variables
        $this->view('pages/wallet', [
            'staticCryptos' => $staticCryptos,
            'userBalance'   => $userBalance,
            'wallets'       => $wallets
        ]);
    }
    public function depositWallet() {
        $user_id = 2;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = htmlspecialchars($_POST['amount']);

            if ($amount > 0) {
                $this->userModel->updateBalance($user_id, $amount);
            }

            // Get updated balance
            $newBalance = $this->userModel->getUserBalance($user_id);

            // Return only the balance section (HTMX replaces this part)
            echo '<p id="balance-section" class="text-2xl font-bold text-green-600">'
                . number_format($newBalance, 2) . ' USD</p>';
            exit();
        }
    }

}


