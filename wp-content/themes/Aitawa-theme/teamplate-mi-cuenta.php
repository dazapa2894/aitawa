<?php
/*Template Name: Mi cuenta */
get_header(); ?>

<div class="header-imagen"></div>

<main class="mi-cuenta">
  <div class="container-new">
    <div class="row">
      <div class="col xs12 s12 m12 l12 xl12">
        <h1 class="big-title">
          Mi cuenta
        </h1>
        <div class="mini-divider-center"></div>
      </div><!-- end col -->
    </div><!-- end row -->

    <div class="row mi-cuenta-info">
      <div class="col xs12 s12 m12 l12 xl12">
        <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>

         <section id="que-es-aitawa-imagen" style="background-image: url('<?php
                                                                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                                                                    the_post_thumbnail_url();
                                                                                }
                                                                                ?>');">


                <div class="page-slide-info">
                    <div class="green-cuadro">
                        <img src="" alt="">
                    </div>
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <p>
                        El cloruro de Magnesio aporta muchos beneficios en salud y belleza. Descubre con Aitawa como aprovechar este milagro de la naturaleza en tu vida.
                    </p>
                </div>
            </section>

            <?php 
            the_content();
          endwhile;
        else : ?>
          <article>
            <p>Lo sentimos, no se encontró este post.</p>
          </article>
        <?php endif; ?>
      </div><!-- end col -->
    </div><!-- end row -->

  </div><!-- end container -->
</main>

<?php get_footer(); ?>