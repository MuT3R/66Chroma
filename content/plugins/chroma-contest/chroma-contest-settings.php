<?php
/*
Plugin Name: 66 Chroma Contest Settings
Description: Réglages des concours pour le thème Chroma: Custom Post Type, 
Author: Kevin, Matthieu, Nicolas
Version: 1.0.0
*/

// Je sécurise mon plugin via la condition.  Si il n'est pas définie dans mon core, alors arrête le script.
if (!defined('WPINC')) {die();}

// Je viens demander le chemin de mon objet.

require plugin_dir_path(__FILE__) .'classes/Contest.php';
require plugin_dir_path(__FILE__) . 'inc/contest_interface.php';

// J'instance mon nouvelle objet dans la variable $Contest.
$Contest =  new Contest;

