<?php

function chroma_add_dahsboard_widgets()
{
  wp_add_dashboard_widget(
    'Chroma_dashboard_widget', // Identifiant
    'Chroma Production', // Titre
    'chroma_dashboard_function' // Callback
  );
}

function chroma_dashboard_function()
{
  ?>
  <p>Merci de passer par notre site, bonne visite.</p>
  <?php
}

add_action('wp_dashboard_setup', 'chroma_add_dahsboard_widgets');


// Remove rest of all meta_box
function remove_dashboard_meta() {
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  // remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}

add_action('wp_dashboard_setup', 'remove_dashboard_meta');

remove_action('welcome_panel', 'wp_welcome_panel');