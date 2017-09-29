<?php
$user_projects = get_own_projects();

foreach ($user_projects as $user_project) {
  include '../vue/ownprojectvue.php';
}
