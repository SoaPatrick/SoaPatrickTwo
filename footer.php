<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package soapatrickthree
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?php get_search_form(); ?>
				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>				
			</div>
			
			<div class="col-sm-6 social">
				<h2>Folge mir</h2>
				<p>wenn du Lust & Zeit hast</p>
				<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i></a>
				<!-- <a href="https://twitter.com/SoaPatrick" target="_blank"><i class="fa fa-twitter"></i></a> -->
				<!-- <a href="https://www.youtube.com/user/soapatrick" target="_blank"><i class="fa fa-youtube"></i></a> -->
				<!-- <a href="https://vimeo.com/soapatrick" target="_blank"><i class="fa fa-vimeo"></i></a> -->
				<a href="https://www.instagram.com/SoaPatrick/" target="_blank"><i class="fa fa-instagram"></i></a>
				<a href="https://www.pinterest.com/soapatrick/" target="_blank"><i class="fa fa-pinterest-p"></i></a>
			</div>
			<div class="col-xs-12">
				<div class="copyright">© Copyright 2012 - 2016 SoaPatrick</div>
			</div>								
		</div>
	</div>
</footer>

<div id="loading">	
	<div class="spinner">
		<div class="double-bounce1"></div>
		<div class="double-bounce2"></div>
	</div>	
</div>


<?php wp_footer(); ?>

</body>
</html>
