<?php
function addstep($addstep, $projectid)
{
    $dbconnect = dbconnect();
    try {
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbconnect->beginTransaction();

        $req = $dbconnect->prepare('INSERT INTO project_steps(id_project, step_name, step_deadline)
                  VALUES(:id_project, :step_name, :step_deadline)');
        $req->execute(array('id_project' => $projectid,
                            'step_name' => $addstep[0],
                            'step_deadline' => dateformat($addstep[1])));

        $dbconnect->commit();
    } catch (Exception $e) {
        $dbconnect->rollBack();

        $errors = $e->getMessage();
    }
}

function addtask($addtask){
  $dbconnect = dbconnect();
  try {
      $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $dbconnect->beginTransaction();

      $req = $dbconnect->prepare('INSERT INTO step_tasks(id_step, task_desc) VALUES(:id_step, :task_desc)');
      $req->execute(array('id_step' => $addtask[0],
                          'task_desc' => $addtask[1]));

      $dbconnect->commit();
  } catch (Exception $e) {
      $dbconnect->rollBack();

      $errors = $e->getMessage();
  }
}

function delete_step_task($table, $id, $id_value) {
  $dbconnect = dbconnect();
  try {
      $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $dbconnect->beginTransaction();

      $req = $dbconnect->query('DELETE FROM '.$table.' WHERE '.$id.' = '.$id_value);

      $dbconnect->commit();
  } catch (Exception $e) {
      $dbconnect->rollBack();

      $errors = $e->getMessage();
  }
}

function archive_project($id_project, $state_value){
  $dbconnect = dbconnect();

  $res = dbconnect()->query('UPDATE projects SET project_state = '.$state_value.' WHERE id_project = '.$id_project);
  
}
