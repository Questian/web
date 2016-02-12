<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 7.
 * Time: 오후 1:49
 */
class Auth
{
    private $db;
    private $dbh;

    function __construct()
    {
        $this->db = new DBConnect();
        $this->mysqli = $this->db->mysqli;
        $this->dbh = $this->db->getPDO();
    }

    public function signin($id, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE id = :id LIMIT 1";

            $stmt = $this->dbh->prepare($query);

            $stmt -> bindParam(':id', $id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
//            if (count($row) > 0) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_session'] = $row['id'];
//
//                if(empty($row['token'])){
//                    $this->get_token();
//                }

                return true;
            } else return false;
//            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function signup($id, $password, $username, $email)
    {

        try {
            $encrypt_password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(id,password, username, email) VALUES(:id,:password,:username, :email)";

            $stmt = $this->dbh->prepare($query);

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

    public function get_token(){
//        $provider = new OAuthProvider();
//        $token = $provider -> generateToken('21', true);
//        $token = bin2hex(random_bytes(36));
        $token_query = "INSERT INTO users(token) VALUES(:token)";
        $token_stmt = $this-> dbh->prepare($token_query);
        $token_stmt -> bindParam(':token', $token);
        $token_stmt ->execute();
        if($token_stmt) return $token;
    }


}