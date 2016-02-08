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
    private $mysqli;

    function __construct($uid, $token)
    {
        $this->uid = $uid;
        $this->token = $token;
        $this->db = new DBConnect();
        $this->mysqli = $this->db->mysqli;

    }

    function request(Quest $quest){
        $query = "INSERT INTO quests(uid, quest, reward, content, img) VALUES(:uid, :quest, :reward, :content, :img)";

        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param(':uid', $this->uid);
        $stmt->bind_param(':quest', $quest->getQuest());
        $stmt->bind_param(':reward', $quest->getReward());
        $stmt->bind_param(':content', $quest->getReward());
        $stmt->bind_param(':img', $quest->getImg());

        $stmt->execute();
    }

}