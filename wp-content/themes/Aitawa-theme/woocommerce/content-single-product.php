<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

	?>

	<section id="product-info-section" class="container-wide">
		<div class="titulo">
			<img src="<?= wp_get_attachment_url("103") ?>" alt="iconito">
			<h2> <?= get_field('subtitulo') ?> </h2>
		</div>

		<div class="row">
			<div class="col s7 ">

				<div class="text-content">
					<p>
						<?= get_field('texto') ?>
					</p>
				</div>

				<div class="frase">
					<h3> <?= get_field('frase') ?> </h3>
				</div>
				<pre>
				<?php //var_dump($product->get_attributes()); ?>
				</pre>
				<?php

				switch ($product->get_type()) {
					case 'simple':
				?>
						<div class="variaciones-simple">
							<?php

							$precio = $product->get_price();
							$tamano = $product->get_attribute('tamano');
							?>
							<div class="variacion">
								<div class="item col s4">
									<div id="opcion">
										Opción <?= $key + 1 ?>:
									</div>
								</div>
								<div class="item col s4">
									<div id="tamaño">
										<?= $tamano ?>
									</div>
								</div>
								<div class="item col s4">
									<div id="precio">
										<?php
										$money_number = '$ ' . number_format($precio, 0, ',', '.');
										echo $money_number;
										?>
									</div>

								</div>
							</div>
						</div>
					<?php
						break;

					case 'variable':
					?>
						<div class="variaciones">
							<?php
							foreach ($product->get_children() as $key => $value) {
								$sub_product = wc_get_product($value);
								// var_dump($sub_product);
								$precio = $sub_product->get_price();
								$tamano = $sub_product->get_attributes()["tamano"];
							?>

								<div class="variacion">
									<div class="item col s4">
										<div id="opcion">
											Opción <?= $key + 1 ?>:
										</div>
									</div>
									<div class="item col s4">
										<div id="tamaño">
											<?= $tamano ?>
										</div>
									</div>
									<div class="item col s4">
										<div id="precio">
											<?php
											$money_number = '$ ' . number_format($precio, 0, ',', '.');
											echo $money_number;
											?>
										</div>

									</div>
								</div>

							<?php	}	?>
						</div>
				<?php
						break;

					default:
						echo "ERROR: TIPO DE PRODUCTO INESPERADO.";
						break;
				}

				?>

				<!-- Muestro el boton de comprar y sus componentes -->
				<?php do_action('woocommerce_' . $product->get_type() . '_add_to_cart'); ?>

			</div>

			<div id="img-wrapper" class="col s5">
				<img src="<?= get_field('imagen_lateral') ?>" />
			</div>

		</div>

	</section>




	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		//do_action('woocommerce_single_product_summary');
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>