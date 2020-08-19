<?php
/*Template Name: Pagina normal */
get_header(); ?>

<main>
    <!-- Verifica si hay post disponibles -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

            <section class="que-es-aitawa-content">
                <div class="container-new">
                    <?php the_content(); ?>
                </div>
            </section>

        <?php endwhile;
    else : ?>

        <!-- Lo que se muestra si no hay posts -->
        <article>
            <p>Lo siento, no hay post disponibles :(</p>
        </article>

    <?php endif; ?>
</main>

<?php get_footer(); ?>