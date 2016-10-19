<!-- pagination -->
<div class="pagination">
	<div class="btn-group btn-group-sm" roloe="group">
		<?php
			global $wp_query;
			$big = 999999999;
			echo paginate_links(array(
				'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				'format' => '?paged=%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $wp_query->max_num_pages,
				
				//~ 'before_page_number' => '<button type="button" class="btn btn-default">',
				//~ 'after_page_number' => '</button>'
			));
		?>
	</div>
</div>
<!-- /pagination -->
