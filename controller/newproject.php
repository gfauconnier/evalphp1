<?php
$projecttypes = "";
// lists all the project types
foreach ($project_types as $project_type) {
    $projecttypes .= '<option value="'.$project_type['id_project_type'].'">'.$project_type['project_type'].'</option>';
}

// checks the posted values and cleans them
if (isset($_POST['projectname'], $_POST['deadline'], $_POST['projecttype'])) {
    $new_project[] = $_POST['projectname'];
    $new_project[] = $_POST['deadline'];
    $new_project[] = $_POST['projecttype'];

    $new_project = sanitize_array($new_project);

// checks the deadline date
    if (check_date($new_project[1])) {
        $errors[] = add_project($new_project);
    } else {
        echo "La date est incorrecte.";
    }
}

// display errors if there's any
if (count($errors)) {
    foreach ($errors as $error) {
        ?>
      <p><?php echo $error; ?></p>
      <?php
    }
}

include '../vue/newproject.php'; ?>
