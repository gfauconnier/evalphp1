<?php

function verify_user($user_name)
{
    $dbconnect = dbconnect();

    $req = $dbconnect->prepare('SELECT * FROM users WHERE user_name = ?');
    $req->execute(array($user_name));
    $query_res = $req->fetchAll();

    if (count($query_res)) {
        return "Le nom d'utilisateur est déjà pris.";
    } else {
        return false;
    }
}

function add_user($user_creation)
{
    $dbconnect = dbconnect();
    try {
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbconnect->beginTransaction();

        $user_creation[4] = password_hash($user_creation[4], PASSWORD_BCRYPT);

        $req_v = $dbconnect->prepare('INSERT INTO users(user_name, user_password, user_first_name, user_last_name, user_email)
                    VALUES(:user_name, :user_pwd, :user_fname, :user_lname, :user_email)');
        $req_v->execute(array('user_name'=>$user_creation[0],
                            'user_pwd'=>$user_creation[4],
                            'user_fname'=>$user_creation[1],
                            'user_lname'=>$user_creation[2],
                            'user_email'=>$user_creation[3]));

        $dbconnect->commit();
    } catch (Exception $e) {
        $dbconnect->rollBack();

        $errors = $e->getMessage();
        return "L'utilisateur n'a pas pu être créé.";
    }
    return "L'utilisateur a été créé.";
}
