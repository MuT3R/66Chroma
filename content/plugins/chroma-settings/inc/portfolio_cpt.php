<?php

class Portfolio_cpt
{
  public function __construct()
  {
    add_action('init', [$this, 'create_portfolio_cpt']);
  }

  public function create_portfolio_cpt()
  {
    $labels = [
      'name'                  => 'Portfolio',
      'singular_name'         => 'Portfolio',
      'menu_name'             => 'Portfolio',
      'name_admin_bar'        => 'Portfolio',
      'archives'              => 'Archives du Portfolio',
      'attributes'            => 'Attributs des Portfolios',
      'parent_item_colon'     => 'Element parent',
      'all_items'             => 'Tout les Portfolios',
      'add_new_item'          => 'Ajouter un nouveau Portfolio',
      'add_new'               => 'Ajouter un nouveau Portfolio',
      'new_item'              => 'Nouveau Portfolio',
      'edit_item'             => 'Editer le Portfolio',
      'update_item'           => 'Mettre à jour le Portfolio',
      'view_item'             => 'Voir le Portfolio',
      'view_items'            => 'Voir les Portfolios',
      'search_items'          => 'Rechercher les Portfolios',
      'not_found'             => 'Aucun Portfolio trouvée',
      'not_found_in_trash'    => 'Aucun Portfolio trouvée dans la corbeille',
      'featured_image'        => 'Image de mise en avant du Portfolio',
      'set_featured_image'    => 'Ajouter votre image',
      'remove_featured_image' => 'Supprimer l\'image ',
      'use_featured_image'    => 'Utiliser une image',
      'insert_into_item'      => 'Inserer dans le Portfolio',
      'uploaded_to_this_item' => 'Televerser dans le Portfolio',
      'items_list'            => 'Liste des Portfolios',
      'items_list_navigation' => 'Liste des Portfolios',
      'filter_items_list'     => 'Filtrer la liste des Portfolios',
    ];
    $args = [
      'label'           => 'Portfolio',
      'labels'          => $labels,
      'description'     => 'Portfolios des artistes',
      'hierarchical'    => false,
      'menu_position'   => 6,
      'public'          => true,
      'menu_icon'       => 'dashicons-universal-access-alt',
      'has_archive'     => true,
      'rewrite'         => [
        'with_front'    => true // trash = false a trouvé pour pas qu'il puisse suprimer le post, don l'id.
      ],
      'supports'        => [
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'comments',
        'trackbacks'
      ],
      'capability_type' => 'page',
      'capabilities'    => array(
        'create_posts' => 'do_not_allow',
        'read_post' => 'read_portfolio'
      ),
      'map_meta_cap'    => true,
  

      
    ];
    register_post_type(
      'portfolio',
      $args
    );
  }

  public function chroma_register_taxonomies()
  {

  }
  public function activation()
  {
    $this->create_portfolio_cpt();
    flush_rewrite_rules();
  }

  public function deactivation()
  {
    flush_rewrite_rules();
  }
  
}