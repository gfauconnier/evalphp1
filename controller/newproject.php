<?php
$projecttypes = "";
foreach ($project_types as $project_type) {
    $projecttypes .= '<option value="'.$project_type['id_project_type'].'">'.$project_type['project_type'].'</option>';
}

if (isset($_POST['projectname'], $_POST['deadline'], $_POST['projecttype'])) {
    $new_project[] = $_POST['projectname'];
    $new_project[] = $_POST['deadline'];
    $new_project[] = $_POST['projecttype'];

    $new_project = sanitize($new_project);

    if (check_date($new_project[1])) {
        $errors[] = add_project($new_project);
    } else {
        echo "La date est incorrecte.";
    }
}

if (count($errors)) {
    foreach ($errors as $error) {
        ?>
      <p><?php echo $error; ?></p>
      <?php
    }
}

include '../vue/newproject.php'; ?>
