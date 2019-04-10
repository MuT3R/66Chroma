<?php

function chroma_login_logo_url_title() {
  return '66 Chroma';
}
add_filter( 'login_headertitle', 'chroma_login_logo_url_title' );

function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/public/css/app.css' );
  wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/public/js/app.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

