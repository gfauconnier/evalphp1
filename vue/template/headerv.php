<img src="" alt="Logo">
<nav>
  <a href="index.php">Accueil</a>
  <?php echo $links; ?>
</nav>
<form action="index.php" method="post">
  <input type="text" id="login" name="login" placeholder="login" required>
  <input type="password" id="pwd" placeholder="password" required>
  <input type="submit" name="submit" value="Connexion">
</form>
<form action="deconnexion.php" method="post">
  <input type="submit" name="submit" value="Deconnexion">
</form>
