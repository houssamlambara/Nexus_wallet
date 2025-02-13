<?php 
    session_start();
    class HomeController extends Controller {
        private $userModel;

        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function index() {
            $this->view('home/index', []);
        }

        public function logout(){
            if (isset($_SESSION['user_id'])) {
                session_unset();
                session_destroy();
                header("Location: index");
                exit();
            }
        }


        public function loginAction(){
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $email = trim($_POST['email']);
                    $password = $_POST['password'];
                    $user = User::login($email);

                    if ($user && password_verify($password, $user['password_hash'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['first_name'];
                        header("Location: http://localhost/Nexus_wallet/walletController/home");
                        exit();
                    } else {
                        echo "<script>alert('Email ou mot de passe incorrect !');</script>";
                        echo '<meta http-equiv="refresh" content="0;url=index">';
                    }
                } else {
                    echo "<script>alert('Veuillez remplir tous les champs !');</script>";
                    echo '<meta http-equiv="refresh" content="0;url=index">';
                }
            }
        }


        public function login(){
        $this->view('login/login', []);
    }
    public function register(){
        $this->view('login/signup', []);
    }
        public function registerAction(){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password']) ) {
                    echo "Tous les champs sont obligatoires.";
                    exit;
                }

                $first_name = htmlspecialchars($_POST['firstName']);
                $last_name = htmlspecialchars($_POST['lastName']);
                $dob = $_POST['dob']; // Pas besoin de htmlspecialchars() pour une date
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $nexusID = uniqid('NX_'); // Génération automatique d'un nexus_id

                try {
                    $user = $this->model('User', null, $first_name, $last_name, $dob, $email, $password, $nexusID);
                    if ($user->register()) {
                        $_SESSION['user_id'] = $user->get_id();
                        $_SESSION['user_name'] = $user->get_first_name();
                       header("Location: index");
                        exit();
                    } else {
                        throw new Exception("Échec de l'enregistrement");
                    }
                } catch (Exception $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
        }

        public function test(){
        echo 'test';
    }
        public function updateBalance($user_id, $amount) {
            // Fetch current balance
            $currentBalance = $this->userModel->getUserBalance($user_id);

            if ($currentBalance === false) {
                return ["success" => false, "message" => "User not found."];
            }

            // Calculate new balance
            $newBalance = $currentBalance + $amount;

            // Prevent negative balance
            if ($newBalance < 0) {
                return ["success" => false, "message" => "Insufficient balance."];
            }

            // Update the balance in the database
            $updated = $this->userModel->updateUserBalance($user_id, $newBalance);

            if ($updated) {
                return ["success" => true, "message" => "Balance updated successfully.", "newBalance" => $newBalance];
            } else {
                return ["success" => false, "message" => "Failed to update balance."];
            }
        }

    }
?>