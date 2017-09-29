<a href="manageproject.php?project=<?php echo $user_project['id_project']; ?>">
  <div class="ownprojectcard">
    <h3><?php echo $user_project['project_name']; ?></h3>
    <h4><?php echo $user_project['project_type']; ?></h4>
    <h4><?php echo dateformat($user_project['deadline']); ?></h4>
    <form action="" method="post">
      
    </form>
  </div>
</a>
