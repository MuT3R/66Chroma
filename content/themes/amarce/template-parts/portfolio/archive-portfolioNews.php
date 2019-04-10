<?php
$postPortfolio = [
  '74',
  '86',
  '76'
];

function display_name($rand){
    switch ($rand) {
    case 74:
        return "amelie";
        break;
    case 86:
        return "cecile";
        break;
    case 76:
        return "arnaud";  
        break;
     }
}

$ext=0;

while( $ext < 3 ){

    /**
     * Je génère un nombre aléatoire entre 0 et 2
     * car mon tableau a des indexes compris entre 0 et 2
     */
    $nbrRand = rand( 0 , 2);
    
    /**
     * Comme les indexes vont être supprimés petit-à-petit,
     * je vérifie qu'il existe bien dans le tableau.
     * Tant qu'il n'existe pas, je regénère un index de façon aléatoire.
     */

    while(!isset($postPortfolio[$nbrRand])){
        $nbrRand = rand( 0 , 2);
    }
    
    /**
     * J'assigne l'index séléectionné à la variable $randX
     * où X est la variable $ext qui incrémente à chaque tour de boucle 
     */

    ${"rand". $ext} = $postPortfolio[$nbrRand] ;

    /**
     * J'appelle ma fonction display_name avec comme paramètre
     * la variable $randX.
     * J'associe à $randomNameX la valeur retorunée par le switch qui
     * l'id du post à l'id du contenu
     */
    
    ${"randomName". $ext} = display_name(${"rand". $ext});

    /**
     * Je supprime l'index utilisé dans le tableau afin
     * d'éviter toute répétition
     */

    unset($postPortfolio[$nbrRand]);
    
    /**
     * J'incrémente $ext (X)
     */

    $ext ++;  
}

// Portfolio Amélie
// ------------------------------------------------------------------------------------------------------------------

$arg = [  
  'post_type' => 'portfolio',
  'p' => $rand0,
  'posts_per_page' => 1,
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="portfolio-Article">
      <a href="<?php the_permalink($rand0); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
      <div class="portfolio-news">
        <h2 class="portfolio-news__title"><?php the_title(); ?></h2>
        <div class="portfolio-news__text"><?php the_excerpt(); ?></div>
      </div>


        
    </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    

<?php
// Portfolio Cecile
// ------------------------------------------------------------------------------------------------------------------

$arg = [  
  'post_type' => 'portfolio',
  'p' => $rand1,
  'posts_per_page' => 1,
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="portfolio-Article">
      <a href="<?php the_permalink($rand1); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
      <div class="portfolio-news">
        <h2 class="portfolio-news__title"><?php the_title(); ?></h2>
        <div class="portfolio-news__text"><?php the_excerpt(); ?></div>
      </div>

      
    </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>



<?php
// Portfolio Arnaud
// ------------------------------------------------------------------------------------------------------------------

$arg = [  
  'post_type' => 'portfolio',
  'p' => $rand2,
  'posts_per_page' => 1,
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="portfolio-Article">
      <a href="<?php the_permalink($rand2); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
      <div class="portfolio-news">
        <h2 class="portfolio-news__title"><?php the_title(); ?></h2>
        <div class="portfolio-news__text"><?php the_excerpt(); ?></div>
      </div>

      
    </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>

