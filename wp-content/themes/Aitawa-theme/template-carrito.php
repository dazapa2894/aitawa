<?php
/*Template Name: Carrito */
get_header(); ?>

<main>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container-new">
      <section class="big-title">
        <h1>
          <?php the_title(); ?>
        </h1>
        <div class="mini-divider-center bot-margin-80"></div>
      </section>

      <?php the_content();
      endwhile; else : ?>
      <article>
        <p>Lo sentimos, no se encontró esta página.</p>
      </article>
  </div><!-- end container -->
  <?php endif; ?>
</main>

<?php get_footer(); ?>
