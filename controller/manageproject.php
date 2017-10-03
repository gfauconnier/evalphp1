<?php
require_once '../model/data.php';

if (isset($_SESSION['user'], $_SESSION['user_id'], $_GET['project']) && !empty($_GET['project'])) {
    $projectid = sanitize_var($_GET['project']);

    if (ownedproject($projectid)) {
        require_once '../vue/template/head.php';
        require_once 'headerc.php';

        if (isset($_POST['formaction'])) {
            $formaction = sanitize_var($_POST['formaction']);
            switch ($formaction) {
            case 1:
            if (isset($_POST['newstep'], $_POST['newstepdate'])) {
                $addstep[] = $_POST['newstep'];
                $addstep[] = $_POST['newstepdate'];

                $addstep = sanitize_array($addstep);

                if (check_date($addstep[1])) {
                    addstep($addstep, $projectid);
                }
            }
              break;

            case 2:
            if (isset($_POST['stepid'])) {
                $stepid = sanitize_var($_POST['stepid']);

                if (count(select_step_task('project_steps', 'id_step', $stepid))) {
                    delete_step_task('project_steps', 'id_step', $stepid);
                }
            }
              break;

            case 3:
            if (isset($_POST['stepid'], $_POST['newtask'])) {
                $newtask[] = $_POST['stepid'];
                $newtask[] = $_POST['newtask'];
                $newtask = sanitize_array($newtask);

                if (count(select_step_task('project_steps', 'id_step', $newtask[0]))) {
                    addtask($newtask);
                }
            }
              break;

            case 4:
            if (isset($_POST['taskid'])) {
                $taskid = sanitize_var($_POST['taskid']);

                if (count(select_step_task('step_tasks', 'id_task', $taskid))) {
                    delete_step_task('step_tasks', 'id_task', $taskid);
                }
            }
              break;

            case 5:
              archive_project($projectid, 3);
              break;

            case 6:
              archive_project($projectid, 1);
              break;

            default:
              echo "Action inconnue.";
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
            <div class="input-field col s12">
              <label for="newtask">Nouvelle tache</label>
              <input type="text" id="newtask" name="newtask" required>
            </div>
            <input type="hidden" name="stepid" value="<?php echo $project_step['id_step']; ?>">
            <input type="hidden" name="formaction" value="3">
            <input type="submit" value="Créér" class="btn">
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
              <div class="input-field col s12">
                <label for="newstep">Nouvelle étape : </label>
                <input type="text" id="newstep" name="newstep">
              </div>
              <div class="input-field col s12">
                <label for="newstepdate">Deadline : </label>
                <input type="text" id="newstepdate" name="newstepdate" placeholder="jj/mm/aaaa">
              </div>
              <input type="hidden" name="formaction" value="1">
              <input type="submit" value="Créér" class="btn">
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
