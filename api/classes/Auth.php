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

    function __construct()
    {
        $this->db = new DBConnect();
        $this->mysqli = $this->db->mysqli;
    }

    function signin($id, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE id = '$id' LIMIT 1";

            $stmt = $this->mysqli->prepare($query);
            $stmt->execute(array(':id' => $id, ':password' => $password));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
//            if (count($row) > 0) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_session'] = $row['id'];
                    return true;
                } else return false;
//            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function signup($id, $password, $username, $email)
    {
        try {
            $encrypt_password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(id,username, email, password) VALUES(:id,:username,:email, :password)";

            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param(':id', $id);
            $stmt->bind_param(':password', $encrypt_password);
            $stmt->bind_param(':username', $username);
            $stmt->bind_param('email', $email);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


}