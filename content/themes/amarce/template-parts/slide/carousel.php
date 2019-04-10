<?php 
$arg = [ 'pagename' => 'Amelie', ];

$wp_query = new WP_Query($arg);
if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>
  <div class="carousel-inner" role="listbox">

    <div class="carousel-item active" style="background-image: url('<?= get_the_post_thumbnail_url()?>');">

      <div class="carousel-caption caption">
        <h3><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
      </div>
    </div>  
  
<?php
endwhile; endif;
$arg = [
  'pagename' => 'Cecile' ,
];

$wp_query = new WP_Query($arg);
if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post();
?>

  <div class="carousel-item" style="background-image: url('<?= get_the_post_thumbnail_url()?>');" >
   
    <div class="carousel-caption caption">
        <h3><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
    </div>
  </div>


<?php
endwhile; endif; 
$arg = [
    'pagename' => 'Arnaud',
];

$wp_query = new WP_Query($arg);
if ($wp_query->have_posts()): while($wp_query->have_posts()): $wp_query->the_post(); ?> 

  <div class="carousel-item" style="background-image: url('<?= get_the_post_thumbnail_url()?>');">
    
      <div class="carousel-caption caption">
        <h3><?php the_title() ?></h3>
        <p><?php the_excerpt() ?></p>
      </div>    
  </div>
</div>  

<?php
endwhile; endif; ?>


  