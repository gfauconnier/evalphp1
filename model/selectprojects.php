<?php

function get_own_projects($project = NULL) {
  $dbconnect = dbconnect();
  $selectquery = 'SELECT * FROM projects AS p INNER JOIN project_types AS pt ON p.id_project_type = pt.id_project_type WHERE id_user = '.$_SESSION['user_id'];
  if($project !== NULL) {
    $selectquery .= ' AND p.id_project = ' . $project;
  }
  $req = $dbconnect->query($selectquery);
  $res = $req->fetchAll();
  return $res;
}

function get_project_types ($id = NULL) {
  $dbconnect = dbconnect();
  $id_val = $id ? ' WHERE id_project_type = '.$id : NULL;
  $req = $dbconnect->query('SELECT * FROM project_types'.$id_val);
  $res = $req->fetchAll();
  return $res;
}

function select_step_task($table, $id, $idvalue) {
  $dbconnect = dbconnect();

  $req = $dbconnect->query('SELECT * FROM ' . $table . ' WHERE ' . $id . ' = ' . $idvalue);
  $res = $req->fetchAll();

  return $res;

}

function display_projects($val = 0) {

  $dbconnect = dbconnect();

  switch($val) {
    case 0:
      $var = 'WHERE project_state !=3';
      break;
    case 999:
      $var = 'WHERE project_state = 3';
      break;
    default:
      $var = 'WHERE project_state !=3 AND id_project_type = '.$val;
      break;
  }

  $req = $dbconnect->query('SELECT * FROM projects '.$var.' ORDER BY deadline ASC');
  $res = $req->fetchAll();
  return $res;
}


?>
