<?php 

class Contestdb {

  public $contest_name; // Nom du concour
  public $contest_date; // Date de fin de concour
  public $contest_description; // Description du concour
  public $contest_id; // id du concour


  public function __construct(){
    
    
  }

  public function contest($contest_name, $contest_date, $contest_description){
    $this->set_contest_name($contest_name);
    $this->set_contest_date($contest_date);
    $this->set_contest_description($contest_description);
  }



  
  /*
  * SETTER
  */ 


  private function set_contest_name($value){

    $this->contest_name;
  }

  
  private function set_contest_date($value){
    $this->contest_date;
  }

  private function set_contest_description($value){
    $this->contest_description;
  }

  public function set_contest_information($contest_name, $contest_date, $contest_description){
    global $wpdb;


    $wpdb->insert("chroma_contest", [
      "contest_name" => $contest_name,
      "contest_date" => $contest_date,
      "contest_description" => $contest_description,
    ]);

  }

  // public function pass_id($id) {
  //   if ($id == $this->get_contest_id()) {
  //     return $this->delete_current_contest($id);
  //   }
  // }
  
  public function delete_current_contest($id) {
    global $wpdb;
    $wpdb->delete('chroma_contest', ['id' => $id ]);
  }


   /*
  * GETTER
  */ 

  public function get_current_contest_id() {
    global $wpdb;
    
    $id_list = $wpdb->get_col('SELECT `id` FROM `chroma_contest`');
    return $id_list;

  }
  
  // GETTER TO CURRENT //
  public function get_current_contest_name() {
    global $wpdb;
    $name_list = $wpdb->get_col('SELECT `contest_name` FROM `chroma_contest`');
    foreach ($name_list as $name) {
      $current_contest_name = $name;
    }
    return $current_contest_name;
  }

  public function get_current_contest_date() {
    global $wpdb;
    $date_list = $wpdb->get_col('SELECT `contest_date` FROM `chroma_contest`');
    foreach ($date_list as $date) {
      $current_contest_date = $date;
    }
    return $current_contest_date;
  }

  public function get_current_contest_description() {
    global $wpdb;
    $description_list = $wpdb->get_col('SELECT `contest_description` FROM `chroma_contest`');
    // var_dump($description_list);
    foreach ($description_list as $description) {
      $current_contest_description = $description;
    }
    return $current_contest_description;
  }

  // GETTER TO ALL CONTEST FOR VIEWS //

  public function get_all_contest() {
    global $wpdb;
    $rows = $wpdb->get_results('SELECT * FROM `chroma_contest`');
    // var_dump($allContest);

    return $rows;
    
  }

  // ---------------------------------------------------- //

  public function get_contest_name(){
    return $this->contest_name;
  }

  
  public function get_contest_date(){
    return $this->contest_date;
  }
  
  public function get_contest_description(){
    return $this->contest_description;
  }

  public function get_contest_id_keys(){
    global $wpdb;
    $all_id = $wpdb->get_col("SELECT id FROM chroma_contest");
    $keys = array_keys($all_id);

    return $keys;
    
    // TODO les listes/
    // foreach($all_id as $contest_id) {
    //   $id = $wpdb->get_col($wpdb->prepare("SELECT id FROM chroma_contest WHERE id='%d'", $contest_id));
    //   // var_dump($contest_id);
    //   var_dump($id[0]);
    //   return $id[0];
    // }
  }

}  