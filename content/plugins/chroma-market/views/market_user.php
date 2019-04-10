<h1 class="market_title">Votre panier :</h1>

<div class="market_wrapper">

<?php $user_id = get_current_user_id(); /**Je définis l'id de l'user sur lequel on va boucler pour afficher ses commandes*/?>  
    
    <?php $list_products_id = [];?>

    <?php ${'price_order_user_'.$user_id} = 0; /**Variable qui affichera le prix */ ?> 
    
       
<div class="market-content">      
    <?php if($cart->get_cart_data() != NULL) : ?>
        

            <?php
            
                for($sindex = 0; $sindex < count($cart->get_cart_data()); $sindex ++):             
                
                /**
                 * Pour chaque produit : 
                 **/

            ?>

                <?php 
                
                    $order_user_id = $cart->get_cart($sindex, 'user-id');
                
                    /**
                    * Je récupère l'id de l'user 
                    * qui a effectué la commande 
                    * pour le comparer à l'utilisateur en cours
                    **/
                
                ?>

                <?php 
                
                    $order_product_id = $cart->get_cart($sindex, 'product-id'); 
                    
                    /**
                    * Je récupère l'id du produit
                    * de la commande en cours.
                    **/ 
                
                ?>

                <?php
                
                    if($order_user_id == $user_id):
                
                    /**
                     * S'il y a correspondance, c'est que
                     *  la commande appartient à l'user.
                     *  Il faut donc afficher les produits
                     **/

                ?>  

                    <?php ${'price_order_user_'.$user_id} += intval($cart->get_cart_product($sindex, 'price'));?>      
                    
                    <?php if(${'price_order_user_'.$user_id} > 0):?>

                        <?php $list_products_id[] = $order_product_id;?>
                        

                            <div class="market_commande">

                                    <?php require __DIR__.'/products.php';?>

                                    <form method="post" action=" " class="update_form ">

                                        <input type="hidden" value="<?= $cart->get_cart($sindex, 'id');?>" name="product-id"/>
                                        <input type="hidden" value="delete-product" name="order-action"/>
                                        <input type="submit" value="Supprimer">                                 
                            
                                    </form>                                

                            </div>                                                     
                        
                        
                    <?php endif; ?>
                   
                <?php endif ; ?>                           

                
 
            <?php endfor;?> 
            
    <?php endif; ?> 
</div>


    <?php if(${'price_order_user_'.$user_id} > 0):?>
       <div class="market_wrapper-info">               
            <p>Montant total du panier : <?= number_format( ${'price_order_user_'.$user_id} , 2);?>€</p>

            <form method="post" action=" " class="update_form ">

                <input type="hidden" value="<?= $user_id;?>" name="user-id"/>     
                <input type="hidden" value="validate-order" name="order-action"/>
                <input type="submit" value="Valider le panier">                                 

            </form>
        </div>
    <?php else :?>

        <p>Votre panier est vide :|</p>

    <?php endif; ?>

</div>


<h1 class="market_title">Historique de vos commandes : </h1>




   
<?php if( $cart->get_orders_data()) : // s'il y a des commandes :?>
    

    <?php    
        for( $number = 0; $number < count($cart->get_orders_data()); $number ++){

            if($cart->get_order($number,'user-id') == $user_id){ 

                $orders_idI[] = $cart->get_order($number, 'product-id');
                $number_product[] = $number;
                
            }
            
        }  
     ?>
     <?php if(!empty($orders_idI)) : ?>   
     
        <?php

            foreach($orders_idI as $array){

                foreach($array as $id){

                    $orders_id[] = $id;

                }

            }   

        ?>
                
        <?php $ptitcompte = 0; ?> 
        
        <div class="market_wrapper">

            <div class="market-content">

                <?php foreach( $orders_id as $old_product_id) :?>                
                        
                    <div class="market_commande">

                        <?php require __DIR__.'/old_products.php';?>

                    </div>            


                    <?php $ptitcompte ++; ?>

                <?php endforeach; ?>

            </div>

        </div>

    <?php else : ?>

        <p>Vous n'avez pas passé de commande</p>

    <?php endif; ?>

<?php endif; ?>


    

