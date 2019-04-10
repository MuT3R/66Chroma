<?php


switch ($_POST['order-action']) {

    case 'delete-product':

        Order::delete_order(
            [
                'delete-product', 
                $_POST['product-id']
            ]
        );       

        break;

    case 'validate-order':

        Order::update_order(
            [
                'validate-order', 
                $_POST['user-id']
            ]
        );

        Order::delete_order(
            [
                'delete-order', 
                $_POST['user-id']
            ]
        );       

        break;   

    case 'update-order':

        Order::update_order(
            [
                'update-order', 
                $_POST['order-id'],
                $_POST['status']
            ]
        );

        if(!empty($_POST['status']) && $_POST['status'] == 'Envoyé')

        break;   

}

