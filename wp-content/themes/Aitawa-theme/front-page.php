<!-- Plantilla para home -->

<?php get_header(); ?>


<main>

  <section id="top-bar">
    <div class="row no-margin">
      <div class="col xs12 s12 m12 l6 xl6">
        <p>
          Esta es una notificación del sitio web importante para usted, <a href="#">CLICK AQUÍ</a>.
        </p>
      </div><!-- end col -->
      <div class="col xs12 s12 m12 l6 xl6">
        <div class="close-alert"> <i class="material-icons">close</i></div>
      </div>
    </div><!-- end row -->
  </section>


  <section id="top-slider">
    <div class="home-slider">

      <?php
      $slides_counter = 1;
      while (get_field('imagen_de_fondo_' . $slides_counter) != NULL) :
      ?>

        <div class="home-slide" style="background-image: url('<?php echo get_field('imagen_de_fondo_' . $slides_counter); ?>')">

          <!-- <div class="home-mobile-slide-img crop-padre">
            <img src="<?php echo get_field('imagen_de_fondo_mobile_' . $slides_counter); ?>" alt="" />
          </div>-->

          <div class="home-slide-info">
            <h2>
              <?php echo get_field('titulo_slide_' . $slides_counter); ?>
            </h2>
            <p>
              <?php echo get_field('descripcion_de_slide_' . $slides_counter); ?>
            </p>
          </div>

        </div><!-- end home slide -->
      <?php
        $slides_counter++;
      endwhile;
      ?>

    </div><!-- end home slider -->
  </section>

  <section id="home-nuestros-productos">

    <div class="row">
      <div class="col xs12 s12 m12 l10 xl10 offset-l2 offset-xl2">
        <div class="big-title">
          <h2>Nuestros productos</h2>
        </div><!-- end big title -->
      </div>
    </div>

    <div class="products-wrapper">

      <?php
      $args = array('post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'producto', 'orderby' => 'post_date');
      $loop = new WP_Query($args);
      while ($loop->have_posts()) : $loop->the_post();
        global $product; ?>

        <a class="product-wrap" href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
          <div class="product-image">
            <?php if (has_post_thumbnail($loop->post->ID))
              echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
            else
              echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="' . the_title() . '" />'; ?>
          </div>
          <div class="product-info">
            <h3> <?php the_title(); ?></h3>
            <p>
              <?php the_excerpt(); ?>
            </p>
          </div>
        </a><!-- end product-wrap -->

      <?php endwhile; ?>
      <?php wp_reset_query(); ?>

    </div><!-- end products-wrapper -->
  </section>

  <section id="home-blogs">

    <div class="row">
      <div class="col xs12 s12 m12 l10 xl10 offset-l2 offset-xl2">
        <div class="big-title">
          <h2>Novedades para descubrir</h2>
        </div><!-- end big title -->
      </div>
    </div>

    <div class="blogs-area">

      <?php
      // General arguments
      $args = array(
        'post_type' => 'post', // Default or custom post type
        'posts_per_page' => 12, // Max number of posts per page
        //'category__not_in' => array(5, 6, 7, 10, 11), //Se excluye la categoría Calendario y sliders
        //'category_name' => 'My category', // Your category (optional)
        //'paged' => $current_page,
      );

      $posts = new WP_Query($args);

      // Content display
      if ($posts->have_posts()) : ?>


        <?php while ($posts->have_posts()) : $posts->the_post(); ?>

          <div class="blogs-wrapper">

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="blog-wrap">

              <div class="blog-image crop-padre">
                <?php the_post_thumbnail('large'); ?>
              </div>

              <div class="blog-info">
                <div class="image-behind"></div>
                <div class="blog-title">
                  <h2><?php the_title(); ?></h2>
                </div>
                <?php the_excerpt(); ?>
              </div>
              <img class="bolg-dot" src="<?php echo $url_theme ?>assets/img/dot.svg" alt="DOT" />

            </a><!-- end blog-wrap -->

          </div><!-- end blogs-wrapper -->

        <?php endwhile; ?>

      <?php endif;

      wp_reset_query();
      ?>
    </div><!-- end blogs-area -->
  </section>

</main>

<?php get_footer(); ?>