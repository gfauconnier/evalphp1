<?php


function get_projects() {
  $dbconnect = dbconnect();
  $req = $dbconnect->query('SELECT * FROM projects WHERE id_user = '.$_SESSION['user_id']);
  $res = $req->fetchAll();
  return $res;
}



?>
