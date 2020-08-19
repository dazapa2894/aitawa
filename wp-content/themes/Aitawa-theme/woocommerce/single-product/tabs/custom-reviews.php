<?php


if (!defined('ABSPATH')) {
  exit;
}

$product_tabs = apply_filters('woocommerce_product_tabs', array());


if (!empty($product_tabs)) : ?>
  
<?php
if (isset($product_tabs['reviews']['callback'])) {
  call_user_func($product_tabs['reviews']['callback'], "reviews", $product_tabs['reviews']);
}
?>

<?php //do_action('woocommerce_product_after_tabs'); ?>

<?php endif; ?>
