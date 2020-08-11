<!-- Plantilla predeterminada si no existen page.php o single.php -->

<?php get_header(); ?>

<main>

  <section class="big-title">
    <h1>
      Blog
    </h1>
    <div class="mini-divider-center"></div>
  </section>

  <section class="container-new">

    <?php
    global $paged;
    $curpage = $paged ? $paged : 1;
    $args = array(
      'post_type' => 'post', // Default or custom post type
      'posts_per_page' => 3, // Max number of posts per page
      //'cat'=>5, //Pongo la categoría que quiero mostrar
      //'category_name' => 'My category', // Your category (optional)
      'paged' => $paged,
    );

    $query = new WP_Query($args);
    ?>
    <!-- Verifica si hay post disponibles -->

    <?php if ($query->have_posts()) : ?>

      <!-- pagination -->


      <!-- Start of the main loop. -->
      <?php
      $contador = 0;
      while ($query->have_posts()) : $query->the_post();
        $contador++;
      ?>

        <!-- Empieza el loop del post -->

        <a class="blog-loop" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <div class="row <?php if ($contador % 2 == 0) echo "reverse-blog"; ?>">
            <div class="col xs12 s12 m12 l6 xl6">
              <div class="blog-img crop-padre">
                <?php
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $no_img_url = 'http://localhost/team/hibox/wp-content/uploads/2020/01/logo-experiencia.jpg';
                if ($featured_img_url == '') {
                  echo '<img src="' . $no_img_url . '" alt="Hibox">';
                } else {
                  the_post_thumbnail('large');
                }
                ?>
              </div>
            </div><!-- end col -->

            <div class="col xs12 s12 m12 l6 xl6">

              <header>
                <h2>
                  <?php the_title(); ?>
                </h2>
              </header>

              <div class="post-info"><?php the_date(); ?> | <?php comments_number('0', '1', '%'); ?> Comentarios</div>

              <?php the_excerpt(); ?>

            </div><!-- end col -->
          </div><!-- end row -->
        </a>


      <?php endwhile; ?>
      <!-- End of the main loop -->

      <!-- pagination -->
      <div id="wp_pagination">
        <?php
        // Primer post
        //echo '<a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>';

        //post anterior
        echo '<a class="previous" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;PREV </a>';

        //lista de post
        for ($i = 1; $i <= $query->max_num_pages; $i++) {
          echo '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
        }

        //post siguiente
        echo '<a class="next" href="' . get_pagenum_link(($curpage + 1 <= $query->max_num_pages ? $curpage + 1 : $query->max_num_pages)) . '"> SIG&rsaquo;</a>';

        // Ultimo post
        //echo '<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>';
        ?>
      </div>


    <?php else : ?>
      <!-- Lo que se muestra si no hay posts -->

      <article>
        <p>Lo siento, no hay post disponibles :(</p>
      </article>

    <?php endif;
    wp_reset_query();  ?>

  </section>

</main>

<?php get_footer(); ?>