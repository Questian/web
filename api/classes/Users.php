<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 8.
 * Time: 오전 1:13
 */
class Users
{
    private $uid;
    private $token;
    private $db;
    private $pdo;

    function __construct($uid, $token)
    {
        $this->uid = $uid;
        $this->token = $token;
        $this->db = new DBConnect();
        $this->pdo = $this->db->getPDO();

    }

    function request(Quest $quest){
        $query = "INSERT INTO quests(uid, quest, reward, content, img) VALUES(:uid, :quest, :reward, :content, :img)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':uid', $this->uid);
        $stmt->bindParam(':quest', $quest->getQuest());
        $stmt->bindParam(':reward', $quest->getReward());
        $stmt->bindParam(':content', $quest->getContent());
        $stmt->bindParam(':img', $quest->getImg());

        $stmt->execute();

        return $stmt;
    }

}