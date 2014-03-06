<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * Boot Store theme is based on Twentytwelve theme. The official WordPress theme.
 *
 * @package WordPress
 * @subpackage Boot Store
 * @since Boot Store 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>M2 SKINCARE THAILAND<?php //wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--<link rel="shortcut icon" href="<?php get_stylesheet_directory(); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php get_stylesheet_directory(); ?>/favicon.ico" type="image/x-icon">-->


<script>
//alert(window.location.host);
window.onload = function() {
	if ('www.perfectskinpro.co.uk' != window.location.host) {
		var elems = document.getElementsByTagName('a');
		for (var i = 0; i < elems.length; i++)
		    elems[i]['href'] = elems[i]['href'].replace('www.perfectskinpro.co.uk', window.location.host);	
	}
	
}
</script>  


<?php wp_head(); ?>


<style>
@charset "UTF-8";
@import url(fonts/supermarket/stylesheet.css);
.site { min-width: 1170px; }
.site-header { padding-top:0px; }
body.custom-background { background-color: #ffffff; background-image: none;}
#template-carousel .carousel-inner { height: 320px; }
</style>

</head>

<body <?php body_class(); ?> id="bp-default" >
<?php if ( ! is_user_logged_in() ) : ?>
	<div id="myLoginRegister" class="modal hide fade">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		<div class="row-fluid">
			<div class="span<?php echo get_option( 'users_can_register' ) ? '6' : '12'; ?>">
				<div class="modal-header">
					<h3><?php _e( 'Login', 'bre-bootstrap-ecommerce' ); ?></h3>
				</div>
				<div class="modal-body">
					<?php if ( function_exists( 'tcp_login_form' ) ) tcp_login_form(); ?>
				</div>
			</div>
			<?php if ( get_option( 'users_can_register' ) ) : ?>
			<div class="span6">
				<div class="modal-header">
					<h3><?php _e( 'Register', 'bre-bootstrap-ecommerce' ); ?></h3>
				</div>
				<div class="modal-body">
					<?php if ( function_exists( 'tcp_register_form' ) ) tcp_register_form( array( 'login' => true ) ); ?>
				</div>
			</div>
			<?php endif; ?>
		</div><!-- .row-fluid -->
	</div><!-- #myLoginRegister -->
<?php endif; ?>
	
<div id="page-top-wrapper" class="container-fluid-wrapper">
	<div id="page-top" class="site">

		<header id="masthead" class="site-header wrapper" role="banner">
			<div class="hgroup">
				<div class="site-title-description clearfix">
					<?php $bre_logo = get_option( 'bre_image_logo', false );
					if ( $bre_logo !== false ) : $bre_logo = $bre_logo['url']; ?>
						<h1 class="site-title bre-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php echo $bre_logo ?>"></a></h1>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>

					<?php $bse_site_description = get_option( 'bre_site_description_hide', false );
					if ( $bse_site_description == false ) :  ?>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
				</div>
				<div class="bse-language">
					<?php do_action( 'icl_language_selector' ); ?>
				</div>
				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) : ?>
					<!-- a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a> -->
						<!--img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /-->
						<img src="http://m2skincarethailand.com/wp-content/themes/boot-store/images/header.png" class="header-image" alt="" />
				<?php endif; ?>
			</div>

			<div class="primary-menu-wrapper">
				<?php $bre_primary_menu = get_option( 'bre_primary_menu', '' );
				$bre_primary_menu_transparent = get_option( 'bre_primary_menu_transparent', true );
				$bre_primary_menu_transparent = $bre_primary_menu_transparent ? 'transparent' : ''; ?>
				<!--div class="navbar <?php echo $bre_primary_menu; ?> <?php echo $bre_primary_menu_transparent; ?> primary-menu-bs">
						<div class="navbar-inner">
							<div class="container">
								
								<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse-primary">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								</a>
								<?php wp_nav_menu( array( 
									'theme_location' => 'primary', 
									'menu_class' => 'nav',
									'container_class' => 'nav-collapse-primary nav-collapse collapse',
									'fallback_cb'     => 'false',
								) ); ?>

							</div>
						</div>
					</div--><!-- .navbar -->
			</div><!-- .primary-menu-wrapper -->

		</header><!-- #masthead -->

		<?php $bre_secondary_menu = get_option( 'bre_secondary_menu', 'navbar-inverse' );
		$bre_secondary_menu_transparent = get_option( 'bre_secondary_menu_transparent', false );
		$bre_secondary_menu_transparent = $bre_secondary_menu_transparent ? 'transparent' : ''; ?>

		<!--div class="navbar <?php echo $bre_secondary_menu; ?> <?php echo $bre_secondary_menu_transparent; ?> secondary-menu-bs">
			<div class="navbar-inner">
				<div class="container">

					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse-secondary">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>

					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li class="pull-right">
							<?php get_search_form(); ?>
						</li>
					</ul>

					<?php wp_nav_menu( array( 
						'theme_location' => 'secondary-menu', 
						'menu_class' => 'nav',
						'container_class' => 'nav-collapse-secondary nav-collapse collapse',
					) ); ?>

				</div>
			</div>
		</div--><!-- navbar -->
<?php 

$bre_carousel_hide = get_option( 'bre_carousel_hide', false );

if ( ! $bre_carousel_hide && ( is_front_page() || is_page_template( 'page-templates/full-width-carousel.php' ) ) ) : ?>
		<script type="text/javascript">
		jQuery( function() {
			jQuery( '#template-carousel' ).carousel( {
				interval: 8000
			} );
		} );
		</script>

	<?php $carousel_args = array(
		'post_type' => get_post_types( array( 'public' => true ) ),
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'order' => 'DESC',
		'meta_query' => array(
			array(
				'key' => 'bre_add_to_home_carousel',
				'value' => true,
				'compare' => '=',
			),
		),
		'fields' => 'ids'
	);
	$carousel_posts = get_posts( $carousel_args );

	if ( is_array( $carousel_posts ) && count( $carousel_posts ) == 0 ) $carousel_posts = get_posts( array( 'fields' => 'ids' ) );
	
	if ( is_array( $carousel_posts ) && count( $carousel_posts ) > 0 ) : ?>
		<style>.item { padding-top:0px !important; }</style>
		<div id="header-slide" class="row-fluid">
			<div id="template-carousel" class="carousel slide hidden-phone">
				<div class="carousel-inner" style="background-color: rgba(0, 0, 0, <?php echo get_option( 'bre_carousel_opacity', 0.5 ); ?>);">
					
					<div id="bs-slide-47" class="item  bs-slide-47 active">
						<div class="bigcarousel-bg hidden-phone">
						</div>
						<div id="post-47" class="post-2 page type-page status-publish hentry">
						    <div class="site row-fluid wrapper-group">
							<img src="/wp-content/themes/boot-store/images/Slide_1.jpg"/>
						    </div>
						    <!-- .wrapper-group -->
						</div>
						<!-- #post-## -->
					    </div>
					<div id="bs-slide-47" class="item  bs-slide-47">
						<div class="bigcarousel-bg hidden-phone">
						</div>
						<div id="post-47" class="post-2 page type-page status-publish hentry">
						    <div class="site row-fluid wrapper-group">
							<img src="/wp-content/themes/boot-store/images/Slide_2.jpg"/>
						    </div>
						    <!-- .wrapper-group -->
						</div>
						<!-- #post-## -->
					    </div>
					    <!-- .item -->
					    <div id="bs-slide-47" class="item  bs-slide-47">
						<div class="bigcarousel-bg hidden-phone">
						</div>
						<div id="post-47" class="post-2 page type-page status-publish hentry">
						    <div class="site row-fluid wrapper-group">
							<img src="/wp-content/themes/boot-store/images/Slide_3.jpg"/>
						    </div>
						    <!-- .wrapper-group -->
						</div>
						<!-- #post-## -->
					    </div>
					    <!-- .item -->
					    <div id="bs-slide-47" class="item  bs-slide-47">
						<div class="bigcarousel-bg hidden-phone">
						</div>
						<div id="post-47" class="post-2 page type-page status-publish hentry">
						    <div class="site row-fluid wrapper-group">
							<img src="/wp-content/themes/boot-store/images/Slide_4.jpg"/>
						    </div>
						    <!-- .wrapper-group -->
						</div>
						<!-- #post-## -->
					    </div>
					    <!-- .item -->
					    <div id="bs-slide-47" class="item  bs-slide-47">
						<div class="bigcarousel-bg hidden-phone">
						</div>
						<div id="post-47" class="post-2 page type-page status-publish hentry">
						    <div class="site row-fluid wrapper-group">
							<img src="/wp-content/themes/boot-store/images/Slide_5.jpg"/>
						    </div>
						    <!-- .wrapper-group -->
						</div>
						<!-- #post-## -->
					    </div>
					    <!-- .item -->

					    
				<?php /* if ( ! isset( $instance ) ) $instance = get_option( 'ttc_settings' );
				$suffix = '-' . get_post_type( get_the_ID() );
				if ( ! isset( $instance['title_tag' . $suffix] ) ) $suffix = '';
				$image_size = isset( $instance['image_size' . $suffix] ) ? $instance['image_size' . $suffix] : 'thumbnail';

					$class = 'active';
					foreach( $carousel_posts as $post_id ) : //$post = get_post( $post_id ); ?>

						<div id="bs-slide-<?php echo $post_id; ?>" class="item <?php echo $class; ?> bs-slide-<?php echo $post_id; ?>">
							<?php $class = ''; ?>
							<div class="bigcarousel-bg hidden-phone">
							<?php $image = bre_get_image_for_carousel( $post_id );?>
							<?php if ( isset( $image['url'] ) ) : ?>
								<img src="<?php echo $image['url']; ?>" />
							<?php endif; ?>
							</div>
							<div id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>

								<div class="site row-fluid wrapper-group">

									<div class="span7">
										<div class="carousel-caption">
											<?php $permalink_url = function_exists( 'tcp_get_permalink' ) ? tcp_get_permalink( $post_id ) : get_permalink( $post_id );
											$title = function_exists( 'tcp_get_the_title' ) ? tcp_get_the_title( $post_id ) : get_the_title( $post_id ); ?>
											<h2><a href="<?php echo $permalink_url; ?>"><?php echo $title; ?></a></h2>
											<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>
											<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>

												<div class="slide-summary lead">
													<?php if ( function_exists( 'tcp_the_excerpt' ) ) {
														echo tcp_the_excerpt( $post_id, get_option( 'bre_carousel_excerpt_length', 50 ) );
													} else {
														$current_post = get_post( $post_id );
														echo $current_post->post_excerpt;//TODO
													} ?>
												</div>

											<div class="wrapper-prices">

											</div><!-- .wrapper-prices -->

											<?php if ( function_exists( 'tcp_is_saleable' ) && tcp_is_saleable( $post_id ) ) : ?>
												<a href="<?php echo tcp_get_permalink( $post_id );?>" class="btn btn-large btn-primary">
													<?php echo tcp_get_the_price_label( $post_id );?>
												</a>
												<?php if ( function_exists( 'tcp_has_discounts' )) : ?>
													<?php if ( tcp_has_discounts() ) : ?>
														<span class="loop-discount">-<?php tcp_the_discount_value(); ?></span>
													<?php endif; ?>
												<?php endif; ?>
												<?php if ( function_exists( 'tcp_get_the_stock' )) : ?>
													<?php $stock = tcp_get_the_stock( get_the_ID() );
													if ( $stock == 0 ) : ?>
														<span class="loop-out-stock"><?php _e( 'Out of stock', 'bre-bootstrap-ecommerce' ); ?></span>
													<?php endif; ?>
												<?php endif; ?>
											<?php else :
												if ( ! get_option( 'bre_carousel_hide_more_details', false ) ) : ?>
												<a href="<?php echo $permalink_url; ?>" class="btn btn-large btn-primary">
													<?php _e( 'More info', 'bre-bootstrap-ecommerce' ); ?>
												</a>
												<?php endif; ?>	
											<?php endif; ?>

											<span class="hidden-phone"><?php if ( function_exists( 'sharing_display' ) ) echo sharing_display(); ?>
											</span>

										</div><!-- .carousel-caption -->
									</div><!-- .span -->

									<div class="span5 bs-carousel-img">
									
										<?php if ( has_post_thumbnail( $post_id ) ) :  ?>
											<div class="slide-post-thumbnail">
												<a class="tcp_size-<?php echo $image_size;?>" href="<?php echo get_permalink( $post_id ); ?>">
													<?php if ( function_exists( 'the_post_thumbnail' ) ) echo get_the_post_thumbnail( $post_id, 'large' ); ?></a>
											</div><!-- .entry-post-thumbnail -->
										<?php else : ?>
										<?php endif; ?>	 

									</div><!-- .span -->

								</div><!-- .wrapper-group -->

							</div><!-- #post-## -->
						</div><!-- .item -->
					<?php endforeach; // End the loop */ ?>
				</div><!-- .carousel-inner -->

				<!-- Carousel nav 
				<a class="carousel-control left" href="#template-carousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#template-carousel" data-slide="next">&rsaquo;</a>-->
			</div><!-- #template-carousel -->

		</div><!-- header-slide -->
	<?php endif ?>
<?php endif ?>

	</div><!-- page-top -->

</div><!-- page-top-wrapper -->

<div id="page" class="hfeed site">
	<div class="bse-container">
		<br>
		<!--div class="main-tools cf">

			<div class="breadcrumbs">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div id="breadcrumbs">','</div>'); } ?> 
			</div>

			<?php if ( function_exists( 'tcp_the_total' ) ) : ?>
			<ul class="login-tool-bar pull-right">
			<?php global $thecartpress;
			$disable_ecommerce = $thecartpress->get_setting( 'disable_ecommerce' );
			if ( ! $disable_ecommerce ) : ?>
				<li class="my-cart">
					<a href="<?php tcp_the_shopping_cart_url(); ?>">
					<span class="navbar-total"><?php tcp_the_total(); ?></span>
					</a>
				</li>
				<li class="separator"> | </li>
			<?php endif; ?>
		<script type="text/javascript">
		jQuery( function() {
			jQuery( '.tcp_user_name' ).tooltip( );
		} );
		</script>
				<li>
				<?php if ( ! is_user_logged_in() ) : ?>
					<a href="#myLoginRegister" role="button" class="" data-toggle="modal">
						<?php _e( 'Login', 'bre-bootstrap-ecommerce' ); ?>
						<?php if ( get_option( 'users_can_register' ) ) : ?>
							/ <?php _e( 'Register', 'bre-bootstrap-ecommerce' ); ?>
						<?php endif; ?>
					</a>
					<?php if ( isset( $_REQUEST['tcp_register_error'] ) ) : ?>
						<p class="error"><?php echo $_REQUEST['tcp_register_error']; ?></p>
					<?php endif; ?>
				<?php else : 
					global $current_user;
					get_currentuserinfo();
					if ( function_exists( 'tcp_the_my_account_url' ) ) : ?>
					<span class="tcp_user_name"><a href="<?php tcp_the_my_account_url() ?>" title="<?php _e( 'My Account', 'bre-bootstrap-ecommerce' ); ?>" data-toggle="tooltip"><?php printf( __( 'Hi, %s', 'bre-bootstrap-ecommerce' ), $current_user->user_nicename ); ?></span></a>
					</li><li class="separator"> | </li><li>
					<?php endif; ?>
					<a href="<?php echo wp_logout_url(); ?>" title="Logout"> <?php _e( 'Logout', 'bre-bootstrap-ecommerce' ); ?></a>
				<?php endif; ?>
				</li>
			</ul>
			<?php endif; ?>
		</div--><!-- .main-tools -->	

<?php if ( is_front_page() ) :
	//if ( ! get_option( 'bre_hide_home_shortcuts', false ) ) bre_the_three_boxes()
	
?>
<style>
div {
	-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
	-moz-box-sizing: border-box;    /* Firefox, other Gecko */
	box-sizing: border-box;
}
.col { font-family:supermarketregular !important; padding: 20px; cursor:pointer; float: left; width: 374px; height:200px; border: 1px solid #b07809; margin: 0 21px 21px 0; }
.col h2 { font-size:42px; line-height: 33px;  }
.col p { font-size:20px; }
.col-right { margin: 0 0px 5px 0; }
.bse-container {
padding-left: 0px;
padding-right: 0px;
}
/*
.block-1 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block1.png); }
.block-2 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block2.png); }
.block-3 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block3.png); }
.block-4 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block4.png); }*/
.block-5 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block5.png); }
.block-6 { overflow: hidden; }
</style>
<div class="col block-1">
	<h2>Discovering</h2>
	<p>What is <br> Mandelic and Malic acid <br> &nbsp;</p>
	<p>&nbsp;</p>
	<p><a href="our-product">Learn more</a></p>
</div>
<div class="col block-2">
	<h2>Testimonials</h2>
	<p>Listen to <br> what people say <br> about us</p>
	<p>&nbsp;</p>
	<p><a href="testimonials">Read more detail</a></p>
</div>
<div class="col col-right block-3" style="text-align:right">
	<p>We would like to thank you</p>
	<h2>News & Promotions</h2>
	<p>&nbsp;</p>
	<p style="margin-top:59px"><a href="new-and-promotions">Check promotion of the month</a></p>
</div>
<div class="col block-4">
	<h2>What <br>the media <br>says</h2>
	<p>&nbsp;</p>
	<p><a href="what-the-media-says">Read more</a></p>
</div>
<div class="col block-5">
	<!--div class="image">&nbsp;</div>
	<div class="text">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, adipisci velit</div-->
</div>
<div class="col col-right block-6">
	<div class="fb-like-box" data-href="http://www.facebook.com/M2SkinCareThailand" data-width="374" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="true"></div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=452441818210109";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>

		<div id="main" class="row-fluid">
