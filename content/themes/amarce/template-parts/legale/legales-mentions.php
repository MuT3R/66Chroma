<?php
  $arg = [
    
    'pagename' => 'politique-de-confidentialite',
  ];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>

  <div class="legale-content">
    <h2 class="legale-content__title"><?php the_title(); ?></h2>
    <div class="legale-content__text"><?php the_content(); ?></div>
  </div>

<?php

wp_reset_postdata();

endwhile;endif;
?>    