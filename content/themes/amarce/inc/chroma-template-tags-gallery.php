<?php

// Fonction qui récupere le prix pour commencer pépouze
function get_price($post_id)
{
  
  if (get_post_meta($post_id , 'prix', true) == true) {
    
    return '<p> Le prix est de '. get_post_meta($post_id, 'prix', true) . ' € .</p>';
    
  } else  {
    return '';
    
  }
}

// Fonction qui récupere le statu de vente de l'oeuvre
function get_statu($post_id)
{
  return get_post_meta($post_id, 'statut', true);
}


// Fonction qui récupere le statu de téléchargement de l'oeuvre
function get_download_statu($post_id)
{
  return get_post_meta($post_id, 'statut_de_telechargement', true);
}


// Fonction qui récupere les types de la creation (exemple: dessin, photoshop, poterie...)
function get_creation_types($post_id)
{
  $output = '';
  $array_types = wp_get_post_terms($post_id, 'type');
  if (is_array($array_types)) {
    foreach ($array_types as $type) {
      $output .= '<p class="gallery-info-type__text">';
      $output .= $type->name;
      $output .= ' / </p>';
    }
  }
  return $output;
}

