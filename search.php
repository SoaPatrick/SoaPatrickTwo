<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package soapatrickthree
 */

get_header(); ?>

	<div id="primary" class="content-area row">

		<?php
		if ( have_posts() ) : ?>
		
			<div class="col-xs-12">
				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Suchergebnisse für: %s', 'soapatrickthree' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->		
			</div>
			<main id="main-blog" class="site-main col-xs-12" role="main">		

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
	
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
	
				endwhile; ?>

			</main>	

		<?php else : ?>
		
			<main id="main" class="site-main content-none col-xs-12" role="main">

				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
			</main>

		<?php endif; ?>
		<?php wp_pagenavi(); ?>

	</div><!-- #primary -->

<?php
get_footer();

