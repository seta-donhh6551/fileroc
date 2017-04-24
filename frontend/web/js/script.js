jQuery(document).ready(function($) {
	$('#mobile-menu-bar').click(function() {
		$('#mobile-menu').toggle(function() {
			
		}, function() {
			
		});
		
	});
	$('.mob-search').click(function(event) {
		$('#mobile-roll-over-search').toggle(function() {
			
		}, function() {
			
		});
		
	});
});