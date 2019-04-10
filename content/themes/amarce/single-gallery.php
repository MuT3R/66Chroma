<?php 

  get_header(); 

  require __DIR__.'/../../plugins/chroma-market/classes/Order.php';
          
  $cart = new Order; 
    
  $check = 0;  

  if($cart->get_cart_data()  != NULL){

    foreach($cart->get_cart_data() as $plop_cart){   
      
      if(get_the_ID() == $plop_cart['product-id']){
        
        $check ++;
        
      }   
      
    }
  }


  if($cart->get_orders_data() != NULL){

    foreach($cart->get_orders_data() as $order){       

      foreach($order['product-id'] as $id){
        
        if(get_the_ID() == $id){
          
          $check ++;
        
        }

      }
            
    } 
  
  }  

?>

  <main class="main">

    <section>


        <article  class="single-creation">
          <?php if (have_posts()): while(have_posts()) : the_post(); ?>
          
          <figure class="single-creation__image">
            <?php the_post_thumbnail('large'); ?>
          </figure>
          
          <div class="single-creation__text"><h2 class="single-creation__title" >
            
            <?php the_title(); ?></h2>
            <?php the_content(); ?>
            <p class="single-creation__link">Fait par : <?= get_the_author(); ?></p>
            <p class="single-creation__link">Revenir à la galerie <a href="<?= get_post_type_archive_link('gallery'); ?>"><i class="fa fa-backward" aria-hidden="true"></i></a></p>
            <p class="single-creation__link">Revenir sur le portfolio <a href="<?= get_post_type_archive_link('portfolio'); ?>"><i class="fa fa-backward" aria-hidden="true"></i></a></p>
            
          </div>
          
          
          <?php if (is_user_logged_in() && $check == 0) : ?> 
          
          <div class="gallery-info">
            <!-- Les types de la creation
            
            (ouvrir php < ?)    -->
            <?php 
                echo('<div class="gallery-info__type">' .
                get_creation_types(get_the_ID()).'</div>');             
                ?>
              <!-- (fermer pcheupé ? >)  -->      
              
              <div class="gallery-info__customField">
                
                
                <!-- (ouvrir php < ?)
                Si il y'a un prix alors on affiche les info de vente et de téléchargement :) -->

                <?php 

                  if ( get_price(get_the_ID()) == true ) {
                   echo ( get_price(get_the_ID())  ); 
                    echo ( '<p class="gallery-info-download">' . get_statu(get_the_ID()) . '. ' . get_download_statu(get_the_ID()) . '</p>' ); 
                  // Pas oublier d'afficher l'auteur ;) get the autor
                  }
                //  (fermer pcheupé ? >) 
                
                ?>
                
              </div>
              
              <form method="post" action="" class="update_form ">
                
                <input type="hidden" value="<?= get_the_ID() ?>" name="post-id"/>
                <input type="hidden" value="<?= get_current_user_id()?>" name="user-id"/>
                <input type="submit" value="Ajouter au panier"  class="btn btn-danger gallery-info__addMarket">                                 
                
              </form>         
            </div>
            
            
            <?php endif; ?>
        
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </article>

        <!-- Ce rendre dans la templates comments.php pour modifier le rendus scss de la partie commentaire. -->
        <div class="comments-section">

          <?php comments_template(); ?>

        </div>

      </section>

      <?php get_footer(); ?> 

      <?php 
        if(!empty($_POST['post-id'])){          
          
          global $wpdb ;

          $wpdb->insert( 

            'chroma_cart_data', 
            [

              'user_id' => $_POST['user-id'],   
              'creation_id' => $_POST['post-id'] 

            ]
            
          );

        }
?>
