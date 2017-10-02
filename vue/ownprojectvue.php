<!-- <a href="manageproject.php?project=<?php echo $user_project['id_project']; ?>"> -->
  <div class="ownprojectcard">
    <h3><?php echo $user_project['project_name']; ?></h3>
    <h4><?php echo $user_project['project_type']; ?></h4>
    <h4><?php echo dateformat($user_project['deadline']); ?></h4>
    <form action="" method="post">
      <ul>
        <?php foreach ($project_steps as $project_step) {
          $step_tasks = select_step_task('step_tasks', 'id_step', $project_step['id_step']);
          ?>
              <li class="step">
                <p><?php echo $project_step['step_name']; ?></p>
                <p><?php echo $project_step['step_deadline']; ?></p>
                <input type="checkbox" name="step" value="<?php echo $project_step['id_step']; ?>">
                <ul>
                <?php foreach ($step_tasks as $step_task) { ?>
                  <li>
                    <p><?php echo $step_task['task_desc']; ?></p>
                    <input type="checkbox" name="task<?php echo $project_step['id_step']; ?>" value="<?php echo $step_task['id_task']; ?>">
                  </li>
                <?php } ?>
                </ul>
              </li>
          <?php
              } ?>
      </ul>
    </form>
  </div>
<!-- </a> -->
