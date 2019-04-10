    <div class="sign"> 

    <?php 

    // Je récupère le rôle de l'utilisateur :
        $user_id = get_current_user_id(); 
        $user_info = get_userdata($user_id);

        if($user_info){ $user_role = $user_info->roles[0];}   
           
    ?>

    <?php if(!is_user_logged_in()) : ?>

        <a class="sign_in" href="<?= wp_login_url( home_url() ); ?>" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
        <a class="sign_up" href="<?php echo wp_registration_url( home_url() ); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
    
    <?php else : ?>

        <?php if($user_role == 'subscriber') : ?>

            <a class="cart" href="<?= admin_url('admin.php?page=Panier')?>" title="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <?php


                // require __DIR__.'/../../../../plugins/chroma-market/classes/Order.php';
                
                // $cart = new Order;

                /**
                 * 1) Récupère la liste de tous les paniers (array)
                 * 2) Parcours chaque array jusqu'à trouver celui qui correspond à l'user courant
                 * 3) On compte les produits de dedans
                 */
            //     foreach($cart->get_cart_data() as $plop_cart) {
            //         // var_dump($plop_cart);

            //         if ($plop_cart['user-id'] == get_current_user_id()) {

            //             echo ('+');

            //         }
            //     }
    

                

                

        
            // ?>
            </a>
            <a class="cart" href="<?= admin_url('profile.php')?>" title="Logout"><i class="fa fa-user" aria-hidden="true"></i></a>
            <a class="sign_out" href="<?= wp_logout_url( home_url() ); ?>" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>

        <?php else : ?>

            <a class="cart" href="<?= admin_url('admin.php?page=Commandes')?>" title="Logout"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            <a class="cart" href="<?= admin_url()?>" title="admin"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <a class="sign_out" href="<?= wp_logout_url( home_url() ); ?>" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>

        <?php endif ;?>

    <?php endif ;?>


</div>
