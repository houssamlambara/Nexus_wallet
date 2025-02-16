<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require_once '../app/vendor/autoload.php';

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
            if (isset($_SESSION['id'])) {
                session_unset();
                session_destroy();
                header("Location: index");
                exit();
            }
        }


        public function verifyEmail() {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                if (!empty($_POST['email']) && !empty($_POST['otp'])) {
                    $email = trim($_POST['email']);
                    $otp = trim($_POST['otp']);
        
                    $user = User::findByEmail($email);
        
                    if ($user && $user['otp_code'] == $otp) {
                        User::markAsVerified($user['id']);
                        echo "<script>alert('Email vérifié avec succès ! Vous pouvez maintenant vous connecter.');</script>";
                        echo '<meta http-equiv="refresh" content="0;url=login">';
                    } else {
                        echo "<script>alert('Code OTP invalide ou expiré.');</script>";
                        echo '<meta http-equiv="refresh" content="0;url=register">';
                    }
                } else {
                    echo "<script>alert('Veuillez remplir tous les champs !');</script>";
                    echo '<meta http-equiv="refresh" content="0;url=register">';
                }
            }
        }
        private function sendVerificationEmail($email, $otpCode) {
            $mail = new PHPMailer(true);

            try {
                // Activation du débogage SMTP
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                // Configuration SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'azeddineharchaoui1@gmail.com';
                $mail->Password   = 'xwwditshippvwkwq';
                $mail->SMTPSecure = 'tls'; // Utiliser TLS
                $mail->Port       = 587;    // Port pour TLS

                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ],
                ];

                $mail->setFrom('azeddineharchaoui1@gmail.com', 'Nexus');
                $mail->addAddress($email);

                // Contenu
                $mail->isHTML(true);
                $mail->Subject = 'Verification de votre email';
                $mail->Body    = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>
                <div style='text-align: center;'>
                    <h1 style='color: #333;'>Nexus</h1>
                    <h2 style='color: #555;'>Vérification de votre email</h2>
                </div>
                <p style='font-size: 16px; color: #333;'>Bonjour,</p>
                <p style='font-size: 16px; color: #333;'>Merci de vérifier votre adresse email en utilisant le code OTP ci-dessous :</p>
                <div style='text-align: center; margin: 20px 0;'>
                    <span style='display: inline-block; background-color: #f7f7f7; border: 1px solid #ddd; border-radius: 5px; padding: 10px 20px; font-size: 24px; color: #333; font-weight: bold;'>
                        $otpCode
                    </span>
                </div>
                <p style='font-size: 16px; color: #333;'>Si vous n'avez pas demandé cette vérification, veuillez ignorer cet email.</p>
                <p style='font-size: 16px; color: #333;'>Merci,</p>
                <p style='font-size: 16px; color: #333;'>L'équipe Nexus</p>
            </div>
        ";

                $mail->send();
                return true;
            } catch (Exception $e) {
                error_log("Erreur d'envoi d'email : {$mail->ErrorInfo}");
                return false;
            }
        }

    
        public function loginAction() {
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $email = trim($_POST['email']);
                    $password = $_POST['password'];
                    $user = User::login($email);
        
                    if ($user && password_verify($password, $user['password_hash'])) {
                        if ($user['is_verified']) {
                            $_SESSION['id'] = $user['id'];
                            $_SESSION['user_name'] = $user['first_name'];
                            $_SESSION['balance'] = 0;
                            header("Location: http://localhost/Nexus_wallet/walletController/home");
                            exit();
                        } else {
                            $this->sendVerificationEmail($user['email'], $user['otp_code']);
//                            echo "<script>alert('Votre compte n'est pas vérifié. Un nouvel email de vérification a été envoyé.');</script>";
                            $_SESSION['error'] = "Votre compte n'est pas vérifié. Un nouvel email de vérification a été envoyé";
                            $this->view("login/verify");
                        }
                    } else {
                        $_SESSION['error'] ='Email ou mot de passe incorrect !';
                        $this->view("login/login");
//                        echo '<meta http-equiv="refresh" content="0;url=index">';
                    }
                } else {
                    $_session['error'] ='Veuillez remplir tous les champs !';
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
    
    public function registerAction() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])) {
                echo "Tous les champs sont obligatoires.";
                exit;
            }
    
            $first_name = htmlspecialchars($_POST['firstName']);
            $last_name = htmlspecialchars($_POST['lastName']);
            $dob = $_POST['dob'];
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $nexusID = 'NX_' . bin2hex(random_bytes(16));
            $otpCode = rand(100000, 999999); // Générer un code OTP à 6 chiffres
            $_SESSION['success'] = "success message";
            try {
                $user = $this->model('User', null, $first_name, $last_name, $dob, $email, $password, $nexusID, 0, $otpCode);

                if ($user->register()) {
                    if ($this->sendVerificationEmail($email, $otpCode)) {
                        $_SESSION['success']='Un email de vérification avec un code OTP a été envoyé !';
                        $this->view("login/verify");
                    } else {
                        $_SESSION['error']="Erreur lors de l'envoi de l'email de vérification";
                        $this->view("login/signup");
                    }
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
        public function updateBalance($id, $amount) {
            // Fetch current balance
            $currentBalance = $this->userModel->getUserBalance($id);

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
            $updated = $this->userModel->updateUserBalance($id, $newBalance);

            if ($updated) {
                return ["success" => true, "message" => "Balance updated successfully.", "newBalance" => $newBalance];
            } else {
                return ["success" => false, "message" => "Failed to update balance."];
            }
        }

    }
?>
