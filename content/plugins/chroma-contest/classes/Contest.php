<?php

class Contest {
  

  private $contest_options;

  public function __construct()
  {
    add_action('wp_loaded', array( $this,'my_redirect_page') );
    add_action( 'admin_menu', array( $this, 'contest_add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'contest_page_init' ) );
  }
  public function my_redirect_page() {
    if(!empty($_POST['contest_name']) && !empty($_POST['contest_date']) && !empty($_POST['contest_description']) || isset($_POST['delete_form_submit'], $_POST['delete_id']) ) {
      $url = '/Apotheose/Site-jeunes-artistes/wp/wp-admin/admin.php?page=Vos+concours';
      wp_redirect( $url);
    
    }
  }

  public function contest_add_plugin_page() {
		$data_user = get_userdata( get_current_user_id() );
		$displayed_name = ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste') ? 'Vos concours' : 'Les concours' ;		
				

    add_menu_page(
      'Concours', // page_title
      $displayed_name, // menu_title
      'read', // capability
      $displayed_name, // menu_slug
      array( $this, 'contest_create_admin_page'),
      'dashicons-awards',
      25
    );
    

  }



  public function contest_create_admin_page() {
    $this->contest_options = get_option('contest_option_name');
    


    ?>
    <!--Call of display -->
    <div class="wrapper">

      <?php

       require_once __DIR__.'/../inc/router.php'
       
       ?>

    </div>
  <?php }

  public function contest_page_init() {
    register_setting(
      'contest_option_group', // option_group
      'contest_option_name', // option_name
      array( $this, 'contest_sanitize') // callback
    );

    add_settings_section(
      'contest_setting_section', // id
      'Settings', // title
      array( $this, 'contest_section_info'), //callback
      'contest-admin' // page ???
    );
  }
  
}

