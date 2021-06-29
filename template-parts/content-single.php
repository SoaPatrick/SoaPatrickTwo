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
	
		<div class="entry-wrapper">	
			
			<?php if (has_post_format('video') ) : ?>	
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
				</header><!-- .entry-header -->
			<?php endif; ?>					
			
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<div class="posted-on-wrapper">
						<span class="title">Veröffentlicht am: </span>
						<?php soapatrickthree_posted_on(); ?>
					</div>
					<?php the_tags('<div class="tag-wrapper"><span class="title">Schlagwörter:</span><span class="tags">',', ','</span></div>'); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>		
			
			<?php $lead = get_field( "lead" ); ?>
			<?php if( $lead ) : ?>
				<div class="lead">
					<?php echo $lead; ?>
				</div>
			<?php endif; ?>	
			
			<div class="entry-content clearfix">
				<?php the_content(); ?>
				<div class="review-wrap">
					<?php echo do_shortcode('[wp-review]'); ?>
				</div>
			</div>
		</div>
		
	<?php endif; ?>
	
</article><!-- #post-## -->