<?php
session_start();
require '../model/data.php';

// if there's a sent form cleans the posted values and tries to create session variables
if (isset($_POST['login'], $_POST['pwd']) && !empty($_POST['login']) && !empty($_POST['pwd'])) {

    $session_connect[] = $_POST['login'];
    $session_connect[] = $_POST['pwd'];

    $session_connect = sanitize_array($session_connect);
    $session_req = userconnect($session_connect[0]);
    // if the user exists compares the sent pwd and the one in the db
    if ($session_req) {

        if (password_verify($session_connect[1], $session_req['user_password'])) {
            $_SESSION['user'] = $session_connect[0];
            $_SESSION['user_id'] = $session_req['id_user'];
        }

    }

}

header('Location: index.php');

?>
