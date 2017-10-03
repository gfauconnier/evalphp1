<?php
require_once '../model/data.php';
require_once '../vue/template/head.php';
require 'headerc.php';

// gets the project type from project_types table
$project_types = get_project_types();
$projecttypes = "";
foreach ($project_types as $project_type) {
    $projecttypes .= '<option value="'.$project_type['id_project_type'].'">'.$project_type['project_type'].'</option>';
}
// if the sort is called changes the displayed projects
if(isset($_POST['projecttype'])){
  $display_projects = display_projects($_POST['projecttype']);
  $display_text = display_sort_text($_POST['projecttype']);
}
else {
  $display_projects = display_projects();
  $display_text = display_sort_text();
}

include '../vue/indexvue.php';

include '../vue/template/footer.php';
?>
