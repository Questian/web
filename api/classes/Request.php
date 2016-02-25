<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 8.
 * Time: 오전 1:13
 */

include 'Model/User.php';

class Request
{
    private $uid;
    private $db;
    private $pdo;

    function __construct($uid)
    {
        $this->uid = $uid;
        $this->db = new DBConnect();
        $this->pdo = $this->db->getPDO();

    }

    function requestQuest(Quest $quest){
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

    function location($latitude, $longtitude)
    {
        $query = "UPDATE users SET latitude = :latitude, longtitude = :longtitude WHERE uid = :uid";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longtitude', $longtitude);
        $stmt->bindParam(':uid', $this->uid);

        $result = $stmt->execute();

        return $result;
    }


    function getQuest($qid){
        $query = "SELECT * FROM quests WHERE qid = :qid LIMIT 1";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':qid', $qid);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function getQuestAll(){
        $query = "SELECT * FROM quests order by qid DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
//        $row = $stmt->fetch(PDO::FETCH);
        return $stmt->fetchAll();
    }


    function getUser($uid){
        $query="SELECT * FROM users WHERE uid = :uid LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":uid", $uid);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $ret = new User();
        $ret->setId($row['id']);
        $ret->setUsername($row['username']);
        $ret->setLatitude($row['latitude']);
        $ret->setLongtitude($row['longtitude']);
        $ret->setImg($row['img']);
        return $ret;
    }

    public function getGeoLocation($qid){

        $query="SELECT * FROM quests WHERE qid = :qid LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":qid", $qid);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$row['latitude'].",".$row['longtitude']. "&sensor=true&language=ko";

        $user_agent = array(
            'http'=>array(
                'method'=>'GET',
                'header'=> 'Accept-language: ko\r\n'
            )
        );

        $context = stream_context_create($user_agent);

        $data = @file_get_contents($url, false, $context);
        $json = json_decode($data,true);

//        echo $url;

//        $country = '';
//        $city = '';
//        $street = '';

        if(is_array($json) && $json['status'] == "OK")
        {

            $city = $json['results']['0']['address_components']['2']['long_name'];
            $country = $json['results']['0']['address_components']['3']['long_name'];
            $street = $json['results']['0']['address_components']['1']['long_name'];

            return $country." ".$city. " ". $street;
        }
    }

}