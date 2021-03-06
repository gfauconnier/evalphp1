<?php

// returns text to be displayed depending on selected sort item
function display_sort_text($param = 0) {
  switch($param) {
    case 0:
      $text = 'Tous les projets';
      break;
    case 999:
      $text = 'Projets archivés';
      break;
    default:
      $text = get_project_types($param)[0]['project_type'];
      $text = 'Projets : '.$text;
      break;
  }
  return $text;
}

// returns a class if the state of the task is 1
function is_checked_display($id_task) {
  $dbconnect = dbconnect();

  $req = $dbconnect->query('SELECT * FROM step_tasks WHERE id_task = '.$id_task);
  $res = $req->fetchAll();
  if ($res[0]['task_state'] == 1) {
    return 'green';
  }

  return '';
}


?>
