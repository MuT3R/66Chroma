<?php

/* 
  L'objet contest me permet plusieurs fonctionnalités
  1 ) Rediriger ma navigation après soumition d'un formulaire, sans passer par le header.
  2 ) Ajouter dans le back office la page concerné et la limité à un administrateur.
  3 ) Initialiser cette page par des options et des sections. Ce qui permet depuis le back office d'avoir des tags sur la page souhaitée.
*/


class Contest {
  
  // Déclaration d'une variable privée qui va contenir les options de ma page.

  private $contest_options;

  // Mise en place d'un constructeur, les fonctions appeler dans __construct se chargeront dès le lancement du script.

  public function __construct()
  {
    // Je dis à mon script de s'éxecuter lors du chargement du core load de Wordpress. Cela me permet de definir la redirection de ma page avant qu'il ne bloque le header location.
    add_action('wp_loaded', array( $this,'my_redirect_page') );
    // J'ajoute ensuite deux fonctions essentielles au fonctionnement logique du plugin , l'ajout de la page et ses options.
    add_action( 'admin_menu', array( $this, 'contest_add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'contest_page_init' ) );
  }

  // Je définis ma fonction de redirection de la page par une vérification des informations soumis dans le formulaire. Les données envoyées dans la variable $_POST ne doivent pas être vides ou différentes de nul. Alors je définis dans une variable url son chemin.
  public function my_redirect_page() {
    if(!empty($_POST['contest_name']) && !empty($_POST['contest_date']) && !empty($_POST['contest_description']) || isset($_POST['delete_form_submit'], $_POST['delete_id']) ) {

      // admin_url contient le chemin entier de mon url , je lui place par la suite en argument la partie qui n'est pas succeptible de changer dans mon url ( cad : la page des concours ).
      $url = admin_url( "?page=Vos+concours" );
      // Je passe en argument l'url complet à la fonction wp_redirect qui, quand à elle se charge juste de rediriger l'utilisateur sur une autre page.
      wp_redirect( $url);
    
    }
  }

  // Cette fonction comme citée plus haut va me permettre de récupérer les informations sur l'user courant et par la suite je choisis d'afficher uniquement cette partie du back-office au statut de super administrateur et d'adminstrateur-artiste.
  public function contest_add_plugin_page() {
		$data_user = get_userdata( get_current_user_id() );
		$displayed_name = ($data_user->roles[0] == 'administrator' || $data_user->roles[0] == 'admin_artiste') ? 'Vos concours' : 'Les concours' ;		
				
    // J'ajoute ensuite la page avec son titre, ca capability ( la lecture ) , le slug ( identifiant texte ) et sa dashicon (icone de menu).
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


  // Dans cette fonction je créé la page avec son contenu html. Via les option définies plus haut que je passe dans la variable contest_options de l'objet courant.
  public function contest_create_admin_page() {
    $this->contest_options = get_option('contest_option_name');
    


    ?>
    <!--Appel de ma div wrapper qui va contenir mon routeur ( les chemins vers les views, les executions de script, et les interactions en base de donnée) -->
    <div class="wrapper">

      <?php

       require_once __DIR__.'/../inc/router.php'
       
       ?>

    </div>
  <?php }

  // fonction d'initialisation des paramettres de ma page.
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

