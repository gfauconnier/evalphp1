<li>
  <p><?php echo $step_task['task_desc']; ?></p>
  <form action="" method="post">
    <input type="hidden" name="taskid" value="<?php echo $step_task['id_task']; ?>">
    <input type="hidden" name="formaction" value="4">
    <input type="submit" value="Supprimer">
  </form>
</li>
