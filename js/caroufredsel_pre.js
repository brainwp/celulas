// JavaScript Document
jQuery(function() {
		jQuery('#carousel').carouFredSel({
		prev: '#prev2',
		next: '#next2',
		auto: {
			play: true,
		},
		responsive: true,
		align: "center",
		items: {
			visible: 1,
			start: "random"
		}
	});
});
