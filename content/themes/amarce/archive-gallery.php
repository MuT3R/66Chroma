<?php get_header(); ?>
  <main class="main">

      <div class="banner">
        <?php get_template_part('template-parts/banner/banner-gallery'); ?>       
      </div>

  
      <div class="description">
        <h2 class="description__title">Bienvenue sur notre galerie<h2>
        <p class="description__text"></p>
      </div>


      <aside>
        <?php get_template_part('template-parts/aside/aside-search'); ?>
      </aside>  

      <section class="gallery-posts">
        <?php get_template_part('template-parts/gallery/archive-gallery'); ?>
        
      </section>

<?php get_footer(); ?> 
