    <h2 class="thallium" id="products<?=$index?>">Produits</h2>

    <ul class="products_resume hidden" id="products_resume<?=$index?>">
        
        <?php require __DIR__."/order_product_view.php";?>
        
    </ul>

    <h2 class="thallium">Clients</h2>

    <?php $plop_user_id = $cart->get_order($index, 'user-id');?>
    

    <?php $data_users = $cart->get_order_users_data(); ?>

    <?php for($number2 = 0; $number2 < count($data_users); $number2 ++) : ?>

        <?php if($data_users['user'.$number2]['id'] == $plop_user_id ) : ?>

            <ul class="user_data hidden" id="user_data<?=$index?>">

                <li>Prénom : <?= $data_users['user'.$number2]['first-name'] ?></li>
                <li>Nom : <?= $data_users['user'.$number2]['last-name'] ?></li>
                <li>Tel : xxx</li>
                <li>Mail : <?= $data_users['user'.$number2]['email'] ?></li>
                <li>Ville : xxx</li>
                <li>Rue : xxx</li>
                <li>Code postale : xxx</li>                    
                <li>Commandes passées sur le site : xxx</li>

            </ul>

        <?php endif; ?>
    
    <?php endfor ;?>
                                        
    <h2 class="mut3r">Commande n°<?= $order_id?></h2>

    <ul class="order_data">

        <li>Montant total : <?= number_format( ${'price_order_user_'.$order_id} , 2);?>€</li>  
        <li>Date de création: xxx</li> 
        <li>Statut : <?=$cart->get_order($index, 'status')?></li>

    </ul>

    <h2 class="thallium">Mise à jour du statut</h2>

    <form method="post" action="" class="update_form hidden" id="form_update<?=$index?>">
        <div class="update_form-radio">
            <input type="radio" id="checking_status<?=$index?>" name="status" value="En attente de validation" 
            <?php if( $cart->get_order($index, 'status')=="En attente de validation"){echo "checked";}?>>
            <label for="checking_status">En attente de validation</label>
        </div>

        <div class="update_form-radio">
            <input type="radio" id="preparation_status<?=$index?>" name="status" value="Préparation en cours"
            <?php if( $cart->get_order($index, 'status')=="Préparation en cours"){echo "checked";}?>>
        
            <label for="preparation_status">Préparation en cours</label>
        </div>

        <div class="update_form-radio">
            <input type="radio" id="sent_status<?=$index?>" name="status" value="Envoyée"
            <?php if( $cart->get_order($index, 'status')=="Envoyée"){echo "checked";}?>> 
           
            <label for="sent_status">Envoyée</label>
        </div>
        <div>
            <input type="hidden" value="<?= $order_id?> " name="order-id"/>
            <input type="hidden" value="update-order" name="order-action"/>
            <input type="submit" value="Mettre à jour">
        </div>
        
    </form>
