<?php 

// Je passe par l'objet $wpdb de wordpress qui me permet d'accéder et d'interagir avec la base de données.


class Contestdb {

  public $contest_name; // Nom du concours
  public $contest_date; // Date de fin de concours
  public $contest_description; // Description du concours
  public $contest_id; // id du concours
  public $artwork_name;



  public function __construct(){  
  }


 // Les informations de mes variables depuis mon objets sont récuperées , puis traitées dans cette fonction.
 // Fonction qui récupère plusieurs arguments,
 // Je passe par la global $wpdp de WP pour acceder à les tables en base de données. 
 // 
  public function set_contest_information($contest_name, $contest_date, $contest_description, $artwork_name){
    global $wpdb;

    // Puis je passe par la fonction "insert ". Pour que les informations soit enregistrées, je précise pour chaque variable, la table à associer..
    $wpdb->insert("chroma_contest", [
      "contest_name" => $contest_name,
      "contest_date" => $contest_date,
      "contest_description" => $contest_description,
      "artwork_name" => $artwork_name,
    ]);
  }


  




  // Delete
  // Fonction qui me permet de supprimer l'id courrant du concours ciblé.
  public function delete_current_contest($id) {
    global $wpdb;
    $wpdb->delete('chroma_contest', ['id' => $id ]);
  }


  // Ici cette fonction me permet via a une requête SQL get_results de retourné un tableau de titre de tout les post qui on un type "attachment" sur ma table chroma_post.
  public function get_posts_attachement_name(){
    global $wpdb;
    $postTitleList = $wpdb->get_results('SELECT post_title FROM chroma_posts WHERE post_type = "gallery"'  );
    // Je renvoie cette variable disponible a mon routeur.
    return $postTitleList;  
  }




    public function get_id_by_join() {
    global $wpdb;

    $all_in = $wpdb->get_results('SELECT * FROM chroma_posts INNER JOIN chroma_contest WHERE chroma_posts.`post_name` = chroma_contest.`artwork_name`');
    // ex A la clef 0 = http://localhost/Apotheose/Site-jeunes-artistes/content/uploads/2019/02/aliens-xenologie-1.jpg
    // $ids[] = '';
    foreach ($all_in as $keys) {
      // j'isole les ID dans un tableau, vus que j'ai récuperer tout ce qui en lien avec ma table post et contest.
      $ids[] = $keys->ID;
    }
    if (!empty($ids)) {
      // Pour évité un message d'erreur lorse qu'il n'y a aucun concours.
      return $ids;
    }
  }

  // Fonction qui récupère l'id lors d'une éventuelle vérification des id. routeur.php L 42. Condition permettant d'afficher ma vue ou un message.
  public function get_current_contest_id() {
    global $wpdb;
    // Je viens placer dans une variable tout les id de ma colonne id de ma table , en bdd.
    $id_list = $wpdb->get_col('SELECT `id` FROM `chroma_contest`');
    return $id_list;

  }

 
// Via l'objet wpdb, et la fonction get_results, je cible ma table 'chroma_contest', Puis je retourne un tableau de données accessible depuis mon objet $contest ( routeur )
  public function get_all_contest() {
    global $wpdb;
    $rows = $wpdb->get_results('SELECT * FROM `chroma_contest`');
    return $rows;
  }

  public function get_contest_id_keys(){
    global $wpdb;
    $all_id = $wpdb->get_col("SELECT id FROM chroma_contest");
    $keys = array_keys($all_id);
    return $keys;
  }
  
  public function get_contest_name(){
    return $this->contest_name;
  }

  public function get_contest_date(){
    return $this->contest_date;
  }
  
  public function get_contest_description(){
    return $this->contest_description;
  }

  public function get_artwork_name() {
    
    return $this->artwork_name;
    
  }
  
}  