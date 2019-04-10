<?php get_header(); ?>
<main class="main">
  
  <div class="banner">
    <?php get_template_part('template-parts/banner/banner-portfolio'); ?>       
  </div>

  <div class="description">
    <h2 class="description__title">Bienvenue sur notre Portfolio<h2>
    <p class="description__text"></p>
  </div>


  <aside>
    <?php get_template_part('template-parts/aside/aside-search'); ?>
  </aside>  

  <section>
  <?php get_template_part('template-parts/portfolio/archive-portfolio'); ?>
  
  </section>

<?php get_footer(); ?> 
