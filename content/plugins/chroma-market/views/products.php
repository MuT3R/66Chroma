<?php 

$arg = [
    'p' => $order_product_id,
    'post_type' => 'gallery'
];

$wp_query = new WP_Query($arg);



if ($wp_query->have_posts()):

    while($wp_query->have_posts()): $wp_query->the_post();?>


        <div  class="product">

            <h3><?php the_title(); ?></h3>
            
            <figure class="product_img">  

                <?php the_post_thumbnail('thumbnail'); ?>

            </figure> 

            <p><?= $cart->get_cart_product($sindex, 'price'); ?> €</p>
                
        </div>    


<?php endwhile; 

wp_reset_postdata();

endif; 