<?php

// cleans an array (htmlspecialchars ...)
function sanitize_array($sent_array){
  foreach ($sent_array as $key => $value) {
      $value = filter_var($value, FILTER_SANITIZE_STRING);
      $sent_array[$key] = $value;
  }
  return $sent_array;
}

// cleans a variable (htmlspecialchars ...)
function sanitize_var($sent_var) {
  $sent_var = filter_var($sent_var, FILTER_SANITIZE_STRING);
  return $sent_var;
}

?>
