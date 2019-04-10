<?php 

  if(!empty($_POST['post-id'])){
    echo $_POST['post-id']; 
  }

  // require_once __DIR__. "/../classes/????";

  $data_user =get_userdata( get_current_user_id() );	

  if ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste'){

    require __DIR__.'/contest_admin.php';

}else{

    require __DIR__.'/contest_user.php';

}