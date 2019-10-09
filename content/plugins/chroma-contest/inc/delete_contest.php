<?php 

  // Condition qui me permet la suppresion d'un concours via sont id, depuis le boutton hidden de mon formulaire.
  if (isset($_POST['delete_form_submit'], $_POST['delete_id'])) {
    $contest->delete_current_contest($_POST['delete_id']);
    
  }