<?php
require_once '../model/data.php';
if (isset($_SESSION['user'], $_SESSION['user_id'])){


require_once '../vue/template/head.php';
require 'headerc.php';





include '../vue/template/footer.php';
}
else {
  header('Location: index.php');
}
