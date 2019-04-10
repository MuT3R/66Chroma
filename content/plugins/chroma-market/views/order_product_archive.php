    <h2 class="thallium" id="products<?=$index?>">Produits</h2>
    <ul class="products_resume hidden">
        
        <?php require __DIR__."/order_product_archive_view.php";?>
        
    </ul>

    <h2 class="mut3r">Commande n°<?= $order_id?></h2>

    <ul class="order_data ">

        <li>Montant total : <?= number_format( ${'price_order_user_'.$order_id} , 2);?>€</li>  
        <li>Date de création: xxx</li> 
        <li>Statut : <?=$cart->get_order($index, 'status')?></li>

    </ul>

    <h2 class="thallium">Mise à jour du statut</h2>

    <form method="post" action="" class="update_form hidden">
        <div class="update_form-radio">
            <input type="radio" id="checking_status" name="status" value="En attente de validation" 
            <?php if( $cart->get_order($index, 'status')=="En attente de validation"){echo "checked";}?>>
            <label for="checking_status">En attente de validation</label>
        </div>

        <div class="update_form-radio">
            <input type="radio" id="preparation_status" name="status" value="Préparation en cours"
            <?php if( $cart->get_order($index, 'status')=="Préparation en cours"){echo "checked";}?>>
        
            <label for="preparation_status">Préparation en cours</label>
        </div>

        <div class="update_form-radio">
            <input type="radio" id="sent_status" name="status" value="Envoyée"
            <?php if( $cart->get_order($index, 'status')=="Envoyée"){echo "checked";}?>> 
           
            <label for="sent_status">Envoyée</label>
        </div>
        <div>
            <input type="hidden" value="<?= $order_id?> " name="order-id"/>
            <input type="hidden" value="update-order" name="order-action"/>
            <input type="submit" value="Mettre à jour">
        </div>
        
    </form>
