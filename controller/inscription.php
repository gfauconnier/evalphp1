<?php
require_once '../model/data.php';
require_once '../vue/template/head.php';
require 'headerc.php';

$error = "";

if (isset($_POST['user'], $_POST['userfname'], $_POST['userlname'], $_POST['email'], $_POST['pwd'], $_POST['rpwd'])
  && !empty($_POST['user']) && !empty($_POST['userfname']) && !empty($_POST['userlname']) && !empty($_POST['email'])
  && !empty($_POST['pwd']) && !empty($_POST['rpwd'])) {
    echo "bleh";

}
if ($error) {
  echo "?";
} else {
  echo "pas d'erreurs";
}
include '../vue/inscriptionv.php';


include '../vue/template/footer.php';
