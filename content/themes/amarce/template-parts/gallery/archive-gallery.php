
<?php
$arg = [  
  'post_type' => 'gallery',
  // 's' => 'keyword',
  'author' => '6,7,5', // A verifié pour les autheurs 1 2 3 sont leur id. 1= super admin
  'orderby' => 'rand',
  'order' => 'DESC',
  'posts_per_page' => 10,
];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
    <article  class="gallery-post">


        <figure class="gallery-post__image">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail([ 500, 500]); ?></a>
        </figure>
        
  

      <div>

      
    </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>
