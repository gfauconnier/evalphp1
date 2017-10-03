<li class="row">

  <p class="col s8"><?php echo $step_task['task_desc']; ?></p>
  <form action="" method="post" class="col s4">
    <input type="hidden" name="taskid" value="<?php echo $step_task['id_task']; ?>">
    <input type="hidden" name="formaction" value="4">
    <input type="submit" value="Suppr Tache" class="btn red">
  </form>

</li>
