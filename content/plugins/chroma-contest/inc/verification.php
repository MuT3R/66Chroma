<?php

  // Grâce à ce traitement de données je vais pouvoir rentrer en base de données les informations récupérées dans les champs de mon formulaire grâce à la méthode post.
  // Je vérifie via une condition sur les données récupérées en POST ne sont pas null. Si elles ne le sont pas, je vais pouvoir les attribuer dans des variables.
  if (isset($_POST['contest_name']) && isset($_POST['contest_date']) && isset($_POST['contest_description']) && isset($_POST['artwork_name'])) {
    $contest_name = $_POST['contest_name'];
    $contest_date = $_POST['contest_date'];
    $contest_description = $_POST['contest_description'];
    $artwork_name = $_POST['artwork_name'];

    // Via une autre condition je vérifie si les données sont vides, alors j'attribue un message d'erreur dans une variable.
    if (empty($contest_name) || empty($contest_date) || empty($contest_description) ||  empty($artwork_name)) {
      $errorMessage = 'Tous les champs doivent être requis.';

    } else {
      // Si on a bien des données correctes, alors on les passe dans une fonction de mon objet $contest = (classe contestdb.php)
      $contest->set_contest_information($contest_name, $contest_date, $contest_description, $artwork_name);

    }
  }

