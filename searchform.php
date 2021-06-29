<form class="search-form form-inline" action="<?php echo home_url( '/' ); ?>" method="get">
	<div class="input-group">
		<div class="form-group">
			<input type="text" name="s" id="search" class="form-control input-lg" value="<?php the_search_query(); ?>" placeholder="..." />
		</div>
		<span class="input-group-addon">
			<button type="submit" alt="Suchen" class="btn btn-default btn-lg">Suchen</button>
		</span>  
	</div>
</form>