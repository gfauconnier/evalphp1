<?php
if (isset($_SESSION['user'], $_SESSION['user_id'])) {
    $header_links = '<a href="admin.php" class="btn">Gestion des projets</a>';
    $header_connect = '<form action="disconnect.php" method="post" class="row s6">';
    $header_connect .= '<input type="submit" name="disconnect" value="Deconnexion" class="btn s4">';
} else {
    $header_links = '<a href="inscription.php" class="btn">Inscription</a>';
    $header_connect = '<form action="connect.php" method="post" class="row s6">';
    $header_connect .= '<div class="input-field col s5"><input type="text" id="login" name="login" class="s6" placeholder="login" required></div>';
    $header_connect .= '<div class="input-field col s5"><input type="password" name="pwd" id="pwd" class="s6" placeholder="password" required></div>';
    $header_connect .= '<input type="submit" name="submit" value="Connexion" class="btn s2">';
}

include '../vue/template/headerv.php';
