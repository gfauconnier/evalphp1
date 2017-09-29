<?php
require_once '../model/data.php';

$errors = [];

if (isset($_SESSION['user'], $_SESSION['user_id'])) {
    require_once '../vue/template/head.php';
    require 'headerc.php';

    $projecttypes = "";

    $project_types = get_project_types();
    foreach ($project_types as $project_type) {
      $projecttypes .= '<option value="'.$project_type['id_project_type'].'">'.$project_type['project_type'].'</option>';
    }

    if(isset($_POST['projectname'], $_POST['deadline'], $_POST['projecttype'])) {
      $new_project[] = $_POST['projectname'];
      $new_project[] = $_POST['deadline'];
      $new_project[] = $_POST['projecttype'];

      $new_project = sanitize($new_project);
      
      if (check_date($new_project[1])) {
        $errors[] = add_project($new_project);
      }
      else { echo "La date est incorrecte.";
      }
    }

    if (count($errors)) {
        foreach ($errors as $error) {
          ?>
          <p><?php echo $error; ?></p>
          <?php
        }
    }

    include '../vue/newproject.php';

    $user_projects = get_own_projects();



    include '../vue/template/footer.php';
} else {
    header('Location: index.php');
}
