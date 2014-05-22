<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
//$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$tabs = array();
$tabs['description'] = array('title'=>'รายละเอียด', 'priority'=>10, 'callback'=>'woocommerce_product_description_tab');
$tabs['howtouse'] = array('title'=>'วิธีใช้', 'priority'=>10, 'callback'=>'woocommerce_product_howtouse_tab');
$tabs['ingredient'] = array('title'=>'ส่วนผสม', 'priority'=>10, 'callback'=>'woocommerce_product_ingredient_tab');

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">
		<ul class="tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo $key ?>">
				
				<?
				/** lek */
				if ($key == 'howtouse') {
					echo get_post_meta(get_the_ID(), 'howtouse', true);
				} else if ($key == 'ingredient') {
					echo get_post_meta(get_the_ID(), 'ingredient', true);
				} else {
					call_user_func( $tab['callback'], $key, $tab );
				}
				?>
		
			</div>

		<?php endforeach; ?>
	</div>

<?php endif; ?>