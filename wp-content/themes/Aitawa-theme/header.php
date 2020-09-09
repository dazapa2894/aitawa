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

    <section id="nav-bar-mobile">
      <div class="content_mobile">
        <a href="http://www.localhost/team/aitawa" class="nav-logo logo-area">
          <img src="<?php echo $url_theme ?>/assets/img/aitawa-logo.svg" alt="Aitawa logo" />
        </a>
        <div class="container-btn boton-area">
          <a id="menu_mobile" class="menu nav-btn">
            <img src="<?php echo $url_theme ?>/assets/img/menu-verde.svg" alt="Menu">
            <p>Menu</p>
          </a>
        </div>
        <div class="nav-menu links-area">
          <?php wp_nav_menu(array(
            'menu_class' => 'page_item',
            'menu_id' => 'menu',
            'container' => 'ul',
            'theme_location' => 'header-menu',
          )); ?>
        </div>
      </div>
    </section>

    <section id="nav-bar" class="max-menu">
      <div class="content_min">
        <div class="content_wrapper">
          <div class="container-btn boton-area">
            <a id="menu_min" class="menu nav-btn">
              <img src="<?php echo $url_theme ?>/assets/img/menu.svg" alt="Menu">
              <p>Menu</p>
            </a>
          </div>
          <div class="social-wrapper redes-area">
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/whatsapp-icon.svg" alt="">
            </a>
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/facebook-icon.svg" alt="">
            </a>
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/instagram-icon.svg" alt="">
            </a>
          </div>
        </div>
      </div>

      <div class="content_max">
        <div class="content_wrapper">
          <div class="social-wrapper redes-area">
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/whatsapp-icon.svg" alt="">
            </a>
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/facebook-icon.svg" alt="">
            </a>
            <a href="">
              <img src="<?php echo $url_theme ?>/assets/img/instagram-icon.svg" alt="">
            </a>
          </div>

          <a href="http://www.localhost/team/aitawa" class="nav-logo logo-area">
            <img src="<?php echo $url_theme ?>/assets/img/aitawa-logo.svg" alt="Aitawa logo" />
          </a>

          <div class="nav-menu links-area">
            <?php wp_nav_menu(array(
              'menu_class' => 'page_item',
              'menu_id' => 'menu',
              'container' => 'ul',
              'theme_location' => 'header-menu',
            )); ?>
          </div>

          <div class="container-btn boton-area">
            <a href="" class="candado nav-btn">
              <img src="<?php echo $url_theme ?>/assets/img/candado.png" alt="Candado">
              <p>Regístrate</p>
            </a>
          </div>
        </div>
      </div>
    </section>

  </header>