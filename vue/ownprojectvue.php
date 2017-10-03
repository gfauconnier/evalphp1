
  <div class="col s12 m6 l4">
    <div class="card">

      <h3 class="col s12"><?php echo $user_project['project_name']; ?></h3>
      <h4 class="col s6"><?php echo $user_project['project_type']; ?></h4>
      <h4 class="col s6"><?php echo dateformat($user_project['deadline']); ?></h4>
      <form action="step_tasks_post.php" method="post">
        <ul class="col s12 step">
          <?php foreach ($project_steps as $project_step) {
          $step_tasks = select_step_task('step_tasks', 'id_step', $project_step['id_step']);
          ?>
          <li class="row col s12">
            <p class="col s8">
              <input type="checkbox" name="step<?php echo $project_step['id_step']; ?>" id="step<?php echo $project_step['id_step']; ?>" <?php echo is_checked($project_step[ 'step_state']);?>><label for="step<?php echo $project_step['id_step']; ?>"><?php echo $project_step['step_name']; ?></label>
            </p>

            <p class="col s4">
              Deadline : <?php echo $project_step['step_deadline']; ?>
            </p>
            <ul class="container col s12 task">
              <?php foreach ($step_tasks as $step_task) { ?>
              <li class="row">
                <input type="checkbox" name="task<?php echo $step_task['id_task']; ?>" id="task<?php echo $step_task['id_task']; ?>" <?php echo is_checked($step_task[ 'task_state']);?>><label for="task<?php echo $step_task['id_task']; ?>"><?php echo $step_task['task_desc']; ?></label>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php
              } ?>
        </ul>
        <div class="row">

        <input type="hidden" name="projectid" value="<?php echo $user_project['id_project']; ?>">
        <input type="submit" value="Submit" class="btn">
        <a href="manageproject.php?project=<?php echo $user_project['id_project']; ?>" class="btn">Modify</a>
      </div>
      </form>
    </div>
  </div>
