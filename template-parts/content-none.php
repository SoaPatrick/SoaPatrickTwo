<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soapatrickthree
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nichts gefunden', 'soapatrickthree' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Bereit, um deinen ersten Beitrag zu veröffentlichen? <a href="%1$s">Starte hier</a>.', 'soapatrickthree' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Entschuldigung, aber zu deinen Suchbegriffen wurde nichts passendes gefunden. Bitte versuche es mit anderen Stichworten noch einmal.', 'soapatrickthree' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Es sieht so aus, als ob wir nicht das finden konnten, wonach du gesucht hast. Möglicherweise hilft eine Suche.', 'soapatrickthree' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
