<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
    <?php 

	$product_title = $product->get_name();
	$product_desc = $product->get_short_description();
	$product_price = $product->get_price();
	$product_img_id =  get_post_thumbnail_id( $product->get_id() );
    $product_tags = get_the_terms( $product->get_id() , 'product_tag' );

	$src = wp_get_attachment_image_src( $product_img_id, 'full' );
	$srcset = wp_get_attachment_image_srcset( $product_img_id, 'full' );
	$sizes = wp_get_attachment_image_sizes( $product_img_id, 'full' );
	$alt = get_post_meta( $product_img_id, '_wp_attachment_image_alt', true);
	
?>
    <div class="max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
		<a href="<?php echo get_permalink( $product->get_id() ); ?>">
			<img class="w-full" src="<?php echo esc_attr( $src[0] );?>"
							srcset="<?php echo esc_attr( $srcset ); ?>"
							sizes="<?php echo esc_attr( $sizes );?>"
							alt="<?php echo esc_attr( $alt );?>" />
		</a>
		<div class="px-6 py-4">
			<a href="<?php echo get_permalink( $product->get_id() ); ?>">
				<h5 class="font-bold text-xl mb-2"><?php echo $product_title; ?></h5>
			</a>
			<p class="text-gray-700 text-base py-2 mb-4">
				<?php echo wp_strip_all_tags($product_desc); ?>
			</p>
			<div class="flex justify-between items-center">
				<span class="text-4xl font-bold text-gray-900 dark:text-white"><?php echo get_woocommerce_currency_symbol();  echo $product_price; ?></span>
				<a href="?add-to-cart=<?php echo $product->get_id(); ?>" 
					data-quantity="1" 
					data-product_id="<?php echo $product->get_id(); ?>" 
					data-product_sku="" 
					class="simple add_to_cart_button ajax_add_to_cart text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
			</div>
			<div class="pt-4 pb-2">
				<?php 
				
					if ( ! empty( $product_tags ) && ! is_wp_error( $product_tags ) ){
						foreach ( $product_tags as $tag ) {  ?>
						<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?php echo $tag->name; ?></span>		
					<?php
						}
					}				
				
				?>		
			</div>
		</div>
	</div>	
</li>
