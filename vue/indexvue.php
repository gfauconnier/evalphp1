<main>

  <form action="" method="post" class="row">

    <div class="input-field col s8">

      <select name="projecttype" id="projecttype" class="col s8">
        <option value="0">Tous les projets</option>
        <option value="999">Projets archivés</option>
        <?php echo $projecttypes; ?>
      </select>
      <input type="submit" name="" value="Trier" class="btn col s3 offset-s1">
    </div>

  </form>

  <div class="row">
    <h1 class="col s12"><?php echo $display_text; ?></h1>
    <?php
    // displays all projects > steps > tasks in cards
    foreach ($display_projects as $display_project) { ?>
      <div class="col s12 m6 l4">
        <div class="card">

          <h2 class="col s12"><?php echo $display_project['project_name']; ?></h2>
          <h3 class="col s6"><?php echo get_project_types($display_project['id_project_type'])[0]['project_type']; ?></h3>
          <h3 class="col s6"><?php echo dateformat($display_project['deadline']); ?></h3>
          <ul class="col s12">
            <?php
              $project_steps = select_step_task('project_steps', 'id_project', $display_project['id_project']);
              foreach ($project_steps as $project_step) {
              $step_tasks = select_step_task('step_tasks', 'id_step', $project_step['id_step']);
              ?>
              <li class="row col s12">
                <p class="col s8">
                  <?php echo $project_step['step_name']; ?>
                </p>
                <p class="col s4">
                  Deadline :
                  <?php echo $project_step['step_deadline']; ?>
                </p>
                <ul class="container col s12">
                  <?php foreach ($step_tasks as $step_task) { ?>
                  <li class="row <?php echo is_checked_display($step_task['id_task']); ?>">
                    <?php echo $step_task['task_desc']; ?>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <?php
                  } ?>
          </ul>
          </div>
          </div>
          <?php
        }
    ?>
  </div>
</main>
