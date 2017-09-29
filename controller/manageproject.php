<?php
require_once '../model/data.php';

if (isset($_SESSION['user'], $_SESSION['user_id'], $_GET['project']) && !empty($_GET['project'])) {

    $projectid = filter_var($_GET['project'], FILTER_SANITIZE_STRING);

    if (ownedproject($projectid)) {

      require_once '../vue/template/head.php';
      require_once 'headerc.php';




      include '../vue/manageprojectvue_step.php';
      include '../vue/manageprojectvue_task.php';


      include '../vue/template/footer.php';
    } else {
        header('Location: admin.php');
    }
} elseif (isset($_SESSION['user'], $_SESSION['user_id']) && (!isset($_GET['project']) || empty($_GET['project']))) {
    header('Location: admin.php');
} else {
    header('Location: index.php');
}
