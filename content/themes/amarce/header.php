<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    
    
    
  <header class="header">    

      
    <nav class="navbar navbar-expand-md"  <?php // Je eecuperer le role des users et teste
        $user_id = get_current_user_id(); 
        $user_info = get_userdata($user_id);

    // if(!is_user_logged_in('administrator')){echo "style=\"position: fixed; top:46px;\"";}

        if($user_info){ $user_role = $user_info->roles[0];} 

          if(!is_user_logged_in()) :
            echo "style=\"position: fixed; top:0;\"";

          elseif($user_role == 'administrator') :
             
              echo "style=\"position: fixed; top:32px;\"";
          
          endif
    
    ?> >
        
      <h1 class="navbar__title">66 ChromA</h1>
      
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        
        <?php get_template_part('template-parts/nav/nav-header'); ?>
        <?php get_template_part('template-parts/aside/aside-connection'); ?>
        
      </div>
    
      
    </nav>
    
    
    
  </header>
  
  <div class="wrapper">