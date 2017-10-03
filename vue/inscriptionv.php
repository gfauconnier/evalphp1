<div class="container">

  <form action="inscription.php" method="post" class="col">

    <div class="input-field col s12">
      <label for="user">Nom d'utilisateur : </label>
      <input type="text" id="user" name="user" required>
    </div>
    <div class="input-field col s12">
      <label for="userfname">Prénom : </label>
      <input type="text" id="userfname" name="userfname" required>
    </div>
    <div class="input-field col s12">
      <label for="userlname">Nom : </label>
      <input type="text" id="userlname" name="userlname" required>
    </div>
    <div class="input-field col s12">
      <label for="email">Email : </label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="input-field col s12">
      <label for="pwd">Mot de passe : </label>
      <input type="password" id="pwd" name="pwd" required>
    </div>
    <div class="input-field col s12">
      <label for="rpwd">Repetez le mot de passe : </label>
      <input type="password" id="rpwd" name="rpwd" required>
    </div>
    <input type="submit" name="submit" value="Valider" class="btn">

  </form>

</div>
