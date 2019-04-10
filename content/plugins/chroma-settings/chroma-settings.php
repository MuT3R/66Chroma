<?php
/*
Plugin Name: 66 Chroma Settings
Description: Réglages pour le thème Chroma: Custom Post Type, 
Author: Kevin, Matthieu, Nicolas
Version: 1.0.0
*/

// Secu du plugin
if (!defined('WPINC')) {die();}

require plugin_dir_path(__FILE__) . 'inc/news_cpt.php';
require plugin_dir_path(__FILE__) . 'inc/gallery_cpt.php';
require plugin_dir_path(__FILE__) . 'inc/portfolio_cpt.php';
require plugin_dir_path(__FILE__) . 'inc/admin-interface.php';
require plugin_dir_path(__FILE__) . 'inc/dashboard.php';



// CPT News

$news_cpt =  new News_cpt();
register_activation_hook(__FILE__, [$news_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$news_cpt, 'deactivation']);

// CPT Gallery

$gallery_cpt =  new Gallery_cpt();
register_activation_hook(__FILE__, [$gallery_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$gallery_cpt, 'deactivation']);

// CPT Portfolio

$portfolio_cpt =  new Portfolio_cpt();
register_activation_hook(__FILE__, [$portfolio_cpt, 'activation']);
register_deactivation_hook(__FILE__, [$portfolio_cpt, 'deactivation']);

