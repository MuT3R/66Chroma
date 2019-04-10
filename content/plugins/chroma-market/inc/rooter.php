<?php

$cart = new Order();    
 
 
    if (!empty($_POST['order-action'])) {

        require __DIR__.'/switch_request.php';

        unset($cart);

        $cart = new Order();    

    }

