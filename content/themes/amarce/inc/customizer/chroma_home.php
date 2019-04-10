<?php

function chroma_home($wp_customize)
{
  // Description du site , changable par l'utilisateur
  $wp_customize->add_setting(
    'chroma_description', 
    [
      'default' => "Nous sommes une équipe d'artistes indépendants. À travers ce site nous vous partageons notre univers, nos envies et nos idées. Nous vous souhaitons une bonne visite."
    ]
  );
  $wp_customize->add_control(
    // Quel type de champ ? celui qui va être déclaré
    'chroma_description',
    [
      'type' => 'textarea',
      'section' => 'chroma_home',
      'label' => 'Entrer votre déscription',
    ]
  );

  // Réglages du nombres d'articles de type news.
  $wp_customize->add_setting(
    'chroma_news_nbr_articles',
    [
      'default' => 8
    ]
  );
  $wp_customize->add_control(
    'chroma_news_nbr_articles',
    [
      'type' => 'number',
      'section' => 'chroma_home',
      'label' => 'Nombre de news',
      'input_attrs' => [
        'min' => 0,
        'max' => 6,
        'step' => 2
      ]
    ]
  );
}
