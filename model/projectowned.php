<?php

function ownedproject($projectid) {
    $dbconnect = dbconnect();

    $req = $dbconnect->query('SELECT * FROM projects WHERE id_project = '.$projectid);
    $res = $req->fetch();

    if ($res && $res['id_user'] == $_SESSION['user_id']) {
      return true;
    }
    else {
      return false;
    }
}

function is_checked($checked) {
  if ($checked == 1) {
    return 'checked="checked"';
  }
}
