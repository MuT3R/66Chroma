<?php 

if (!function_exists('chroma_customize_register')) {
  require('customizer/chroma_home.php');
  require('customizer/chroma_general.php');
  // Fonction qui va déclarer un nouveau customizer =)
  // Qui comprend une variable Objet qui contient l'api du customizer
  // L'objet est dans la partie admin celle ou tu peux changer le nom du site
  function oprofile_customize_register($wp_customize) {
    // Methode d'ajout d'un panel
    $wp_customize->add_panel(
      'chroma_theme_panel',
      [ 
        // Titre du panel affiché
        'title' => 'Chroma ',
        // La description du panel (?) <==== Click & descript
        'description' => 'Chroma Panel - Gestion du thème',
        // Emplacement
        'priority' => 1
      ]
    );
    
    // Page d'accueil
    $wp_customize->add_section(
      'chroma_home',
      [
        'title' => 'Page d\'accueil',
        'panel' => 'chroma_theme_panel'
      ]
    );
    chroma_home($wp_customize);

    // Page type générale
    $wp_customize->add_section(
      'chroma_general',
      [
        'title' => 'General',
        'panel' => 'chroma_theme_panel'
      ]
    );
    chroma_general($wp_customize);
  }
}

// Ajout du hook a notre function
add_action('customize_register', 'oprofile_customize_register');