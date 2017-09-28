<?php
if (isset($_SESSION['user'], $_SESSION['user_id'])){
  $header_links = '<a href="admin.php">Gestion des projets</a>';
  $header_connect = "";
}
else {
  $header_links = '<a href="inscription.php">Inscription</a>';
  $header_connect = "";
}


include '../vue/template/headerv.php';

?>
