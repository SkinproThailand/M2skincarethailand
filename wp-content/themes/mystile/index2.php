<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	
?>

    <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { ?>
    	
	<script type="text/javascript">
	jQuery( function() {
		jQuery( '#template-carousel' ).carousel( {
			interval: 8000
		} );
	} );
	</script>
	<style>
	    .carousel { margin: 0 auto; max-width: 1170px; width:100%; }
	    #template-carousel .carousel-inner { max-height: 337px; width:100%;  }
	    .home #content.with-banner { margin-top: 50px; }
	    .post img, .type-page img { padding:0px; border:0px; }
	    .post, .type-page { margin: 0px; }
	</style>
	<div id="template-carousel" class="carousel slide hidden-phone">
	    <div class="carousel-inner">
		    
		    <div id="bs-slide-47" class="item  bs-slide-47 active">
			    <div class="bigcarousel-bg hidden-phone">
			    </div>
			    <div id="post-47" class="post-2 page type-page status-publish hentry">
				<div class="site row-fluid wrapper-group">
				    <img src="/wp-content/uploads/Slide_1.jpg"/>
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
				    <img src="/wp-content/uploads/Slide_2.jpg"/>
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
				    <img src="/wp-content/uploads/Slide_3.jpg"/>
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
				    <img src="/wp-content/uploads/Slide_4.jpg"/>
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
				    <img src="/wp-content/uploads/Slide_5.jpg"/>
				</div>
				<!-- .wrapper-group -->
			    </div>
			    <!-- #post-## -->
			</div>
			<!-- .item -->

	    </div><!-- .carousel-inner -->
    
	</div><!-- #template-carousel -->
			
    	<!--div class="homepage-banner">
    		<?php
				if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { $banner = $woo_options['woo_homepage_banner_path']; }
				if ( $woo_options[ 'woo_homepage_banner' ] == "true" && is_ssl() ) { $banner = preg_replace("/^http:/", "https:", $woo_options['woo_homepage_banner_path']); }
			?>
			    <img src="<?php echo $banner; ?>" alt="" />
    		<h1><span><?php echo $woo_options['woo_homepage_banner_headline']; ?></span></h1>
    		<div class="description"><?php echo wpautop($woo_options['woo_homepage_banner_standfirst']); ?></div>
    	</div-->
    	
    <?php } ?>
    
    <!-- Content Area --------------------------------------------->
    <style>
	@charset "UTF-8";
	@import url(/fonts/supermarket/stylesheet.css);
	.col { font-family:supermarketregular !important; padding: 20px; cursor:pointer; float: left; width: 374px; height:200px; border: 1px solid #b07809; margin: 0 21px 21px 0; }
	.col h2 { font-size:42px; line-height: 33px;  }
	.col p { font-size:20px; }
	.col-right { margin: 0 0px 5px 0; }
	.bse-container {
	padding-left: 0px;
	padding-right: 0px;
	}
	.block-1 { cursor:default; /*background-image: url(/wp-content/themes/boot-store/images/block/M2_Block1.png);*/ }
	.block-2 { cursor:default;  /*background-image: url(/wp-content/themes/boot-store/images/block/M2_Block2.png);*/ }
	.block-4 { background-image: url(/wp-content/themes/boot-store/images/block/M2_Block3.jpg); }
	.block-4:hover { opacity: 0.8; }
	.block-5 { cursor:default; background-image: url(/wp-content/themes/boot-store/images/block/M2_Block4.jpg); }
	.block-6 { background-color: #000000; padding: 0px; overflow: hidden; text-align: center;}
	.block-6 { overflow: hidden; }
    </style>
    
    <div id="content" class="col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">
    
	<div class="col block-1">
		<h2>Discovering</h2>
		<p>What is <br> Mandelic and Malic acid <br> &nbsp;</p>
		<p>&nbsp;</p>
		<p><a href="discovering/">Learn more</a></p>
	</div>
	<div class="col block-2">
		<h2>Article</h2>
		<p>Listen to <br> what people say <br> about us</p>
		<p>&nbsp;</p>
		<p><a href="article/">Read more detail</a></p>
	</div>
	<div class="col col-right block-3">
		<h2>Testimonials</h2>
		<p>Listen to <br> what people say <br> about us</p>
		<p>&nbsp;</p>
		<p><a href="testimonials/">Read more detail</a></p>
	</div>
	<div class="col block-4" style="text-align:right" onclick="window.location='news-promotion/';">
		<!--p>We would like to thank you</p>
		<h2>News & Promotions</h2>
		<p>&nbsp;</p>
		<p style="margin-top:59px"><a href="#" x="new-and-promotions">Check promotion of the month</a></p-->
	</div>
	<div class="col block-5">
		<!--h2>What <br>the media <br>says</h2>
		<p>&nbsp;</p>
		<p><a href="#" x="what-the-media-says">Read more</a></p-->
	</div>
	<div class="col col-right block-6">
		<iframe width="356" height="200" src="//www.youtube.com/embed/nYCL-SncEeA?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=452441818210109";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">  
		
		<?php mystile_homepage_content(); ?>		
		
		<?php woo_loop_before(); ?>
		
		<?php if ( $woo_options[ 'woo_homepage_blog' ] == "true" ) { 
			$postsperpage = $woo_options['woo_homepage_blog_perpage'];
		?>
		
		<?php
			
			$the_query = new WP_Query( array( 'posts_per_page' => $postsperpage ) );
			
        	if ( have_posts() ) : $count = 0;
        ?>
        
			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php 
				endwhile; 
				// Reset Post Data
				wp_reset_postdata();
			?>
			
			

		<?php else : ?>
        
            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        
        <?php endif; ?>
        
        <?php } // End query to see if the blog should be displayed ?>
        
        <?php woo_loop_after(); ?>
		                
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>