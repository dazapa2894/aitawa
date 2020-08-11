<!-- Plantilla predeterminada si no existen page.php o single.php -->

<?php get_header(); ?>

<main>

  <section class="big-title">
    <h1>
      Blog
    </h1>
    <div class="mini-divider-center"></div>
  </section>
  <section id="home-blogs">

    <div class="blogs-area">
  
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
  
      $posts = new WP_Query($args);
  
      // Content display
      if ($posts->have_posts()) : ?>
  
        <!-- pagination -->
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
        <!-- End of the main loop -->
  
        <!-- pagination -->
        <div id="wp_pagination">
          <?php
          // Primer post
          //echo '<a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>';
  
          //post anterior
          echo '<a class="previous" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;PREV </a>';
  
          //lista de post
          for ($i = 1; $i <= $posts->max_num_pages; $i++) {
            echo '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
          }
  
          //post siguiente
          echo '<a class="next" href="' . get_pagenum_link(($curpage + 1 <= $posts->max_num_pages ? $curpage + 1 : $posts->max_num_pages)) . '"> SIG&rsaquo;</a>';
  
          // Ultimo post
          //echo '<a class="last page button" href="'.get_pagenum_link($posts->max_num_pages).'">&raquo;</a>';
          ?>
        </div>
  
  
      <?php else : ?>
        <!-- Lo que se muestra si no hay posts -->
  
        <article>
          <p>Lo siento, no hay post disponibles :(</p>
        </article>
  
      <?php endif;
      wp_reset_query();  ?>
  
    </div>
  </section>

</main>

<?php get_footer(); ?>