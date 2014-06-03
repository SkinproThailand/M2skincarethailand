<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

if (isset($_POST['email_subscribe']) && !empty($_POST['email_subscribe'])) {
    
    $wpdb->insert( 
	'email_subscribe', 
	array( 
		'email' => $_POST['email_subscribe']
	));
    
    ?>
    <script>
	alert('Thank you for subscribe.');
	window.location = "/";
    </script><?
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="icon" type="image/x-icon" href="/wp-content/uploads/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type='text/javascript' src='http://jquery.bassistance.de/validate/jquery.validate.js'></script>
<link rel='stylesheet' id='bootstrap-css'  href='/wp-content/themes/boot-store/css/bootstrap.min.css' type='text/css' media='all' />

<style>
* {
    -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box;    /* Firefox, other Gecko */
    box-sizing: border-box;
}
#main.fullwidth, .layout-full #main, .col-full, .no-sidebar #main { max-width:1170px; }
#sub-nav { display: block; width:1170px; margin: 0px; }
#sub-nav li { cursor:pointer; width:167px; display: block; float: left; list-style: none; background-image: url(/wp-content/uploads/nav_bg.jpg); height: 61px; padding: 18px 20px; border-right: 1px solid #E1E1E1; text-align: center;}
#sub-nav li:last-child { border:0px; }
#sub-nav li:hover { opacity: 0.6; }
#sub-nav li a { color:#666666; font-weight:normal; }
#sub-nav li a:hover { text-decoration: none; }
.product h3 { font-size:1.1em; line-height:20px; }
/* .footer-wrap { display:none; } */
#top { display: none; }
.qty { height:28px !important; }
</style>
<script type='text/javascript'>
$(function(){
    $("#email_subscribe_form").validate();    
});
</script>
</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">



	<div id="top">
		<nav class="col-full" role="navigation">
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
			<?php
				if ( class_exists( 'woocommerce' ) ) {
					echo '<ul class="nav wc-nav">';
					woocommerce_cart_link();
					echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
					echo get_search_form();
					echo '</ul>';
				}
			?>
		</nav>
	</div><!-- /#top -->



    <?php woo_header_before(); ?>

	<header id="header" class="col-full">



	    <hgroup>

	    	 <?php
			    $logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
			?>
			<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
			    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
			    	<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
			    </a>
		    <?php } ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<h3 class="nav-toggle"><a href="#navigation">&#9776; <span><?php _e('Navigation', 'woothemes'); ?></span></a></h3>

		</hgroup>

        <?php woo_nav_before(); ?>
		
		<nav id="navigation" class="col-full" role="navigation">

			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
			<ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
			<?php } ?>
			
		</nav><!-- /#navigation -->
		
		<?php woo_nav_after(); ?>
		
		<!--div style="float: right; position: relative; width: 700px; text-align: right;">
		    <form id="email_subscribe_form" action="" method="post">
			<input type="email" name="email_subscribe" value="" placeholder="Your email address." style="height: 30px; margin: 0px 10px;" required/>
			<input type="submit" value="subscribe"/>
		    </form>
		</div-->
		
		<!--div style="float:left; width:1170px; height:61px;">
		    <ul id="sub-nav">
			<li><a href="#" x="/anti-aging">Anti Aging</a></li>
			<li><a href="#" x="/sensitive-skin">Sensitive Skin</a></li>
			<li><a href="#" x="/redness">Redness</a></li>
			<li><a href="#" x="/skin-tone-evening">Skin Tone Evening</a></li>
			<li><a href="#" x="/treatment">Treatment</a></li>
			<li><a href="#" x="/body-treatment">Body Treatment</a></li>
			<li><a href="/our-product">All Products</a></li>
		    </ul>
		</div-->
		
		<style>
		.nav ul li a.cart.active {
		color: #666666;
		border-color: #757575;
		}
		.nav ul li a.cart, .nav ul li a.navicon, input[type="submit"].guest_button {
		background: url(//cdn.shopify.com/s/files/1/0190/6380/t/31/assets/cart_dark.png?3930) no-repeat 9px 7px;
		padding: 5px 10px 5px 30px;
		border: solid 1px #d7d4d3;
		-webkit-border-radius: 4px;
		-khtml-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		-o-border-radius: 4px;
		border-radius: 4px;
		}
		.nav ul li a.active, nav ul li a.active:visited, nav ul li a.active:active {
		color: #666666;
		}
		.nav ul li a, .nav ul li a:visited, .nav ul li a:active {
		font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Lucida, Helvetica, Arial, sans-serif;
		font-weight: normal;
		font-size: 13px;
		text-transform: uppercase;
		color: #666666;
		position: relative;
		display: block;
		letter-spacing: 0px;
		}
		.nav ul li a, .nav ul li a:visited, .nav ul li a:active {
		font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Lucida, Helvetica, Arial, sans-serif;
		font-weight: normal;
		font-size: 13px;
		text-transform: uppercase;
		color: #666666;
		position: relative;
		display: block;
		letter-spacing: 0px;
		}
		</style>
		<div class="nav" style="float: right; position: relative; width:300px; ">
		    <ul style="float:right">
			<li><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart active" title="Shopping Cart">ตะกร้า<span class="cart_count"> (<?=$woocommerce->cart->cart_contents_count?>)</span></a></li>
		    </ul>
		</div>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>