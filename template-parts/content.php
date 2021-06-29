<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soapatrickthree
 */

?>

<?php if (get_field( "instagram" )) : $instagram_class = "instagram-post"; endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array(get_field( "background_color" ), $instagram_class)); ?>>

	<?php get_template_part( 'template-parts/content-types' ); ?>
	
	<?php if (has_post_format(array( 'gallery', 'image', 'video' ) ) || ! get_post_format()  ) : ?>
	
		<div class="review-bar">
			<?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?>
		</div>	
			
		<header class="entry-header">		
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta row">
					
					<div class="col-xs-8">
						<?php soapatrickthree_posted_on(); ?>
						<?php the_tags('<span class="tags">',', ','</span>'); ?>
					</div>
					
					<div class="col-xs-4">
						<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
					</div>

				</div><!-- .entry-meta -->
			<?php endif; ?>

		</header><!-- .entry-header -->
				
	<?php endif; ?>

</article><!-- #post-## -->	