<?php 
    session_start();
    class HomeController extends Controller {
        private $userModel;

        public function __construct(){
            $this->userModel = $this->model('User', null, '', '', '', '', '', null);
        }

        public function index() {
            $this->view('home/index', []);
        }

        public function logout(){
            if (isset($_SESSION['user_id'])) {
                session_unset();
                session_destroy();
                header("Location: index");  
            }
        }

        public function login(){
            $this->view('login/login', []);
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
                if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                    $email = trim($_POST['email']);
                    $password = $_POST['password'];
                    $user = User::login($email);
                    if (password_verify($password, $user['password_hash'])) {
                        $_SESSION['user_id'] = $user['id_utilisateur'];
                        $_SESSION['user_name'] = $user['first_name'];
                        header("Location: " . APPROOT . "home/index");
                        
                    } else {
                    echo "<script>alert('Le mot de passe est incorrecte !');</script>";
                    header("Refresh: 0; URL=index");
                }
            } else {
                echo "<script>alert('Veuillez remplir tous les champs !');</script>";
                header("Refresh: 0; URL=index");
            }
        }
    }
    public function register(){
        $this->view('login/signup', []);
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']) ) {
                echo "Tous les champs sont obligatoires.";
                exit;
            }
        
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $dob = htmlspecialchars($_POST['dob']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $nexusID = $_POST['nexusID'];
        
            try {
                $user = $this->model('User',null, $first_name, $last_name, $dob, $email, $password, null);
                if ($user->register()) {
                    session_start();
                    $_SESSION['user_id'] = $user->get_id();
                    $_SESSION['user_name'] = $user->get_first_name();
                    header("Location: index");
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
}
?>