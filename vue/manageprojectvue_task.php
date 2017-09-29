<li>
  <p><?php echo $step_task['task_desc']; ?></p>
  <form action="" method="post">
    <input type="hidden" name="stepid" value="<?php echo $step_task['id_task']; ?>">
    <input type="hidden" name="formaction" value="2">
    <input type="submit" value="Supprimer">
  </form>
</li>
