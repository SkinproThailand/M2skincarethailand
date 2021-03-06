<?php
/**
 * The template for displaying posts in the Link post format
 * Boot Store theme is based on Twentytwelve theme. The official WordPress theme.
 *
 * @package WordPress
 * @subpackage Boot Store
 * @since Boot Store 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header><?php _e( 'Link', 'bre-bootstrap-ecommerce' ); ?></header>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bre-bootstrap-ecommerce' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bre-bootstrap-ecommerce' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bre-bootstrap-ecommerce' ) . '</span>', __( '1 Reply', 'bre-bootstrap-ecommerce' ), __( '% Replies', 'bre-bootstrap-ecommerce' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'bre-bootstrap-ecommerce' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
