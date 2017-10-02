<?php
$user_projects = get_own_projects();

foreach ($user_projects as $user_project) {
  $project_steps = select_step_task('project_steps', 'id_project', $user_project['id_project']);
  var_dump($user_project['id_project']);
  include '../vue/ownprojectvue.php';
}
