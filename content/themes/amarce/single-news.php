<?php get_header(); ?>
  <main class="main">
    <section>
    <?php if (have_posts()): while(have_posts()) : the_post(); ?>

      <article  class="news ">
        <figure class="news__image">
        <?php the_post_thumbnail(); ?>
        </figure>
        <div class="news-content">
          <h2 class="news-content__title" ><?php the_title(); ?></h2>
          <div class="news-content__text"><?php the_content(); ?></div>
          <p class="news-content__link">Revenir à l'accueil<a href="<?= home_url(); ?>"><i class="fa fa-backward" aria-hidden="true"></i></a></p>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); endif; ?>



      <div class="comments-section">
      <!-- Ce rendre dans la templates comments.php pour modifier le rendus scss de la partie commentaire. -->
      <?php comments_template(); ?>
      </div>
    </section>

<?php get_footer(); ?> 
