<?php get_header(); ?>

  
  <main class="main">

    <section class="slide">      
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol> -->
        <?php get_template_part('template-parts/slide/carousel'); ?>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="fa fa-arrow-circle-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="fa fa-arrow-circle-right" aria-hidden="true">
          <span class="sr-only">Next</span>
        </a>
      </div>      
    </section>

    <section class="portfolio-newsContent">
      <?php get_template_part('template-parts/portfolio/archive-portfolioNews'); ?>
    </section>
    
    <aside>
      <div class="description">
          <h2 class="description__title">Qui sommes-nous ?</h2>
          <p class="description__text"><?= (get_theme_mod('chroma_description')); ?></p>
        </div>
      <?php get_template_part('template-parts/aside/aside-search'); ?>
    </aside>


    
    
    <h2 class="news-title">Les news.</h2>

    
    <section class="posts">
      <?php get_template_part('template-parts/news/news'); ?>
    </section>
        
<?php get_footer(); ?>