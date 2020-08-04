<!-- Plantilla de comentarios del blog -->

<?php if ( have_comments() ) : ?>
  <div class="the-comments">
    <!-- Traer los comentarios -->
    <h3>Comentarios <?php comments_number( '0', '1', '%' ); ?></h3>
    <?php
    $args = array(
      'number' => '5',
      'post_id' => $post->ID
    );  ?>

    <ul class="comment-list">
  		<?php wp_list_comments('callback=custom_comments'); ?>
  	</ul>

  </div>
<?php endif; ?>

<div class="comment-formulario">
  <?php
  $comments_args = array(
    // Change the title of send button
    'label_submit' => __( 'Enviar', 'textdomain' ),
    // Change the title of the reply section
    'title_reply' => __( 'Deja un comentario', 'textdomain' ),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="comment-form-comment">
    <label for="comment">' . _x( 'Comentario', 'noun' ) . '</label><br />
    <textarea id="comment" name="comment" aria-required="true" placeholder="Escribe aquí..."></textarea>
    </p>',
  );
  comment_form( $comments_args );
  ?>
</div>
