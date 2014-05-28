<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<style>
.woocommerce-result-count, .woocommerce-ordering { display:none; }
.product h3 { font-size: 1em; font-weight:normal; }
.product-menu-list { float:left; width:250px; padding-top:30px; }
.product-menu-list li { line-height:30px; }
.product-menu-list a { color:#996633; }
.single-product .images { width: 330px; padding: 80px 30px; }
.images img { width: 300px; }
.woocommerce-tabs { margin-top:100px;}
.onsale { display:none; }
</style>
<div class="product-menu-list">
	<h1 class="page-title">ผลิตภัณฑ์ของเรา</h1>
        <ul>
                <li><a href="/product/m2-exfoliating-cleanser/">M2 Exfoliating Cleanser เจลใสล้างหน้า</a></li>
                <li><a href="/product/m2-skin-refinish-12/">M2 Skin Refinish 12% เซรั่ม เพื่อผิวหน้ากระจ่างใส</a></li>
                <li><a href="/product/m2-skin-recovery-moisturizer/">M2 Skin Recovery Moisturizer ครีมบำรุงผิวหน้า</a></li>
                <li><a href="/product/m2-body-refinish-15-100ml/">M2 Body Refinish 15% โลชั่นทาผิวกาย</a></li>
                <li><a href="/product/m2-sensitive-skin-collection-bundle/">M2 Bundle Set ชุดผลิตภัณฑ์ เผื่อผิวเรียบเนียน กระจ่างใส</a></li>
        </ul>
</div>
<div class="images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>

<div style="float: left;position: relative;top: 370px;left: -288px;">
	
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	
		<p class="price">ราคา <?php echo $product->get_price_html(); ?></p>
	
		<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
		<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	
	</div>
	
	<?
	global $woocommerce, $product;
	
	if ( ! $product->is_purchasable() ) return;
	?>
	
	<?php
		// Availability
		$availability = $product->get_availability();
	
		if ( $availability['availability'] )
			echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
	?>
	
	<?php if ( $product->is_in_stock() ) : ?>
	
		<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	
		<form class="cart" method="post" enctype='multipart/form-data'>
			
			<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	
			<?php
				if ( ! $product->is_sold_individually() )
					woocommerce_quantity_input( array(
						'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
						'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
					) );
			?>
	
			<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
	
			<button type="submit" class="single_add_to_cart_button button alt">สั่งซื้อ<?php //echo $product->single_add_to_cart_text(); ?></button>
	
			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</form>
	
		<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
	
	<?php endif; ?>
	
</div>