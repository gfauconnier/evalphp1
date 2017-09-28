<?php
require_once '../model/data.php';
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

      $new_project = sanitize($new_project);

      if (check_date($new_project[1])) {
        add_project();
      }
    }

    include '../vue/newproject.php';

    $user_projects = get_own_projects();



    include '../vue/template/footer.php';
} else {
    header('Location: index.php');
}
