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

	<section id="product-info-section" class="container-new">

		<div class="row">
			<div class="col xs12 s12 m12 l12 xl12">
				<div class="big-title">
					<h2> <?= get_field('subtitulo') ?> </h2>
				</div>
			</div><!-- end col -->
		</div><!-- end row -->

		<div class="row">
			<div class="col xs12 s12 m12 l6 xl6">

				<div class="text-content">
					<p>
						<?= $product->get_description(); ?>

					</p>
				</div>

				<h3 class="frase"> <?= get_field('frase_del_producto') ?> </h3>

				<!--<pre>
				<?php //var_dump($product->get_attributes()); 
				?>
				</pre>-->

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
								<div id="opcion" class="item">
									<p>Opción <?= $key + 1 ?>:</p>
								</div>
								<div id="tamano" class="item">
									<?= $tamano ?>
								</div>
								<div id="precio" class="item">
									<?php
									$money_number = '$ ' . number_format($precio, 0, ',', '.');
									echo $money_number;
									?>
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
									<div id="opcion" class="item">
										<p>Opción <?= $key + 1 ?>:</p>
									</div>
									<div id="tamano" class="item">
										<?= $tamano ?>
									</div>
									<div id="precio" class="item">
										<?php
										$money_number = '$ ' . number_format($precio, 0, ',', '.');
										echo $money_number;
										?>
									</div>
								</div><!-- end variacion -->

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

			</div><!-- end col -->

			<div class="col xs12 s12 m12 l6 xl6">
				<div id="img-wrapper">
					<img src="<?= get_field('imagen_del_producto_envasado') ?>" />
				</div>
			</div><!-- end col -->
		</div><!-- end row -->

	</section>

	<section id="comentarios">
		<div class="container-new">

			<!--VVV INICIO CONTENIDO CREADO POR WP VVV-->
			<?php
			wc_get_template('single-product/tabs/custom-reviews.php');
			?>
			<!--^^^ FIN CONTENIDO CREADO POR WP ^^^-->
		</div><!-- end container -->
	</section>

	<div class="container-new">

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');

		do_action('woocommerce_after_single_product_summary');
		?>
	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>