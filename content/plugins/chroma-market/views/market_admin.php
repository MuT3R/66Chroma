<?php   

/*

INSERT INTO `chroma_cart_data` (`id`, `cart_status`, `creation_id`, `user_id`, `confirmed`) VALUES (NULL, 'En attente de validation', '136', '2', '0'), (NULL, 'En attente de validation', '119', '2', '0'), (NULL, 'En attente de validation', '103', '2', '0');

*/

?>

<?php //for($index = 0; $index < count($cart->get_order_users_data()); $index ++) : /**Je dis de boucler autant de fois qu'il y a d'utilisateurs ayant déjà passé une commande*/?>

<h1 class="market_title">Nouvelle(s) commande(s)</h1>

<div class="order_wrapper">

    
    <?php if($cart->get_orders_data() != NULL) : ?>

        <?php    for($index = 0; $index < count($cart->get_orders_data()); $index ++) : /**tant que j'ai des commandes, je boucle * */ ?>

       

            <?php $order_id = $cart->get_order($index, 'id');?>

            <?php $user_id = $cart->get_order($index, 'user-id');?>

            <?php  ${'price_order_user_'.$order_id}=0 ; ?> 

            <?php $status = $cart->get_order($index, 'status'); ?>
            
            <?php 

                $p_id[] = $cart->get_order($index, 'product-id'); // récupère les id de la commande courante

                $products_id = []; // On initialise notre joulie tableau

                foreach($p_id as $array_id){ // algo pour virer les doublons

                    foreach($array_id as $id){ 

                        $count = 0;

                        foreach($products_id as $id_test){


                            if($id_test == $id){ // si bdoublon, incrémente

                                $count ++;

                            }
                                                        
                        }
                        
                        if($count == 0){

                            $products_id[] = $id;  // si $count incrémenté -> doublons -> On ajoute pas, sinon on ajoute                                          

                        }

                    }

                }

                $p_id = []; // on vide le tableau intermédiaire d'id

            ?>

            <?php if( $status != "Envoyée") : ?>        
                    
                <div class="order_commande">

                        <?php require __DIR__."/order_product.php"?>

                </div>                    
            
            <?php endif; ?>

        <?php endfor; ?>

    <?php else: ?>

            <p>Vous n'avez pas de nouvelle(s) commande(s)</p>

    <?php endif; ?>

</div>

<hr>

<h1 class="market_title">Command(e) archivée(s)</h1>

<div class="order_wrapper">

    <?php if($cart->get_orders_data() != NULL) : ?>
        
        <?php $plop = 0; ?>

        <?php for($index = 0; $index < count($cart->get_orders_data()); $index ++) : /**tant que j'ai des commandes, je boucle * */ ?>


            <?php $order_id = $cart->get_order($index, 'id');?>

            <?php  ${'price_order_user_'.$order_id}=0 ; ?> 

            <?php $status = $cart->get_order($index, 'status'); ?>
            
            <?php 

                $products_idII = $cart->get_order($index, 'product-id');           
                //var_dump($products_id);

            ?>

            <?php if( $status == "Envoyée") : ?>  

                <div class="order_commande">

                        <?php require __DIR__."/order_product_archive.php"?>

                </div>    
                
                <?php $plop ++ ; ?>

            <?php endif; ?>

        <?php endfor; ?>
    

    <?php endif; ?>

    <?php if($plop==0) :?>

        <p>Vous n'avez pas de commande(s) archivée(s)</p>

        <?php endif; ?>

</div>


