<li>
  <h3><?php echo $project_step['step_name']; ?></h3>
  <h3><?php echo $project_step['step_deadline']; ?></h3>
  <form action="" method="post">
    <input type="hidden" name="step" value="<?php echo $project_step['id_step']; ?>">
    <input type="hidden" name="formaction" value="4">
    <input type="submit" value="Supprimer"></form>
  <ul>
