<?php 

  // @--- Welcome on Controller ---@
  // Dès l'entrée de mon routeur j'appelle ce coup si un nouvelle objet ( oui un objet dans un objet ). Cette objet va quand à lui s'occuper des appels depuis la base de données. Il va me permettre d'utiliser la constante $wpdb qui va contenir des tableaux de données des tables choisies.

  require_once __DIR__. "/../classes/Contestdb.php";
  // $contest va contenir le name, la description , la date, et l'id du concours ( pas forcement utile pour l'utilisateur mais plus pour le dev)
  $contest = new Contestdb;
  // var_dump($contest);  

  // Vérification de l'utilisateur courant pour lui afficher les views souhaitées
  $data_user =get_userdata( get_current_user_id() );	
  if ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste'){
   
    // Vérification de la variable $contest, si elle contient bien les données souhaitées , alors :
    // On Attribut l'id en database de concours courant dans une variable.
    // Et on récupère tout les concours de la table.
    if (!empty($contest)) {
      $postTitleList = $contest->get_posts_attachement_name();

      $keys = $contest->get_contest_id_keys();
      // retourne le rows depuis l'objet Contestdb. 
      // Cette variable va me permettre de boucler dessus depuis la vue 
      // et ensuite accéder à chaque index et leurs informations
      //  ( contest_name, contest_date, contest_description ).
      $currentContests = $contest->get_all_contest();
    }
    // Variable qui va contenir un tableau de donnée des id de la table posts, qui coincide a l'id de la table contest.
    $currentContestIdByPosts = $contest->get_id_by_join();
    
    // On effectue les traitements , vérification des champs + entrée en base et suppression du concours souhaité.
    // Traitement
    require __DIR__.'/verification.php';
    // Traitement
    require __DIR__.'/delete_contest.php';
    // Traitement
    require __DIR__.'/current_loopContest.php';
    
    // Views
    require __DIR__.'/../views/create_contest_admin.php';

    // Views
    if (!empty($contest->get_current_contest_id())) {
    
    require __DIR__.'/../views/current_contest.php';
    } else {
      echo '<p> Il n\'y a pas de concours <p>';
    }


}else{

    // require __DIR__.'/contest_user.php';

}