<?php 

    if(!empty($_POST['post-id'])){
        echo $_POST['post-id'];
    }

    require_once __DIR__."/../classes/Order.php";  
    require_once __DIR__."/../inc/rooter.php"; 

    $data_user =get_userdata( get_current_user_id() );	

    // TODO : admin <= superadmin et || '' <= admin-artiste
    if ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste'){

        require __DIR__.'/market_admin.php';

    }else{

        require __DIR__.'/market_user.php';

    }
    
?>

