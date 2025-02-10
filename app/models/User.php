<?php 
    class User{
        private $id_user;
        private $first_name ;
        private $last_name ;
        private $date_of_birth;
        private $email;
        private $password;
        private $nexus_id;
        public function __construct($id_user, $first_name, $last_name, $date_of_birth, $email, $password, $nexus_id){
            $this->id_user = $id_user; 
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->date_of_birth = $date_of_birth;
            $this->email = $email; 
            $this->password = $password;
            $this->nexus_id = $nexus_id;
        }
        public static function login($email) {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            if (!$pdo) {
                echo "Erreur de connexion à la base de données.";
                return null;
            }
            
            $query = "SELECT * FROM users u 
                      WHERE u.email = :email";
        
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        
            if ($stmt->rowCount() === 1) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
        
            } else {
                echo "<script>alert('Adresse e-mail introuvable. Veuillez vérifier vos informations.');</script>";
                header("Refresh: 0; URL=index");
            }
        }  
        public static function logout() {
            session_start();
        
            if (isset($_SESSION['user_id'])) {
                session_unset();
                session_destroy();
                header("Location: " . APPROOT . "/home/index");  
                exit();
            }
        }


    }
?>