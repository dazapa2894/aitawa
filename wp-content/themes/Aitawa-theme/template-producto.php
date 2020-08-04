<?php
/*Template Name: Producto */
get_header(); ?>

<main>
    <!-- Verifica si hay post disponibles -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <section id="product-image">
                <div class="home-slide-info">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <p>
                        El cloruro de Magnesio aporta muchos beneficios en salud y belleza. Descubre con Aitawa como aprovechar este milagro de la naturaleza en tu vida.
                    </p>
                </div>
            </section>

            <section class="product-content">
                <?php the_content(); ?>
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