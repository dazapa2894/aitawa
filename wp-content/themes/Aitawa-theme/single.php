<!-- Plantilla para las entradas de Blog -->

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <section class="post-header crop-padre">
        <?php the_post_thumbnail('large'); ?>
      </section>

      <section class="inner-post">
        <div class="container-new">

          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="post-info">
            <p>
              Por <?php the_author(); ?> |

              <?php the_date(); ?> |

              <?php global $post;
              $postcat = get_the_category($post->ID);
              // try print_r($postcat) ;
              if (!empty($postcat)) {
                echo esc_html($postcat[0]->name);
              } ?> |

              comentarios <?php comments_number('0', '1', '%'); ?>

            </p>
          </div>

          <div class="the-content">
            <?php the_content(); ?>
          </div>


          <div class="row paginacion">
            <div class="col xs6 s6 m6 l6 xl6 no-padding">
              <div class="prev-post">
                <?php previous_post_link('<div class="prev">%link</div>', '<i class="fas fa-long-arrow-alt-left"></i> Artículo anterior', false); ?>
              </div>
            </div>
            <div class="col xs6 s6 m6 l6 xl6 no-padding">
              <div class="next-post right">
                <?php next_post_link('<div class="next">%link</div>', 'Artículo siguiente <i class="fas fa-long-arrow-alt-right"></i>', false); ?>
              </div>
            </div>
          </div>

        </div><!-- end container -->
      </section><!-- end inner-post -->

      <section class="comment-blog">
        <div class="container-new">
          <?php comments_template() ?>
        </div>
      </section>


      <!-- <div class="col xs12 s12 m12 l3 xl3">
        <!-- Se pone el widget del sidebar ->
        <?php //get_sidebar(); ?>
      </div><!-- end col -->


    <?php endwhile;
  else : ?>
    <article>
      <p>Lo siento, no se encontró este post.</p>
    </article>

  <?php endif; ?>
</main>

<?php get_footer(); ?>