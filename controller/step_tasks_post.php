<?php
require '../model/data.php';
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
if (isset($_POST['projectid'])) {
    $projectid = sanitize_var($_POST['projectid']);
    if (ownedproject($projectid)) {
        $project_steps = select_step_task('project_steps', 'id_project', $projectid);
        foreach ($project_steps as $project_step) {
            $step = 'step'.$project_step['id_step'];

            if (isset($_POST[$step]) && $project_step['step_state'] == 0) {
                state_change('project_steps', 'id_step', $project_step['id_step'], 1);
            } elseif (!isset($_POST[$step]) && $project_step['step_state'] == 1) {
                state_change('project_steps', 'id_step', $project_step['id_step'], 0);
            }

            $step_tasks = select_step_task('step_tasks', 'id_step', $project_step['id_step']);

            foreach ($step_tasks as $step_task) {
                $task = 'task'.$step_task['id_task'];

                if (isset($_POST[$task]) && $step_task['task_state'] == 0) {
                    state_change('step_tasks', 'id_task', $step_task['id_task'], 1);
                } elseif (!isset($_POST[$task]) && $step_task['task_state'] == 1) {
                    state_change('step_tasks', 'id_task', $step_task['id_task'], 0);
                }
            }
        }
    }
}

header('Location: admin.php');
