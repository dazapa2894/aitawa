<!-- Plantilla predeterminada si no existen page.php o single.php -->

<?php get_header(); ?>

<main>

  <section class="container-new">
    <div class="row">

      <div class="col xs12 s12 m12 l9 xl9">
        <!-- Verifica si hay post disponibles -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <!-- Empieza el loop del post -->
          <article class="article-loop">
            <header>
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              By: <?php the_author(); ?>
            </header>
            <?php the_excerpt(); ?>
          </article>

        <?php endwhile; else : ?>

          <!-- Lo que se muestra si no hay posts -->
          <article>
            <p>Lo siento, no hay post disponibles :(</p>
          </article>

        <?php endif; ?>
      </div><!-- end col -->

      <!--<div class="col xs12 s12 m12 l3 xl3">
        <!-- Se pone el widget del sidebar ->
        <?php get_sidebar(); ?>
      </div><!-- end col -->

    </div><!-- end row -->
  </section>

</main>

<?php get_footer(); ?>
