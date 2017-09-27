<?php

function sanitize($sent_array){
  foreach ($sent_array as $key => $value) {
      $value = filter_var($value, FILTER_SANITIZE_STRING);
      $sent_array[$key] = $value;
  }
  return $sent_array;
}

?>
