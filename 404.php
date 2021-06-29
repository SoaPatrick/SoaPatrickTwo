<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package soapatrickthree
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main content-none col-xs-12" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Diese Seite konnte leider nicht gefunden werden.', 'soapatrickthree' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'Wie es aussieht, wurde an dieser Stelle nichts gefunden. Möchtest du danach suchen?', 'soapatrickthree' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
