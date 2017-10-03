<main>
  <div class="row">
    <h1 class="col s9"><?php echo $project[0]['project_name'];?></h1>

    <form class="row col s3" action="" method="post">
      <?php if(select_step_task('projects', 'id_project',$projectid)[0]['project_state'] == 1){  ?>
      <input type="hidden" name="formaction" value="5">
      <input type="submit" name="" value="Archiver" class="btn blue">
    <?php } elseif (select_step_task('projects', 'id_project',$projectid)[0]['project_state'] == 3) {
      ?>
      <input type="hidden" name="formaction" value="6">
      <input type="submit" name="" value="Réactiver" class="btn blue">
      <?php
    } ?>
    </form>
    <h2 class="col s6">Deadline : <?php echo $project[0]['deadline'];?></h2>
    <h2 class="col s6">Catégorie : <?php echo $project[0]['project_type'];?></h2>
  </div>
  <ul class="container">
