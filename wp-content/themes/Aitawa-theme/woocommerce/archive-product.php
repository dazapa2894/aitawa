<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>

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
			<!-- Titulo fuera del loop -->
			<?= post_type_archive_title('', false); ?>
		</h1>
		<p>
			<?php
			//Contenido fuera del loop
			$post_id = 85;
			$post_object = get_post($post_id);
			echo $post_object->post_content;

			?>
		</p>
	</div>
</section>

<section class="shop-catalogo">
	<div class="container-new">

		<?php
		if (woocommerce_product_loop()) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			$post_id = 6;
			$post = get_post($post_id, ARRAY_A);
			$content = $post['post_content'];
		?>

			<div class="row">

				<div class="col xs12 s12 m12 l12 xl12 hide-991-up">
					<?php get_sidebar('sidebar-mobile'); ?>
				</div><!-- end col -->

				<div class="col xs12 s12 m12 l12 xl12">
					<?php do_action('woocommerce_before_shop_loop'); ?>
				</div><!-- end col -->

				<div class="col xs12 s12 m12 l9 xl10 no-padding">
					<?php
					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							wc_get_template_part('content', 'product');
						}
					}

					woocommerce_product_loop_end();
					?>
				</div><!-- en col -->

				<!--<div class="col xs12 s12 m12 l3 xl2 hide-991-down">
					<?php //do_action('woocommerce_sidebar'); ?>
				</div><!- end col -->

			</div><!-- en row -->
	</div><!-- end container -->
</section>




<?php
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}

		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');

		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */


		get_footer('shop');
