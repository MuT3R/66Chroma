<?php get_header(); 


$arg = [  
  'post_type' => 'portfolio',
  'p' => 74,
  'posts_per_page' => 1,
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="portfolio">
      <?php the_post_thumbnail('thumbnail'); ?>

      <h2 class="portfolio__title"><?php the_title(); ?></h2>
      <div class="portfolio__text"><?php the_content(); ?></div>

      
    </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    
    <?php get_template_part('template-parts/nav/social-nav'); ?>
    <div class="gallery-content">

<?php get_template_part('template-parts/portfolio/amelie-portfolio'); ?>
    </div>

<?php get_footer(); ?>
