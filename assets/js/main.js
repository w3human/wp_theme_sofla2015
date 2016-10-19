$(document).ready(function(){
	$("header.layout").sticky({ topSpacing: 0 });
		
	$('#site-header-sticky-wrapper').height(
		$('header.layout').height()
	);

	$('#header-nav-wrapper .search-button').click(function() {
		var e_parent=$(this).parent();
		$('.search-dropdown', e_parent).toggle();
	});
	
	$('#main-nav-toggle').sidr({
		name: 'mobile-nav-wrapper',
		side: 'right',
	});
	
	$('#mobile-nav-wrapper li.menu-item-has-children').each(function() {
		$(this).prepend(
			$('<span></span>').attr('class', 'toggle-menu-drop').click(function() {
				var li_parent=$(this).parent();
				
				$('ul.sub-menu', li_parent).toggleClass('show');
				$(this).toggleClass('opened');
			})
		);
	});
});

$(window).on('resize', function() {
	$('#site-header-sticky-wrapper').height(
		$('header.layout').height()
	);
});




