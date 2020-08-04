<!-- Plantilla para home -->

<?php get_header(); ?>

<script>

jQuery(document).ready(function($){
  $(window).resize(function(e){
    $(".big-title").innerHTML = e;
  });
});

</script>

<main>
  <section id="top-slider">

  </section>

  <section id="home-nuestros-productos">

    <div class="big-title">
      <img src="<?php echo $url_theme ?>assets/img/dot.svg" alt="Dot" />
      <h2>Nuestros productos</h2>
    </div><!-- end big title -->

    <div class="products-wrapper">

      <div class="product-wrap">
        <div class="product-image">
          <img src="" alt="">
        </div>
        <div class="product-info">
          <h3>Aceite de coco</h3>
          <p>
            El cloruro de magnesio aporta muchos beneficios en salud y belleza
          </p>
        </div>
      </div><!-- end product-wrap -->

      <div class="product-wrap">
        <div class="product-image">
          <img src="" alt="">
        </div>
        <div class="product-info">
          <h3>Aceite de coco</h3>
          <p>
            El cloruro de magnesio aporta muchos beneficios en salud y belleza
          </p>
        </div>
      </div><!-- end product-wrap -->

    </div><!-- end products-wrapper -->
  </section>

  <section id="home-blogs">

    <div class="big-title">
      <img src="<?php echo $url_theme ?>assets/img/dot.svg" alt="Dot" />
      <h2>Nuestros productos</h2>
    </div><!-- end big title -->

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
      $noPost = 0;
      $totalForColumn = (wp_count_posts()->publish)/4;
      $numberForColumn = explode(".", strval($totalForColumn));
      $col4 = $numberForColumn[0];
      $noColumn = 1;
      $newColumn = false;

      if ($numberForColumn[1]) {
        $num1 = intval($numberForColumn[0]);
        $num2 = intval($numberForColumn[1]);
        switch ($num2) {
          
          case '75':
            $limit = $col1 = $col2 = $col3 = $num1+1;
          break;
          case '5':
            $limit = $col1 = $col2 = $num1+1;
            $col3 = $num1;
          break;
          case '25':
            $limit = $col1 = $num1+1;
            $col2 = $col3 = $num1;
          break;
          
          default:
            # code...
          break;
        }
      }else{
        $col1 = $col2 = $col3 = $limit = $numberForColumn[0];
      }

      // Content display
      if ($posts->have_posts()) : ?>

        <div class="blogs-wrapper blog1">

          <?php 
          while ($posts->have_posts()) : $posts->the_post(); 
          
          ?>
            <?php if ($noPost < $limit) :
              $newColumn = false;
            ?>
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
                <img class="bolg-dot" src="" alt="DOT" />

              </a><!-- end blog-wrap -->
            <?php else :
              $noPost = 0;
              $newColumn = true;
            endif;
            ?>
            <?php
            if ($newColumn) :

              $noColumn++; 

              switch ($noColumn) {
                case 2:
                  $limit = $col2;
                break;
                case 3:
                  $limit = $col3;
                break;
                case 4:
                  $limit = $col4;
                break;
                
                default:
                  # code...
                  break;
              }
            ?>

              </div><!-- end blogs-wrapper -->

              <div class="blogs-wrapper blog<?=$noColumn?>">

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
                  <img class="bolg-dot" src="" alt="DOT" />

                </a><!-- end blog-wrap -->

            <?php endif ?>
            <?php $noPost++; ?>
          <?php endwhile; ?>

        </div>

      <?php endif;

      wp_reset_query();
      ?>
    </div><!-- end blogs-area -->
  </section>

  <div class="container-new">
    <a href="" class="candado">
      <img src="<?php echo $url_theme ?>assets/img/candado.png" alt="Candado">
      <p>Regístrate y elige mejor versión</p>
    </a>
  </div>

</main>

<?php get_footer(); ?>