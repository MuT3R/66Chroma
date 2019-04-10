<?php



// Prevoir la Gallery par autheur 
// Sont comportement charger sous l'utilisateurs

$arg = [  
  'post_type' => 'gallery',
  'author' => '6', // Author id de cecile a prévoir
  'posts_per_page' => 8,
  'orderby' => 'rand',
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="gallery-portfolio">

      <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('crop-portfolio');}  ?></a>
    </article>
<?php endwhile; wp_reset_postdata(); endif; ?>