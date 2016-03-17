<?php
include_once 'DBConnect.php';

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 7.
 * Time: 오후 1:49
 */
class Auth
{
    private $db;
    private $pdo;

    function __construct()
    {
        $this->db = new DBConnect();
        $this->mysqli = $this->db->mysqli;
        //좀더 효율적인 DB 엑세스 및 쿼리처리를 위해 PDO를 사용합니다.
        $this->pdo = $this->db->getPDO();
    }

    public function signin($id, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE id = :id LIMIT 1";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_session'] = $row['uid'];
                return true;
            } else return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
//        세션을 user_session만 쓰는게 아니라면 주석인 부분을 제거하여 사용하여 주세요.
//        session_destroy();
//        unset($_SESSION['user_session']);
        session_destroy();
        return true;
    }

    public function signup($id, $password, $username, $email)
    {
        try {
            //password encrypt by hash
            $encrypt_password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(id,password, username, email) VALUES(:id,:password,:username, :email)";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':password', $encrypt_password);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            return $stmt;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get_token()
    {
        $token_query = "INSERT INTO users(token) VALUES(:token)";
        $token_stmt = $this->pdo->prepare($token_query);
        $token_stmt->bindParam(':token', $token);
        $token_stmt->execute();
        if ($token_stmt) return $token;
    }


}