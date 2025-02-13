<?php
class User
{
    private $id_user;
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $email;
    private $password;
    private $nexus_id;
    private $usdt_balance; // Added the usdt_balance property

    // Updated constructor to accept usdt_balance
    public function __construct($id_user = null, $first_name = null, $last_name = null, $date_of_birth = null, $email = null, $password = null, $nexus_id = null, $usdt_balance = 0)
    {
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->email = $email;
        $this->password = $password;
        $this->nexus_id = $nexus_id;
        $this->usdt_balance = $usdt_balance; // Assign usdt_balance
    }

    // Getter for first name
    public function get_first_name()
    {
        return $this->first_name;
    }

    // Getter for user ID
    public function get_id()
    {
        return $this->id_user;
    }

    // Getter for usdt_balance
    public function get_usdt_balance()
    {
        return $this->usdt_balance;
        // Return the user's USDT balance
    }

    // Static method for logging in
    public static function login($email)
    {
        $pdo = DatabaseConnection::getInstance()->getConnection();
        if (!$pdo) {
            echo "Erreur de connexion à la base de données.";
            return null;
        }

        // Query to fetch user data from the database
        $query = "SELECT * FROM users u WHERE u.email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Check if user exists and fetch data
        if ($stmt->rowCount() === 1) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "<script>alert('Adresse e-mail introuvable. Veuillez vérifier vos informations.');</script>";
            header("Refresh: 0; URL=index");
        }
    }


    // Method for user registration
    public function register()
    {
        try {
            $pdo = DatabaseConnection::getInstance()->getConnection();
            if ($pdo === null) {
                echo "Erreur : la connexion à la base de données ne peut pas être établie !";
                return false;
            }

            if (empty($this->password)) {
                echo "Erreur : Le mot de passe est manquant.";
                return false;
            }

            // Validate email format
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

            // Validate password length
            if (strlen($this->password) < 6) {
                throw new Exception("Password must be at least 6 characters long");
            }

            echo 'added successfully';

            // SQL query to insert a new user into the database
            $sql = "INSERT INTO users (first_name, last_name, email, password_hash, birth_date, nexus_id, usdt_balance, created_at) 
                    VALUES (:first_name, :last_name, :email, :password, :birth_date, :nexus_id, :usdt_balance, CURRENT_TIMESTAMP)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':birth_date', $this->date_of_birth);
            $stmt->bindParam(':nexus_id', $this->nexus_id);
            $stmt->bindParam(':usdt_balance', $this->usdt_balance); // Bind the usdt_balance parameter

            if ($stmt->execute()) {
                $this->id_user = $pdo->lastInsertId();
                return true;
            }
        } catch (PDOException $e) {
            echo "Erreur d'inscription: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    // Static method to log out
    public static function logout()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            session_unset();
            session_destroy();
            header("Location: " . APPROOT . "/home/index");
            exit();
        }
    }


        public static function findByEmail($email) {
            $DB = DatabaseConnection::getInstance()->getConnection();
            $stmt = $DB->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch();
        }

        public static function markAsVerified($userId) {
            $DB = DatabaseConnection::getInstance()->getConnection();
            $stmt = $DB->prepare("UPDATE users SET is_verified = 1 WHERE id = ?");
            return $stmt->execute([$userId]);
        }

    }
?>