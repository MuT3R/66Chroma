<?php
// J'initialise ma variable index a zero, car elle va pouvoir être en co raccord avec les index de mon tableau.
$index=0;

?>
<div class="contest-wrapper">
  <h1 class="contest-title">Concours actuel</h1>
  <div class="carte-wrapper">
    <?
    // Je boucle sur mon tableau contenant les id des mes post ( tepuis la table post )
    foreach ($currentContestIdByPosts as $id) :
    $arg = [
      // Je place du coup l'id 
      'p' => $id,
      'post_type' => 'gallery', 
      // 's' => 'keyword',
    
    ];
    // Du coup je passe par la boucle de wp pour afficher l'image du post choisi.
    $wp_query = new WP_Query($arg);  
    if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>

    <div class="carte">
      <h3 class= "carte-title"> Le titre de votre oeuvre : <?php the_title(); ?> </h3>
        <?php the_post_thumbnail([ 150, 150]); ?>
      <?= // J'affiche le contenue de mon tableau a l'index: 0 , 1 , 2 , 3 , 4
        $description_array[$index];
      ?>
      <?php endwhile; wp_reset_postdata(); endif; 
       // J'incrémente l'index pour pouvoir affiché la prochaine valeur dans le tableau.
       $index++;
      ?>
    </div>
      <?php endforeach; ?>
  </div>
</div>
