<?php
/*
Plugin Name: 66 Chroma market gestion
Description: Gestion de la boutique
Author: Kevin, Matthieu, Nicolas
Version: 0.0.1
*/

// Secu du plugin
if (!defined('WPINC')) {die();}


require_once __DIR__."/classes/Boutique.php";
require_once __DIR__."/inc/market-interface.php";


$boutique = new Boutique();