<?php

// Fonction qui fait le lien entre le plugins et sont css

function chroma_load_custom_market_css()
{
  
  wp_enqueue_style (
    'chroma_market_css',
    plugin_dir_url(__DIR__) . '/css/market.css'
  );

  
  wp_enqueue_script (
    'chroma_market_js',
    plugin_dir_url(__DIR__) . '/js/market.js'
  );




}

add_action ('admin_enqueue_scripts', 'chroma_load_custom_market_css');




