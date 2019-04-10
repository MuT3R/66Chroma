<?php

function chroma_general($wp_customize)
{
  $wp_customize->add_setting(
    'chroma_footer_active',
    [
      'default' => 'enabled'
    ]
  ); 

  
  $wp_customize->add_control(
    'chroma_footer_active',
    [
      'type' => 'radio',
      'section' => 'chroma_general',
      'label' => 'Afficher / masquer le pied de page',
      'choices' => [
        'enabled' => 'Activer',
        'disabled' => 'Désactiver'
      ]
    ]
  );

  
}