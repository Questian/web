<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 8.
 * Time: 오후 12:28
 */
class Quest
{
    private $uid;
    private $quest;
    private $reward;
    private $content;
    private $latitude;
    private $longtitude;
    private $img;

    function __construct($uid, $quest, $reward, $content, $latitude, $longtitude, $img)
    {
        $this->uid = $uid;
        $this->quest = $quest;
        $this->reward = $reward;
        $this->content = $content;
        $this->latitude = $latitude;
        $this->longtitude = $longtitude;
        $this->img = $img;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongtitude()
    {
        return $this->longtitude;
    }

    public function getQuest()
    {
        return $this->quest;
    }

    public function getReward()
    {
        return $this->reward;
    }

    public function getUid()
    {
        return $this->uid;
    }
}