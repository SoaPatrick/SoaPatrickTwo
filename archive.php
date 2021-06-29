<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soapatrickthree
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		
		<?php
		if ( have_posts() ) : ?>	
			
			<div class="col-xs-12">
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->		
			</div>
			<main id="main-blog" class="site-main col-xs-12" role="main">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
	
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
	
				endwhile; ?>
			
			</main>

		<?php else : ?>
		
			<main id="main-blog" class="site-main col-xs-12" role="main">

				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
			</main>

		<?php endif; ?>
		<?php wp_pagenavi(); ?>

	</div><!-- #primary -->

<?php
get_footer();
