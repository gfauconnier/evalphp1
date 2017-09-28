<?php

function userconnect($username)
{
    $dbconnect = dbconnect();
    $req = $dbconnect->prepare('SELECT * FROM users WHERE user_name = :login');
    $req->execute(array('login' => $username));
    $res = $req->fetch();
    return $res;
}

function userdisconnect() {
  session_destroy();
}
