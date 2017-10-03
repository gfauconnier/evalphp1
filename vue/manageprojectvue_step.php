<li class="row stepli">

  <h3 class="col s4"><?php echo $project_step['step_name']; ?></h3>
  <h3 class="col s4"><?php echo $project_step['step_deadline']; ?></h3>
  <form action="" method="post" class="col s4 del_step">
    <input type="hidden" name="stepid" value="<?php echo $project_step['id_step']; ?>">
    <input type="hidden" name="formaction" value="2">
    <input type="submit" value="Suppr Etape" class="btn red">
  </form>

  <ul class="container">
