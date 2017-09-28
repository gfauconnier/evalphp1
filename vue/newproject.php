<form action="admin.php" method="post">
  <label for="projectname">Nom du projet : </label>
  <input type="text" id="projectname" name="projectname" placeholder="Nom du projet" required><br>
  <label for="deadline">Deadline : </label>
  <input type="date" name="deadline" placeholder="jj/mm/aaaa" required><br>

  <label for="projecttype">Type de projet :</label>
  <select name="projecttype" id="projecttype">
    <?php echo $projecttypes; ?>
  </select><br>

  <input type="submit" value="Créer le projet">
</form>
