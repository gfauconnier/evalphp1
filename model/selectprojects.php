<?php

function get_own_projects() {
  $dbconnect = dbconnect();
  $req = $dbconnect->query('SELECT * FROM projects WHERE id_user = '.$_SESSION['user_id']);
  $res = $req->fetchAll();
  return $res;
}

function get_project_types () {
  $dbconnect = dbconnect();
  $req = $dbconnect->query('SELECT * FROM project_types');
  $res = $req->fetchAll();
  return $res;
}



?>
