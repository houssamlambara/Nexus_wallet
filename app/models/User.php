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
    public function __construct($id_user, $first_name, $last_name, $date_of_birth, $email, $password, $nexus_id)
    {
        $this->id_user = $id_user;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->email = $email;
        $this->password = $password;
        $this->nexus_id = $nexus_id;
    }
    public function get_first_name()
    {
        return $this->first_name;
    }
    public function get_id()
    {
        return $this->id_user;
    }
    public static function login($email)
    {
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

            $sql = "INSERT INTO users (first_name, last_name, email, password_hash, birth_date, created_at) 
                        VALUES (:first_name, :last_name, :email, :password, :dob, CURRENT_TIMESTAMP)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':dob', $this->dob);

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
}
