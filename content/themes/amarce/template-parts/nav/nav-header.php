<?php


// <ul class="navbar-nav ">
//   <li><a href="#">Accueil</a></li>
//   <li><a href="#">A propos</a></li>
//   <li><a href="#">Portfolio</a></li>
//   <li><a href="#">News</a></li>
//   <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
// </ul>

$menu = wp_nav_menu([
  'theme_location' => 'menu_header',
  'echo'           => false,
  // 'container'      => 'div',
  // 'container_class'=> 'collapse navbar-collapse'
]);

$menu = strip_tags($menu, '<a><li><ul>');

echo $menu;