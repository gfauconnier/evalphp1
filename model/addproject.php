<?php

// adds a new project to db
function add_project($new_project)
{
    $dbconnect = dbconnect();
    try {
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbconnect->beginTransaction();

        $req_v = $dbconnect->prepare('INSERT INTO projects(id_user, project_name, deadline, id_project_type)
                    VALUES(:id_user, :project_name, :deadline, :project_type)');
        $req_v->execute(array('id_user' => $_SESSION['user_id'],
                              'project_name' => $new_project[0],
                              'deadline' => dateformat($new_project[1]),
                              'project_type' => $new_project[2]));

        $dbconnect->commit();
    } catch (Exception $e) {
        $dbconnect->rollBack();

        $errors = $e->getMessage();
        return $errors;
    }
    return "Le projet a été créé.";
}
