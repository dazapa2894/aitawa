<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS()
{
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

function isotope_layoout_with_fit_columns()
{
    wp_register_script('isotope-layouts', get_template_directory_uri() . '/assets/lib/isotope/isotope-layout/dist/isotope.pkgd.min.js');
 
    wp_enqueue_script( 'isotope-fit-columns', get_template_directory_uri() . '/assets/lib/isotope/isotope-fit-columns/fit-columns.js', array( 'isotope-layouts' ) );
}
add_action( 'wp_enqueue_scripts', 'isotope_layoout_with_fit_columns' );


//Registrar hoja de javascript al tema
function myscript_scripts_with_jquery()
{
  // Register the script like this for a theme:
  wp_register_script('myscript', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), true);
  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script('myscript');
}
add_action('wp_enqueue_scripts', 'myscript_scripts_with_jquery');


// Register a new sidebar simply named 'sidebar'
function add_widget_Support()
{
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="sidebar-pc">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => 'Sidebar mobile',
    'id' => 'sidebar-mobile',
    'before_widget' => '<div class="sidebar-mobile"',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));
}


// Hook the widget initiation and run our function
add_action('widgets_init', 'add_Widget_Support');


// Register a new navigation menu
function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'header-menu-mobile' => __('Header Menu mobile'),
      'footer-menu-1' => __('Footer Menu 1'),
      'footer-menu-2' => __('Footer Menu 2')
    )
  );
}
add_action('init', 'register_my_menus');

// Permitirle al tema de tener una imagen destacada
add_theme_support('post-thumbnails');

//Comentarios personalizados
function custom_comments($comment, $args, $depth)
{
  $GLOBALS[' comment '] = $comment; ?>

  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

    <div id="comment-<?php comment_ID(); ?>">
    <?php
    echo '    <div class="comment-info">';
    echo '      <div class="el-autor">';
    printf(__('<cite_class="fn">%s</cite>'), get_comment_author_link());
    echo '      </div><!-- end el-autor -->';

    echo '      <div class="separador"> el </div>';

    echo '      <div class="fecha">';
    printf(__('%1$s '), get_comment_date('j F Y'), '');
    echo '      </div><!-- end fecha -->';

    echo '      <div class="separador"> a las </div>';

    echo '      <div class="hora">  ';
    comment_time('H:i:s');
    echo '      </div><!-- end hora -->';

    echo '      <div class="comment-meta commentmetadata right">';
    edit_comment_link(__('<i class="fas fa-pencil-alt"></i> Editar '), '   ', ' ');
    echo '      </div><!-- end comment-meta -->';
    echo '    </div><!-- end comment info -->';

    if ($comment->comment_approved == '0') :
      echo '      <div>';
      _e('Tu comentario está esperando aprobación.');
      echo '      </div>';
    endif;

    echo '    <div class="comentario">';
    comment_text();
    echo '    </div><!-- end comentario -->';

    echo '    <div class="reply">';
    comment_reply_link(array_merge(
      $args,
      array(
        'depth' => $depth,
        'max_depth' => $args['max_depth'],
        'reply_text' => '<i class="fa fa-comments" aria-hidden="true"></i> Responder'
      )
    ));
    echo '    </div><!-- end reply -->';

    echo '    <div class="separador-comentario"></div>';
    echo '  </div>';
    echo '</li>';
}

function add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );

//Remove action woocmmerce template
remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_before_single_product_summary', 'show_product_images_slider', 20);
function show_product_images_slider()
{
  
  global $product;


  $html  = '<div id="product-slider-wrapper">';
  $html  .=   '<div class="product-slider">';

// $html .=   '<div><img src="' . wp_get_attachment_url($product->get_image_id()) . '" /></div>';
  
  $html .=   '<div class="product-slide" style="background-image: url('. wp_get_attachment_url($product->get_image_id()) .')">';
  $html .=   '</div><!-- end home slide -->';
  
  foreach ($product->get_gallery_image_ids() as $key => $value) {
    $html .=   '<div class="product-slide" style="background-image: url(' . wp_get_attachment_url($value) . ')">';
    $html .=   '</div><!-- end home slide -->';
  }

  $html .=   '</div>'; //slider

  $html .=   '<div class="product-slide-info">'; 
  $html .=     '<h2>';
  $html .=       $product->get_name();
  $html .=     '</h2>';
  $html .=     '<p>';
  $html .=       get_field('descripcion_del_slider');
  $html .=     '</p>';
  $html .=     '<div class="prev"></div>';
  $html .=     '<div class="next"></div>';

  $html .=   '</div>';

  $html .= '</div>'; //wrapper

  echo $html;
} 

?>