<div class="container-new">
  <a href="" class="candado">
    <img src="<?php echo $url_theme ?>wp-content/themes/Aitawa-theme/assets/img/candado.png" alt="Candado">
    <p>Regístrate y elige mejor versión</p>
  </a>
</div>

<footer>
  <div class="container">

    <div class="net-wrapper">
      <a href="">
        <img src="<?php echo $url_theme ?>wp-content/themes/Aitawa-theme/assets/img/whatsapp-icon.svg" alt="">
      </a>
      <a href="">
        <img src="<?php echo $url_theme ?>wp-content/themes/Aitawa-theme/assets/img/facebook-icon.svg" alt="">
      </a>
      <a href="">
        <img src="<?php echo $url_theme ?>wp-content/themes/Aitawa-theme/assets/img/instagram-icon.svg" alt="">
      </a>
    </div>

    <div class="footer-logo">
      <img src="<?php echo $url_theme ?>wp-content/themes/Aitawa-theme/assets/img/aitawa-logo.svg" alt="Aitawa logo" />
    </div>

    <div class="row">
      <div class="col xs12 s6 m6 l6 xl6 hcenter">
        <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu-1',
        )); ?>
      </div><!-- end col -->
      <div class="col xs12 s6 m6 l6 xl6 hcenter">
        <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu-2',
        )); ?>
      </div><!-- end col -->
    </div><!-- end row -->

    <p class="copyright">
      Todos los Derechos Reservados - <a href="">www.aitawalife.com</a> - 2020 - <a href="">Política de Tratamiento de Datos</a> - Desarrollado por Enfoque Interactive
    </p>

  </div><!-- end conatiner -->


</footer>

<?php wp_footer(); ?>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>