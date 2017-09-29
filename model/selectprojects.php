<?php

function get_own_projects() {
  $dbconnect = dbconnect();
  $req = $dbconnect->query('SELECT * FROM projects AS p INNER JOIN project_types AS pt
                            ON p.id_project_type = pt.id_project_type WHERE id_user = '.$_SESSION['user_id']);
  $res = $req->fetchAll();
  return $res;
}

function get_project_types () {
  $dbconnect = dbconnect();
  $req = $dbconnect->query('SELECT * FROM project_types');
  $res = $req->fetchAll();
  return $res;
}

function select_step_task($table, $id, $idvalue) {
  $dbconnect = dbconnect();
  $req = $dbconnect()->query('SELECT * FROM ' . $table . ' WHERE ' . $id . ' = ' . $idvalue);
  $res = $req->fetchAll();

  return $res;

}



?>
