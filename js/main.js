jQuery(document).ready(function($) {
	$('.btn-1').click(function(event) {
		event.preventDefault();
		$('.dabba').toggleClass('dabba-mobile');
	});
});