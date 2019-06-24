<?php 

  // @--- Welcome on Controller ---@

  require_once __DIR__. "/../classes/Contestdb.php";
  $contest = new Contestdb;
    


  $data_user =get_userdata( get_current_user_id() );	

  if ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste'){
       

    
    echo "En construction";
    echo "--------------------";
   
    // On Attribut l'id en database de concours courrant dans une variable.
    if (!empty($contest)) {
      $keys = $contest->get_contest_id_keys();
      $curentContests = $contest->get_all_contest();
    }


    // Traitement
    require __DIR__.'/verification.php';
    // Traitement
    require __DIR__.'/delete_contest.php';
    

    
    // --------------------------------------------
    
    // --------------------------------------------
    
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