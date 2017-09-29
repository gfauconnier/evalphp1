<?php
require_once '../model/data.php';

$errors = [];

if (isset($_SESSION['user'], $_SESSION['user_id'])) {
    require_once '../vue/template/head.php';
    require_once 'headerc.php';

    $project_types = get_project_types();

    require_once 'newproject.php';
    ?>
    <main>
      <h1>Mes projets</h1>
      <?php
      require_once 'ownprojects.php';
      ?>
    </main>
    <?php

    include '../vue/template/footer.php';
} else {
    header('Location: index.php');
}
