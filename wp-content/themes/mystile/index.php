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
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="https://www.eliteserum.asia/assets/js/owl-carousel/owl.carousel.css">
     
    <!-- Default Theme -->
    <link rel="stylesheet" href="https://www.eliteserum.asia/assets/js/owl-carousel/owl.theme.css">
      
    <!-- Include js plugin -->
    <script src="https://www.eliteserum.asia/assets/js/owl-carousel/owl.carousel.js"></script>
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
	.slide-content-fix {
	    width: 310px;
	    float: right;
	}
	.slide-content-2-column {
	    width: 67%;
	    float: left;
	}
	.slide-content, .slide-news-promotion, .slide-youtube {
	    width: 100%;
	}
	.slide-content-fix .pin, .slide-content .pin, .slide-content-2-column .pin, .slide-youtube .pin {
	    border: 3px solid #FFC0CB;
	    display: block;
	    height: 410px;
	    margin: 0;
	    padding: 0;
	    width: 93%;
	}
	.slide-news-promotion .pin {
	    height: 247px;
	    width: 97%;
	    display: block;
	    padding: 0;
	    margin: 0;
	}
	.PinHolder {
	    height : 280px;
	    overflow: hidden;
	    background-position: center center;
	    background-size: contain;
	    background-repeat: no-repeat;
	}
	.pin .PinImageImg {
	    display: block;
	    margin: auto;
	    opacity: 0;
	}
	.PinText {
	    background-color: #C2E0FE;
	    height: 124px;
	    padding: 3px 12px;
	}
	.PinText p {
	    line-height: 1.56em;
	}
	.pin .description {
	    font-size: 1.037em;
	    padding: 4px 0;
	    height: 57px;
	    overflow: hidden;
	}
	.pin h3.title {
	    font-size: 1.1em;
	    max-height: 37px;
	    overflow: hidden;
	}
	.owl-carousel .owl-wrapper-outer {
	    overflow: hidden;
	    position: relative;
	    width: 99%;
	}
	.slide-title {
	    color: #800000;
	    font-size: 1.3em;
	    padding: 5px 0 15px 5px;
	    text-decoration: underline;
	}
	.pin {
	line-height: 20px;
	font-size:12px;
	display: inline-block;
	background: #FFFFFF;
	box-shadow:0 1px 3px rgba(34,25,25,0.4);
	-moz-box-shadow:0 1px 2px rgba(34,25,25,0.4);
	-webkit-box-shadow:0 1px 3px rgba(34,25,25,0.4);
	margin: 0 2px 12px;
	-webkit-column-break-inside: avoid;
	-moz-column-break-inside: avoid;
	column-break-inside: avoid;
	padding: 15px;
	opacity: 1;
	-webkit-transition: all .2s ease;
	-moz-transition: all .2s ease;
	-o-transition: all .2s ease;
	transition: all .2s ease;
	}
	
	.pin .PriceContainer {
	position:absolute;
	z-index:2;
	top:-15px;
	left:-15px;
	width:110px;
	height:110px;
	overflow:hidden;
	}
	
	.pin .PinImageImg {
	    background-color: #F2F0F0;
		width: 280px;
	}
	
	.pin h3.title {
		font-size: 14px;
		font-weight: bold;
		padding: 5px 0 3px 1px;
	}
	
	.pin h3.title a {
		color: #0190D2;
	    text-decoration: none;
	}
	
	.pin .description {
		padding: 0 0 0 1px;
	}
	.lcp_catlist a { display: block; color:#996633; font-size: 1.3em; line-height: 60px; text-decoration: none; }
	.lcp_catlist a img:hover { opacity: 0.6; }
	.lcp_catlist a img { border: 1px solid #e6e6e6; padding: 15px; width: 290px; margin: 0 auto; height:211px; -webkit-box-shadow: 0px 2px 4px 0px rgba(50, 50, 50, 0.4); -moz-box-shadow: 0px 2px 4px 0px rgba(50, 50, 50, 0.4); box-shadow: 0px 2px 4px 0px rgba(50, 50, 50, 0.4); }
	.home #content.with-banner { padding-top:0px; }
    </style>
    <script>
    $(function() {
	$(".slide-content").owlCarousel({
	    autoPlay: 10000, 
	    items : 3,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [979,3],
	    navigation : true
	});
    });
    </script>
    <div id="content" class="col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">
	
	<section class="entry">
            <ul class="lcp_catlist" id="lcp_instance_1">
		<li><a href="/our-product/" title="ผลิตภัณฑ์">ผลิตภัณฑ์ & สั่งซื้อ</a> <a href="/our-product/" title="ผลิตภัณฑ์"><img width="260" height="211" src="/wp-content/uploads/2014/03/M2-Skin-Care-Mandelic-Acid-and-Malic-Acid-260x260.png" style="width:260px; height:211px;" class="attachment-thumbnail wp-post-image" alt="1017464_217840841746660_1265793161_n"></a></li>
		<li><a href="/ingredients/" title="ส่วนผสม">ส่วนผสม</a> <a href="/ingredients/" title="ส่วนผสม"><img width="260" height="211" src="/wp-content/uploads/2014/03/1012418_209825799214831_102530169_n-e1396584827149.jpg" class="attachment-thumbnail wp-post-image" alt="529569_211699572360787_1752821559_n"></a></li>
		<li><a href="/before-and-after/" title="รีวิว ก่อนใช้ &amp; หลังใช้">รีวิว ก่อนใช้ &amp; หลังใช้</a> <a href="/before-and-after/" title="รีวิว ก่อนใช้ &amp; หลังใช้"><img width="260" height="211" src="/wp-content/uploads/2014/03/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7-M2-%E0%B8%A5%E0%B8%94%E0%B8%A3%E0%B8%AD%E0%B8%A2%E0%B9%81%E0%B8%94%E0%B8%87%E0%B8%AA%E0%B8%B4%E0%B8%A7-A-EN-260x260.jpg" style="width:260px; height:211px;"  class="attachment-thumbnail wp-post-image" alt="1012418_209825799214831_102530169_n"></a></li>
		<li>
		    <a href="/research-team/" title="ทีมวิจัย">ทีมวิจัย</a>
		    <a href="/research-team/" title="ทีมวิจัย">
		    <img width="260" height="211" src="/wp-content/uploads/2014/03/1506634_210214732509271_1363141758_n-e1396584846873.jpg" class="attachment-thumbnail wp-post-image" alt="1620957_217841145079963_591592502_n">
		    </a>
		</li>
		<li><a href="/buy-now/" title="สั่งซื้อ">วิธีการสั่งซื้อ</a> <a href="/how-to-buy/" title="สั่งซื้อ"><img width="260" height="211" src="/wp-content/uploads/2014/03/1623648_219910911539653_735101116_n-e1396584903322.jpg" class="attachment-thumbnail wp-post-image" alt="1623648_219910911539653_735101116_n"></a></li>
	    </ul>
	</section>
	
	<div style="height:30px">&nbsp;</div>
	
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