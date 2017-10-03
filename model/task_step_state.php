<?php

// changes the state value depending on sent parameters
function state_change($table, $field, $field_id, $new_state) {
  $dbconnect = dbconnect();

    $state = substr($field, 3).'_state';


  $update = $dbconnect->query('UPDATE '.$table.' SET '.$state.' = '.$new_state.' WHERE '.$field.' = '.$field_id);

}
