<?php
  $post_per_page = 8;

  if (get_theme_mod('chroma_news_nbr_articles')) {
    $post_per_page = get_theme_mod('chroma_news_nbr_articles');
  }

  $arg = [
    'posts_per_page' => $post_per_page,
    'post_type' => 'news',
    'order' => 'ASC',
    'orderby' => 'title'
  ];

$wp_query = new WP_Query($arg);

if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>

<div class="post" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
  <div class="post-content">
    <h3 class="post-content__title"><?php the_title(); ?></h3>
    <div class="post-content__text"><?php the_excerpt(); ?></div>
    <a class="post-content__link" href="<?php the_permalink(); ?>">Lire <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
  </div>
</div>

<?php

wp_reset_postdata();

endwhile;endif;
?>    