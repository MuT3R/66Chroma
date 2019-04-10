<?php foreach($products_id as $id) : ?>   

    <?php 

        // var_dump($products_id);

        // echo '__start_____';
    
        // var_dump($id) ;
        
        // echo '____end';

    ?>

    <?php 

        $arg = [
            'p' => $id,
            'post_type' => 'gallery'
        ];

        $wp_query = new WP_Query($arg);     

    ?>

<?php
    // for( $number = 0; $number < count($cart->get_orders_data()); $number ++){


    //     if($cart->get_order($number,'user-id') == $user_id){

    //         $orders_id = $cart->get_order($number, 'product-id');
    //         $number_product = $number;
            
    //     }

    // }  
?>



    <?php if ($wp_query->have_posts()): ?>

        <?php while($wp_query->have_posts()): $wp_query->the_post();?>
        

            <div  class="order_product">

                <h3><?php the_title(); ?></h3>
                
                <figure class="product_img">  

                    <?php the_post_thumbnail('thumbnail'); ?>

                </figure> 

                <p><?= $cart->get_order_product($user_id ,$id, 'price'); ?> €</p>

                <?php  ${'price_order_user_'.$order_id} += $cart->get_order_product($user_id, $id, 'price') ?>
                    
            </div>    


        <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <?php endif; ?>

<?php endforeach; ?>
