<?php
/*
Plugin Name: 66 Chroma Contest Settings
Description: Réglages des concours pour le thème Chroma: Custom Post Type, 
Author: Kevin, Matthieu, Nicolas
Version: 1.0.0
*/

// Secu du plugin
if (!defined('WPINC')) {die();}


require plugin_dir_path(__FILE__) .'classes/Contest.php';
$Contest =  new Contest;

