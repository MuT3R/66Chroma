<?php get_header(); ?>
  
  <main class="main">
    <section class="slide">

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
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

    <div class="description">
      <h2 class="description__title">Qui sommes-nous ?</h2>
      <p class="description__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis sunt</p>
    </div>

    <aside>
      <form action="GET" class="search">
        <label for="search" class="search__label">
          <i class="fa fa-search" aria-hidden="true"></i> Faire une recherche
        </label>
        <input class="search__field form-control" type="text" placeholder="Auteurs, Dessin etc.." aria-label="Search" id="search">
      </form>
    </aside>
    
    
    <h2 class="news">News</h2>

    
    <section class="posts">

      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?tree,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?computer,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?flowers,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?earth,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?dog,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor liberoquam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?town,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?flower,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?code,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>
        </div>
      </div>
      <div class="post" style="background-image: url('https://source.unsplash.com/500x500/?water,black-and-white')">
        <div class="post-content">
          <h3 class="post-content__title">Title Temps</h3>
          <p class="post-content__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus suscipit officiis dolor libero  quam nobis neque dolorem laboriosam earum quo.</p>
          <a class="post-content__link" href="#">Read more</a>      
        </div>
      </div>
    </section>
    <hr>  
        
<?php get_footer(); ?>