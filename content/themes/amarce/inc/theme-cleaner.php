<?php

// Supprime WP EMOJI
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_print_styles', 'print_emoji_styles');

// Supprime le lien vers Windows Live Editor Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

// Supprime le lien RSD + XML
remove_action( 'wp_head', 'rsd_link' ); 

// Supprime la meta generator
remove_action( 'wp_head', 'wp_generator' ); 

// Supprime les extra feed rss
remove_action( 'wp_head', 'feed_links_extra', 3 ); 

// Supprime les feeds des Posts et des Commentaires
remove_action( 'wp_head', 'feed_links', 2 ); 