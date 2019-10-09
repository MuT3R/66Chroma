<?php

// Fonction qui fait le lien entre le plugins et sont css
function chroma_load_custom_contest_css()
{
  wp_enqueue_style (
    'chroma_contest_css',
    // Direction des css du backoffice
    plugin_dir_url(__DIR__) . 'css/contest.css'
  );
}

add_action ('admin_enqueue_scripts', 'chroma_load_custom_contest_css');



// Remove des section d'help dans le back office
// function wpo_remove_help ($old_help, $screen_id, $screen) {
//   $screen->remove_help_tabs();
//   return $old_help;
// }

// add_filter( 'contextual_help', 'wpo_remove_help', 999, 3 );

// add_filter('screen_options_show_screen', '__return_false');
