<?php
$arg = [
  'pagename' => 'Galerie',
];
$wp_query = new WP_Query($arg);
if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?>
  <div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_post_thumbnail_url('medium_large'); ?>">
  </div>
    

<?php wp_reset_postdata();endwhile; endif; ?>