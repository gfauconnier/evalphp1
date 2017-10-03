<div class="container">

  <h2>Ajouter un projet</h2>
  <form action="admin.php" method="post" class="row">
    <div class="input-field col s6">
      <label for="projectname">Nom du projet : </label>
      <input type="text" id="projectname" name="projectname" required>
    </div>
    <div class="col s6">
      <label for="deadline">Deadline : </label>
      <input type="date" name="deadline" placeholder="jj/mm/aaaa" required>
    </div>

    <label for="projecttype">Type de projet :</label>
    <select name="projecttype" id="projecttype">
      <?php echo $projecttypes; ?>
    </select><br>

    <input type="submit" value="Créer le projet" class="btn">
  </form>

</div>
