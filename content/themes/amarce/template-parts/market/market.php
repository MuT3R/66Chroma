<?php

/**
 * TODO a codé selon le comportement des tables
 * pour les boucles.
 * 
 */
?>


    <article  class="contest">

    <figure class="contest__image">
    <?php the_post_thumbnail('full'); ?>
    </figure>

    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>


    </article>