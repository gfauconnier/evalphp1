<?php
require_once '../model/data.php';
require_once '../vue/template/head.php';
require 'headerc.php';

$error = [];

if (isset($_POST['user'], $_POST['userfname'], $_POST['userlname'], $_POST['email'], $_POST['pwd'], $_POST['rpwd'])
  && !empty($_POST['user']) && !empty($_POST['userfname']) && !empty($_POST['userlname']) && !empty($_POST['email'])
  && !empty($_POST['pwd']) && !empty($_POST['rpwd'])) {

    if(!preg_match('#^[a-z0-9]+$#', $_POST['user'])) {
      $error[] = "Le nom d'utilisateur doit comporter uniquement des lettres minuscules ou des chiffres.";
    }
    if(!preg_match('#^[A-Z][A-Za-z-\s]*[a-z]$#', $_POST['userlname']) || !preg_match('#^[A-Z][a-z-\s]+[a-z]$#', $_POST['userfname'])) {
      $error[] = 'Le nom et le prénom ne peuvent contenir que des lettres et commencer par une majuscule.';
    }
    if($_POST['pwd'] != $_POST['rpwd'] && !preg_match('#^[a-z0-9]+$#', $_POST['pwd']) && !preg_match('#^[a-z0-9]+$#', $_POST['rpwd'])) {
      $error[] = 'Les mots de passe doivent être identiques et ne comporter que des lettres minuscules ou des chiffres';
    }


    if (count($error) == 0) {
        $user_creation[] = $_POST['user'];
        $user_creation[] = $_POST['userfname'];
        $user_creation[] = $_POST['userlname'];
        $user_creation[] = $_POST['email'];
        $user_creation[] = $_POST['pwd'];
        $user_creation[] = $_POST['rpwd'];

        $user_creation = sanitize($user_creation);

        if (verify_user($user_creation[0])) {
          $error[] = verify_user($user_creation[0]);
        }
        else {
          add_user($user_creation);
        }

    }
}
if ($error) {
    print_r($error);
} else {
    echo "pas d'erreurs";
}

include '../vue/inscriptionv.php';

include '../vue/template/footer.php';
