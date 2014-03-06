<?php
/**
 * The Template for displaying all single posts.
 * Boot Store theme is based on Twentytwelve theme. The official WordPress theme.
 *
 * @package WordPress
 * @subpackage Boot Store
 * @since Boot Store 1.0
 */

get_header();

//$sidebar_content = bre_is_active_sidebar_and_empty( 'sidebar-1' );
if ( ! is_active_sidebar( 'sidebar-1' ) ) $col_width = 'span12';
//if ( strlen( $sidebar_content ) == 0 ) $col_width = 'span12';
else $col_width = 'span9'; ?>

	<div id="primary" class="site-content <?php echo $col_width; ?>">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="single-product-table row-fluid clearfix">

					<div class="single-product-options span6">
						<header class="entry-header">
									
							<h1 class="entry-title"><?php the_title(); ?></h1>

								<!--<div class="entry-meta">
									<?php tcp_posted_on(); ?> <?php tcp_posted_by(); ?>
								</div>--><!-- .entry-meta -->
						</header><!-- .entry-header -->
						<?php if ( function_exists( 'tcp_has_discounts' )) : ?>
							<?php if ( tcp_has_discounts() ) : ?>
								<span class="single-discount">-<?php tcp_the_discount_value(); ?></span>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( function_exists( 'tcp_the_buy_button' ) ) tcp_the_buy_button(); ?>

						<?php if ( function_exists( 'sharing_display' ) ) remove_filter( 'the_content', 'sharing_display', 19 ); ?>

						<?php if ( function_exists( 'sharing_display' ) ) echo sharing_display(); ?>

						<?php if ( comments_open() ) : ?>
							<div class="comments-link">
								<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bre-bootstrap-ecommerce' ) . '</span>', __( '1 Reply', 'bre-bootstrap-ecommerce' ), __( '% Replies', 'bre-bootstrap-ecommerce' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open() ?>

						<?php if ( is_active_sidebar( 'sidebar-buying-area' ) ) : ?>
							<div class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar-buying-area' ); ?>
							</div><!-- #secondary -->
						<?php endif; ?>
					</div><!-- .single-product-options -->

					<div class="single-product-imagen span6">
						<div class="tcp-single-imagen">

							<?php $attachments = get_children( array(
									'post_type' => 'attachment',
									'post_mime_type' => 'image',
									'post_parent' => $post->ID
								) );

							if ( has_post_thumbnail() ) :  ?>

								<?php // $image_title = $attachment->post_title; ?>
								<?php $imageFull = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
								<?php if(function_exists( 'magictoolbox_WordPress_MagicZoomPlus_init' )) { ?>
									<a class="MagicZoomPlus" id="MagicZoom-single-product" href="<?php echo $imageFull[0]; ?>">
										<?php the_post_thumbnail( 'large' ); ?>
									</a>
								<?php } else { ?>

									<?php if ( count( $attachments ) > 1 ) { ?>

										<?php the_post_thumbnail( 'large' ); ?>

									<?php } else { ?>

										<?php $post_thumbnail_id = get_post_thumbnail_id( $post->ID ); ?>
										<?php $attachment_page = get_attachment_link( $post_thumbnail_id ); ?> 
										<a href="<?php echo $attachment_page; ?>">
											<?php the_post_thumbnail( 'large' ); ?>
										</a>

									<?php } ?>
								<?php } ?>

							<?php else : ?>
								<div class="slide-post-thumbnail tcp-no-image">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/images/tcp-no-image.jpg" alt="No image" title="" width="" height="" />
								</div><!-- .entry-post-thumbnail -->
							<?php endif; ?>	 
						</div><!-- .tcp-single-imagen -->


						<?php if(count($attachments) > 1) { ?>
							<?php echo do_shortcode( '[gallery columns="5" link="file"]' ); ?>
						<?php } else { ?>
						    <!-- No gallery, Display a single image -->
						<?php } ?>

					</div><!-- .single-product-imagen -->
				</div><!-- .single-product-table -->


			<?php ob_start();
			the_content();
			$out = ob_get_clean(); ?>
			<?php if ( is_active_sidebar( 'sidebar-product-tab1' ) || is_active_sidebar( 'sidebar-product-tab2' ) || is_active_sidebar( 'sidebar-product-tab3' ) ) : ?>				
				<ul class="nav nav-tabs" id="myTab">
				<?php if ( strlen( $out ) > 0 ) : ?>
					<li class="active"><a href="#description" data-toggle="tab">
					<?php _e( 'Description', 'bre-bootstrap-ecommerce' ); ?></a>
					</li>
				<?php endif; ?>

					<?php if ( is_active_sidebar( 'sidebar-product-tab1' ) ) : ?>
					<li><a href="#product-tab1" data-toggle="tab"><?php echo bre_string( 'Boot Store', 'Product Tabs, label one', get_option( 'bre_label_one' ) ); ?></a></li>
					<?php endif; ?>
					
					<?php if ( is_active_sidebar( 'sidebar-product-tab2' ) ) : ?>
					<li><a href="#product-tab2" data-toggle="tab"><?php echo bre_string( 'Boot Store', 'Product Tabs, label two', get_option( 'bre_label_two' ) ); ?></a></li>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'sidebar-product-tab3' ) ) : ?>
					<li><a href="#product-tab3" data-toggle="tab"><?php echo bre_string( 'Boot Store', 'Product Tabs, label three', get_option( 'bre_label_three' ) ); ?></a></li>
					<?php endif; ?>
				</ul>
			<?php endif; ?>

				<div class="tab-content">
					<?php if ( strlen( $out ) > 0 ) : ?>
						<div class="description tab-pane fade in active" id="description">
							<?php get_template_part( 'content', 'single-product' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'sidebar-product-tab1' ) ) : ?>
						<div class="additionalinfo1 tab-pane fade in" id="product-tab1">
							<?php dynamic_sidebar( 'sidebar-product-tab1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'sidebar-product-tab2' ) ) : ?>
						<div class="additionalinfo2 tab-pane fade in" id="product-tab2">
							<?php dynamic_sidebar( 'sidebar-product-tab2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'sidebar-product-tab3' ) ) : ?>
						<div class="additionalinfo2 tab-pane fade in" id="product-tab3">
							<?php dynamic_sidebar( 'sidebar-product-tab3' ); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( is_active_sidebar( 'sidebar-cross' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-cross' ); ?>
				<?php endif; ?>

			<?php if ( is_multi_author() ) : ?>
				<div class="entry-author-info author-header media">
					<div class="author-avatar pull-left">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'tcp_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->
					<div class="author-description media-body">
						<p class="author-user"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( esc_attr__( 'By %s', 'tcp' ), get_the_author_meta('user_login') ); ?></a></p>
						<?php if ( get_the_author_meta( 'description') ) : // If a user has filled out their description, show a bio on their products  ?>
							<?php the_author_meta( 'description'); ?>
						<?php endif; ?>
					</div><!-- .author-description -->
				</div><!-- .entry-author-info -->
			<?php endif; ?>

			<?php // If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
