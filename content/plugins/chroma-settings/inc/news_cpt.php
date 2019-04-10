<?php 

class News_cpt
{
  public function __construct()
  {
    add_action(
      'init', /**Hook sur lequel l'action va être effectuée */
      [
        $this, /**Object courant */ 
        'create_news_cpt' /**nom de la fonction à executer en premier*/
      ]
    ); 
    add_action('init', [$this, 'chroma_news_taxonomies']);
  }

  public function create_news_cpt()
  {
    $labels = [
      'name'                  => 'News',
      'singular_name'         => 'News',
      'menu_name'             => 'News',
      'name_admin_bar'        => 'News',
      'archives'              => 'Archives des News',
      'attributes'            => 'Attributs des News',
      'parent_item_colon'     => 'Element parent',
      'all_items'             => 'Toutes les News',
      'add_new_item'          => 'Ajouter une News',
      'add_new'               => 'Ajouter une News',
      'new_item'              => 'Nouvelle News',
      'edit_item'             => 'Editer la News',
      'update_item'           => 'Mettre à jour la News',
      'view_item'             => 'Voir la News',
      'view_items'            => 'Voir les News',
      'search_items'          => 'Rechercher les News',
      'not_found'             => 'Aucune News trouvée',
      'not_found_in_trash'    => 'Aucune News trouvée dans la corbeille',
      'featured_image'        => 'Image de la news',
      'set_featured_image'    => 'Ajouter une image a la News',
      'remove_featured_image' => 'Supprimer l\'image de la News',
      'use_featured_image'    => 'Utiliser une image pour la News',
      'insert_into_item'      => 'Inserer dans la News',
      'uploaded_to_this_item' => 'Televerser dans la News',
      'items_list'            => 'Liste des News',
      'items_list_navigation' => 'Liste des News',
      'filter_items_list'     => 'Filtrer la liste des News',
    ];
    $args = [
      'label'           => 'News',
      'labels'          => $labels,
      'description'     => 'News des artistes',
      'hierarchical'    => false,
      'menu_position'   => 2,
      'public'          => true,
      'menu_icon'       => 'dashicons-testimonial',
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
    ];

    register_post_type(
      'news',
      $args
    );

  }
  public function chroma_news_taxonomies()
  {
    $this->chroma_type_taxonomies();
  }

  private function chroma_type_taxonomies()
  {
    register_taxonomy(
      'type_news',
      'news',
      [
        'label'             => 'Type d\'actualité',
        'public'            => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'rewrite'           => [
          'slug'  => 'Le-type',
        ]
      ]
        );
  }

  public function activation()
  {
    $this->create_news_cpt();
    $this->chroma_news_taxonomies();
    flush_rewrite_rules();
  }
}