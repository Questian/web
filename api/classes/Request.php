<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 8.
 * Time: 오전 10:19
 */
class Request
{
    private $uid;
    private $token;

   function __construct($uid, $token)
   {
       $this->uid = $uid;
       $this->token = $token;
   }



}