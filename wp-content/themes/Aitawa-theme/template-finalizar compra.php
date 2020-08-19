<?php
/*Template Name: Finalizar compra */
get_header(); ?>

<main>

  <div class="container-new">

    <section class="big-title">
      <h1>
        Finalizar Compra
      </h1>
      <div class="mini-divider-center bot-margin-80"></div>
    </section>

    <?php if (have_posts()) : while (have_posts()) : the_post();
        the_content();
      endwhile;
    else : ?>
      <article>
        <p>Lo sentimos, no se encontró este post.</p>
      </article>
    <?php endif; ?>
  </div><!-- end container -->
</main>

<?php get_footer(); ?>