<form action="inscription.php" method="post">

  <label for="user">Nom d'utilisateur : </label><br>
  <input type="text" id="user" name="user" placeholder="Utilisateur" required><br>
  <label for="userfname">Prénom : </label><br>
  <input type="text" id="userfname" name="userfname" placeholder="Prénom" required><br>
  <label for="userlname">Nom : </label><br>
  <input type="text" id="userlname" name="userlname" placeholder="Nom" required><br>
  <label for="email">Email : </label><br>
  <input type="email" id="email" name="email" placeholder="example@example.com" required><br>
  <label for="pwd">Mot de passe : </label><br>
  <input type="password" id="pwd" name="pwd" placeholder="mdp" required><br>
  <label for="rpwd">Repetez le mot de passe : </label><br>
  <input type="password" id="rpwd" name="rpwd" placeholder="mdp" required><br>
  <input type="submit" name="submit" value="Valider">

</form>
