<?php 


// Initialisation d'un tableau vide qui va contenir mes tableaux a parcourir.
$description_array=[];
// Je boucle sur la variable $currentContest qui va contenir toute ma table depuis ma base de données.
foreach($currentContests as $oneCurrentContest) {
// Je stocke dans mon tableau vide, toute mon html ce qui va me permettre de bouclé sur l'index et ainsi récuperer l'information dans son champ
  $description_array[] = '
  <div class="current-contest-description"> 
  
    <p> Le concours du moment a pour thème : <br><span>'. $oneCurrentContest->contest_name . '</span></p>
    <p> Le concours du moment se terminera le : <br><span>'.  $oneCurrentContest->contest_date .'</span></p>
    <p> Sa description : <br><span>'.  $oneCurrentContest->contest_description .'</span></p>
  
    <form action="" method="POST" class="delete_form">
      <input type="submit" name="delete_form_submit" value="Supprimer le concours">
      <input type="hidden" name="delete_id" value=" '. $oneCurrentContest->id .'" id="delete_form">
    </form>
  </div>';
} 

