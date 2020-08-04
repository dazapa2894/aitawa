<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
global $url_theme;
$url_theme = esc_url(home_url('/')) . 'wp-content/themes/Aitawa-theme/'; ?>

<head>
  <title><?php bloginfo('name'); ?> » <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <meta charset="<?php bloginfo('charset'); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <!-- Hoja de estilos -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header>


  </header>