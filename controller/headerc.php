<?php
if (isset($_SESSION['user'], $_SESSION['user_id'])) {
    $header_links = '<a href="admin.php">Gestion des projets</a>';
    $header_connect = '<form action="disconnect.php" method="post">';
    $header_connect .= '<input type="submit" name="disconnect" value="Deconnexion">';
} else {
    $header_links = '<a href="inscription.php">Inscription</a>';
    $header_connect = '<form action="connect.php" method="post">';
    $header_connect .= '<input type="text" id="login" name="login" placeholder="login" required>';
    $header_connect .= '<input type="password" name="pwd" id="pwd" placeholder="password" required>';
    $header_connect .= '<input type="submit" name="submit" value="Connexion">';
}

include '../vue/template/headerv.php';
