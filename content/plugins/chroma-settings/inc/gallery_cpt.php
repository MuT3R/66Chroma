<?php 

class Gallery_cpt
{
  public function __construct()
  {
    add_action('init', [$this, 'create_gallery_cpt']);
    add_action('init', [$this, 'chroma_register_taxonomies']);
  }

  public function create_gallery_cpt()
  {
    $labels = [
      'name'                  => 'Créations',
      'singular_name'         => 'Créations',
      'menu_name'             => 'Créations',
      'name_admin_bar'        => 'Créations',
      'archives'              => 'Archives des Créations',
      'attributes'            => 'Attributs des Créations',
      'parent_item_colon'     => 'Element parent',
      'all_items'             => 'Toutes les Créations',
      'add_new_item'          => 'Ajouter une nouvelle Création',
      'add_new'               => 'Ajouter une nouvelle Création',
      'new_item'              => 'Nouvelle Création',
      'edit_item'             => 'Editer la Création',
      'update_item'           => 'Mettre à jour la Création',
      'view_item'             => 'Voir la Création',
      'view_items'            => 'Voir les Création',
      'search_items'          => 'Rechercher les Créations',
      'not_found'             => 'Aucune Création trouvée',
      'not_found_in_trash'    => 'Aucune Création trouvée dans la corbeille',
      'featured_image'        => 'Votre img , jpg , png etc...',
      'set_featured_image'    => 'Ajouter votre image',
      'remove_featured_image' => 'Supprimer l\'image ',
      'use_featured_image'    => 'Utiliser une image',
      'insert_into_item'      => 'Inserer dans la Création',
      'uploaded_to_this_item' => 'Televerser dans la Création',
      'items_list'            => 'Liste des Créations',
      'items_list_navigation' => 'Liste des Créations',
      'filter_items_list'     => 'Filtrer la liste des Créations',
    ];
    $args = [
      'label'           => 'Créations',
      'labels'          => $labels,
      'description'     => 'Créations des artistes',
      'hierarchical'    => false,
      'menu_position'   => 6,
      'public'          => true,
      'menu_icon'       => 'dashicons-format-gallery',
      'has_archive'     => true,
      'rewrite'         => [
        'with_front'    => true
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
      'capability_type' => 'post',
      'capabilities'    => array(
        // 'edit_post'          => 'edit_gallery', 
        // 'read_post'          => 'read_gallery', 
      ),
      'map_meta_cap'    => true,
    ];
    register_post_type(
      'gallery',
      $args
    );
  }

  public function chroma_register_taxonomies()
  {
    $this->chroma_type_taxonomies();
    // $this->chroma_status_taxonomies();
    // $this->chroma_price_taxonomies();
    // $this->chroma_dlstatut_taxonomies();
  }

  private function chroma_type_taxonomies()
  {
    register_taxonomy(
      'type',
      'gallery',
      [
        'label'             => 'Type',
        'public'            => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'rewrite'           => [
          'slug'  => 'Le-type',
        ]
      ]
        );
  }
  
  private function chroma_status_taxonomies()
  {
    register_taxonomy(
      'status',
      'gallery',
      [
        'label'             => 'Status des disponibilités',
        'public'            => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'rewrite'           => [
          'slug'  => 'Le-status-de-l\'oeuvre',
        ]
      ]
        );
  }

  private function chroma_price_taxonomies()
  {
    register_taxonomy(
      'price',
      'gallery',
      [
        'label'             => 'Prix de l\'oeuvre',
        'public'            => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'rewrite'           => [
          'slug'  => 'Le-status-de-l\'oeuvre',
        ]
      ]
        );

  }

  private function chroma_dlstatut_taxonomies()
  {
    register_taxonomy(
      'dlstatus',
      'gallery',
      [
        'label'             => 'Téléchargement',
        'public'            => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'rewrite'           => [
          'slug'  => 'Le-status-de-l\'oeuvre',
        ]
      ]
        );
  }

  public function activation()
  {
    $this->create_gallery_cpt();
    $this->chroma_register_taxonomies();
    flush_rewrite_rules();
  }

  public function deactivation()
  {
    flush_rewrite_rules();
  }
}