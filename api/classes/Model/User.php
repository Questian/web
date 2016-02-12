<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 8.
 * Time: 오후 12:53
 */
class User
{

    private $id;
    private $password;
    private $username;
    private $email;
    private $reg_date;
    private $auth;
    private $uid;
    private $img;
    private $token;
    private $expire;
    private $rating;
    private $latitude;
    private $longtitude;

    public function getUid()
    {
        return $this->uid;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getExpire()
    {
        return $this->expire;
    }

    public function getId()
    {
        return $this->id;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getRegDate()
    {
        return $this->reg_date;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function setLongtitude($longtitude)
    {
        $this->longtitude = $longtitude;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setRegDate($reg_date)
    {
        $this->reg_date = $reg_date;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
}