<?php
require_once '../model/data.php';

if (isset($_SESSION['user'], $_SESSION['user_id'], $_GET['project']) && !empty($_GET['project'])) {
    $projectid = sanitize_var($_GET['project']);

    if (ownedproject($projectid)) {
        require_once '../vue/template/head.php';
        require_once 'headerc.php';

        if (isset($_POST['formaction'])) {
          $formaction = sanitize_var($_POST['formaction']);
          switch($formaction) {
            case 1:
            addstep();
            break;
            case 2:
            deletestep();
            break;
            case 3:
            addtask();
            break;
            case 4:
            deletetask();
            break;
            default:
            echo "Erreur lors du traitement.";
            break;
          }
        }

        $project = get_own_projects($projectid);

        include '../vue/manageprojectvue.php';

        $project_steps = select_step_task('project_steps', 'id_project', $projectid);

        foreach ($project_steps as $project_step) {
            include '../vue/manageprojectvue_step.php';
            $step_tasks = select_step_task('step_tasks', 'id_step', $project_step['id_step']);
            foreach ($step_tasks as $step_task) {
                include '../vue/manageprojectvue_task.php';
            } ?>
        <li>
          <form action="" method="post">
            <label for="newtask">Nouvelle tache</label>
            <input type="text" id="newtask" name="newtask" placeholder="Taches">
            <input type="hidden" name="formaction" value="3">
            <input type="submit" value="Créér">
          </form>
        </li>
        <?php
        ?>
          </ul>
        </li>
        <?php
        } ?>

          <li>
            <form action="" method="post">
              <label for="newstep">Nouvelle étape : </label>
              <input type="text" id="newstep" name="newstep" placeholder="Etape">
              <label for="newstepdate">Deadline : </label>
              <input type="text" id="newstepdate" name="newstepdate" placeholder="jj/mm/aaaa">
              <input type="hidden" name="formaction" value="1">
              <input type="submit" value="Créér">
            </form>
          </li>
        </ul>
      </main>

      <?php
      include '../vue/template/footer.php';
    } else {
        header('Location: admin.php');
    }
} elseif (isset($_SESSION['user'], $_SESSION['user_id']) && (!isset($_GET['project']) || empty($_GET['project']))) {
    header('Location: admin.php');
} else {
    header('Location: index.php');
}
