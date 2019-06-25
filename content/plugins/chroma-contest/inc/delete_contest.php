<?php 

  if (isset($_POST['delete_form_submit'], $_POST['delete_id'])) {
    $contest->delete_current_contest($_POST['delete_id']);
    
  }