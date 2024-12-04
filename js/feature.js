$(document).ready(function() {

	// toggle between excerpt and feature body
	$(".togglebtn").click( function($this) {
		var excerpt = $(this).attr("data-excerpt");
		var body = $(this).attr("data-body");
		
		$(excerpt).collapse('toggle');
		$(body).collapse('toggle');
		
		if ($(this).hasClass("rotate")) {
			$(this).removeClass("rotate");
		} else {
			$(this).addClass("rotate");
		}
	});
	
	// tabs
	$('#monitoring a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
	$('#analysis a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
	$('#toolintegration a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	
	// image overlay
	$("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox({
		padding: 0,
		afterShow: function() {
			$(".fancybox-title").wrapInner('<div />').show();    
	
		},
		helpers : {
			title: {
				type: 'over'
			},
			overlay: {
				locked: false
			}
		}
	});
	
});


