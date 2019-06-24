<?php

  // Verification du formulaire
  if (isset($_POST['contest_name']) && isset($_POST['contest_date']) && isset($_POST['contest_description'])) {
    // var_dump($_POST);
    $contest_name = $_POST['contest_name'];
    $contest_date = $_POST['contest_date'];
    $contest_description = $_POST['contest_description'];
    // if (isset($_POST['submit'])){   header("Location: contest_admin.php");   }

    if (empty($contest_name) || empty($contest_date) || empty($contest_description)) {
      $errorMessage = 'Tous les champs doivent être requis.';

    } else {
      $contest->set_contest_information($contest_name, $contest_date, $contest_description);

    }
  }

