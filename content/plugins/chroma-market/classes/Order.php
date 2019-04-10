<?php

class Order{
    
    public $cart_data; //Informations liées au panier
    public $cart_users_data; // Information des utilisateurs et leur information liées ayant ajouter au panier
    public $cart_products_data; // Informations liées aux produits dans le panier
    
    public $orders_data; // Informations liées à la commande
    public $order_users_data; // Informations liées aux users ayant passé commande
    public $order_products_data; // Informations liées aux produits de la commande
    
    
    public function __construct(){
        
        $this->create_basics_datas();       
        
        $this->set_users_data();   
        
        if($this->order_users_data != NULL){ $this->update_order(['set-data-order' , $this->order_users_data]);} // set la table chroma_order_data
        
        $this->set_products_data(); 
        
        $this->set_orders_data();          
       
        /**
         * create_basics_datas()
         * ---------------------
         * Donne à tout les users s'ils ne les ont pas
         * la métadonée 'order_number' => '0'. 
         */        

        /**
         * set_users_data()
         * ----------------
         * (1)
         * Fait le lien de toutes les données utilisateur
         * ayant un panier dans $this->cart_users_data :
         * 
         * ID-|-pseudo-|-email-|-prénom-|-nom-|
         * détails-de-l'adresse-|-téléphone-|
         * nombre-de-commandes-passées (order-number)-|
         * ID de chaque produits commandés (order-history)-|
         * 
         * (2)
         * Fait le lien de toutes les données utilisateur
         * ayant passé commande dans $this->order_users_data :
         * 
         * ID-|-pseudo-|-email-|-prénom-|-nom-|
         * détails-de-l'adresse-|-téléphone-|
         * nombre-de-commandes-passées (order-number)-|
         * ID de chaque produits commandés (order-history)-|
         */

        //var_dump($this->cart_users_data); 
        //var_dump($this->order_users_data); 

        /**
         * set_products_data()
         * ----------------
         * (1)
         * Fait le lien entre toutes les données produits
         * apartenants à un panier dans $this->cart_products_data :
         * 
         * ID-|-prix-|-titre-|
         * 
         * nombre-de-commandes-passées (order-number)-|
         * ID de chaque produits commandés (order-history)-|
         * 
         * (2)
         * Fait le lien de toutes les données utilisateur
         * ayant passé commande dans $this->order_users_data :
         * 
         * ID-|-prix-|-titre-|
         */

        //var_dump($this->cart_products_data); 
        //var_dump($this->order_products_data); 
        
        /**
        * set_orders_data()
        * -------------------
        * (1)
        * Fait le lien entre toutes les données produits
        * apartenants à un panier dans $this->cart_products_data :
        *  
        * ID-|-prix-|-titre-|
        *
        *(2)
        * Fait le lien entre toutes les données produits
        * apartenants à une commande dans $this->order_products_data :
        *  
        * ID-|-prix-|-titre-|
        */

        //var_dump($this->cart_data); 
        //var_dump($this->orders_data); 

    }

    public static function create_basics_datas(){ 

        global $wpdb; // J'appelle $wpdb pour pouvoir faire mes requêtes      

        $_user_id = $wpdb->get_col("SELECT id  FROM chroma_users "); // Je récupère tous les ID des utilisateurs

        foreach($_user_id as $user_id){ // Pour chaque id : 

            $meta_key_user = $wpdb->get_col($wpdb->prepare("SELECT meta_key  FROM chroma_usermeta WHERE user_id='%d'",  $user_id)); //Je récupère les métadonées liées à l'ID courant  

            
            $count_order_number = 0; // Compteur de répétition              
            
            foreach($meta_key_user as $meta_key){// Vérifie l'exitence ou non de la métadonée 'order_number à l'ID courant

                if ($meta_key == 'order_number'){$count_order_number ++;} // Si la clef existe déjà pour l'id courant, le compteur incrémente                                 
            }                

            if($count_order_number == 0){// Si la clef n'est pas présente, on l'ajoute
                add_user_meta(  $user_id, 'order_number', '0', TRUE  );               
            }   

        } 

    }

    

    

    private function set_users_data(){

        global $wpdb; // J'appelle $wpdb pour pouvoir faire mes requêtes   

        $users_id = []; // Je définis un tableau vide dans lequel seront ajouté la liste des ID des users ayant un panier

        $u_id = $wpdb->get_col("SELECT user_id , creation_id  FROM chroma_cart_data"); // Je récupère la liste des ID des users ayant un panier.  

        // var_dump($u_id);
 
        /**
         * Comme un user peut avoir plusieurs
         * articles, il peut y avoir des
         * doublons d'ID ; je supprime :
         */  

        foreach($u_id as $id1){ // A chaque répétition, $id1 prendra la valeur de l'indexe courant du tableau de doublons à nettoyer

            $count = 0; // J'initialise le compteur de répétition

            foreach($users_id as $id2){ // A chaque répétition, $id2 prendra la valeur de l'indexe courant du tableau propre
                
                if( $id1 == $id2){ // Si un indexe du tableau propre à une occurence dans le tableau de doublons

                    $count ++; // Le compteur de répétition incrémente

                }           
            
            }

            if($count == 0){ // Si la valeur n'a pas d'occurence :

                $users_id[] = $id1; // C'est qu'elle n'existe pas dans le tableau propre , alors on peut l'insérer

            }          
        
        }

        /**
         * Je viens associer à chaque ID 
         * toutes les données concernant 
         * l'utilisateur ayant cet ID sous
         * la forme d'un tableau associatif
         */


        for($id=0; $id < count($users_id); $id++){
            
            $user = $wpdb->get_row($wpdb->prepare( "SELECT user_nicename , user_email  FROM chroma_users WHERE id='%d'", $users_id[$id]) , ARRAY_N);  
            $user_order_number = intval($wpdb->get_var($wpdb->prepare( "SELECT meta_value  FROM chroma_usermeta WHERE meta_key='%s' AND user_id='%d'", 'order_number',  $users_id[$id])));
            if($user_order_number >0){

                for($number_order = 1; $number_order <= $user_order_number; $number_order ++){

                    $user_order_history =  unserialize(get_user_meta( $users_id[$id], 'order'.$number_order, true));   

                }    

            }else{ $user_order_history = NULL ;}     

            ${'user'.$id}['id'] = $users_id[$id];
            ${'user'.$id}['pseudo'] = $user[0];
            ${'user'.$id}['email'] = $user[1];
            ${'user'.$id}['first-name'] = get_user_meta( $users_id[$id], 'first_name', true);
            ${'user'.$id}['last-name'] = get_user_meta( $users_id[$id], 'last_name', true);
            // ${'user'.$id}['zip_code'] = get_user_meta( $users_id[$id], 'code_postale', true);
            // ${'user'.$id}['city'] = get_user_meta( $users_id[$id], 'ville', true);
            // ${'user'.$id}['adress'] = get_user_meta( $users_id[$id], 'adresse', true);
            // ${'user'.$id}['phone'] = get_user_meta( $users_id[$id], 'tel', true); 
            ${'user'.$id}['order-number'] = $user_order_number;
            ${'user'.$id}['order-history'] = $user_order_history; 

                      

            $this->cart_users_data['user'.$id] = ${'user'.$id};

        }

        /**
         * Je récupère tous les users 
         * qui ont déjà passé une 
         * commande et leurs données
         */

        $hu_id = $wpdb->get_col("SELECT user_id FROM chroma_usermeta WHERE meta_key='order_number' AND meta_value!='0'"); // Ils ont passé une commande car order_number (le nombre de commande passées) > 0

        $user_order_history = [];

         /**
         * Je viens associer à chaque ID 
         * toutes les données concernant 
         * l'utilisateur ayant cet ID sous
         * la forme d'un tableau associatif 
         */

        //var_dump($hu_id);

        for($id=0; $id < count($hu_id); $id++){
            
            $curent_id = $hu_id[$id];

            //var_dump($curent_id);

            $user = $wpdb->get_row($wpdb->prepare( "SELECT user_nicename , user_email  FROM chroma_users WHERE id='%d'",  $hu_id[$id]) , ARRAY_N); 
            $user_order_number = intval($wpdb->get_var($wpdb->prepare( "SELECT meta_value  FROM chroma_usermeta WHERE meta_key='%s' AND user_id='%d'", 'order_number', $curent_id )));


            if($user_order_number > 0){ // si le nombre de commande est supérieur à 0

                for($number_order = 1; $number_order <= $user_order_number; $number_order ++){     

                    $user_order_history[] =  unserialize(get_user_meta( $curent_id, 'order'.$number_order, true));           
      
                }  

            }else{ $user_order_history = NULL ;}  
            
            if( gettype($user_order_history) == 'string'){

                $user_order_historyI[] = $user_order_history;
                ${'user'.$id}['order-history'] = $user_order_historyI;  

            }else{

                ${'user'.$id}['order-history'] = $user_order_history;  

            }

            ${'user'.$id}['id'] =  $hu_id[$id];
            ${'user'.$id}['pseudo'] = $user[0];
            ${'user'.$id}['email'] = $user[1];
            ${'user'.$id}['first-name'] = get_user_meta($hu_id[$id], 'first_name', true);
            ${'user'.$id}['last-name'] = get_user_meta( $hu_id[$id], 'last_name', true);
            // ${'user'.$id}['zip_code'] = get_user_meta( $hu_id[$id], 'code_postale', true);
            // ${'user'.$id}['city'] = get_user_meta( $hu_id[$id], 'ville', true);
            // ${'user'.$id}['adress'] = get_user_meta( $hu_id[$id], 'adresse', true);
            // ${'user'.$id}['phone'] = get_user_meta( $hu_id[$id], 'tel', true); 
            ${'user'.$id}['order-number'] = $user_order_number;
                       
            
            $this->order_users_data['user'.$id] = ${'user'.$id};

        }       
       
    }

    private function set_products_data(){

        global $wpdb;  
        
        if($this->cart_users_data != NULL){ // S'il y a des utilisateurs qui ont un panier :
            

            for($index = 0; $index < count($this->cart_users_data); $index ++){ // Pour chaque utilisateur possédant un panier :
            
                $p_id = $wpdb->get_col($wpdb->prepare( "SELECT creation_id FROM chroma_cart_data WHERE user_id='%d'", $this->cart_users_data['user'.$index]['id'])); // Je récupère tout les ID de ses produits dans sont panier.

                /**
                 * Comme $wpdb->get_col retourne un tableau,
                 * je le récupère dans $p_id. Ensuite, je 
                 * prends chacune de ses valeurs et les place 
                 * dans $product_id. Comma ça, j'ai bien un
                 * simple tableau indexé et non pas un tableau
                 * de tableau
                 */

                foreach($p_id as $id){ $products_id[] = $id; }
                
            }        

            for($index=0; $index < count($products_id); $index++){ // Pour chaque produit, je récupère ses infos et les regroupe dans $this-> cart_products_data.
                
                $id = $products_id[$index]; // Je set l'ID courant sur $id.       
            
                $data_product = $wpdb->get_var($wpdb->prepare( "SELECT post_title  FROM chroma_posts WHERE id='%d'", $id));         

                ${'prod'.$index}['id'] = $id;
                ${'prod'.$index}['price'] = get_post_meta( $id, 'prix', true);                
                ${'prod'.$index}['title'] = $data_product;

                $this->cart_products_data['product'.$index] = ${'prod'.$index};  

            }        

        }

        if($this->order_users_data != NULL){ // S'il y a des utilisateurs qui ont passé une commande :           

            for($index = 0; $index < count($this->order_users_data); $index ++){ // Je mets l'ID de leur produits dans un tableau              
                $p_id = $this->order_users_data['user'.$index]['order-history'];      
                
            }   

            //var_dump($p_id);
            
            foreach($p_id as $array_id){

                // var_dump($array_id);

                foreach($array_id as $id){

                    $products_id[]= $id;

                }

            }

            //var_dump($products_id);


            if($products_id != NULL){ // Je vérifie que $product_id est non_null

                foreach($products_id as $id){ // Pour chaque id, je set ses infos.                  
                                            
                    $data_product = $wpdb->get_var($wpdb->prepare( "SELECT post_title  FROM chroma_posts WHERE id='%d'", $id));                       

                    ${'prod'.$id}['id'] = $id;                   
                    ${'prod'.$id}['title'] = $data_product;
                    ${'prod'.$id}['price'] = get_post_meta( $id, 'prix', true);                
                    $this->order_products_data['product'.$id] = ${'prod'.$id}; 
                  
                }   
                
            }

        }

    }

    private function set_orders_data(){

        global $wpdb;     
        
        $cart_id = $wpdb->get_col("SELECT id FROM chroma_cart_data"); 

        for($index=0; $index < count($cart_id); $index++){
            
            $id = $cart_id[$index];
           
            $dataProduct = $wpdb->get_row($wpdb->prepare( "SELECT * FROM chroma_cart_data WHERE id='%d'", $id), ARRAY_A );

            ${'cart'.$index}['id'] = $dataProduct['id'];
            ${'cart'.$index}['product-id'] = $dataProduct['creation_id'];   
            ${'cart'.$index}['user-id'] = $dataProduct['user_id'];
            // ${'cart'.$index}['status'] =  get_post_meta( $id, 'status', true); 
            // ${'cart'.$index}['time-cart'] =  get_post_meta( $id, 'time_cart', true);              

            $this->cart_data['cart'.$index] = ${'cart'.$index};

        }  

        $order_id = $wpdb->get_col("SELECT id FROM chroma_order_data"); // récupère les id des commandes

        for($index=0; $index < count($order_id); $index++){ // tant qu'il y a des commandes
            
            $id = $order_id[$index];   // id des commandes net        

            $dataProduct = $wpdb->get_row($wpdb->prepare( "SELECT * FROM chroma_order_data WHERE id='%d'", $id), ARRAY_A ); // on récupère chaque commande

            

            ${'order'.$index}['id'] = $dataProduct['id'];
            ${'order'.$index}['product-id'] = unserialize($dataProduct['products_id']);   
            ${'order'.$index}['user-id'] = $dataProduct['user_id'];
            ${'order'.$index}['status'] = $dataProduct['status']; 
            // ${'order'.$index}['status'] =  get_post_meta( $id, 'status', true); 
            // ${'order'.$index}['time-order'] =  get_post_meta( $id, 'time_order', true);              

            $this->orders_data['order'.$index] = ${'order'.$index};

        }  

    }


    private function set_history_order_data(){ //récupère les données en tables et les range dans la variable $this->orders_data

        global $wpdb;       

        $order_id = $wpdb->get_col("SELECT id FROM chroma_order_data"); 

        for($index=0; $index < count($order_id); $index++){
            
            $id = $order_id[$index];
           
            $order_item = $wpdb->get_row($wpdb->prepare( "SELECT * FROM chroma_order_data WHERE id='%d'", $id), ARRAY_A );

            ${'order'.$index}['id'] = $order_item['id'];
            ${'order'.$index}['user-id'] = $order_item['user_id'];          
            ${'order'.$index}['status'] = $order_item['status'];
            ${'order'.$index}['products-id'] = $order_item['products_id'];                  
            

            $this->orders_data['order'.$index] = ${'order'.$index};

        }  
    
    } 
    
    public static function update_order($arg){       
        
        global $wpdb;

        $action = $arg[0];
        
        switch ($action) {
            
            case 'validate-order':    

            $order_number = get_user_meta( $arg[1], 'order_number', true); // On récupère le nombre de commande de l'utilisateur courant
            $old_order_number = intval($order_number);  // On transforme la chaîne de caractère en nombre
            $new_order_number = $old_order_number + 1;  // On l'incrémente 
            
            $new_order_historyII = $wpdb->get_col($wpdb->prepare( "SELECT creation_id FROM chroma_cart_data WHERE user_id='%d'", $arg[1])); 

            // var_dump($new_order_historyII);

            $new_order_history = [];
            
            foreach($new_order_historyII as $plop){  
                
                // var_dump($plop);
                
                $new_order_history[] = $plop;
                
            }       
            
            $new_order_historyI = serialize($new_order_history);
            // var_dump($new_order_historyI);
            
            update_user_meta( $arg[1], 'order_number', $new_order_number ); 
            add_user_meta( $arg[1], 'order'.$new_order_number, $new_order_historyI );  
            
            break;
            
            
            case 'set-data-order':   
            
            $user_data = $arg[1];
            
            for($user_id = 0; $user_id < count($user_data ); $user_id++){ //Pour chaque index de arg . Pour tous les utilsateurs ayant passé commande :
                
                $h_user_id = $user_data['user'.$user_id]['id']; // Prends la valeur de l'id l'utilisateur en cours




                $user_order_number = intval($wpdb->get_var($wpdb->prepare( "SELECT meta_value  FROM chroma_usermeta WHERE meta_key='%s' AND user_id='%d'", 'order_number',  $h_user_id)));
                if($user_order_number >0){
    
                    for($number_order = 1; $number_order <= $user_order_number; $number_order ++){

                        

                    }    
    
                }else{ $orders_id = NULL;}   

                
                $orders_id = $user_data['user'.$user_id]['order-history']; // Récupère id des produits des commande user dans les meta  

                
                foreach($orders_id as $id){
                    
                    $orders_id = $id;
                    
                }

                // var_dump($orders_id);

                
                $orders_id = serialize($orders_id);
                
                $order_data_id_product =$wpdb->get_col(( "SELECT products_id FROM chroma_order_data"));
                
                $compt = 0;                    
                
                for($number = 0; $number < count($order_data_id_product); $number++){  
                    
                    $id_products = $order_data_id_product[$number];
                    
                    if($id_products ==  $orders_id ){
                        
                        $compt ++ ;
                        
                    }
                    
                }                    
                
                if($compt == 0){                        
                    
                    $wpdb->insert( 'chroma_order_data', 
                    [
                        'user_id' => $h_user_id,   
                        'products_id' => $orders_id,                
                        ]
                    );
                    
                }                                        
                
            }   

            break;

            case 'update-order':            

            $wpdb->update(
                
                'chroma_order_data',
                ['status' => $arg[2]],
                ['id' => $arg[1]]

            );
            
            break;
            
        }   
        
    }      
       
        
        public static function delete_order($arg){
            
            global $wpdb;
            
            $action = $arg[0];
            
            switch ($action) {
                
                case 'delete-product':
                $wpdb->delete( 'chroma_cart_data', ['id'=> $arg[1]]);         
                break;
                
                case 'delete-order':
                $wpdb->delete( 'chroma_cart_data', ['user_id'=> $arg[1]]);         
                break;        
                
            }      
       
        }
        
        public function get_orders_data(){  
            
            return $this->orders_data;
    
        }  
        
        public function get_order($number , $prop){    
            
            return $this->orders_data['order'.$number][$prop];
            
        } 
        
        public function get_order_users_data(){  
            
            return $this->order_users_data;
            
        }  
        
        public function get_order_user($number , $prop){    
            
            return $this->order_users_data['user'.$number][$prop];
            
        }
    
        public function get_order_products_data(){  
            
            return $this->order_products_data;
            
        }  
        
        public function get_order_product($user_id , $product_id, $prop){    
            
            return $this->order_products_data['product'.$product_id][$prop];
            
        }
    
        public function get_cart_data(){  
            
            return $this->cart_data;
            
        }  
        
        public function get_cart($number , $prop){    
            
            return $this->cart_data['cart'.$number][$prop];
            
        }
    
        public function get_cart_users_data(){  
            
            return $this->cart_users_data;
            
        }  
        
        public function get_cart_user($number , $prop){    
            
            return $this->cart_users_data['user'.$number][$prop];
            
        }
    
        public function get_cart_products_data(){  
            
            return $this->cart_products_data;
            
        }  
        
        public function get_cart_product($number , $prop){    
            
            return $this->cart_products_data['product'.$number][$prop];
            
        }   
                
    }