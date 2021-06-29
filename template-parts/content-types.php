<?php
/**
 * Template part for displaying individual content types.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package soapatrickthree
 */

?>

	<?php if (has_post_format('gallery')) : ?>
	
	    <?php $images = get_post_meta($post->ID, '_format_gallery_images', true); ?>
		<div id="carousel-<?php the_ID(); ?>" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
		        <?php $first = true; foreach ($images as $image) { ?>
				    <div class="item<?php if ($first) : ?> active<?php endif; ?>"> 
					    <?php if ( is_single() ) : ?>
				        	<?php echo wp_get_attachment_image( $image, 'full-width' ); ?>
						<?php else : ?>	
							<?php echo wp_get_attachment_image( $image, 'index-width' ); ?>				        	
				        <?php endif; ?>		
				    </div>  	        	
					<?php $first = false; ?>
			    <?php } ?>
	    	</div>
			<a class="left carousel-control" href="#carousel-<?php the_ID(); ?>" role="button" data-slide="prev">
				<i class="fa fa-prev fa-angle-left"></i>				
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-<?php the_ID(); ?>" role="button" data-slide="next">
				<i class="fa fa-next fa-angle-right"></i>				
				<span class="sr-only">Next</span>
			</a>
			
			<?php if (is_single()) : ?>
				<header class="entry-header-image">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
				</header><!-- .entry-header -->		
			<?php endif; ?>		
				    	
		</div>		
		
	<?php elseif (has_post_format('image')) : ?>
	
		<?php if (is_single()) : ?>
			<header class="entry-header-image">
				<?php the_post_thumbnail('full-width'); ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
			</header><!-- .entry-header -->		
		<?php else : ?>	
			<?php the_post_thumbnail('index-width'); ?>			
		<?php endif; ?>	
						                               	    
	<?php elseif (has_post_format('video')) : ?>		    
	    
	    <?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
	    
    <?php elseif (has_post_format('quote')) : ?>
    
	    <i class="fa fa-quote-right"></i>
	    <?php the_title( '<blockquote class="quote">', '</blockquote>' ); ?>
		<p class="author">
			<?php echo get_post_meta($post->ID, '_format_quote_source_name', true); ?>	
		</p>
		
    <?php elseif (has_post_format('link')) : ?>
    
	    <i class="fa fa-link"></i>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<?php $link_url = get_post_meta($post->ID, '_format_link_url', true); ?>
		<?php echo '<a href="'.$link_url.'" class="link" target="_blank">' .$link_url. '</a>'; ?>
		 
    <?php elseif (has_post_format('status') && !get_field( "instagram" )) : ?>
    
    	<?php if (get_field( "font-awesome_icon" )) : ?>
		    <i class="fa <?php echo get_field( "font-awesome_icon" ) ?>"></i>
		<?php else : ?>
			<i class="fa fa-hand-pointer-o"></i>
		<?php endif; ?>
		<?php the_content( '<h2 class="entry-title">', '</h2>' ); ?>
		<div class="posted-on"><?php the_time('j. F Y') ?></div>
		
    <?php elseif (has_post_format('status') && get_field( "instagram" )) : ?>	
    
		<?php the_post_thumbnail(); ?>	
		<header class="entry-header instagram">
			<i class="fa fa-instagram"></i>
			<?php the_content(); ?>
			<div class="posted-on"><?php the_time('j. F Y') ?></div>
		</header>		
		 
	<?php else : ?>
	
		<?php if( has_post_thumbnail() ) : ?>
			<?php if ( is_single() ) : ?>
				<?php the_post_thumbnail('full-width'); ?>
				<header class="entry-header-image">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
				</header><!-- .entry-header -->		
			<?php else : ?>
				<?php the_post_thumbnail('index-width'); ?>
			<?php endif; ?>			
		<?php else : ?>	
			<?php if ( is_single() ) : ?>		
				<header class="entry-header-image no-image">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>	
				</header><!-- .entry-header -->					
			<?php else : ?>
				<div class="border"></div>
			<?php endif; ?>
		<?php endif; ?>	
		
	<?php endif; ?>