<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
	<div class="form-group">
		 <label for="input-site-search">Search</label>
		<input type="search" class="form-control" name="s" id="input-site-search" placeholder="<?php _e( 'To search, type and hit enter.', 'custom' ); ?>">
	</div>
	<p>
		<button type="submit" role="button" class="btn btn-default"><?php _e( 'Search', 'custom' ); ?></button>
	</p>
</form>
